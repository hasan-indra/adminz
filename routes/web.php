<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route(env('APP_DASHBOARD'));
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
