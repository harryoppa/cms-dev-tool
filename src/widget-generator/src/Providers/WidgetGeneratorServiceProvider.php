<?php

namespace TVHung\WidgetGenerator\Providers;

use Illuminate\Support\ServiceProvider;

class WidgetGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(CommandServiceProvider::class);
    }
}
