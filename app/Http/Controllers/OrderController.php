<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_lists;
use App\Models\coupons;
use App\Models\customers;
use App\Models\city_areas;
use App\Models\addresses;
use Spatie\Referer\Referer;
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
        $address      = addresses::where('customer_id',$customer->id)->first();
        $order_id     = Session::get('order_id');
        $order        = orders::findOrFail($order_id);
        $areas        = city_areas::where('city',Session::get('city'))->get();
        $olist        = order_lists::where('order_id', $order_id)->get();
        $pricefortax  = order_lists::where('order_id', $order_id)->where('prod_type','!=','ADDON')->where('prod_type','!=','COUPON')->first();
        return view('/confirmorder', compact('order','olist','pricefortax','customer','areas','address'));
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
        if(empty($request->input('cus_id'))){ //checking if user landed on product page and execute
        //creating new customer
        //$check = customers::where('phone_number',$request->input('phone'))->first();
          if(empty($request->input('phone'))){ // checking if phone number already exists
            //dd('test');
            $customer = new customers;
            $customer->ga_id = $request->input('ga_id');
            $customer->referer      = app(Referer::class)->get();
            //$customer->referer      = $request->visitor()->referer();
            $customer->device       = $request->visitor()->device();
            $customer->platform     = $request->visitor()->platform();
            $customer->browser      = $request->visitor()->browser();
            $customer->languages    = implode(', ', $request->visitor()->languages());
            $customer->ip           = $request->visitor()->ip();
            $customer->save();
            $cus_id = $customer->id;
          }
        //else{
          //$cus_id = $check->id;
        //}
        Session::put('cus_id', $cus_id);
        Session::put('color_id', $request->input('color_id'));
        //creating new order
        $orders = new orders;
        $orders->customer_id  = $cus_id;
        $orders->referer      = app(Referer::class)->get();
        $orders->save();
        $order_id = $orders->id;
        Session::put('order_id',$order_id);
        //inserting order id and color id
        $olist  = new order_lists;
        $olist->order_id  = $order_id;
        $olist->color_id  = $request->input('color_id');
        $olist->price     = $request->input('price');
        $olist->prod_type = $request->input('prod_type');
        $olist->save();
        //inserting order id and TG
        if($request->input('tg')!=0){
          $olist2 = new order_lists;
          $olist2->order_id = $order_id;
          $olist2->color_id = 1;
          $olist2->price    = $request->input('tg');
          $olist2->prod_type = "ADDON";
          $olist2->save();
        }
      }else{ //user flow from home page
          //creating new order
          $orders = new orders;
          $orders->customer_id  = $request->input('cus_id');
          $orders->referer      = app(Referer::class)->get();
          $orders->save();
          $order_id = $orders->id;
          Session::put('order_id',$order_id);
          // inserting order id and color id
          $olist  = new order_lists;
          $olist->order_id  = $order_id;
          $olist->color_id  = $request->input('color_id');
          $olist->price     = $request->input('price');
          $olist->prod_type = $request->input('prod_type');
          $olist->save();
          // inserting order id and TG
          if($request->input('tg')!=0){
            $olist2 = new order_lists;
            $olist2->order_id = $order_id;
            $olist2->color_id = 1;
            $olist2->price    = $request->input('tg');
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
      if(!empty($request->input('coupon'))){ //if coupon code is applied first
        $coupon = coupons::where('name',$request->input('coupon'))->where('status',1)->first(); //check coupon
        $checkifexists = order_lists::where('order_id', $id)->where('prod_type','COUPON')->first(); //checkif coupon already applied
        if(!empty($coupon->id)){
          if(!empty($checkifexists->id)){ //update coupon to order
            $olist  = order_lists::findOrFail($checkifexists->id);
            //dd($olist);
            $olist->order_id  = $id;
            $olist->color_id  = $coupon->id;
            $olist->price     = "-".$coupon->amount;
            $olist->prod_type = "COUPON";
            $olist->update();
          }else{ //add coupon to order
            $olist  = new order_lists;
            $olist->order_id  = $id;
            $olist->color_id  = $coupon->id;
            $olist->price     = "-".$coupon->amount;
            $olist->prod_type = "COUPON";
            $olist->save();
          }

          $order                = orders::findOrFail($id);
          if(!empty($request->input('name'))){
            $checkphone     = customers::where('id', Session::get('cus_id'))->first(); //customer id got from session
            if(empty($checkphone->id)){   //checking if phone number already does not exist
              $customer               = customers::findOrFail($order->customer_id);
              $customer->name         = $request->input('name');
              $customer->phone_number = $request->input('phone');
              $customer->email        = $request->input('email');
              $customer->referer      = app(Referer::class)->get();
              //$customer->referer      = $request->visitor()->referer();
              $customer->device       = $request->visitor()->device();
              $customer->platform     = $request->visitor()->platform();
              $customer->browser      = $request->visitor()->browser();
              $customer->languages    = implode(', ', $request->visitor()->languages());
              $customer->ip           = $request->visitor()->ip();
              $customer->update();
            }else{ // if phone number exists
              $customer               = customers::findOrFail($checkphone->id);
              $customer->name         = $request->input('name');
              $customer->phone_number = $request->input('phone');
              $customer->email        = $request->input('email');
              $customer->referer      = app(Referer::class)->get();
              //$customer->referer      = $request->visitor()->referer();
              $customer->device       = $request->visitor()->device();
              $customer->platform     = $request->visitor()->platform();
              $customer->browser      = $request->visitor()->browser();
              $customer->languages    = implode(', ', $request->visitor()->languages());
              $customer->ip           = $request->visitor()->ip();
              $customer->update();
            }

            $order->customer_id = $customer->id;
          }

          $check_address        = addresses::where('customer_id', $order->customer_id);
          if(empty($check_address->address) AND !empty($request->input('address'))){
            $address              = new addresses;
            $address->customer_id = $order->customer_id;
            $address->address     = $request->input('address');
            $address->area        = $request->input('area');
            $address->city        = $request->input('city');
            $address->pincode     = $request->input('pincode');
            $address->save();
            $address_id           = $address->id;
          }
            //dd($address_id);
            if(!empty($address_id)){
              $order->address_id    = $address_id;
            }
            if(!empty($request->input('time_slot'))){
              $order->slot_time     = $request->input('time_slot');
              $order->slot_date     = $request->input('date');
            }
            $order->referer      = app(Referer::class)->get();
            $order->update();
          return redirect()->back()->with('success','Coupon Applied');
        }else{
          $order                = orders::findOrFail($id);
          if(!empty($request->input('name'))){
            $checkphone     = customers::where('phone_number',$request->input('phone'))->first();
            if(empty($checkphone->id)){   //checking if phone number already does not exist
              $customer               = customers::findOrFail($order->customer_id);
              $customer->name         = $request->input('name');
              $customer->phone_number = $request->input('phone');
              $customer->email        = $request->input('email');
              $customer->referer      = app(Referer::class)->get();
              //$customer->referer      = $request->visitor()->referer();
              $customer->device       = $request->visitor()->device();
              $customer->platform     = $request->visitor()->platform();
              $customer->browser      = $request->visitor()->browser();
              $customer->languages    = implode(', ', $request->visitor()->languages());
              $customer->ip           = $request->visitor()->ip();
              $customer->update();
            }else{ // if phone number exists
              $customer               = customers::findOrFail($checkphone->id);
              $customer->name         = $request->input('name');
              $customer->phone_number = $request->input('phone');
              $customer->email        = $request->input('email');
              $customer->referer      = app(Referer::class)->get();
              //$customer->referer      = $request->visitor()->referer();
              $customer->device       = $request->visitor()->device();
              $customer->platform     = $request->visitor()->platform();
              $customer->browser      = $request->visitor()->browser();
              $customer->languages    = implode(', ', $request->visitor()->languages());
              $customer->ip           = $request->visitor()->ip();
              $customer->update();
            }
            $order->customer_id = $customer->id;
          }

          $check_address        = addresses::where('customer_id', $order->customer_id)->first();
          if(empty($check_address->id) AND !empty($request->input('address'))){
            $address              = new addresses;
            $address->customer_id = $order->customer_id;
            $address->address     = $request->input('address');
            $address->area        = $request->input('area');
            $address->city        = $request->input('city');
            $address->pincode     = $request->input('pincode');
            $address->save();
            $address_id           = $address->id;
          }
          if(!empty($address_id)){
            $order->address_id    = $address_id;
          }
            if(!empty($request->input('time_slot'))){
              $order->slot_time     = $request->input('time_slot');
              $order->slot_date     = $request->input('date');
            }

            $order->referer      = app(Referer::class)->get();
            $order->update();

          return redirect()->back()->with('failure','This coupon is not applicable.');
        }
      }else if(!empty($request->input('name')) AND empty($request->input('coupon'))){
        $order                = orders::findOrFail($id);
        if(!empty($request->input('name'))){
          $checkphone     = customers::where('phone_number',$request->input('phone'))->first();
          if(empty($checkphone->id)){   //checking if phone number already does not exist
            $customer               = customers::findOrFail($order->customer_id);
            $customer->name         = $request->input('name');
            $customer->phone_number = $request->input('phone');
            $customer->email        = $request->input('email');
            $customer->referer      = app(Referer::class)->get();
            //$customer->referer      = $request->visitor()->referer();
            $customer->device       = $request->visitor()->device();
            $customer->platform     = $request->visitor()->platform();
            $customer->browser      = $request->visitor()->browser();
            $customer->languages    = implode(', ', $request->visitor()->languages());
            $customer->ip           = $request->visitor()->ip();
            $customer->update();
          }else{ // if phone number exists
            $customer               = customers::findOrFail($checkphone->id);
            $customer->name         = $request->input('name');
            $customer->phone_number = $request->input('phone');
            $customer->email        = $request->input('email');
            $customer->referer      = app(Referer::class)->get();
            //$customer->referer      = $request->visitor()->referer();
            $customer->device       = $request->visitor()->device();
            $customer->platform     = $request->visitor()->platform();
            $customer->browser      = $request->visitor()->browser();
            $customer->languages    = implode(', ', $request->visitor()->languages());
            $customer->ip           = $request->visitor()->ip();
            $customer->update();
          }
          $order->customer_id = $customer->id;
        }
        $check_address        = addresses::where('customer_id',$order->customer_id);
          if(empty($check_address->id)){
            $address              = new addresses;
            $address->customer_id = $order->customer_id;
            $address->address     = $request->input('address');
            $address->area        = $request->input('area');
            $address->city        = $request->input('city');
            $address->pincode     = $request->input('pincode');
            $address->save();
            $address_id           = $address->id;
          }else{
            $address_id           = $check_address->id;
          }

          $order->address_id    = $address_id;
          $order->slot_time     = $request->input('time_slot');
          $order->slot_date     = $request->input('date');
          $order->status        = 1;

          $order->referer      = app(Referer::class)->get();
          $order->update();
          //order confirmation mail

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
