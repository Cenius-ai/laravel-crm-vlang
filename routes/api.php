<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/customers', [CustomerController::class, 'apiIndex']);
Route::get('/customers/{customer}', [CustomerController::class, 'apiShow']);
Route::post('/customers', [CustomerController::class, 'apiStore']);
