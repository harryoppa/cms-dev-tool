<?php

namespace TVHung\ThemeGenerator\Providers;

use TVHung\ThemeGenerator\Commands\ThemeCreateCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ThemeCreateCommand::class,
            ]);
        }
    }
}
