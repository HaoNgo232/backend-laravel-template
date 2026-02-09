<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    Log::info('Root route accessed');
    return 'Hi Laravel';
});

Route::get('/phpinfo', function () {
    phpinfo();
});
