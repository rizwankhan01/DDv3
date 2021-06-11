<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enquiry;
use App\Models\customers;
use Spatie\Referer\Referer;
use Session;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries  = enquiry::whereNull('status')->get();
        $open       = enquiry::whereNull('status')->count();
        $callback   = enquiry::where('status','Call Back')->count();

        return view('admin.enquiry', compact('enquiries','callback','open'));
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
        if(!empty($request->input('filter'))){
          if(!empty($request->input('city'))){
            if($request->input('city')=='All'){
              $enquiries = enquiry::whereNull('status')->get();
              $open     = enquiry::whereNull('status')->count();
              $callback = enquiry::where('status','Call Back')->count();
            }else{
              $enquiries = enquiry::where('city',$request->input('city'))->whereNull('status')->get();
              $open       = enquiry::whereNull('status')->where('city',$request->input('city'))->count();
              $callback   = enquiry::where('status','Call Back')->where('city',$request->input('city'))->count();
            }
            return view('admin.enquiry', compact('enquiries','callback','open'));
          }else{
            $status = $request->input('filter');
            $callback   = enquiry::where('status','Call Back')->count();
            $open       = enquiry::whereNull('status')->count();
            if($status=='open'){
              $enquiries  = enquiry::whereNull('status')->get();
              return view('admin.enquiry', compact('enquiries','callback','open'));
            }else if($status=='Call Back'){
              $enquiries  = enquiry::where('status','Call Back')->get();
              return view('admin.enquiry', compact('enquiries','callback','open'));
            }else{
              $enquiries  = enquiry::whereNotNull('status')->where('status','!=','Call Back')->get();
              return view('admin.enquiry', compact('enquiries','callback','open'));
            }
          }
        }else{
        $check    = customers::where('phone_number', $request->input('phone_number'))->first();
        if(empty($check->id)){
          $customer = new customers;
          $customer->name = $request->input('customer_name');
          $customer->phone_number = $request->input('phone_number');
          $customer->ga_id        = $request->input('ga_id');
          $customer->referer      = app(Referer::class)->get();
          //$customer->referer      = $request->visitor()->referer();
          $customer->device       = $request->visitor()->device();
          $customer->platform     = $request->visitor()->platform();
          $customer->browser      = $request->visitor()->browser();
          $customer->languages    = implode(', ', $request->visitor()->languages());
          $customer->ip           = $request->visitor()->ip();
          $customer->save();

          $enquiry  = new enquiry;
          $enquiry->model_name  = $request->input('model_name');
          $enquiry->customer_id = $customer->id;
          $enquiry->city        = Session::get('city');
          $enquiry->referer   = app(Referer::class)->get();
        }else{
          $enquiry  = new enquiry;
          $enquiry->customer_id = $check->id;
          $enquiry->model_name  = $request->input('model_name');
          $enquiry->city        = Session::get('city');
          $enquiry->referer   = app(Referer::class)->get();
        }
          $enquiry->save();
          //enquiry mail
          $to        = "order@doctordisplay.in";
          $subject   = "Enquiry Alert | Doctor Display";
          $headers   = "MIME-Version: 1.0" . "\r\n";
          $headers  .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers  .= 'From: <order@doctordisplay.in>' . "\r\n";

          $message   = "<img src='http://doctordisplay.in/img/logo/logo-mail.png'><BR><br>
          Hello there!<Br>
          We have a new enquiry for the model ".$request->input('model_name')." by ".$request->input('customer_name')." (".$request->input('phone_number').").
          Kindly login to your dashboard to know more.<BR><BR>
          Regards,<br>
          Doctor Display
          ";
          mail($to,$subject,$message,$headers);
          //end enquiry mail


        return redirect('/thankyou');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enquiry  = enquiry::findOrFail($id);
        return view('admin.enquiry',compact('enquiry'));
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
        $enquiry            = enquiry::findOrFail($id);
        $enquiry->fdate     = $request->input('fdate');
        $enquiry->status    = $request->input('status');
        $enquiry->notes     = $request->input('notes');
        $enquiry->city      = $request->input('locality');
        $enquiry->update();

        $customer           = customers::findOrFail($request->input('customer_id'));
        $customer->name      = $request->input('customer_name');
        $customer->update();

        return redirect('/enquiry');
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
