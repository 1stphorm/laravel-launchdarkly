<?php

namespace Ocus\LaravelLaunchDarkly;

use Ocus\LaravelLaunchDarkly\Providers\LDClientServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelLaunchDarklyServiceProvider extends PackageServiceProvider
{
    /**
     * @param Package $package
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-launchdarkly')
            ->hasConfigFile();

        $this
            ->app
            ->registerDeferredProvider(LDClientServiceProvider::class);
    }
}
