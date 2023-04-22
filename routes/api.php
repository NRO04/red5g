<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/users/create', [\App\Http\Controllers\UserController::class, 'create']);
Route::group(['middleware' => 'jwt'], function () {
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'getUsers']);
    Route::post('/clients/create', [\App\Http\Controllers\ClientController::class, 'create']);
    Route::post('/saving-accounts/create', [\App\Http\Controllers\SavingAccountController::class, 'create']);
    Route::post('/transactions/create', [\App\Http\Controllers\TransactionController::class, 'create']);
    Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'getTransactions']);
});
