<?php

namespace Mehradsadeghi\TokenGeneratorTest;

use Mehradsadeghi\TokenGenerator\TokenGeneratorContract;
use Mehradsadeghi\TokenGenerator\TokenGeneratorFacade;
use Mehradsadeghi\TokenGeneratorTest\Fakes\FakeDriver;

class ExtendNewDriverTest extends TestCase
{
    /** @test */
    public function facade_can_be_extended()
    {
        TokenGeneratorFacade::extend('new', function() {
            return new class implements TokenGeneratorContract {
                public function generate(): string
                {
                    return '123456';
                }
            };
        });

        $token = TokenGeneratorFacade::driver('new')->generate();
        $this->assertEquals(123456, $token);
    }

    /** @test */
    public function facade_can_be_extended_better_way_with_parameter()
    {
        config([
            'token-generator.drivers.new' => [
                'driver' => FakeDriver::class,
                'options' => [
                    'length' => 10
                ]
            ]
        ]);

        TokenGeneratorFacade::extend('new', function() {
            return TokenGeneratorFacade::buildDriver('new');
        });

        $token = TokenGeneratorFacade::driver('new')->generate();
        $this->assertEquals('token10', $token);
    }
}


