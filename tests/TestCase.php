<?php

namespace Mehradsadeghi\TokenGeneratorTest;

use Mehradsadeghi\TokenGenerator\TokenGeneratorServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [TokenGeneratorServiceProvider::class];
    }
}