<?php

namespace TVHung\DevTool\Commands;

use BaseHelper;
use TVHung\Base\Supports\Helper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand('cms:package:remove', 'Remove a package in the /platform/packages directory.')]
class PackageRemoveCommand extends Command
{
    public function handle(): int
    {
        if (!preg_match('/^[a-z0-9\-]+$/i', $this->argument('name'))) {
            $this->error('Only alphabetic characters are allowed.');

            return self::FAILURE;
        }

        $package = strtolower($this->argument('name'));
        $location = package_path($package);

        if (!File::isDirectory($location)) {
            $this->error('This package is not existed!');

            return self::FAILURE;
        }

        $this->processRemove($package, $location);

        return self::SUCCESS;
    }

    protected function processRemove(string $package, string $location): bool
    {
        $migrations = [];
        foreach (BaseHelper::scanFolder($location . '/database/migrations') as $file) {
            $migrations[] = pathinfo($file, PATHINFO_FILENAME);
        }

        DB::table('migrations')->whereIn('migration', $migrations)->delete();

        File::deleteDirectory($location);

        Helper::removeModuleFiles($package);

        $this->call('cache:clear');

        $this->line('<info>Removed package files successfully!</info>');

        $this->line(
            '<info>Remove</info> <comment>"tvhung/' . $package . '": "*@dev"</comment> to composer.json then run <comment>composer update</comment> to remove this package!'
        );

        return true;
    }

    protected function configure(): void
    {
        $this->addArgument('name', InputArgument::REQUIRED, 'The package name');
    }
}
