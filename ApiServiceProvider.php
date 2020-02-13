<?php

namespace Core\Api;

use Illuminate\Support\ServiceProvider;
use Core\Api\Console\ProductPendingCommand;

class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'core-api');
    }

    public function boot()
    {
        $this->loadFactoriesFrom(__DIR__.'/database/factories');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('core-api.php'),
        ]);
        if ($this->app->runningInConsole()) {
            $this->commands([
                ProductPendingCommand::class,
            ]);

        }
    }
}
