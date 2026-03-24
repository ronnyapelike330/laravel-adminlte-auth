<?php

namespace chamikasamaraweera\AdminLteAuth;

use Illuminate\Support\ServiceProvider;
use chamikasamaraweera\AdminLteAuth\Console\UiCommand;

class AdminLteAuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UiCommand::class,
            ]);
        }
    }
}