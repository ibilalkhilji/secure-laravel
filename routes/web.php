<?php

use Ibilalkhilji\SecureLaravel\Http\Controllers\PassportController;

Route::group(['as' => 'secure.', 'prefix' => 'secure', 'middleware' => ['web'],], function () {
    Route::post('passport-validate', [PassportController::class, 'validateLicense'])
        ->name('passport.validate');
});
