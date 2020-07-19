<?php

namespace Mehradsadeghi\TokenGenerator;

use Illuminate\Support\ServiceProvider;

class TokenGeneratorServiceProvider extends ServiceProvider {

    const CONFIG_FILE_NAME = 'token-generator';

    public function register()
    {
        $this->app->singleton(TokenGeneratorFacade::class, function ($app) {
            return new TokenGeneratorManager($app);
        });
    }

    public function boot()
    {
        $this->mergeDefaultConfig();
        $this->publishConfig();
    }

    private function mergeDefaultConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/config/'.self::CONFIG_FILE_NAME.'.php', self::CONFIG_FILE_NAME);
    }

    private function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/config' => $this->app->configPath()], self::CONFIG_FILE_NAME);
        }
    }
}
