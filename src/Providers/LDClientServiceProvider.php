<?php

namespace Ocus\LaravelLaunchDarkly\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use LaunchDarkly\LDClient;

class LDClientServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->singleton(LDClient::class, static function (): LDClient {
            $sdkKey = Config::get('launchdarkly.sdk_key');
            $options = array_filter(
                Config::get('launchdarkly.options'),
                fn ($value) => $value !== null
            );

            return new LDClient($sdkKey, $options);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            LDClient::class
        ];
    }
}
