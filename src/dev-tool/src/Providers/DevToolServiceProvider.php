<?php

namespace TVHung\DevTool\Providers;

use Illuminate\Support\ServiceProvider;

class DevToolServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(CommandServiceProvider::class);
    }
}
