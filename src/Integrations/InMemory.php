<?php

namespace Ocus\LaravelLaunchDarkly\Integrations;

use Ocus\LaravelLaunchDarkly\Integrations\Implementations\InMemoryDataFeatureRequester;

class InMemory
{
    /**
     * This component allows you to use in memory as a source of feature flag state.
     *
     * This would typically be used in a test environment, to operate using a predetermined feature flag state
     * without an actual LaunchDarkly connection.
     *
     * To use this component, create an instance of this class.
     * Then place the resulting object in your LaunchDarkly client configuration with the
     * key `feature_requester`.
     *
     *     $fr = LaunchDarkly\Integrations\Files::featureRequester("./testData/flags.json");
     *     $config = [ "feature_requester" => $fr, "send_events" => false ];
     *     $client = new LDClient("sdk_key", $config);
     *
     * This will cause the client _not_ to connect to LaunchDarkly to get feature flags. (Note
     * that in this example, `send_events` is also set to false so that it will not connect to
     * LaunchDarkly to send analytics events either.)
     *
     * @return mixed  an object to be stored in the `feature_requester` configuration property
     */
    public static function featureRequester()
    {
        return new InMemoryDataFeatureRequester();
    }
}
