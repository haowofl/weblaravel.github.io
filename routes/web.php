<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller;

/**
* GET => account.index => danh sách
* GET => account.create => form thêm mới
* POST => account.store => khi submit form thêm mới
* GET => account.show => xem chi tiết
* GET => account.edit => hiện thị form edit
* PUT => account.update => khi submit form edit
* DELETE=> account.destroy => xóa
*
*/

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/cat_product/{id}', 'HomeController@cat_product')->name('home.cat_product');

Route::get('/delivery', 'CheckoutController@index')->name('checkout.delivery');
Route::post('/add-order', 'CheckoutController@add_order')->name('checkout.addOrder');

Route::get('/show-login', 'HomeController@login')->name('home.login');
Route::post('/login', 'HomeController@login_process')->name('home.login_process');
Route::get('/signup', 'UserController@create')->name('user.signup');

Route::get('/product/{id}', 'HomeController@product_detail')->name('home.product_detail');

Route::post('/cart', 'CartController@save_cart')->name('cart.save_cart');
Route::get('/show_cart', 'CartController@show_cart')->name('cart.show_cart');
Route::get('/delete-cart/{rowId}', 'CartController@delete_cart')->name('cart.delete');

Route::post('/add-user', 'UserController@store')->name('user.store');


Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



// Admmin route
Route::group(['prefix' => 'admin'],function(){
    Route::get('/', 'AdminController@index')->name('admin.login');
    Route::get('/file', 'AdminController@file')->name('admin.file');
    Route::get('/dashboard', 'AdminController@show_dashboard')->name('admin.show_dashboard');
    Route::post('/admin_dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/logout','AdminController@logOut')->name('admin.logout');

    Route::resources([
         'category' => 'CategoryController',
         'products' => 'ProductController',
         'account' => 'AccountController',
         'slide' => 'SlideController',
         'order' => 'OrdersController',
    ]);
});
