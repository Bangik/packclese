<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
      Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

      Route::group(['prefix'=>'admin'], function(){
        Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('index-user');
        Route::get('/users/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'delete'])->name('delete-user');
      });

    });
});

Route::get('/dashboard', [App\Http\Controllers\UsersController::class, 'index'])->name('home-user');
