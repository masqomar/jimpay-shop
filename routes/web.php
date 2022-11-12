<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    PermissionController,
    RoleAndPermissionController
};

Route::get('/', [\App\Http\Controllers\Front\HomepageController::class, 'index'])->name('homepage');
Route::get('category/{id}', [\App\Http\Controllers\Front\CategoryController::class, 'show'])->name('category');
Route::get('product/{id}', [\App\Http\Controllers\Front\ProductController::class, 'show'])->name('product');
Route::post('product/store', [\App\Http\Controllers\Front\ProductController::class, 'store'])->name('product.store');
Route::get('cart', [\App\Http\Controllers\Front\CartController::class, 'index'])->name('cart'); //nanti pindah kebawah
Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

Route::middleware(['auth', 'web'])->group(function () {
    // Route::get('/', function () {
    //     return view('dashboard');
    // });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });

    Route::get('/profile', ProfileController::class)->name('profile');

    Route::resource('users', UserController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleAndPermissionController::class);
});

require_once __DIR__ . '/generator.php';
require_once __DIR__ . '/member.php';


Route::resource('product-types', App\Http\Controllers\ProductTypeController::class)->middleware('auth');

Route::resource('kop-products', App\Http\Controllers\KopProductController::class)->middleware('auth');

Route::resource('user-savings', App\Http\Controllers\UserSavingController::class)->middleware('auth');

Route::resource('saving-transactions', App\Http\Controllers\SavingTransactionController::class)->middleware('auth');

Route::resource('saving-accounts', App\Http\Controllers\SavingAccountController::class)->middleware('auth');

Route::resource('donations', App\Http\Controllers\DonationController::class)->middleware('auth');

Route::resource('donation-transactions', App\Http\Controllers\DonationTransactionController::class)->middleware('auth');

Route::resource('donation-disbursements', App\Http\Controllers\DonationDisbursementController::class)->middleware('auth');

Route::resource('user-topups', App\Http\Controllers\UserTopupController::class)->middleware('auth');

Route::resource('user-transactions', App\Http\Controllers\UserTransactionController::class)->middleware('auth');

Route::resource('banks', App\Http\Controllers\BankController::class)->middleware('auth');

Route::resource('merchants', App\Http\Controllers\MerchantController::class)->middleware('auth');

Route::resource('merchant-transactions', App\Http\Controllers\MerchantTransactionController::class)->middleware('auth');

Route::resource('cashflows', App\Http\Controllers\CashflowController::class)->middleware('auth');

Route::resource('paylater-providers', App\Http\Controllers\PaylaterProviderController::class)->middleware('auth');

Route::resource('paylaters', App\Http\Controllers\PaylaterController::class)->middleware('auth');

Route::resource('paylater-transactions', App\Http\Controllers\PaylaterTransactionController::class)->middleware('auth');


Route::resource('categories', App\Http\Controllers\CategoryController::class)->middleware('auth');

Route::resource('products', App\Http\Controllers\ProductController::class)->middleware('auth');

Route::resource('product-images', App\Http\Controllers\ProductImageController::class)->middleware('auth');

Route::resource('carts', App\Http\Controllers\CartController::class)->middleware('auth');


Route::resource('detail-products', App\Http\Controllers\DetailProductController::class)->middleware('auth');


Route::resource('user-transaction-items', App\Http\Controllers\UserTransactionItemController::class)->middleware('auth');
