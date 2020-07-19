<?php

namespace Mehradsadeghi\TokenGenerator\Drivers;

use Mehradsadeghi\TokenGenerator\TokenGeneratorContract;

class Unique implements TokenGeneratorContract
{
    private $alg;

    public function __construct($alg)
    {
        $this->alg = $alg;
    }

    public function generate($payload = null): string
    {
        return hash($this->alg, $payload);
    }
}
