<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

$info = trim(exec('getmac')) ?? '';
$mac = '';
if (preg_match('/^([0-9A-Fa-f-]+)\s+\\\\Device\\\\Tcpip_{([A-F0-9\-]+)}/', $info, $matches)) {
    $mac = $matches[1] ?? '';
}
$mac = str_replace('-', '', $mac);
if (!file_exists("C:\\ProgramData\\$mac"))
    die('usage of this application not authorized');

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
