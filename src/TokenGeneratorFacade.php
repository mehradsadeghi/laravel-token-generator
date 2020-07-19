<?php

namespace Mehradsadeghi\TokenGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * Class TokenGeneratorFacade
 * @method static TokenGeneratorContract generate()
 * @method static TokenGeneratorContract buildDriver($driverName)
 */
class TokenGeneratorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return static::class;
    }
}
