<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\PartnerController;
use App\Http\Controllers\CMS\SyncproductController;
use App\Http\Controllers\CMS\CategoryController;

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
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return redirect('/login');
    }
});
Route::get('logout', [LogoutController::class, 'logout']);

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group([
    'name' => 'dashboard',
    'prefix' => 'dashboard',
    'middleware' => 'auth'
], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/partners', [PartnerController::class, 'index']);
    Route::get('/partner-datas', [PartnerController::class, 'getPartnerData'])->name('partner.datas');

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category-datas', [CategoryController::class, 'getCategoryData'])->name('category.datas');
    // fetch data from external api
    Route::get('/product-ayoconnect', [SyncproductController::class, 'getProductData']);
    Route::get('/category-ayoconnect', [SyncproductController::class, 'getCategoryData']);
});
