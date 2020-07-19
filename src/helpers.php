<?php

use Mehradsadeghi\TokenGenerator\TokenGeneratorContract;
use Mehradsadeghi\TokenGenerator\TokenGeneratorFacade;
use Mehradsadeghi\TokenGenerator\TokenGeneratorManager;

if (! function_exists('token')) {
    /**
     * @return TokenGeneratorManager|TokenGeneratorContract
     */
    function token()
    {
        return app(TokenGeneratorFacade::class);
    }
}