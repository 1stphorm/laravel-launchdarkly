<?php

namespace Ocus\LaravelLaunchDarkly\Contracts;

use LaunchDarkly\LDUser;

interface IsLaunchDarklyUser
{
    /**
     * @return LDUser
     *
     * @see \LaunchDarkly\LDUserBuilder
     * @link https://docs.launchdarkly.com/sdk/features/user-config#php
     */
    public function getLaunchDarklyUserAttribute(): LDUser;
}
