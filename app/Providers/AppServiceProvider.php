<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\orders;
use App\Models\tickets;
use App\Models\enquiry;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.dashboard', function($view){
          $open   = orders::where('status',1)->orWhere('status',2)->get();  $view->with('open',count($open));
          $close  = orders::where('status',3)->get(); $view->with('close',count($close));
          $cancel = orders::where('status',4)->get(); $view->with('cancel',count($cancel));
          $tickets= tickets::all(); $view->with('ticket', count($tickets));
          $enquiry= enquiry::whereNull('status')->orWhere('status','!=','Duplicate')->orWhere('status','!=','Not Interested')->get();
          $view->with('enquiry',count($enquiry));
        });
    }
}
