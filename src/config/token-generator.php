<?php

return [

    'default' => 'hash',

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
                'length' => 10
            ]
        ],

        'hash' => [
            'driver' => \Mehradsadeghi\TokenGenerator\Drivers\Hash::class,
            'options' => [
                'alg' => 'sha256'
            ]
        ]
    ]
];
