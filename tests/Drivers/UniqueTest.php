<?php

namespace Mehradsadeghi\TokenGeneratorTest\Drivers;

use Mehradsadeghi\TokenGenerator\TokenGeneratorFacade;
use Mehradsadeghi\TokenGeneratorTest\TestCase;

class UniqueTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config()->set('token-generator.default', 'unique');
    }

    /** @test */
    public function token_is_generated_correctly_based_on_default_alg()
    {
        $token = TokenGeneratorFacade::generate('test');
        $this->assertEquals(64, strlen($token));
    }

    /** @test */
    public function token_is_unique_based_on_input()
    {
        $token1 = TokenGeneratorFacade::generate('test');
        $token2 = TokenGeneratorFacade::generate('test');
        $this->assertEquals($token1, $token2);
    }
}
