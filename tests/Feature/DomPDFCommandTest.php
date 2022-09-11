<?php

afterAll(function () {
    unlink('config/dompdf.php');
});

it('run command', function () {
    $this->artisan('dompdf')->assertExitCode(0);
});

it('exist in composer.json', function () {
    $path = base_path('composer.json');
    $file = file_get_contents($path);
    $json = json_decode($file, true);

    expect($json)->toHaveKey('require.barryvdh/laravel-dompdf');
});

it('publish config', function () {
    $this->artisan('dompdf -c')->assertExitCode(0);
});

it('file config exist', function () {
    $exist = file_exists('config/dompdf.php');

    expect($exist)->toBeTrue();
});
