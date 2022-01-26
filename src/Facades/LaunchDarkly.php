<?php

namespace Ocus\LaravelLaunchDarkly\Facades;

use Illuminate\Support\Facades\Facade;
use LaunchDarkly\LDClient;
use Ocus\LaravelLaunchDarkly\Integrations\InMemory;
use Ocus\LaravelLaunchDarkly\Services\LaravelLaunchDarklyInMemoryService;

/**
 * @method static mixed variation(string $key, \LaunchDarkly\LDUser $user, $default = false)
 * @method static \LaunchDarkly\EvaluationDetail variationDetail(string $key, \LaunchDarkly\LDUser $user, $default = false)
 * @method static bool isOffline()
 * @method static void track(string $eventName, \LaunchDarkly\LDUser $user, $data = null, $metricValue = null)
 * @method static void identify(\LaunchDarkly\LDUser $user)
 * @method static \LaunchDarkly\FeatureFlagsState allFlagsState(\LaunchDarkly\LDUser $user, array $options = [])
 * @method static void alias(\LaunchDarkly\LDUser $user, \LaunchDarkly\LDUser $previousUser)
 * @method static string secureModeHash(\LaunchDarkly\LDUser $user)
 * @method static bool flush()
 * @method static void addFlag(array $flag)
 * @method static void addFlagValue(string $key, $value)
 * @method static void addSegment(array $segment)
 *
 * @see \LaunchDarkly\LDClient
 */
class LaunchDarkly extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return LDClient::class;
    }

    /**
     * Replace the bound instance with a fake.
     *
     * @return LaravelLaunchDarklyInMemoryService
     */
    public static function fake(): LaravelLaunchDarklyInMemoryService
    {
        $fake = new LaravelLaunchDarklyInMemoryService(
            'in_memory',
            [
                'feature_requester' => InMemory::featureRequester(),
                'send_events' => false,
            ]
        );

        static::swap($fake);

        return $fake;
    }
}
