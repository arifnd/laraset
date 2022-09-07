<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use Symfony\Component\Process\Process;

class DeployerCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'deployer {--g|global}';

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
    public function handle()
    {
        $global = $this->option('global');

        $command = ['composer', 'require', '--dev', 'deployer/deployer'];

        if ($global) {
            array_splice($command, 1, 2, ['global', 'require']);
        }

        $this->task('Installing Deployer', function () use ($command) {
            $process = new Process($command);
            $process->run();

            if (! $process->isSuccessful()) {
                return false;
            }
        });
    }
}
