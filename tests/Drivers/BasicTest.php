<?php

namespace Mehradsadeghi\TokenGeneratorTest\Drivers;

use Mehradsadeghi\TokenGenerator\TokenGeneratorFacade;
use Mehradsadeghi\TokenGeneratorTest\TestCase;

class BasicTest extends TestCase
{
    /** @test */
    public function token_is_generated_correctly_based_on_default_length()
    {
        $token = TokenGeneratorFacade::generate();
        $this->assertEquals(config('token-generator.drivers.basic.options.length'), strlen($token));
    }

    /** @test */
    public function a_15_char_token_is_generated_correctly()
    {
        config()->set('token-generator.drivers.basic.options.length', 15);
        $token = TokenGeneratorFacade::generate();
        $this->assertEquals(15, strlen($token));
    }

    /** @test */
    public function two_generated_tokens_in_a_row_are_not_the_same()
    {
        $token1 = TokenGeneratorFacade::generate();
        $token2 = TokenGeneratorFacade::generate();
        $this->assertNotEquals($token1, $token2);
    }
}
