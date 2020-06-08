<?php

namespace Mehradsadeghi\TokenGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * Class TokenGeneratorFacade
 * @method static TokenGeneratorContract generate()
 */
class TokenGeneratorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        $default = config("token-generator.default");

        self::checkIfDriverExists($default);

        $driver = config("token-generator.drivers.$default.driver");
        $options = config("token-generator.drivers.$default.options");

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
        if (!class_exists(config("token-generator.drivers.$default.driver"))) {
            throw new \Exception('Token generator driver is not specified properly.');
        }
    }
}
