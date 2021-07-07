<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('checkout', [App\Http\Livewire\Laundry::class, 'checkout']);
    Route::post('logout', [App\Http\Controllers\API\UserController::class, 'logout']);
    Route::post('user/photo', [App\Http\Controllers\API\UserController::class, 'updatePhoto']);
    Route::get('user', [App\Http\Controllers\API\UserController::class, 'fetch']);
    Route::post('checkout-laundry', [App\Http\Controllers\API\TransactionController::class, 'storeLaundry']);
});

Route::post('login', [App\Http\Controllers\API\UserController::class, 'login']);
Route::post('register', [App\Http\Controllers\API\UserController::class, 'register']);
Route::get('jenis-layanan', [App\Http\Controllers\API\JenisLayananController::class, 'all']);
Route::get('laundry', [App\Http\Controllers\API\JenisLayananController::class, 'laundry']);

Route::post('midtrans/callback', [App\Http\Controllers\API\MidtransController::class, 'callback']);
