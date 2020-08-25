<?php

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

Route::get('/', function(){
  return view('welcome');
});

Route::resource('/allbrands', 'AllBrandsController');
Route::resource('/brand', 'BrandController');
Route::resource('/colors', 'ColorController');
Route::get('/product/{name}/{color}','ProductController@getproduct');
Route::resource('/product', 'ProductController');
Route::resource('/customer', 'CustomerController');
Route::resource('/confirmorder','OrderController');
Route::resource('/orderconfirmed','OrderConfirmedController');

Route::get('/contact', function(){
    return view('contact');
});
Route::get('/our-story', function(){
    return view('our-story');
});
Route::get('/privacy', function(){
    return view('privacy');
});
Route::get('/report', function(){
    return view('report');
});

//////////////////////////dashboard///////////////////////////
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/coupons', function(){
  return view('admin.coupons');
});
Route::get('/customers', function(){
  return view('admin.customers');
});
Route::get('/dealers', function(){
  return view('admin.dealers');
});
