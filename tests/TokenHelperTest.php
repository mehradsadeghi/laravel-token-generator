<?php

namespace Mehradsadeghi\TokenGeneratorTest;

class TokenHelperTest extends TestCase
{
    /** @test */
    public function token_is_generated_correctly_by_token_helper_function()
    {
        $token = token()->generate();
        $this->assertEquals(config('token-generator.drivers.basic.options.length'), strlen($token));
    }
}


