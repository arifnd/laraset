<?php

it('run command', function () {
    $this->artisan('deployer')->assertExitCode(0);
});

it('exist in composer.json', function () {
    $path = base_path('composer.json');
    $file = file_get_contents($path);
    $json = json_decode($file, true);

    expect($json)->toHaveKey('require-dev.deployer/deployer');
});

it('install global', function () {
    $this->artisan('deployer -g')->assertExitCode(0);
});

it('binary exist', function () {
    $home = getenv('HOME');
    $exist = file_exists($home.'/.config/composer/vendor/bin/dep');
    expect($exist)->toBeTrue();
});
