<?php

namespace Mehradsadeghi\TokenGeneratorTest;

use Mehradsadeghi\TokenGenerator\TokenGeneratorFacade;

class SwitchDriverTest extends TestCase
{
    /** @test */
    public function driver_can_be_switched_dynamically()
    {
        $uniqueToken = TokenGeneratorFacade::driver('unique')->generate();
        $cryptoToken = TokenGeneratorFacade::driver('crypto')->generate();
        $this->assertNotEquals($uniqueToken, $cryptoToken);
    }
}