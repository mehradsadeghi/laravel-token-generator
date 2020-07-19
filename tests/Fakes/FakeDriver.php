<?php

namespace Mehradsadeghi\TokenGeneratorTest\Fakes;

use Mehradsadeghi\TokenGenerator\TokenGeneratorContract;

class FakeDriver implements TokenGeneratorContract {

    private $length;

    public function __construct($length)
    {
        $this->length = $length;
    }

    public function generate(): string
    {
        return 'token'.$this->length;
    }
};

