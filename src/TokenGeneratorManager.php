<?php

namespace Mehradsadeghi\TokenGenerator;

use Illuminate\Support\Manager;

class TokenGeneratorManager extends Manager {

    public function createBasicDriver()
    {
        return $this->buildDriver('basic');
    }

    public function createCryptoDriver()
    {
        return $this->buildDriver('crypto');
    }

    public function createUniqueDriver()
    {
        return $this->buildDriver('unique');
    }

    public function getDefaultDriver()
    {
        return $this->app['config']['token-generator.default'];
    }

    public function buildDriver($driverName)
    {
        $driver = config("token-generator.drivers.$driverName.driver");
        $options = config("token-generator.drivers.$driverName.options") ?: [];

        return new $driver(...array_values($options));
    }
}
