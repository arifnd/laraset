<?php

namespace App\Commands;

use App\Services\ComposerService;
use LaravelZero\Framework\Commands\Command;

class DiDOMCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'didom';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Install DiDOM - Simple and fast HTML and XML parser';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ComposerService $composer)
    {
        $this->composer = $composer;

        $this->task('Installing DiDOM', function () {
            $this->composer->require('imangazaliev/didom');
        });
    }
}
