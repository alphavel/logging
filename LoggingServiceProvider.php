<?php

namespace Alphavel\Logging;

use Alphavel\Framework\ServiceProvider;

class LoggingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('logger', function () {
            $config = $this->app->config('logging', []);
            $path = $config['path'] ?? null;

            return new Logger($path);
        });

        // Auto-register facade
        $this->facades([
            'Log' => 'logger',
        ]);
    }

    public function boot(): void
    {
        //
    }
}
