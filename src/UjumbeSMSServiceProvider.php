<?php

namespace Kenmush\UjumbeSMS;

use function database_path;

use Illuminate\Support\Facades\Route;
use Kenmush\UjumbeSMS\Commands\UjumbeSMSCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UjumbeSMSServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ujumbesms');
//        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                    __DIR__.'/../database/migrations/create_ujumbesms_table.php.stub' => database_path('migrations/'.date(
                        'Y_m_d_His',
                        time()
                    )
                            .'_create_ujumbesms_table.php'),
            ], 'migrations');

            $this->publishes([
                    __DIR__.'/../config/ujumbesms.php' => config_path('ujumbesms.php'),
            ], 'config');

            $this->publishes([
                    __DIR__.'/../resources/views' => resource_path('views/vendor/ujumbesms'),
            ], 'views');

            $this->publishes([
                    __DIR__.'/../resources/assets' => public_path('ujumbesms'),
            ], 'assets');
        }
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
                'prefix' => config('ujumbesms.prefix'),
                'middleware' => config('ujumbesms.middleware'),
        ];
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ujumbesms.php', 'ujumbesms');
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
                ->name('ujumbesms')
                ->hasConfigFile()
                ->hasViews()
                ->hasMigration('create_ujumbesms_table')
                ->hasCommand(UjumbeSMSCommand::class);
    }
}
