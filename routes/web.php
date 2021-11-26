<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HistoryController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
        //product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });
        //users
        Route::prefix('users')->group(function () {
            Route::get('add', [UserController::class, 'create']);
            Route::post('add', [UserController::class, 'store']);
            Route::get('list', [UserController::class, 'index']);
            Route::get('edit/{user}', [UserController::class, 'show']);
            Route::post('edit/{user}', [UserController::class, 'update']);
            Route::DELETE('destroy', [UserController::class, 'destroy']);
        });

        //upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        //cart
        Route::get('orders', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('orders/view/{order}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
    });
});
Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('login-checkout', [App\Http\Controllers\CheckoutController::class, 'login_checkout']);
Route::get('logout-checkout', [App\Http\Controllers\CheckoutController::class, 'logout_checkout']);
Route::post('login-customer', [App\Http\Controllers\CheckoutController::class, 'login_customer']);
Route::post('register_checkout', [App\Http\Controllers\CheckoutController::class, 'add_customer']);
Route::get('register_checkout', [App\Http\Controllers\CheckoutController::class, 'register']);
Route::post('carts_checkout', [App\Http\Controllers\CartController::class, 'addCart']);
Route::get('carts_checkout', [App\Http\Controllers\CartController::class, 'carts_checkout']);
Route::post('save-checkout-customer', [App\Http\Controllers\CheckoutController::class, 'save_checkout_customer']);
Route::post('save-checkout-customer', [App\Http\Controllers\CheckoutController::class, 'order_place']);

Route::get('history/{customer}', [App\Http\Controllers\HistoryController::class, 'history_customer']);
Route::get('orders/view/{order}', [\App\Http\Controllers\HistoryController::class, 'show']);



// Route::get('/send', [\App\Http\Controllers\MailController::class, 'sendmail']);
// Route::get('/send-mail', [\App\Http\Controllers\MailController::class, 'send']);