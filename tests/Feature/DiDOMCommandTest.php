<?php

it('run command', function () {
    $this->artisan('didom')->assertExitCode(0);
});

it('exist in composer.json', function () {
    $path = base_path('composer.json');
    $file = file_get_contents($path);
    $json = json_decode($file, true);

    expect($json)->toHaveKey('require.imangazaliev/didom');
});
