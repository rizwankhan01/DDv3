<?php

namespace App\Http\Controllers\Serviceman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\closedorder;
use App\Models\orders;

class MyOrdersController extends Controller
{
    public function preimage(Request $request, $id)
    {
        $corder     = new closedorder;
        $pre_image  = explode('/',$request->file('pre-image')->store('public'));
        $corder->pre_image  = $pre_image[1];
        $corder->order_id   = $id;
        $corder->save();

        return redirect()->back();
    }

    public function start_tracking(Request $request, $id)
    {
      $corder     = closedorder::where('order_id',$id)->first();
      $corder->start_timestamp  = $request->input('start_timestamp');
      $corder->update();

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
      $order->status  = 3;
      $order->update();
      //send mail to customer

      return redirect()->back();
    }

    public function pickup(Request $request, $id)
    {
      $order  = orders::findOrFail($id);
      $order->pickup_reason = $request->input('pickup_reason');
      $order->update();

      return redirect()->back();
    }
}
