<?php

namespace Mehradsadeghi\TokenGenerator;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Manager;

/**
 * Class TokenGeneratorFacade
 * @method static TokenGeneratorContract generate()
 * @method static Manager driver($driver)
 * @method static TokenGeneratorManager buildDriver($driverName)
 */
class TokenGeneratorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return static::class;
    }
}
