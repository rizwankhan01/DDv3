<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order_lists;
use App\Models\addresses;
use App\Models\orders;
use App\Models\consultation;
use App\Models\pricings;
use App\Models\customers;
use App\Models\coupons;

class OrderControlsController extends Controller
{
    public function consultation(Request $request, $id){
      $olist            = order_lists::findOrFail($request->input('ol_id'));
      $color_id         = $olist->color_id;
      $pricings         = pricings::where('color_id',$color_id)->first();
      $olist->prod_type = $request->input('screen_type');
      if($request->input('screen_type')=='BASIC'){
        $olist->price     = $pricings->ord_selling_price;
      }else if($request->input('screen_type')=='PREMIUM'){
        $olist->price     = $pricings->org_selling_price;
      }
      $olist->update();

      $addresses               = addresses::findOrFail($request->input('address_id'));
      $addresses->address      = $request->input('address');
      $addresses->area         = $request->input('area');
      $addresses->city         = $request->input('city');
      $addresses->pincode      = $request->input('pincode');
      $addresses->address_type = $request->input('address_type');
      $addresses->update();

      $consultation               = new consultation;
      $consultation->order_id     = $id;
      $consultation->pcolor       = $request->input('pcolor');
      $consultation->q1           = $request->input('q1');
      $consultation->q2           = $request->input('q2');
      $consultation->q3           = $request->input('q3');
      $consultation->q4           = $request->input('q4');
      $consultation->q5           = $request->input('q5');
      $consultation->q6           = $request->input('q6');
      $consultation->q7           = $request->input('q7');
      $consultation->save();

      $order                    = orders::findOrFail($id);
      $order->slot_date         = $request->input('date');
      $order->slot_time         = $request->input('time_slot');
      $order->update();

      return redirect()->back();
    }

    public function assign(Request $request, $id){
      $order              =   orders::findOrFail($id);
      $order->serviceman_id  =   $request->input('serviceman');
      $order->dealer_id      =   $request->input('dealer');
      $order->stock_price =   $request->input('stock_price');
      $order->status      =   2;
      $order->update();

      return redirect()->back();
    }

    public function reschedule(Request $request, $id){
      $order                    =   orders::findOrFail($id);
      $order->reschedule_reason = $request->input('reschedule_reason');
      $order->slot_time         = $request->input('slot_time');
      $order->slot_date         = $request->input('slot_date');
      //dd($order->customer->email); mail customer
      $order->update();

      return redirect()->back();
    }

    public function applycoupon(Request $request, $id){
      $coupon = coupons::where('name', $request->input('coupon_code'))->first();
      if(!empty($coupon->id)){
        $check  = order_lists::where('prod_type','COUPON')->where('order_id',$id)->first();
        if(!empty($check->id)){
          $olist = order_lists::findOrFail($check->id);
          $olist->price = "-".$coupon->amount;
          $olist->update();
          return redirect()->back();
        }else{
          $olist  = new order_lists;
          $olist->order_id  = $id;
          $olist->color_id  = $coupon->id;
          $olist->price     = "-".$coupon->amount;
          $olist->prod_type = "COUPON";
          $olist->save();
          return redirect()->back();
        }
      }else{
        return redirect()->back()->with('status','Coupon Does not exists!');
      }
    }

    public function cancelorder(Request $request, $id){
      $order  = orders::findOrFail($id);
      $order->status = 4;
      $order->cancel_reason = $request->input('cancel_reason');
      $order->update();
      return redirect()->back();
    }
}
