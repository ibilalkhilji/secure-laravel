<?php
const BASE_URL = 'https://passport.khaleejinfotech.com/api/passport';

if (!function_exists('secure_hash_mac')) {
    function secure_hash_mac(string $mac): string
    {
        return hash('sha256', $mac);
    }
}

if (!function_exists('mac')) {
    function mac(): string
    {
        $info = trim(exec('getmac')) ?? '';
        $mac = '';
        if (preg_match('/^([0-9A-Fa-f-]+)\s+\\\\Device\\\\Tcpip_{([A-F0-9\-]+)}/', $info, $matches)) {
            $mac = $matches[1] ?? '';
        }
        return $mac;
    }
}

if (!function_exists('guid')) {
    function guid(): string
    {
        $info = trim(exec('getmac')) ?? '';
        $guid = '';
        if (preg_match('/^([0-9A-Fa-f-]+)\s+\\\\Device\\\\Tcpip_{([A-F0-9\-]+)}/', $info, $matches)) {
            $guid = $matches[2] ?? '';
        }
        return $guid;
    }
}

if (!function_exists('system_fingerprint')) {
    function system_fingerprint(): array
    {
        return [
            'domain' => gethostname(),
            'mac' => mac(),
            'guid' => guid(),
            'hash' => secure_hash_mac(mac()),
        ];
    }
}

if (!function_exists('license_file_path')) {
    function license_file_path(): string
    {
        $app_identifier = Str::replace('-', '', mac());
        return getenv('APPDATA') . "\\$app_identifier.license";
    }
}

function isInternetAvailable(): bool
{
    $ch = curl_init("https://www.google.com/");
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $result !== false && $httpCode > 0;
}
