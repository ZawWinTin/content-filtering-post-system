<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('db:test {--F|fresh=1}', function ($fresh) {
    if ($fresh) {
        $this->call('migrate:fresh');
    }
    $this->call('db:seed');
    $this->call('db:seed', ['--class' => 'TestSeeder']);
})->purpose('Fresh migration and create dummy data.');
