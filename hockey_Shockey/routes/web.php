<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderItemController;

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.index');


Route::middleware('auth')->group(function () {

    // Route for Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route for Categories
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    // Route for products
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{category}/{name}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Route for Taxes
    Route::get('/admin/taxes', [TaxController::class, 'index'])->name('admin.taxes.index');
    Route::get('/admin/taxes/create', [TaxController::class, 'create'])->name('admin.taxes.create');
    Route::post('/admin/taxes', [TaxController::class, 'store'])->name('admin.taxes.store');
    Route::get('/admin/taxes/{tax}', [TaxController::class, 'show'])->name('admin.taxes.show');
    Route::get('/admin/taxes/{tax}/edit', [TaxController::class, 'edit'])->name('admin.taxes.edit');
    Route::put('/admin/taxes/{tax}', [TaxController::class, 'update'])->name('admin.taxes.update');
    Route::delete('/admin/taxes/{tax}', [TaxController::class, 'destroy'])->name('admin.taxes.destroy');


    // Route for listing users
    Route::patch('/edituserprofile', [UserProfileController::class, 'update'])->name('userprofile.update');
    Route::get('/userprofile', [UserProfileController::class, 'edit'])->name('userprofile');
    Route::get('/change-password', [UserProfileController::class, 'showChangePasswordForm'])->name('change-password');
    Route::post('/update-password', [UserProfileController::class, 'updatePassword'])->name('update-password');
    Route::get('/orders', [CheckoutController::class, 'getUserTransactions'])->name('userOrders');
    //Route::get('/transactions', [CheckoutController::class, 'getUserTransactions'])->name('transaction.index');


    // Routes for creating a new user viewing, editing, and updating and deleting
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    //Routes for wishlist
    Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist.show');
    Route::post('/wishlist/add/{productId}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::get('/wishlist/count', [WishlistController::class, 'getWishlistCount'])->name('wishlist.count');
    Route::delete('/wishlist/{wishlistItem}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    // checkout // checkout 
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.page');
    Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

    // New route for payment form
    Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('process.payment');


    // pavit add routes
    Route::view('/payment/thankyou', 'payment.thankyou')->name('thankyou');
    Route::view('/payment/error', 'payment.payment_error')->name('payment.error');
    Route::view('/payment/general', 'payment.payment_general')->name('payment.general');

    Route::get('/transactions', [CheckoutController::class, 'getUserTransactions'])->name('transaction.index');

});

// Route Page Cart
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/cart/total', [CartController::class, 'getTotal'])->name('cart.total');

Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart');

Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('cart');

Route::patch('update-cart', [CartController::class, 'update'])->name('cart');


// Routes for about page, contact page and privacy page
Route::get('/about', function () {
    return view('about');
});

// Route Product Page
Route::get('/products/{category}/{name}', [ProductController::class, 'show'])
    ->name('products.show');

Route::match(['get', 'post'], '/product', [ProductController::class, 'index'])->name('products.index');

// Route Privacy Page
Route::get('/privacy', function () {
    return view('privacy');
});

// Route User Profile Page
Route::get('/userprofile', function () {
    return view('userprofile');
});
Route::get('/edituserprofile', function () {
    return view('edituserprofile');
});

// Route Lists Products
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// Route Contact Page
Route::get('/contact', function () {
    return view('contact');
})->name('contact.form');

// Route Contact Store Page
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/add-dummy-tshirts', [CartController::class, 'addDummyTShirtsToCart']);


Route::post('/subscribe', [NewsletterController::class,'subscribe'])->name('subscribe');



require __DIR__ . '/auth.php';
