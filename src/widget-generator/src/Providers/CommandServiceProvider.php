<?php

namespace TVHung\WidgetGenerator\Providers;

use TVHung\WidgetGenerator\Commands\WidgetCreateCommand;
use TVHung\WidgetGenerator\Commands\WidgetRemoveCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                WidgetCreateCommand::class,
                WidgetRemoveCommand::class,
            ]);
        }
    }
}
