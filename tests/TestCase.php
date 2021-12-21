<?php

namespace Kenmush\UjumbeSMS\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Kenmush\UjumbeSMS\UjumbeSMSServiceProvider;
use function dd;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Kenmush\\UjumbeSMS\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            UjumbeSMSServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        $migration = include __DIR__.'/../database/migrations/create_ujumbesms_table.php.stub';
        $migration->up();

    }
}
