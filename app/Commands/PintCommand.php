<?php

namespace App\Commands;

use App\Services\ComposerService;
use LaravelZero\Framework\Commands\Command;

class PintCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'pint';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Install Laravel Pint';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ComposerService $composer)
    {
        $this->composer = $composer;

        $this->task('Installing DiDOM', function () {
            $this->composer->require('laravel/pint', true);
        });
    }
}
