<?php

namespace TVHung\PluginGenerator\Providers;

use TVHung\PluginGenerator\Commands\PluginCreateCommand;
use TVHung\PluginGenerator\Commands\PluginListCommand;
use TVHung\PluginGenerator\Commands\PluginMakeCrudCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PluginListCommand::class,
                PluginCreateCommand::class,
                PluginMakeCrudCommand::class,
            ]);
        }
    }
}
