<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::get('/', [App\Http\Controllers\CustomerController::class, 'index']);

Route::get('/customers/filter', [CustomerController::class, 'filter'])->name('customers.filter');

// Route::get('/', function () {
//     return view('Customer');
// });
