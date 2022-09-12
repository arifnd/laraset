<?php

namespace App\Commands;

use App\Services\ComposerService;
use LaravelZero\Framework\Commands\Command;

class ServiceGeneratorCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'service-generator
                            {--dev : Add requirement to require-dev}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Install Laravel Service Generator';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ComposerService $composer)
    {
        $this->dev = $this->option('dev');
        $this->composer = $composer;

        $this->task('Installing Laravel Service Generator', function () {
            $this->composer->require('timwassenburg/laravel-service-generator', $this->dev);
        });
    }
}
