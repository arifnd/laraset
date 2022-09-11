<?php

namespace App\Services;

use Symfony\Component\Process\Process;

/**
 * Class ProcessService.
 */
class ProcessService
{
    public function run($command)
    {
        $process = new Process($command);
        $process->run();

        if (! $process->isSuccessful()) {
            return false;
        }

        return true;
    }
}
