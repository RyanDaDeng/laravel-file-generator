<?php

namespace TimeHunter\LaravelFileGenerator;

use Illuminate\Support\ServiceProvider;

class LaravelFileGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../templates', 'LaravelFileGenerator');


        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelfilegenerator.php', 'laravelfilegenerator');

        // Register the service the package provides.
        $this->app->singleton('laravelfilegenerator', function ($app) {
            return new LaravelFileGenerator;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelfilegenerator'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelfilegenerator.php' => config_path('laravelfilegenerator.php'),
        ], 'laravelfilegenerator.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/timehunter'),
        ], 'laravelfilegenerator.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/timehunter'),
        ], 'laravelfilegenerator.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/timehunter'),
        ], 'laravelfilegenerator.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
