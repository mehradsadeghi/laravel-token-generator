<?php

namespace Mehradsadeghi\TokenGenerator;

use Illuminate\Support\ServiceProvider;

class TokenGeneratorServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/token_generator_config.php', 'token_generator_config');
    }
}
