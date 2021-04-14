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

      //order confirmation mail
      $to        = $customer->email.", order@doctordisplay.in";
      $subject      = "Order Confirmation Mail | Doctor Display";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: <order@doctordisplay.in>' . "\r\n";

      $message  = "<img src='http://doctordisplay.in/img/logo/logo-mail.png'><BR><br>
      <p>Hi ".$customer->name.",<br>
      Thanks for choosing Doctor Display, India's Leading Mobile Repair Service. You order is confirmed.<br><br>
      You have scheduled a ".$model_ord->prod_type." screen repair for your ".$model_ord->color->model->brand->name." ".$model_ord->color->model->series." ".$model_ord->color->model->name." (".$model_ord->color->name.")  between
      ".$order->slot_time." on ".$order->slot_date.". Our service technician will reach out to you an hour before the scheduled time.<br><br>
      The details for your order are bellow:<br>
      <table style='border:1px solid #eee;width:100%;'>
      <tr><td style='border:1px solid #eee;'>Order ID</td><td style='border:1px solid #eee;'>".$order->id."</td></tr>
      <tr><td style='border:1px solid #eee;'>Display for ".$model_ord->color->model->brand->name." ".$model_ord->color->model->series." ".$model_ord->color->model->name." (".$model_ord->color->name.")</td><td style='border:1px solid #eee;'>".$model_ord->price." INR</td></tr>";
      if(!empty($tempered->id)){
      $message.="<tr><td style='border:1px solid #eee;'>Tempered Glass</td><td style='border:1px solid #eee;'>99 INR</td></tr>";
      }
      if(!empty($coupon->id)){
      $message.="<tr><td style='border:1px solid #eee;'>Coupon Discount</td><td style='border:1px solid #eee;'>".$coupon->price." INR</td></tr>";
      }
      $message.="<tr><td style='border:1px solid #eee;'>Total Amount</td><td style='border:1px solid #eee;'>".$olist->sum('price')." INR</td></tr>
      <tr><td style='border:1px solid #eee;'>Name</td><td style='border:1px solid #eee;'>".$customer->name."</td></tr>
      <tr><td style='border:1px solid #eee;'>Phone Number</td><td style='border:1px solid #eee;'>".$customer->phone_number."</td></tr>
      <tr><td style='border:1px solid #eee;'>Email address</td><td style='border:1px solid #eee;'>".$customer->email."</td></tr>
      <tr><td style='border:1px solid #eee;'>Address</td><td style='border:1px solid #eee;'>".$address->address.", ".$address->area.", ".$address->city." - ".$address->pincode."</td></tr>
      <tr><td style='border:1px solid #eee;'>Appointment Date</td><td style='border:1px solid #eee;'>".$order->slot_date."</td></tr>
      <tr><td style='border:1px solid #eee;'>Appointment Time</td><td style='border:1px solid #eee;'>".$order->slot_time."</td></tr>
      </table><br><br>
      Thank you for choosing Doctor Display!<br><br>
      Regards,<br>
      Doctor Display";

      mail($to,$subject,$message,$headers);
      //end of order confirmation mail
      if(!empty(Session::get('enq_id'))){
        $enquiry  = enquiry::findOrFail(Session::get('enq_id'));
        $enquiry->delete();
      }
      session()->flush();

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
