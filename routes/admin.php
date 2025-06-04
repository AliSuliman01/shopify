<?php

use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('user-type:admin')->prefix('category')->controller(CategoryController::class)->group(function () {
    Route::post('/add', 'store');
    Route::get('/', 'index');
    Route::get('/{category}', 'show');
    Route::put('/update/{category}', 'update');
    Route::delete('/delete/{category}', 'destroy');
});


Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
});
