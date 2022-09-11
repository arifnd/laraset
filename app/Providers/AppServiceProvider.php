<?php

namespace App\Providers;

use App\Services\ComposerServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ComposerServices::class, function ($app) {
            return new ComposerServices();
        });

        $this->app->bind(ProcessServices::class, function ($app) {
            return new ProcessServices();
        });
    }
}
