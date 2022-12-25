<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DiskonController;


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProfilesController;
use App\Http\Controllers\DashboardTransactionController;


use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\Admin\DashboardAdminController;
use Admin\CategoryController;
use Admin\UserController;
use Admin\ProductController;
use Admin\ProductGalleryController;
use Admin\TransactionDetailController;
use Admin\TransactionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



require __DIR__ . '/auth.php';
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [CategoriesController::class, 'detail'])->name('categories-detail');
Route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [DetailController::class, 'add'])->name('detail-add');
Route::get('/diskon', [DiskonController::class, 'index'])->name('diskon');

Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');
Route::get('/success', [CartController::class, 'success'])->name('success');

Route::get('/register/success', [RegisteredUserController::class, 'success'])->middleware(['auth', 'user'])->name('register-success');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profiles', [DashboardProfilesController::class, 'index'])->name('dashboard-profile');
    Route::post('/dashboard/profiles/{redirect}', [DashboardProfilesController::class, 'update'])->name('dashboard-profile-redirect');
    Route::get('/dashboard/transaction', [DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
    Route::get('/dashboard/transaction/{id}', [DashboardTransactionController::class, 'details'])->name('dashboard-transaction-detail');

});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardAdminController::class, 'index'])->name('admin-dashboard');
        Route::resource('category', CategoryController::class);
        Route::resource('user', UserController::class);
        Route::resource('product', ProductController::class);
        Route::resource('gallery', ProductGalleryController::class);
        Route::resource('detail', TransactionDetailController::class);
        Route::resource('transaction', TransactionController::class);
    });
