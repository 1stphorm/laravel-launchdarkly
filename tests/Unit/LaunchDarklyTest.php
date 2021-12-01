<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Ocus\LaravelLaunchDarkly\Facades\LaunchDarkly;
use Ocus\LaravelLaunchDarkly\Tests\Models\User;

uses(RefreshDatabase::class);

beforeEach(
    function () {
        $this->mock = LaunchDarkly::fake();

        $this->user = User::factory()->create();
    }
);

it(
    'returns the right value when set the tag value',
    function (string $key, $value): void {
        LaunchDarkly::addFlagValue($key, $value);

        expect(
            LaunchDarkly::variation($key, $this->user->launch_darkly_user)
        )
        ->toBe($value);
    }
)
->with('flagValues');

it(
    'returns the right value when set the tag',
    function (array $tag, $expected): void {
        LaunchDarkly::addFag($tag);

        expect(
            LaunchDarkly::variation($tag['key'], $this->user->launch_darkly_user)
        )
        ->toBe($expected);
    }
)
->with('flags');
