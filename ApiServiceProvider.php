<?php

namespace Core\Api;

use Illuminate\Support\ServiceProvider;
use Core\Api\Console\ProductPendingCommand;

class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadFactoriesFrom(__DIR__.'/database/factories');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        if ($this->app->runningInConsole()) {
            $this->commands([
                ProductPendingCommand::class,
            ]);

        }
    }
}
