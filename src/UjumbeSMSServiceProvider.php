<?php

namespace Kenmush\UjumbeSMS;

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
