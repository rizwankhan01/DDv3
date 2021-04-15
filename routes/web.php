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
Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);

Route::get('/','HomePageController@index');
Route::resource('/allbrands', 'AllBrandsController');
Route::resource('/brand', 'BrandController');
Route::resource('/colors', 'ColorController');
Route::get('/product/{name}/{color}','ProductController@getproduct');
Route::resource('/product', 'ProductController');
Route::resource('/customer', 'CustomerController');
Route::resource('/confirmorder','OrderController');
Route::resource('/orderconfirmed','OrderConfirmedController');
Route::resource('/report', 'TicketController');
Route::post('/enquire','Admin\EnquiryController@store');
Route::resource('/feedback','FeedbackController');
Route::resource('/repository','LegendsController');

Route::get('/blog', function(){
  return abort(404);
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
Route::get('/thankyou', function(){
    return view('thankyou');
});

//////////////////////////dashboard///////////////////////////
Route::get('/getcallsfromexotelapi','Admin\ExotelCalls@incoming');
Auth::routes();
Route::group(['middleware' => 'auth'], function(){

  Route::resource('/settings','Admin\SettingsController');

  Route::group(['middleware' => 'serviceman'], function(){
    Route::resource('/serviceman','Serviceman\ServicemanController');
    Route::resource('/mytickets','Serviceman\MyTicketController');
    Route::resource('/closedorders','Serviceman\ClosedController');
    Route::resource('/myexpenses','Admin\ExpensesController');

    Route::put('/cancelmyorder/{id}', 'Admin\OrderControlsController@cancelorder');
    Route::put('/upload-pre-image/{id}','Serviceman\MyOrdersController@preimage');
    Route::put('/start_tracking/{id}','Serviceman\MyOrdersController@start_tracking');
    Route::put('/complete-order/{id}','Serviceman\MyOrdersController@completeorder');
    Route::put('/pickup/{id}','Serviceman\MyOrdersController@pickup');
    Route::resource('/exotel_calls','Admin\ExotelCallsController');
  });

  Route::group(['middleware' =>'admin'], function(){
    Route::resource('/home', 'HomeController');
    Route::resource('/close','Admin\ClosedController');
    Route::resource('/cancel','Admin\CancelledController');
    Route::resource('/brands','Admin\BrandsController');
    Route::resource('/models','Admin\ModelsController');
    Route::resource('/modelcolors','Admin\ColorsController');
    Route::resource('/coupons','Admin\CouponsController');
    Route::resource('/dealers','Admin\DealersController');
    Route::resource('/accounts','Admin\AccountsController');
    Route::resource('/tickets','Admin\TicketController');
    Route::resource('/enquiry','Admin\EnquiryController');
    Route::resource('/customers','Admin\CustomerController');
    Route::get('/getseries/{id}','Admin\ColorsController@getseries');
    Route::get('/getmodels/{id}','Admin\ColorsController@getmodels');
    Route::resource('/dashboard', 'Admin\DashboardController');
    Route::resource('/search','Admin\SearchController');
    Route::resource('/invoice','Admin\InvoiceController');
    Route::resource('/expenses','Admin\ExpensesController');
    Route::resource('/addon','Admin\AddonController');

    Route::resource('/reports','Admin\ReportsController');
    Route::resource('/enquiryreports','Admin\ReportsEnquiryController');

    Route::put('/ordercontrols/{id}','Admin\OrderControlsController@consultation');
    Route::put('/assign/{id}','Admin\OrderControlsController@assign');
    Route::put('/reschedule/{id}','Admin\OrderControlsController@reschedule');
    Route::put('/applycoupon/{id}','Admin\OrderControlsController@applycoupon');
    Route::put('/cancelorder/{id}','Admin\OrderControlsController@cancelorder');
    Route::put('/changeprice/{id}','Admin\OrderControlsController@changeprice');

    Route::resource('/dealer-profile','Admin\DealerProfileController');
    Route::resource('/serviceman-profile','Admin\ServicemanProfileController');
    Route::resource('/customer-profile','Admin\CustomerProfileController');
    Route::resource('/exotel_calls','Admin\ExotelCallsController');
  });
});

Route::get('/{id}','HomePageController@show');
Route::post('/{id}','HomePageController@store');
