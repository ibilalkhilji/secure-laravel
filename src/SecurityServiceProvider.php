<?php

namespace Ibilalkhilji\SecureLaravel;

use Artisan;
use Ibilalkhilji\SecureLaravel\Console\Commands\ActivateLicenseCommand;
use Ibilalkhilji\SecureLaravel\Http\Middleware\PassportChecker;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;
use Log;
use Schema;
use Throwable;

class SecurityServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        AboutCommand::add('Secure Laravel', fn() => [
            'Version' => '1.0.7',
            'Developed by' => 'KHALEEJ Infotech',
            'Developer Email' => 'contact@khaleejinfotech.com',
            'Developer Website' => 'https://khaleejinfotech.com',
            'Author' => 'Bilal Khilji',
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'secure');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        try {
            if (!Schema::hasTable('passports')) {
                Artisan::call('migrate', [
                    '--path' => realpath(__DIR__ . '/../database/migrations'),
                    '--force' => true,
                ]);

                Log::info('[SecureLaravel] Package migrations executed automatically.');
            }
        } catch (Throwable $e) {
            Log::warning('[SecureLaravel] Auto-migration failed: ' . $e->getMessage());
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                ActivateLicenseCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/secure'),
            ], 'secure-views');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'secure-migrations');
        }

        $this->app['router']->pushMiddlewareToGroup('web', PassportChecker::class);
    }

    public function register(): void
    {

    }
}
