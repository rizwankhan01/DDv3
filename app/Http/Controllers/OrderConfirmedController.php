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
      //sending data to freshdesk
      $email="order@doctordisplay.in";//username or apiKey
      $password="Order$123";//pwd or X
      if(empty($coupon->price)){
        $coupon = 0;
      }else{
        $coupon = $coupon->price;
      }

      if($tempered->price==0){
        $tg = 0;
      }else{
        $tg = 99;
      }
      $data = array(
        "type"=> "Orders through api",
        //"id"=> $order_id,
        "name"=> $customer->name,
        "email"=> $customer->email,
        "phone"=> $customer->phone_number,
        "priority"=> 3,
        "status"=> 2,
        "source"=> 9,
        "subject"=> "New Order Alert | Order ID:".$order->id,
        "description" => "New Order For: ".$ord->model->name." (".$ord->screen_color.") - ".$model_ord->prod_type."
                         | TG: ".$tg." | Appointment Date: ".$order->slot_date." | Slot Time: ".$order->slot_time,
        "custom_fields"=> array(
            "cf_appdate" => $order->slot_date,
            "cf_slot_time" => $order->slot_time,
            "cf_total_price" => $olist->sum('price'),
            "cf_model_ordered" => $ord->model->name,
            "cf_tempered_glass" => $tg,
            "cf_color" => $ord->screen_color,
            "cf_screen_type" =>$model_ord->prod_type,
            "cf_address" => $address->address,
            "cf_area" => $address->area,
            "cf_city" => $address->city,
            "cf_coupon" => $coupon,
         ),
      );

      //encoding to json format
      $jsondata= json_encode($data);

      $header[] = "Content-type: application/json";
      $connection = curl_init();
      curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
      curl_setopt($connection, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($connection, CURLOPT_HEADER, false);
      curl_setopt($connection, CURLOPT_USERPWD, "order@doctordisplay.in:Order$123");

      curl_setopt($connection, CURLOPT_POST, 1);
      curl_setopt($connection, CURLOPT_POSTFIELDS, $jsondata);
      curl_setopt($connection, CURLOPT_VERBOSE, 1);

      //replace your domain url below.
      curl_setopt($connection, CURLOPT_URL, "https://doctordisplay.freshdesk.com/api/v2/tickets");
      $response = curl_exec($connection);
      //echo 'RESULT:'.$response;
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
