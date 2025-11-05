<?php

namespace Ibilalkhilji\SecureLaravel\Services;

use Carbon\Carbon;
use Crypt;
use Http;
use Ibilalkhilji\SecureLaravel\Models\Passport;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Str;
use Throwable;

class PassportValidator
{
    public static function isValid(): bool
    {
        $path = license_file_path();
        if (!file_exists($path)) return false;

        try {
            $data = Crypt::decrypt(file_get_contents($path));
            if ($data['domain'] !== gethostname()) return false;
            if ($data['guid'] !== guid()) return false;
            if (Carbon::now()->gt(Carbon::parse($data['expires_at']))) return false;

            return true;
        } catch (Throwable $e) {
            return false;
        }
    }

    /**
     * @throws ConnectionException
     */
    public static function createLicense(string $license): RedirectResponse|bool
    {
        /*$updated = Http::withoutVerifying()
            ->post(BASE_URL, [
                'license' => $license,
                'mac' => mac(),
                'guid' => guid(),
            ])->json();*/

        $response = true;

        if ($response) {
//                $encryptedToken = $response->json('token');
            $fingerprint = system_fingerprint();
            file_put_contents(
                license_file_path(),
                Crypt::encrypt($fingerprint + ['expires_at' => now()->addDays(30)->toDateTimeString()])
            );

            file_put_contents(
                "C:\\ProgramData\\" . Str::replace('-', '', mac()),
                base64_encode(implode('|',$fingerprint + ['expires_at' => now()->addDays(30)->toDateTimeString()]))
            );

            Passport::create([
                'key' => $license,
                'client_name' => $request->client_name ?? $fingerprint['domain'],
                'domain' => $request->domain ?? $fingerprint['domain'],
                'mac' => $fingerprint['mac'],
                'guid' => $fingerprint['guid'],
                'expires_at' => now()->addDays(30)->toDateTimeString(),
            ]);

            if (app()->runningInConsole()) return true;
            return back()->with('success', 'License key activated successfully.');
        } else {
            if (app()->runningInConsole()) return false;
            return back()->with('error', 'Failed to activate license key.');
        }
    }

    public static function matchesHost(): bool
    {
        $data = Crypt::decrypt(file_get_contents(license_file_path()));
        return ($data['domain'] ?? '') === gethostname();
    }
}
