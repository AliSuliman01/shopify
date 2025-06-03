<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'user-type:admin'])->group(function(){

    // manage merchant

    // track orders

    // track customers

    // enable/disable customer, merchant

    // manage categories
    
    // manage tags
    
});