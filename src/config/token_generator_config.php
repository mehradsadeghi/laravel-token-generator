<?php

return [

    'default' => 'hash',

    'drivers' => [

        'basic' => [
            'driver' => TokenGenerator\Drivers\Basic::class,
            'options' => [
                'length' => 10
            ]
        ],

        'crypto' => [
            'driver' => TokenGenerator\Drivers\Crypto::class,
            'options' => [
                'length' => 10
            ]
        ],

        'hash' => [
            'driver' => TokenGenerator\Drivers\Hash::class,
            'options' => [
                'alg' => 'sha256'
            ]
        ]
    ]
];
