<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_lists;
use App\Models\coupons;
use App\Models\customers;
use App\Models\city_areas;
use App\Models\addresses;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer     = customers::findOrFail(Session::get('cus_id'));
        $order_id     = Session::get('order_id');
        $order        = orders::findOrFail($order_id);
        $areas        = city_areas::all();
        $olist        = order_lists::where('order_id', $order_id)->get();
        $pricefortax  = order_lists::where('order_id', $order_id)->where('prod_type','!=','ADDON')->where('prod_type','!=','COUPON')->first();
        return view('/confirmorder', compact('order','olist','pricefortax','customer','areas'));
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
        if(empty($request->cus_id)){
        //creating new customer
        $check = customers::where('phone_number',$request->phone)->first();
        if(empty($check->id)){ // checking if phone number already exists
          $customer = new customers;
          $customer->ga_id = $request->ga_id;
          $customer->save();
          $cus_id = $customer->id;
        }else{
          $cus_id = $check->id;
        }
        Session::put('cus_id',$cus_id);
        Session::put('color_id',$request->color_id);
        //creating new order
        $orders = new orders;
        $orders->customer_id  = $cus_id;
        $orders->save();
        $order_id = $orders->id;
        Session::put('order_id',$order_id);
        //inserting order id and color id
        $olist  = new order_lists;
        $olist->order_id  = $order_id;
        $olist->color_id  = $request->color_id;
        $olist->price     = $request->price;
        $olist->prod_type = $request->prod_type;
        $olist->save();
        //inserting order id and TG
        if($request->tg!=0){
          $olist2 = new order_lists;
          $olist2->order_id = $order_id;
          $olist2->color_id = 1;
          $olist2->price    = $request->tg;
          $olist2->prod_type = "ADDON";
          $olist2->save();
        }
        }else{
          //creating new order
          $orders = new orders;
          $orders->customer_id  = $request->cus_id;
          $orders->save();
          $order_id = $orders->id;
          Session::put('order_id',$order_id);
          // inserting order id and color id
          $olist  = new order_lists;
          $olist->order_id  = $order_id;
          $olist->color_id  = $request->color_id;
          $olist->price     = $request->price;
          $olist->prod_type = $request->prod_type;
          $olist->save();
          // inserting order id and TG
          if($request->tg!=0){
            $olist2 = new order_lists;
            $olist2->order_id = $order_id;
            $olist2->color_id = 1;
            $olist2->price    = $request->tg;
            $olist2->prod_type = "ADDON";
            $olist2->save();
          }
        }
        return redirect('/confirmorder');
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
      if(!empty($request->coupon)){
        $coupon = coupons::where('name',$request->coupon)->where('status',1)->first();
        $checkifexists = order_lists::where('prod_type','COUPON')->first();
        if(!empty($coupon->id)){
          if(!empty($checkifexists->id)){
            $olist  = order_lists::findOrFail($checkifexists->id);
            $olist->order_id  = $id;
            $olist->color_id  = $coupon->id;
            $olist->price     = "-".$coupon->amount;
            $olist->prod_type = "COUPON";
            $olist->update();
          }else{
            $olist  = new order_lists;
            $olist->order_id  = $id;
            $olist->color_id  = $coupon->id;
            $olist->price     = "-".$coupon->amount;
            $olist->prod_type = "COUPON";
            $olist->save();
          }
          
          $order                = orders::findOrFail($id);
          $check_address        = addresses::where('customer_id',$order->customer_id);
          if(empty($check_address->id)){
            $address              = new addresses;
            $address->customer_id = $order->customer_id;
            $address->address     = $request->address;
            $address->area        = $request->area;
            $address->city        = $request->city;
            $address->pincode     = $request->pincode;
            $address->save();
            $address_id           = $address->id;
          }else{
            $address_id           = $check_address->id;
          }
            $order->address_id    = $address_id;
            $order->slot_time     = $request->time_slot;
            $order->slot_date     = $request->date;
            $order->status        = 1;
            $order->update();
            $customer             = customers::findOrFail($order->customer_id);
            $customer->name       = $request->name;
            $customer->phone_number= $request->phone;
            $customer->email      = $request->email;
            $customer->update();

          return redirect('/confirmorder')->with('success','Coupon Applied');
        }else{
          return redirect('/confirmorder')->with('failure','This coupon is not applicable.');
        }
      }else if(!empty($request->name)){
        $order                = orders::findOrFail($id);
        $check_address        = addresses::where('customer_id',$order->customer_id);
        if(empty($check_address->id)){
          $address              = new addresses;
          $address->customer_id = $order->customer_id;
          $address->address     = $request->address;
          $address->area        = $request->area;
          $address->city        = $request->city;
          $address->pincode     = $request->pincode;
          $address->save();
          $address_id           = $address->id;
        }else{
          $address_id           = $check_address->id;
        }
          $order->address_id    = $address_id;
          $order->slot_time     = $request->time_slot;
          $order->slot_date     = $request->date;
          $order->status        = 1;
          $order->update();
          $customer             = customers::findOrFail($order->customer_id);
          $customer->name       = $request->name;
          $customer->phone_number= $request->phone;
          $customer->email      = $request->email;
          $customer->update();
        return redirect('/orderconfirmed');
      }

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
