<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'user-type:customer'])->group(function(){
    
    // show products

    // buy products

    // add to cart

    // checkout

    // search

});