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



//route admin
Route::middleware(['auth'])->group(function () {
  //route Home
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
  Route::group(['prefix'=>'admin', 'middleware' => 'admin'], function(){
      //Route-JenisLayanan
      Route::get('/JenisLayanan', [App\Http\Controllers\Admin\JenisLayananController::class, 'index'])->name('Home-JenisLayanan');
      Route::get('/JenisLayanan/create', [App\Http\Controllers\Admin\JenisLayananController::class, 'create'])->name('Create-JenisLayanan');
      Route::post('/JenisLayanan/store', [App\Http\Controllers\Admin\JenisLayananController::class, 'store'])->name('Store-JenisLayanan');
      Route::get('/JenisLayanan/edit/{id}', [App\Http\Controllers\Admin\JenisLayananController::class, 'edit'])->name('Edit-JenisLayanan');
      Route::post('/JenisLayanan/update/{id}', [App\Http\Controllers\Admin\JenisLayananController::class, 'update'])->name('Update-JenisLayanan');
      Route::get('/JenisLayanan/delete/{id}', [App\Http\Controllers\Admin\JenisLayananController::class, 'delete'])->name('Delete-JenisLayanan');

      //route User
      Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('index-user');
      Route::get('/users/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'delete'])->name('delete-user');
    });
});
//Route-User
Route::get('/dashboard', [App\Http\Controllers\UsersController::class, 'index'])->name('home-user');
