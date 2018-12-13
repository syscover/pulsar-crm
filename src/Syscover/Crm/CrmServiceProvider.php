<?php namespace Syscover\Crm;

use Illuminate\Support\ServiceProvider;

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
            __DIR__ . '/../../config/pulsar-crm.php' => config_path('pulsar-crm.php'),
        ]);

        // register translations
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'crm');
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