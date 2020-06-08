<?php

namespace Mehradsadeghi\TokenGenerator;

use Illuminate\Support\ServiceProvider;

class TokenGeneratorServiceProvider extends ServiceProvider {

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                 __DIR__.'/config' => $this->app->configPath(),
             ], 'token-generator');
        }

        $this->mergeConfigFrom(__DIR__.'/config/token_generator_config.php', 'token_generator_config');
    }
}
