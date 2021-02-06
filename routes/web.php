<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
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


// static
Route::get('/', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/services', function () {
    return view('services');
});

Route::get('/cart', function () {
    return view('cart');

});

// dynamic
Route::get('/products', 'App\Http\Controllers\ProductsController@index') ->name('products.index');
Route::get('/products/{product}', 'App\Http\Controllers\ProductsController@show')->name('products.show');
Route::get('/orders/{order}', 'App\Http\Controllers\OrdersController@show')->name('orders.show');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::delete('/cart/{product}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

// Route::get('/admin', [AdminController::class, 'index']);
Route::resource('/admin', AdminController::class);
Route::resource('/adminCategories', 'App\Http\Controllers\CategoriesController');
Route::resource('/adminOrders', 'App\Http\Controllers\OrdersController');

//Post
Route::post('/admin', 'App\Http\Controllers\AdminController@store');
Route::post('/adminCategories', 'App\Http\Controllers\CategoriesController@store');
// Route::post('/register', 'App\Http\Controllers\CustomersController@store');
//Route::post('/adminOrders', 'App\Http\Controllers\OrdersController@store');
Route::post('/cart/{product}', 'App\Http\Controllers\CartController@store')->name('cart.store');

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/adminCategories', 'App\Http\Controllers\CategoriesController@index');
Route::get('/adminOrders', 'App\Http\Controllers\OrdersController@index');
Route::get('/adminMessages', 'App\Http\Controllers\ContactController@index');
//  ROUTE BELOW IS NOT CORRECT, JUST CALL CHECKOUT PAGE
Route::post('/checkout/{id}', [AdminController::class, 'show']);

Route::get('/checkout', 'App\Http\Controllers\CheckOutController@index')->name('checkout.index');
Route::post('/checkout', 'App\Http\Controllers\CheckOutController@store')->name('checkout.store');

Route::get('/thankyou', 'App\Http\Controllers\ThankYouController@index')->name('thankyou.index');

Route::post('/contact', 'App\Http\Controllers\ContactController@store')->name('contact.store');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/search', 'ShopController@search')->name('search');
