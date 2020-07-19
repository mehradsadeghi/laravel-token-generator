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
        return static::class;
    }
}
