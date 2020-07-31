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

Route::get('/colors', function(){
    return view('colors');
});
Route::get('/product', function(){
    return view('product');
});
Route::get('/confirmorder', function(){
    return view('confirmorder');
});
Route::get('/orderconfirmed', function(){
    return view('orderconfirmed');
});
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
