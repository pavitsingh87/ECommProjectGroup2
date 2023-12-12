<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaxController;

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
    
    $productsController = new ProductController();
    $products = $productsController->showProducts();
    //print_r($products);
    // Pass the products to the home view
    return view('home', compact('products'));
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    

    Route::get('/admin/taxes', [TaxController::class, 'index'])->name('admin.taxes.index');
    Route::get('/admin/taxes/create', [TaxController::class, 'create'])->name('admin.taxes.create');
    Route::post('/admin/taxes', [TaxController::class, 'store'])->name('admin.taxes.store');
    Route::get('/admin/taxes/{tax}', [TaxController::class, 'show'])->name('admin.taxes.show');
    Route::get('/admin/taxes/{tax}/edit', [TaxController::class, 'edit'])->name('admin.taxes.edit');
    Route::put('/admin/taxes/{tax}', [TaxController::class, 'update'])->name('admin.taxes.update');
    Route::delete('/admin/taxes/{tax}', [TaxController::class, 'destroy'])->name('admin.taxes.destroy');

});

// routes for about page, contact page and privacy page
Route::get('/about', function () {
    return view('about');
});

Route::get('/products/{category}/{name}', [ProductController::class, 'show'])
    ->name('products.show');

Route::match(['get', 'post'], '/product', [ProductController::class, 'index'])->name('products.index');

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/contact', function () {
    return view('contact');
})->name('contact.form');

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

require __DIR__ . '/auth.php';
