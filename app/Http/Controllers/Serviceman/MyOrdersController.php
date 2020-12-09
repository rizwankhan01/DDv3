<?php

namespace App\Http\Controllers\Serviceman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\closedorder;
use App\Models\orders;
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
