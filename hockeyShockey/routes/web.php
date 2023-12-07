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
<<<<<<< HEAD

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes for about page and contact page
Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact'); 
});
=======
>>>>>>> 4e22781c92271458cc8ee464a5abfbc8e2e1b1ee
