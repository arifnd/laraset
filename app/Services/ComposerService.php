<?php

namespace App\Services;

use Symfony\Component\Process\Process;

/**
 * Class ComposerService.
 */
class ComposerService
{
    public static $command = [
        'composer',
    ];

    public static function createProject($package, $name)
    {
        array_push(self::$command, 'create-project', $package, $name);

        self::run();
    }

    public static function createLaravelProject($name)
    {
        self::createProject('laravel/laravel', $name);
    }

    public static function require($package, $dev = false, $global = false)
    {
        array_push(self::$command, 'require', $package);

        if ($dev) {
            array_push(self::$command, '--dev');
        }

        if ($global) {
            array_splice(self::$command, 1, 1, ['global', 'require']);
        }

        self::run();
    }

    public static function run()
    {
        $process = new Process(self::$command);
        $process->run();

        if (! $process->isSuccessful()) {
            return false;
        }

        return true;
    }
}
