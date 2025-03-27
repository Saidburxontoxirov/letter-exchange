<?php

namespace Burxon\LetterExchange;

use Illuminate\Support\ServiceProvider;

class LetterExchangeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config file
        $this->publishes([
            __DIR__ . '/../config/letter-exchange.php' => config_path('letter-exchange.php'),
        ], 'config');
    }

    public function register()
    {
        // Merge default config
        $this->mergeConfigFrom(__DIR__ . '/../config/letter-exchange.php', 'letter-exchange');

        // Register Greeter service
        $this->app->singleton(Greeter::class, function () {
            return new Greeter();
        });
    }
}
