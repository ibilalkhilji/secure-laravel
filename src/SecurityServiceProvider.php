<?php

namespace Ibilalkhilji\SecureLaravel;

use Ibilalkhilji\SecureLaravel\Console\Commands\ActivateLicenseCommand;
use Ibilalkhilji\SecureLaravel\Http\Middleware\PassportChecker;
use Illuminate\Support\ServiceProvider;

class SecurityServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'secure');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

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
