<?php

namespace App\Commands;

use App\Services\ComposerService;
use LaravelZero\Framework\Commands\Command;

class DeployerCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'deployer
                            {--g|global : Install it globally}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Install PHP Deployer';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ComposerService $composer)
    {
        $this->global = $this->option('global');
        $this->dev = $this->global ? false : true;
        $this->composer = $composer;

        $this->task('Installing Deployer', function () {
            $this->composer->require('deployer/deployer', $this->dev, $this->global);
        });
    }
}
