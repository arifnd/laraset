<?php

it('run command', function () {
    $this->artisan('new test-blog')->assertExitCode(0);
});

it('folder exist', function () {
    $exist = file_exists('test-blog');

    expect($exist)->toBeTrue();
});

it('remove folder', function () {
    exec('rm -rf test-blog');
    $exist = file_exists('test-blog');

    expect($exist)->toBeFalse();
});
