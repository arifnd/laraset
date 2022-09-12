<?php

namespace App\Commands;

use App\Services\ComposerService;
use LaravelZero\Framework\Commands\Command;

class DBALCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'dbal';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Install Doctrine DBAL';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ComposerService $composer)
    {
        $this->composer = $composer;

        $this->task('Installing DiDOM', function () {
            $this->composer->require('doctrine/dbal');
        });
    }
}
