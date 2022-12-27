<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProductController;

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

//Auth routes
Route::get('/',[AuthController::class, 'loginForm'])->name('login'); 
Route::post('/',[AuthController::class, 'login']); 
Route::get('/register',[AuthController::class, 'registerForm']);
Route::post('/register',[AuthController::class, 'register']);
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);


Route::group(['middleware'=> ['auth', 'verified']],function(){
    
   
    Route::controller(ProductController::class)->group(function (){
        Route::get('/inventory', 'inventory')->name('admin-page')->middleware('role:admin');
        Route::get('/add', 'create')->name('new-product')->middleware('role:admin');
        Route::get('/edit/{product}', 'edit')->middleware('role:admin');
        Route::get('/delete/{product}', 'delete')->middleware('role:admin');
        Route::get('/products-list', 'productsList')->name('products-list');
        Route::get('/add-to-cart/{product}', 'addToCart')->middleware('role:customer');
        Route::get('/user-cart', 'userCart')->name('user-cart')->middleware('role:customer');
        Route::get('/checkout', 'checkout')->name('checkout')->middleware('role:customer');
    });
    Route::controller(SiteController::class)->group(function (){
        Route::get('/home', 'home')->name('home')->middleware('role:customer');
    });

    
});










