<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {});
