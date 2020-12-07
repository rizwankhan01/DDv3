<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_lists;
use App\Models\coupons;
use App\Models\colors;
use App\Models\customers;
use App\Models\city_areas;
use App\Models\addresses;
use Session;

class OrderConfirmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customer     = customers::findOrFail(Session::get('cus_id'));
      $address      = addresses::where('customer_id',$customer->id)->first();
      $order_id     = Session::get('order_id');
      $order        = orders::findOrFail($order_id);
      $areas        = city_areas::all();
      $olist        = order_lists::where('order_id', $order_id)->get();
      $model_ord    = order_lists::where('order_id',$order_id)->where('prod_type','!=','COUPON')->where('prod_type','!=','ADDON')->first();
      $tempered     = order_lists::where('order_id',$order_id)->where('prod_type','ADDON')->first();
      $coupon       = order_lists::where('order_id',$order_id)->where('prod_type','COUPON')->first();
      $ord          = colors::findOrFail($model_ord->color_id);
      $pricefortax  = order_lists::where('order_id', $order_id)->where('prod_type','!=','ADDON')->first();
      session()->flush();

      return view('/orderconfirmed', compact('order','olist','pricefortax','customer','areas', 'address','response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
