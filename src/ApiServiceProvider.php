<?php

namespace Core\Api;

use Illuminate\Support\ServiceProvider;
use Core\Api\Console\ProductPendingCommand;
use Illuminate\Routing\Router;
use Core\Api\Http\Middleware\RequestLogger;
class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'core-api');
    }

    public function boot()
    {
        $this->loadFactoriesFrom(__DIR__.'/database/factories');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('core-api.php'),
            __DIR__ . '/database/migrations/create_customers_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_customers_table.php'),
            __DIR__ . '/database/migrations/create_products_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_products_table.php'),
            __DIR__ . '/database/migrations/create_logs_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_logs_table.php'),
            __DIR__ . '/database/factories/CustomerFactory.php' => database_path('factories/CustomerFactory.php'),
            __DIR__ . '/database/factories/ProductFactory.php' => database_path('factories/ProductFactory.php'),
            ]);
        $this->loadViewsFrom(__DIR__.'/views', 'api');
        if ($this->app->runningInConsole()) {
            $this->commands([
                ProductPendingCommand::class,
            ]);

        }
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('logger', RequestLogger::class);
    }
}
