<?php

use App\Console\Farm\Farm;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('farm:run', function(){
    $this->comment('Processing');
    app(Farm::class)->runScenario();
    $this->comment('Processed');
});
