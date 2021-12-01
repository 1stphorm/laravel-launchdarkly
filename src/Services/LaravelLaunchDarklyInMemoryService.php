<?php

namespace Ocus\LaravelLaunchDarkly\Services;

use LaunchDarkly\LDClient;

class LaravelLaunchDarklyInMemoryService extends LDClient
{
    /**
     * @param array $flag
     */
    public function addFag(array $flag): void
    {
        $this->_featureRequester->addFlag($flag);
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function addFlagValue(string $key, $value): void
    {
        $this->_featureRequester->addFlagValue($key, $value);
    }

    /**
     * @param array $segment
     */
    public function addSegment(array $segment): void
    {
        $this->_featureRequester->addSegment($segment);
    }
}
