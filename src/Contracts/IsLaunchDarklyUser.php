<?php

namespace Ocus\LaravelLaunchDarkly\Contracts;

use LaunchDarkly\LDContext;

interface IsLaunchDarklyUser
{
    /**
     * @return LDContext
     *
     * @see \LaunchDarkly\LDUserBuilder
     * @link https://docs.launchdarkly.com/sdk/features/user-config#php
     */
    public function getLaunchDarklyUserAttribute(): LDContext;
}
