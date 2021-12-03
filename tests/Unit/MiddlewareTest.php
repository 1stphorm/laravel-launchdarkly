<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Ocus\LaravelLaunchDarkly\Facades\LaunchDarkly;
use Ocus\LaravelLaunchDarkly\Tests\Models\User;

uses(RefreshDatabase::class);

beforeEach(
    function () {
        $this->mock = LaunchDarkly::fake();

        $this->user = User::factory()->create();
        Auth::setUser($this->user);
    }
);

it(
    'allows request from middleware',
    function (string $key, $value): void {
        LaunchDarkly::addFlagValue($key, $value);

        Route::middleware('launch-darkly:' . $key . ',' . json_encode($value, JSON_THROW_ON_ERROR))
            ->get('/me', fn() => response([]));

        $this->get('/me')->assertStatus(200);
    }
)
->with('flagValues');

it(
    'disallows request from middleware',
    function (): void {
        LaunchDarkly::addFlagValue('route_enabled', false);

        Route::middleware('launch-darkly:route_enabled,true')
            ->get('/me', fn() => response([]));

        $this->get('/me')->assertStatus(403);
    }
);
