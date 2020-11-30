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
Route::group(['middleware' => 'auth'], function () {

  Route::group(['middleware' => 'serviceman'], function () {
    Route::resource('/serviceman','Serviceman\ServicemanController');
  });

  Route::group(['middleware' =>'admin'], function(){
    Route::resource('/home', 'HomeController');
    Route::resource('/brands','Admin\BrandsController');
    Route::resource('/models','Admin\ModelsController');
    Route::resource('/modelcolors','Admin\ColorsController');
    Route::resource('/coupons','Admin\CouponsController');
    Route::resource('/dealers','Admin\DealersController');
  });
});
