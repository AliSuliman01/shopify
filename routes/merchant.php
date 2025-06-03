<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'user-type:merchant'])->group(function(){

    // manage merchant products

    // manage merchant categories
    
});