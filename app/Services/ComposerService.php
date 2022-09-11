<?php

namespace App\Services;

use Symfony\Component\Process\Process;

/**
 * Class ComposerService.
 */
class ComposerService
{
    private $command = [
        'composer',
    ];

    public function createProject($package, $name)
    {
        array_push($this->command, 'create-project', $package, $name);

        $this->run();
    }

    public function createLaravelProject($name)
    {
        self::createProject('laravel/laravel', $name);
    }

    public function require($package, $dev = false, $global = false)
    {
        array_push($this->command, 'require', $package);

        if ($dev) {
            array_push($this->command, '--dev');
        }

        if ($global) {
            array_splice($this->command, 1, 1, ['global', 'require']);
        }

        $this->run();
    }

    public function run()
    {
        $process = new Process($this->command);
        $process->run();

        if (! $process->isSuccessful()) {
            return false;
        }

        return true;
    }
}
