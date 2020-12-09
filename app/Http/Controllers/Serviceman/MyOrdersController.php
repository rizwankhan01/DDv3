<?php

namespace App\Http\Controllers\Serviceman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\closedorder;
use App\Models\orders;
use App\Models\addresses;
use App\Models\order_lists;

class MyOrdersController extends Controller
{
    public function preimage(Request $request, $id)
    {
        $corder     = closedorder::where('order_id',$id)->first();
        $pre_image  = explode('/',$request->file('pre-image')->store('public'));
        $corder->pre_image  = $pre_image[1];
        $corder->order_id   = $id;
        $corder->update();

        return redirect()->back();
    }

    public function start_tracking(Request $request, $id)
    {
      $corder     = new closedorder;
      $corder->order_id   = $id;
      $corder->start_timestamp  = date('Y-m-d H:i:s');
      $corder->save();

      $order = orders::findOrFail($id);
      $model_ord    = order_lists::where('order_id',$id)->where('prod_type','!=','COUPON')->where('prod_type','!=','ADDON')->first();
      $model        = $model_ord->color->model->brand->name." ".$model_ord->color->model->series." ".$model_ord->color->model->name."
      (".$model_ord->color->name.")";
      $address      = addresses::where('customer_id',$order->customer->id)->first();
      // technician on his way mail
      $to        = $order->customer->email.", order@doctordisplay.in";
      $subject   = "Serviceman on his way  #".$id." | Doctor Display";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: <order@doctordisplay.in>' . "\r\n";

      $message = "<img src='https://doctordisplay.in/images/logo-mail.png'><br><br>
      Hello ".$order->customer->name.",<br>
      Doctor Display here. Your technician ".auth()->user()->name." is on the way to your location with your brand new ".$model." display.
      To ensure a smooth repair experience, please be ready for our technician during the time scheduled.
      If you need to reach ".auth()->user()->name.", you may call ".auth()->user()->primary_phone.".<br><br>
      Appointment details<br>
      Date: ".$order->slot_date."<br>
      Time: ".$order->slot_time."<br>
      Location: ".$address->address.", ".$address->area.", ".$address->city." - ".$address->pincode."<br><br>
      Service Requirements<br>
      - Doctor Display practices social distancing on every order we complete. Please follow the guidelines to ensure a safe experience.<br>
      - Provide the technician sufficient space for service. The ideal space is a table & chair in close proximity to a power socket.<br><br>
      If there’s anything you need, just call us at ".auth()->user()->primary_phone." and we’ll help right away.<br><br>
      Regards,<br>
      Doctor Display
      ";
      mail($to,$subject,$message,$headers);
      //end of mail

      return redirect()->back();
    }

    public function completeorder(Request $request, $id)
    {
      $corder     = closedorder::where('order_id',$id)->first();
      $post_image = explode('/',$request->file('post-image')->store('public'));
      $corder->post_image = $post_image[1];
      $corder->imei = $request->input('imei');
      $corder->payment_type = $request->input('payment_type');
      $corder->company_name = $request->input('company_name');
      $corder->company_gst  = $request->input('company_gst');
      $corder->company_address  = $request->input('company_address');
      $corder->notes          = $request->input('notes');
      $corder->end_timestamp  = date('Y-m-d H:i:s');
      $corder->update();

      $order  = orders::findOrFail($id);
      if($request->input('tg')=='Yes'){
        $check =  order_lists::where('order_id',$id)->where('prod_type','ADDON')->first();
        if(empty($check->id)){
          $addon = new order_lists;
          $addon->order_id = $id;
          $addon->color_id = 1;
          $addon->price = 99;
          $addon->prod_type = 'ADDON';
          $addon->save();
        }
      }else{
          $addon = order_lists::where('order_id',$id)->where('prod_type','ADDON')->first();
          $addon->delete();
      }
      $order->status  = 3;
      $order->update();
      //send mail and invoice to customer

      return redirect()->back();
    }

    public function pickup(Request $request, $id)
    {
      $order  = orders::findOrFail($id);
      $order->pickup_reason = $request->input('pickup_reason');
      $order->update();
      //send mail to customer
      return redirect()->back();
    }
}
