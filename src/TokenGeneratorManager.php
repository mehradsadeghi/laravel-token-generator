<?php

namespace Mehradsadeghi\TokenGenerator;

use Illuminate\Support\Manager;
use Illuminate\Support\Str;
use InvalidArgumentException;

class TokenGeneratorManager extends Manager {

    protected function createBasicDriver()
    {
        return $this->buildDriver('basic');
    }

    protected function createCryptoDriver()
    {
        return $this->buildDriver('crypto');
    }

    protected function createUniqueDriver()
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

    protected function createDriver($driver)
    {
        if (isset($this->customCreators[$driver])) {
            return $this->callCustomCreator($driver);
        }

        $method = 'create'.Str::studly($driver).'Driver';

        if(method_exists($this, $method)) {
            return $this->$method();
        }

        $customDriver = $this->app['config']["token-generator.drivers.$driver.driver"];

        if(class_exists($customDriver)) {
            return $this->buildDriver($driver);
        }

        throw new InvalidArgumentException("Driver [$driver] not supported.");
    }
}
