<?php

namespace Tests\Feature;

it('run command', function () {
    $this->artisan('service-generator')->assertExitCode(0);
});

it('exist in composer.json', function () {
    $path = base_path('composer.json');
    $file = file_get_contents($path);
    $json = json_decode($file, true);

    expect($json)->toHaveKey('require.timwassenburg/laravel-service-generator');
});

it('Add to require-dev', function () {
    $this->artisan('service-generator --dev')->assertExitCode(0);
});

it('exist in require-dev composer.json', function () {
    $path = base_path('composer.json');
    $file = file_get_contents($path);
    $json = json_decode($file, true);

    expect($json)->toHaveKey('require-dev.timwassenburg/laravel-service-generator');
});
