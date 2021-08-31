<?php

namespace TVHung\DevTool\Providers;

use TVHung\DevTool\Commands\LocaleCreateCommand;
use TVHung\DevTool\Commands\LocaleRemoveCommand;
use TVHung\DevTool\Commands\Make\ControllerMakeCommand;
use TVHung\DevTool\Commands\Make\FormMakeCommand;
use TVHung\DevTool\Commands\Make\ModelMakeCommand;
use TVHung\DevTool\Commands\Make\RepositoryMakeCommand;
use TVHung\DevTool\Commands\Make\RequestMakeCommand;
use TVHung\DevTool\Commands\Make\RouteMakeCommand;
use TVHung\DevTool\Commands\Make\TableMakeCommand;
use TVHung\DevTool\Commands\PackageCreateCommand;
use TVHung\DevTool\Commands\PackageRemoveCommand;
use TVHung\DevTool\Commands\RebuildPermissionsCommand;
use TVHung\DevTool\Commands\TestSendMailCommand;
use TVHung\DevTool\Commands\TruncateTablesCommand;
use TVHung\DevTool\Commands\PackageMakeCrudCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TableMakeCommand::class,
                ControllerMakeCommand::class,
                RouteMakeCommand::class,
                RequestMakeCommand::class,
                FormMakeCommand::class,
                ModelMakeCommand::class,
                RepositoryMakeCommand::class,
                PackageCreateCommand::class,
                PackageMakeCrudCommand::class,
                PackageRemoveCommand::class,
                TestSendMailCommand::class,
                TruncateTablesCommand::class,
                RebuildPermissionsCommand::class,
                LocaleRemoveCommand::class,
                LocaleCreateCommand::class,
            ]);
        }
    }
}
