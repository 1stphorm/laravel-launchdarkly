<?php

namespace Ocus\LaravelLaunchDarkly\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase as Orchestra;
use Ocus\LaravelLaunchDarkly\LaravelLaunchDarklyServiceProvider;

class TestCase extends Orchestra
{
    private const MIGRATIONS = [
        __DIR__ . '/database/migrations/0000_00_00_000001_create_users_table.php',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        foreach (self::MIGRATIONS as $migration) {
            $migration = include $migration;
            $migration->up();
        }

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Ocus\\LaravelLaunchDarkly\\Tests\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelLaunchDarklyServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        Config::set('database.default', 'testing');
        Config::set(
            'database.connections.testing',
            [
                'driver' => 'sqlite',
                'database' => ':memory:',
                'foreign_key_constraints' => true,
            ]
        );
    }
}
