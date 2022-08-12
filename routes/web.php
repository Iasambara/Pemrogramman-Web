<?php

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

Route::get('/','HomeController@index')
    ->name('home');

Route::get('/detail/{slug}','DetailController@index')
    ->name('detail');


// Berfungsi Memproses data data Checkout, saat klik Join now
Route::post('/checkout/{id}', 'CheckoutController@process')
    ->name('checkout_process')
    ->middleware(['auth','verified']);

Route::get('/checkout/{id}', 'CheckoutController@index')
    ->name('checkout')
    ->middleware(['auth','verified']);


// Berfungsi menambah orang yang tidak masuk dalam data
Route::post('/checkout/{id}', 'CheckoutController@create')
    ->name('checkout-create')
    ->middleware(['auth','verified']); 

//Menghapus Data
Route::get('/checkout/{id}', 'CheckoutController@remove')
    ->name('checkout-remove')
    ->middleware(['auth','verified']);

//Mengkonfirmasi apakah user telah membuat data dengan benar?
//
Route::get('/checkout/{id}', 'CheckoutController@success')
    ->name('checkout-success')
    ->middleware(['auth','verified']); 

Route::get('/checkout','Checkoutcontroller@index')
    ->name('checkout');

Route::get('/checkout/success','Checkoutcontroller@success')
    ->name('checkout-success');



Route::prefix('admin')
    ->namespace('Admin')
->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')
        ->name('dashboard');

        Route::resource('travel-package','TravelPackageController');
        Route::resource('gallery','GalleryController');
        Route::resource('transaction','TransactionController');
    });
Auth::routes(['verify' => true]);


