<?php

namespace App\Services;

/**
 * Class ComposerService.
 */
class ComposerService
{
    private $command = [
        'composer',
    ];

    public function __construct(ProcessService $process)
    {
        $this->process = $process;
    }

    public function createProject($package, $name)
    {
        array_push($this->command, 'create-project', $package, $name);

        $this->process->run($this->command);
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

        $this->process->run($this->command);
    }
}
