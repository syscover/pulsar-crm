<?php namespace Syscover\Crm;

use Illuminate\Support\ServiceProvider;
use Syscover\Crm\GraphQL\CrmGraphQLServiceProvider;

class CrmServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // register routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');

        // register migrations
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        // register seeds
        $this->publishes([
            __DIR__ . '/../../database/seeds/' => base_path('/database/seeds')
        ], 'seeds');

        // register config files
        $this->publishes([
            __DIR__ . '/../../config/pulsar.crm.php' => config_path('pulsar.crm.php'),
        ]);

        // register GraphQL types and schema
        CrmGraphQLServiceProvider::bootGraphQLTypes();
        CrmGraphQLServiceProvider::bootGraphQLSchema();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}