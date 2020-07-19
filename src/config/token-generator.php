<?php

return [

    'default' => 'basic',

    'drivers' => [

        'basic' => [
            'driver' => \Mehradsadeghi\TokenGenerator\Drivers\Basic::class,
            'options' => [
                'length' => 10
            ]
        ],

        'crypto' => [
            'driver' => \Mehradsadeghi\TokenGenerator\Drivers\Crypto::class,
            'options' => [
                'length' => 10 // length in crypto gets doubled
            ]
        ],

        'unique' => [
            'driver' => \Mehradsadeghi\TokenGenerator\Drivers\Unique::class,
            'options' => [
                'alg' => 'sha256'
            ]
        ]
    ]
];
