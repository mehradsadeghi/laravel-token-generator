<?php

namespace Mehradsadeghi\TokenGenerator\Drivers;

use Mehradsadeghi\TokenGenerator\TokenGeneratorContract;

class Crypto implements TokenGeneratorContract
{
    private $length;

    public function __construct($length)
    {
        $this->length = $length;
    }

    public function generate(): string
    {
        return bin2hex(random_bytes($this->length));
    }
}
