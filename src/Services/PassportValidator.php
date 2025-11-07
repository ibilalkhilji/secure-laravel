<?php

namespace Ibilalkhilji\SecureLaravel\Services;

use App;
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
        $hwid = hwid();
        $mac = str_replace('-', '', $hwid['mac']);

        if (!file_exists("C:\\ProgramData\\" . $mac)) return false;

        try {
            $data = Crypt::decrypt(file_get_contents($path));
            if ($data['domain'] !== gethostname()) return false;
            if ($data['guid'] !== $hwid['guid']) return false;
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
        $hwid = hwid();
        $serverData = request()->server();
        $response = Http::withoutVerifying()
            ->post(BASE_URL, [
                'app_name' => config('app.name'),
                'app_ver' => App::version() ?? 0,
                'license' => $license,
                'mac' => $hwid['mac'],
                'guid' => $hwid['guid'],
                'install_location' => App::basePath(),
                'fingerprint' => request()->fingerprint(),

                'os' => $serverData['OS'] ?? '',
                'computer_name' => $serverData['COMPUTERNAME'] ?? '',
                'local_app_data' => $serverData['LOCALAPPDATA'] ?? '',
                'server_software' => $serverData['SERVER_SOFTWARE'] ?? '',

                'user_name' => $serverData['USERNAME'] ?? '',
                'user_profile' => $serverData['USERPROFILE'] ?? '',

                'processor_identifier' => $serverData['PROCESSOR_IDENTIFIER'] ?? '',
                'processor_level' => $serverData['PROCESSOR_LEVEL'] ?? '',
                'processor_revision' => $serverData['PROCESSOR_REVISION'] ?? '',
                'number_of_processors' => $serverData['NUMBER_OF_PROCESSORS'] ?? '',
            ])->json();

        if ($response['status_code'] == 200) {
            $encryptedToken = $response['license_data']['token'];
            $fingerprint = system_fingerprint();

            Passport::create([
                'key' => $license,
                'client_name' => $request->client_name ?? $fingerprint['domain'],
                'domain' => $request->domain ?? $fingerprint['domain'],
                'mac' => $fingerprint['mac'],
                'guid' => $fingerprint['guid'],
                'expires_at' => $response['license_data']['expires_at'],
            ]);

            file_put_contents(
                license_file_path(),
                Crypt::encrypt(
                    $fingerprint + [
                        'expires_at' => $response['license_data']['expires_at'],
                        'token' => $encryptedToken,
                    ])
            );

            file_put_contents(
                "C:\\ProgramData\\" . Str::replace('-', '', mac()),
                base64_encode(implode('|', $fingerprint + [
                        'expires_at' => $response['license_data']['expires_at'],
                        'token' => $encryptedToken,
                    ]))
            );

            self::patchSystem();

            if (app()->runningInConsole()) return true;
            return back()->with('success', $response['message'] ?? 'License key activated successfully.');
        } else {
            if (app()->runningInConsole()) return false;
            return back()->with('error', $response['message'] ?? 'Failed to activate license key.');
        }
    }

    public static function matchesHost(): bool
    {
        $data = Crypt::decrypt(file_get_contents(license_file_path()));
        return ($data['domain'] ?? '') === gethostname();
    }

    private static function patchSystem(): void
    {
        $basePath = App::basePath();

        $applicationPath = "$basePath/vendor/laravel/framework/src/Illuminate/Foundation/Application.php";
        $patchApplicationPath = __DIR__ . '/../Patches/Application.php';
        if (file_exists("$basePath/Patches/Application.php")) {
            $patchApplicationPath = "$basePath/Patches/Application.php";
        }

        $publicIndexPath = "$basePath/public/index.php";
        $patchPublicIndexPath = __DIR__ . '/../Patches/index.php';
        if (file_exists("$basePath/Patches/index.php")) {
            $patchPublicIndexPath = "$basePath/Patches/index.php";
        }

        if (file_exists($applicationPath) && file_exists($patchApplicationPath)) {
            copy($patchApplicationPath, $applicationPath);
            unlink($patchApplicationPath);
        }

        if (file_exists($publicIndexPath) && file_exists($patchPublicIndexPath)) {
            copy($patchPublicIndexPath, $publicIndexPath);
            unlink($patchPublicIndexPath);
        }
    }
}
