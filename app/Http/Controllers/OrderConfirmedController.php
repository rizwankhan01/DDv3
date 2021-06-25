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
use App\Models\enquiry;
use Mail;
use App\Mail\OrderConfirmationMail;
use Session;
use App\User;

class OrderConfirmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //dd(str_contains(url()->current(), 'orderconfirmed'));
      $order_id     = Session::get('order_id');
      $order        = orders::findOrFail($order_id);
      $customer     = customers::findOrFail($order->customer_id);
      $address      = addresses::where('customer_id',$order->customer_id)->first();
      $areas        = city_areas::where('city', Session::get('city'))->get();
      $olist        = order_lists::where('order_id', $order_id)->get();
      $model_ord    = order_lists::where('order_id',$order_id)->where('prod_type','!=','COUPON')->where('prod_type','!=','ADDON')->first();
      $tempered     = order_lists::where('order_id',$order_id)->where('prod_type','ADDON')->first();
      $coupon       = order_lists::where('order_id',$order_id)->where('prod_type','COUPON')->first();
      $ord          = colors::findOrFail($model_ord->color_id);
      $pricefortax  = order_lists::where('order_id', $order_id)->where('prod_type','!=','ADDON')->first();


      Mail::to($order->customer->email)->send(new OrderConfirmationMail($order));

      //end of order confirmation mail
      if(!empty(Session::get('enq_id'))){
        $enquiry  = enquiry::findOrFail(Session::get('enq_id'));
        $enquiry->delete();
      }
      session()->flush();

      $title = "New Order Alert";
      $message = "Login your dashboard to know more.";
      $fcmTokens = User::where('user_type','!=','Service Man')->whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

      $SERVER_API_KEY = 'AAAAtUdBMyQ:APA91bFOqBh8BffVbwSGwBHhXphnVm7KlSn1-BwNYbjfNAV7_4a5jZSvSHe9rjTq_hDy54nCxrAh20fKq3m2ftlBX0FUKWz8OKNR1FkVX1VW4rXIY2zbkxFIrWb8za86ehYu4zcjmhtd';

        $data = [
            "registration_ids" => $fcmTokens,
            "notification" => [
                "title" => $title,
                "body" => $message,
                "priority" => 'high',
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

      return view('/orderconfirmed', compact('order','olist','pricefortax','customer','areas', 'address'));
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
