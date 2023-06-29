<?php

use Ocus\LaravelLaunchDarkly\Tests\Datasets\Flags;
use Ocus\LaravelLaunchDarkly\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

dataset('flagValues', Flags::flagValues);
dataset('flags', Flags::flags);
