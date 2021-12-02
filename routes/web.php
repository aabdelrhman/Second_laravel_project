<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Item_imageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SiteController;
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
Auth::routes();
                     ########################  Start Routes Site  ###########################
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::middleware(['guest', 'web'])->group(function () {
        Route::get('/', [SiteController::class , 'index'])->name('index');
        Route::get('about', [SiteController::class , 'about'])->name('about_us');
        Route::get('shop', [SiteController::class , 'shop'])->name('shop');
        Route::get('contact', [SiteController::class , 'contact'])->name('contact');
        Route::get('detail/{id}', [SiteController::class , 'detail'])->name('detail');
    });

    Route::middleware(['auth','web'])->group(function () {
        Route::post('add_cart/{id}' , [CartController::class , 'store'])->name('addCart');
        Route::get('cart', [SiteController::class , 'cart'])->name('cart');
        Route::get('checkout', [SiteController::class , 'checkout'])->name('checkout');
        Route::post('cart_update\{id}', [CartController::class , 'update'])->name('CartUpdate');
        Route::get('cart_delete\{id}', [CartController::class , 'delete'])->name('CartDelete');
        Route::get('cart_delete_items\{id}', [CartController::class , 'deleteCartItems'])->name('deleteCartItems');
        Route::post('order_save' , [OrderController::class , 'store'])->name('StoreOrder');
    });
});

                     ########################  End Routes Site  ###########################
                     ########################  Start Routes Admin  ###########################
Route::prefix('admin')->group(function () {
    Route::middleware(['guest:admin'])->group(function(){
    Route::get('login', [LoginAdminController::class , 'show'])->name('show.login');
    Route::post('login', [LoginAdminController::class , 'login'])->name('admin.login');
});
    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/', function () {
            return view('Admin.dashboard');
        })->name('admin.home');
        Route::post('logout' , [LoginAdminController::class , 'logout'])->name('admin.logout');
        Route::resource('category', CategoryController::class);
        Route::get('DeleteCategory/{id}', [CategoryController::class , 'DeleteCategory'])->name('DeleteCategory');
        Route::resource('item', ItemController::class);
        Route::get('deleteitem/{id}', [ItemController::class , 'deleteitem'])->name('deleteitem');
        Route::get('show_image/{id}' , [Item_imageController::class , 'show_image'])->name('show_image');
        Route::get('add_image/{id}' , [Item_imageController::class , 'add_image'])->name('add_image');
        Route::post('store_image/{id}' , [Item_imageController::class , 'store_image'])->name('store_image');
        Route::get('delete_image/{id}' , [Item_imageController::class , 'delete_image'])->name('delete_image');
        Route::get('offer' , [OfferController::class , 'index'])->name('offer_index');
        Route::get('add_offer' , [OfferController::class , 'create'])->name('offer.create');
        Route::post('add_offer' , [OfferController::class , 'store'])->name('offer.store');
        Route::get('get_price/{id}' , [OfferController::class , 'get_price'])->name('get_price');
        Route::get('Delete/{id}' , [OfferController::class , 'delete'])->name('Delete_Offer');
        Route::get('new_order' , [OrderController::class , 'index'])->name('order_index');
        Route::get('order_done' , [OrderController::class , 'order_done'])->name('order_done');
        Route::get('order_archife' , [OrderController::class , 'order_archife'])->name('order_archife');
        Route::get('show_order/{id}' , [OrderController::class , 'show'])->name('order_show');
        Route::get('accepted/{id}' , [OrderController::class , 'accepted'])->name('order_accepted');
        Route::get('refused/{id}' , [OrderController::class , 'refused'])->name('order_refused');
        Route::get('delete_order/{id}' , [OrderController::class , 'delete_order'])->name('delete_order');
    });
});

                     ########################  End Routes Admin  #############################
