<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use App\Models\colors;
use App\Models\enquiry;
use App\Models\models;
use Spatie\Referer\Referer;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          $check        = customers::where('phone_number',$request->input('phone'))->first();

          $color_id     = $request->input('color_id');
          $color        = colors::findOrFail($color_id);
          $select_model = models::where('id', $color->model_id)->first();
          //dd($select_model);
          $model    = $select_model->name;
        if(empty($check->id)){ // checking if phone number already exists
          $customer = new customers();
          $customer->phone_number = $request->input('phone');
          $customer->ga_id        = $request->input('ga_id');
          $customer->otp          = rand(1111,9999);
          $customer->referer      = app(Referer::class)->get();
          //$customer->referer      = $request->visitor()->referer();
          $customer->device       = $request->visitor()->device();
          $customer->platform     = $request->visitor()->platform();
          $customer->browser      = $request->visitor()->browser();
          $customer->languages    = implode(', ', $request->visitor()->languages());
          $customer->ip           = $request->visitor()->ip();
          $customer->save();
          $cus_id   = $customer->id;

          $model_name       = $color->model->brand->name." ".$color->model->series." ".$model." ".$color->name;
          $checkifenqexists = enquiry::where('model_name', $model_name)->where('customer_id', $customer->id)->whereNull('status')->first();

          if(empty($checkifenqexists->id)){
            $enquiry  = new enquiry;
            $enquiry->model_name  = $model_name;
            $enquiry->customer_id = $customer->id;
            $enquiry->url       = "screen-repair-".$color->model->brand->name."-".$color->model->series."-".$model;
            $enquiry->city      = Session::get('city');
            $enquiry->save();
          }
        }else{
          $cus_id   = $check->id;
          $model_name       = $color->model->brand->name." ".$color->model->series." ".$model." ".$color->name;
          $checkifenqexists = enquiry::where('model_name', $model_name)->where('customer_id', $cus_id)->whereNull('status')->first();

          if(empty($checkifenqexists->id)){
            $enquiry  = new enquiry;
            $enquiry->model_name  = $color->model->brand->name." ".$color->model->series." ".$model." ".$color->name;
            $enquiry->customer_id = $cus_id;
            $enquiry->url         = "screen-repair-".$color->model->brand->name."-".$color->model->series."-".$model;
            $enquiry->city      = Session::get('city');
            $enquiry->save();
          }
        }
          if(!empty($enquiry->id)){ Session::put('enq_id',$enquiry->id); }
          Session::put('cus_id', $cus_id);
          Session::put('color_id',$color_id);
            return redirect('screen-repair-'.$color->model->brand->name.'-'.$color->model->series.'-'.$model);
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
