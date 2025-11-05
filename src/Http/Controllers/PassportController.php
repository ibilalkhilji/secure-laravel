<?php

namespace Ibilalkhilji\SecureLaravel\Http\Controllers;

use Exception;
use Ibilalkhilji\SecureLaravel\Services\PassportValidator;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function validateLicense(Request $request)
    {
        $request->validate([
            'license' => 'required',
        ], [
            'license.required' => 'License key is required.',
        ]);

        try {
            return PassportValidator::createLicense($request->license);
        } catch (Exception $exception) {
            return back()->with('error', 'Failed to activate license key.');
        }
    }
}
