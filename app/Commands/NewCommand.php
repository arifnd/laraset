<?php

namespace App\Commands;

use App\Services\ComposerService;
use LaravelZero\Framework\Commands\Command;

class NewCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'new {name : Project name}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Setup laravel project';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ComposerService $composer)
    {
        $this->name = $this->argument('name');
        $this->composer = $composer;

        $this->task("Create laravel project {$this->name}", function () {
            $this->composer->createLaravelProject($this->name);
        });
    }
}
