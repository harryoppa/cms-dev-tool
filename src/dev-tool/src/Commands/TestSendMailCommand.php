<?php

namespace TVHung\DevTool\Commands;

use EmailHandler;
use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand('cms:mail:test', 'Test send mail')]
class TestSendMailCommand extends Command
{
    public function handle(): int
    {
        $content = file_get_contents(core_path('setting/resources/email-templates/test.tpl'));

        EmailHandler::send($content, 'Test mail!', null, [], true);

        $this->info('Done!');

        return self::SUCCESS;
    }
}
