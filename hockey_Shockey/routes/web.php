<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
<<<<<<< HEAD
Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('auth','admin');
=======

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('auth','admin');

>>>>>>> c6b8a65241f946e2bcb2c4faa88e0df1afc52f74


// routes for about page and contact page
Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact'); 
});
