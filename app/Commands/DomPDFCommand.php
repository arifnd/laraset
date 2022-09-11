<?php

namespace App\Commands;

use App\Services\ComposerService;
use LaravelZero\Framework\Commands\Command;

class DomPDFCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'dompdf
                            {--c|config : Publish config}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Install Laravel DomPDF';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ComposerService $composer)
    {
        $this->config = $this->option('config');
        $this->composer = $composer;

        $this->task('Installing DomPDF', function () {
            $this->composer->require('barryvdh/laravel-dompdf');
        });

        if ($this->config) {
            $this->task('Publish config', function () {
                copy('vendor/barryvdh/laravel-dompdf/config/dompdf.php', 'config/dompdf.php');
            });
        }
    }
}
