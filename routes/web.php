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

Route::resource('/select-city','SelectCityController');
Route::get('/','HomePageController@index');
Route::resource('/allbrands', 'AllBrandsController');
Route::resource('/brand', 'BrandController');
Route::resource('/colors', 'ColorController');
//Route::get('/product/{name}/{color}','ProductController@getproduct');
//Route::resource('/product', 'ProductController');
Route::resource('/customer', 'CustomerController');
Route::resource('/confirmorder','OrderController');
Route::resource('/orderconfirmed','OrderConfirmedController');
Route::resource('/report', 'TicketController');
Route::post('/enquire','Admin\EnquiryController@store');
Route::resource('/feedback','FeedbackController');
Route::resource('/repository','LegendsController');
Route::resource('/track-your-order','TrackOrderController');

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
Route::get('/refund-policy', function(){
    return view('refund');
});
Route::get('/thankyou', function(){
    return view('thankyou');
});

//////////////////////////dashboard///////////////////////////
Route::get('/getcallsfromexotelapi','Admin\ExotelCalls@incoming');
Auth::routes();
Route::group(['middleware' => 'auth'], function(){

  //admin and serviceman
  //settings
  Route::resource('/settings','Admin\SettingsController');
  //colors
  Route::resource('/modelcolors','Admin\ColorsController');
  Route::get('/getseries/{id}','Admin\ColorsController@getseries');
  Route::get('/getmodels/{id}','Admin\ColorsController@getmodels');

  //investor routes
  Route::group(['middleware' => 'investor'], function(){
    Route::resource('/investor','Investor\HomeController');
  });

  //warehouse routes
  Route::group(['middleware' => 'warehouse'], function(){
    Route::resource('/stockrequest', 'Warehouse\StockRequestController');
    Route::resource('/stockinhand', 'Warehouse\StockInHandController');
    Route::get('/purchaseorder',function(){ return view('warehouse.purchaseorder'); });
  });

  //Service man routes
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
    Route::put('/addonproduct/{id}','Serviceman\MyOrdersController@addonproduct');

    Route::resource('/exotel_calls','Admin\ExotelCallsController');
  });

  //
  Route::group(['middleware' =>'admin'], function(){
    //view ID Card
    Route::resource('/viewidcard','Admin\IDCardController');

    Route::resource('/home', 'HomeController');
    //notification
    Route::patch('/fcm-Token', 'SendPushController@updateToken')->name('fcmToken');
    Route::post('/send-notification','SendPushController@notification')->name('notification');

    Route::resource('/close','Admin\ClosedController');
    Route::resource('/cancel','Admin\CancelledController');
    Route::resource('/brands','Admin\BrandsController');
    Route::resource('/models','Admin\ModelsController');
    Route::resource('/coupons','Admin\CouponsController');
    Route::resource('/dealers','Admin\DealersController');
    Route::resource('/accounts','Admin\AccountsController');
    Route::resource('/tickets','Admin\TicketController');
    Route::resource('/enquiry','Admin\EnquiryController');
    Route::resource('/customers','Admin\CustomerController');
    Route::resource('/dashboard', 'Admin\DashboardController');
    Route::resource('/search','Admin\SearchController');
    Route::resource('/invoice','Admin\InvoiceController');
    Route::resource('/expenses','Admin\ExpensesController');
    Route::resource('/addon','Admin\AddonController');

    Route::resource('/analytics','Admin\AnalyticsController');

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

    //Mail Controller
    Route::resource('/send-mail','Admin\MailController');
  });
});

// New User Interfaces
// New Model Create
Route::get('/newmodel', function(){ return view('admin.newmodel'); });
//User Leave Requests
Route::get('/newleavereq', function(){ return view('admin.newleavereq'); });
//HR Users
Route::get('/newjobs', function(){ return view('admin.newjobs'); });
Route::get('/newallcandidates', function(){ return view('admin.newallcandidates'); });
Route::get('/newleaves', function(){ return view('admin.newleaves'); });
Route::get('/newholiday', function(){ return view('admin.newholiday'); });
Route::get('/newinterviews', function(){ return view('admin.newinterviews'); });
Route::get('/newsalary', function(){ return view('admin.newsalary'); });
Route::get('/newattendance', function(){ return view('admin.newattendance'); });
//CRM Users
Route::get('/newenq', function(){ return view('admin.newenq'); });
Route::get('/newmail', function(){ return view('admin.newmail'); });
Route::get('/neworder', function(){ return view('admin.neworder'); });
//JOBS PAGE
Route::get('/jobs', function(){ return view('alljobs'); });



Route::get('/{id}','HomePageController@show');
Route::post('/{id}','HomePageController@store');
