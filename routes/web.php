<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\CustomerController::class, 'index']);

Route::get('/customers/filter', [CustomerController::class, 'filter']);

// Route::get('/', function () {
//     return view('Customer');
// });
