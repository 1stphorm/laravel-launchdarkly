<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Ocus\LaravelLaunchDarkly\Facades\LaunchDarkly;
use Ocus\LaravelLaunchDarkly\Tests\Datasets\Flags;
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
        )->toBe($value);
    }
)->with('flagValues');

it(
    'returns the right value when set the tag',
    function (array $tag, $expected): void {
        LaunchDarkly::addFlag($tag);

        expect(
            LaunchDarkly::variation($tag['key'], $this->user->launch_darkly_user)
        )->toBe($expected);
    }
)->with('flags');

it(
    'return the right value when set a flag with segment',
    function (): void {
        $this->user->update(['email' => 'name@example.com']);

        LaunchDarkly::addSegment(
            [
                'key' => 'segment_email',
                'included' => [],
                'excluded' => [],
                'salt' => '4815e9c732e047a6b2b0f7d83a80b300',
                'rules' => [
                    [
                        'id' => '5510bdf5-bdaf-4bbc-bc97-19b5560af7ca',
                        'clauses' => [
                            [
                                'attribute' => 'email',
                                'op' => 'endsWith',
                                'values' => [
                                    '@example.com',
                                ],
                                'negate' => false,
                            ],
                        ],
                    ],
                ],
                'version' => 2,
                'generation' => 1,
                'deleted' => false,
            ]
        );

        LaunchDarkly::addFlag(
            [
                'key' => 'bool_true',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [
                    [
                        'variation' => 0,
                        'id' => '9b78cc9f-691f-461f-b15b-45ad9393182e',
                        'clauses' => [
                            [
                                'attribute' => 'segmentMatch',
                                'op' => 'segmentMatch',
                                'values' => [
                                    'segment_email',
                                ],
                                'negate' => false,
                            ],
                        ],
                        'trackEvents' => false,
                    ],
                ],
                'fallthrough' => [
                    'variation' => 0,
                ],
                'offVariation' => 1,
                'variations' => [
                    true,
                    false,
                ],
                'clientSideAvailability' => [
                    'usingMobileKey' => false,
                    'usingEnvironmentId' => true,
                ],
                'clientSide' => true,
                'salt' => '04ab513d4b724ad1b33fbb40bce580f5',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 3,
                'deleted' => false,
            ]
        );

        expect(
            LaunchDarkly::variation('bool_true', $this->user->launch_darkly_user)
        )->toBe(true);
    }
);

it(
    'returns all the features',
    function (): void {
        foreach (Flags::flags as $flag) {
            LaunchDarkly::addFlag($flag[0]);
        }

        expect(
            count(
                LaunchDarkly
                    ::allFlagsState($this->user->launch_darkly_user)
                    ->toValuesMap()
            )
        )->toBe(count(Flags::flags));
    }
);
