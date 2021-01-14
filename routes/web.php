<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'isAdmin'], function () {
        Route::get('/home', "App\Http\Controllers\Admin\HomeController@index")->name('home');
    });
    Route::resource('/admin/categories', 'App\Http\Controllers\Admin\CategoryController');
});

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');


Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');

Route::get('/basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
Route::get('/basket/place', 'App\Http\Controllers\BasketController@basketPlace')->name('order');
Route::post('/basket/confirm', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');
Route::post('/basket/add/{productId}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{productId}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');



Route::get('/{category}/{product}', 'App\Http\Controllers\MainController@product')->name('product');
Route::get('/{code}', 'App\Http\Controllers\MainController@category')->name('category');





