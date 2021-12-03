<?php

dataset(
    'flagValues',
    [
        'bool true' => ['bool_true', true],
        'bool false' => ['bool_false', false],
        'float -1.8' => ['float_-1.8', -1.8],
        'float 1.8' => ['float_1.8', 1.8],
        'numeric -8' => ['numeric_-8', -8],
        'numeric 0' => ['numeric_0', 0],
        'numeric 8' => ['numeric_8', 8],
        'string' => ['string', 'text'],
    ]
);

dataset(
    'flags',
    [
        'bool true' => [
            [
                'key' => 'bool_true',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [],
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
                'salt' => '228d299df1484995a9c5671a2248bbf3',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 6,
                'deleted' => false,
            ],
            true,
        ],
        'bool false' => [
            [
                'key' => 'bool_false',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [],
                'fallthrough' => [
                    'variation' => 1,
                ],
                'offVariation' => 0,
                'variations' => [
                    true,
                    false,
                ],
                'clientSideAvailability' => [
                    'usingMobileKey' => false,
                    'usingEnvironmentId' => true,
                ],
                'clientSide' => true,
                'salt' => '228d299df1484995a9c5671a2248bbf3',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 6,
                'deleted' => false,
            ],
            false,
        ],
        'float -1.8' => [
            [
                'key' => 'float_-1.8',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [],
                'fallthrough' => [
                    'variation' => 0,
                ],
                'offVariation' => 1,
                'variations' => [
                    -1.8,
                    0.0,
                    1.8,
                ],
                'clientSideAvailability' => [
                    'usingMobileKey' => false,
                    'usingEnvironmentId' => true,
                ],
                'clientSide' => true,
                'salt' => '228d299df1484995a9c5671a2248bbf3',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 6,
                'deleted' => false,
            ],
            -1.8,
        ],
        'float 1.8' => [
            [
                'key' => 'float_1.8',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [],
                'fallthrough' => [
                    'variation' => 2,
                ],
                'offVariation' => 1,
                'variations' => [
                    -1.8,
                    0.0,
                    1.8,
                ],
                'clientSideAvailability' => [
                    'usingMobileKey' => false,
                    'usingEnvironmentId' => true,
                ],
                'clientSide' => true,
                'salt' => '228d299df1484995a9c5671a2248bbf3',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 6,
                'deleted' => false,
            ],
            1.8,
        ],
        'numeric -8' => [
            [
                'key' => 'numeric_-8',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [],
                'fallthrough' => [
                    'variation' => 0,
                ],
                'offVariation' => 1,
                'variations' => [
                    -8,
                    0,
                    8,
                ],
                'clientSideAvailability' => [
                    'usingMobileKey' => false,
                    'usingEnvironmentId' => true,
                ],
                'clientSide' => true,
                'salt' => '228d299df1484995a9c5671a2248bbf3',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 6,
                'deleted' => false,
            ],
            -8,
        ],
        'numeric 0' => [
            [
                'key' => 'numeric_0',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [],
                'fallthrough' => [
                    'variation' => 1,
                ],
                'offVariation' => 0,
                'variations' => [
                    -8,
                    0,
                    8,
                ],
                'clientSideAvailability' => [
                    'usingMobileKey' => false,
                    'usingEnvironmentId' => true,
                ],
                'clientSide' => true,
                'salt' => '228d299df1484995a9c5671a2248bbf3',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 6,
                'deleted' => false,
            ],
            0,
        ],
        'numeric 8' => [
            [
                'key' => 'numeric_8',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [],
                'fallthrough' => [
                    'variation' => 2,
                ],
                'offVariation' => 1,
                'variations' => [
                    -8,
                    0,
                    8,
                ],
                'clientSideAvailability' => [
                    'usingMobileKey' => false,
                    'usingEnvironmentId' => true,
                ],
                'clientSide' => true,
                'salt' => '228d299df1484995a9c5671a2248bbf3',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 6,
                'deleted' => false,
            ],
            8,
        ],
        'string' => [
            [
                'key' => 'string',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [],
                'fallthrough' => [
                    'variation' => 0,
                ],
                'offVariation' => 1,
                'variations' => [
                    'text',
                    'string',
                ],
                'clientSideAvailability' => [
                    'usingMobileKey' => false,
                    'usingEnvironmentId' => true,
                ],
                'clientSide' => true,
                'salt' => '228d299df1484995a9c5671a2248bbf3',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 6,
                'deleted' => false,
            ],
            'text',
        ],
        'json' => [
            [
                'key' => 'json',
                'on' => true,
                'prerequisites' => [],
                'targets' => [],
                'rules' => [],
                'fallthrough' => [
                    'variation' => 1,
                ],
                'offVariation' => 0,
                'variations' => [
                    [
                        'numeric' => 3,
                        'bool' => true,
                        'string' => 'text',
                    ],
                    [
                        'float' => 1.5,
                        'array' => [
                            1,
                            'test',
                            true,
                            15.1,
                        ],
                        'object' => [
                            'a' => 'b',
                            'c' => 'd',
                        ],
                    ],
                ],
                'clientSideAvailability' => [
                    'usingMobileKey' => false,
                    'usingEnvironmentId' => true,
                ],
                'clientSide' => true,
                'salt' => '228d299df1484995a9c5671a2248bbf3',
                'trackEvents' => false,
                'trackEventsFallthrough' => false,
                'debugEventsUntilDate' => null,
                'version' => 6,
                'deleted' => false,
            ],
            [
                'float' => 1.5,
                'array' => [
                    1,
                    'test',
                    true,
                    15.1,
                ],
                'object' => [
                    'a' => 'b',
                    'c' => 'd',
                ],
            ],
        ],
    ]
);
