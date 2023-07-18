<?php

namespace Hareom284\LaravelH5p;

use Hareom284\LaravelH5p\Commands\MigrationCommand;
use Hareom284\LaravelH5p\Commands\ResetCommand;
use Hareom284\LaravelH5p\Helpers\H5pHelper;

class LaravelH5pServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = false;

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Hareom284\LaravelH5p\Events\H5pEvent' => [
            'Hareom284\LaravelH5p\Listeners\H5pNotification',
        ],
    ];

    public function register()
    {
        $this->app->singleton('LaravelH5p', function ($app) {
            $LaravelH5p = new LaravelH5p($app);

            return $LaravelH5p;
        });

        $this->app->bind('H5pHelper', function () {
            return new H5pHelper();
        });

        $this->app->singleton('command.laravel-h5p.migration', function ($app) {
            return new MigrationCommand();
        });

        $this->app->singleton('command.laravel-h5p.reset', function ($app) {
            return new ResetCommand();
        });

        $this->commands([
            'command.laravel-h5p.migration',
            'command.laravel-h5p.reset',
        ]);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/laravel-h5p.php');

        // config
        $this->publishes([
            __DIR__ . '/../../config/laravel-h5p.php' => config_path('laravel-h5p.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/laravel-h5p.php',
            'laravel-h5p'
        );

        // language
        $this->publishes([
            __DIR__ . '/../../lang/en/laravel-h5p.php' => resource_path('lang/en/laravel-h5p.php'),
        ], 'language');
        $this->publishes([
            __DIR__ . '/../../lang/fr/laravel-h5p.php' => resource_path('lang/fr/laravel-h5p.php'),
        ], 'language');
        $this->publishes([
            __DIR__ . '/../../lang/ar/laravel-h5p.php' => resource_path('lang/ar/laravel-h5p.php'),
        ], 'language');
        $this->publishes([
            __DIR__ . '/../../lang/pt/laravel-h5p.php' => resource_path('lang/pt/laravel-h5p.php'),
        ], 'language');

        // views
        $this->publishes([
            __DIR__ . '/../../views/h5p' => resource_path('views/h5p'),
        ], 'resources');

        // migrations
        $this->publishes([
            __DIR__ . '/../../migrations/' => database_path('migrations'),
        ], 'migrations');

        // h5p




        $this->publishes([
            __DIR__ . '/../../assets' => public_path('assets/vendor/laravel-h5p'),
            base_path('vendor/h5p/h5p-core/fonts') => public_path('assets/vendor/h5p/h5p-core/fonts'),
            base_path('vendor/h5p/h5p-core/images') => public_path('assets/vendor/h5p/h5p-core/images'),
            base_path('vendor/h5p/h5p-core/js') => public_path('assets/vendor/h5p/h5p-core/js'),
            base_path('vendor/h5p/h5p-core/styles') => public_path('assets/vendor/h5p/h5p-core/styles'),
            base_path('vendor/h5p/h5p-editor/ckeditor') => public_path('assets/vendor/h5p/h5p-editor/ckeditor'),
            base_path('vendor/h5p/h5p-editor/images') => public_path('assets/vendor/h5p/h5p-editor/images'),
            base_path('vendor/h5p/h5p-editor/language') => public_path('assets/vendor/h5p/h5p-editor/language'),
            base_path('vendor/h5p/h5p-editor/libs') => public_path('assets/vendor/h5p/h5p-editor/libs'),
            base_path('vendor/h5p/h5p-editor/scripts') => public_path('assets/vendor/h5p/h5p-editor/scripts'),
            base_path('vendor/h5p/h5p-editor/styles') => public_path('assets/vendor/h5p/h5p-editor/styles'),
        ], 'public');
    }

    public function provides()
    {
        return [
            'command.laravel-h5p.migration',
            'command.laravel-h5p.reset',
        ];
    }
}
