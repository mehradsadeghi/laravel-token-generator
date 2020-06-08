<?php

namespace Mehradsadeghi\TokenGenerator;

use Illuminate\Support\Facades\Facade;

class TokenGeneratorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        $default = config("token_generator_config.default");

        self::checkIfDriverExists($default);

        $driver = config("token_generator_config.drivers.$default.driver");
        $options = config("token_generator_config.drivers.$default.options");

        if(!$options) {
            return $driver;
        }

        app()->singleton(static::class, function() use ($driver, $options) {
            return new $driver(...array_values($options));
        });

        return static::class;
    }

    private static function checkIfDriverExists($default)
    {
        if (!class_exists(config("token_generator_config.drivers.$default.driver"))) {
            throw new \Exception('Token generator driver is not specified properly.');
        }
    }
}
