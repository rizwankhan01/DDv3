<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use App\Models\colors;
use App\Models\enquiry;
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
          $check    = customers::where('phone_number',$request->input('phone'))->first();

          $color_id = $request->input('color_id');
          $color    = colors::findOrFail($color_id);
          $model    = $color->model->name;

        if(empty($check->id)){ // checking if phone number already exists
          $customer = new customers();
          $customer->phone_number = $request->input('phone');
          $customer->ga_id        = $request->input('ga_id');
          $customer->otp          = rand(1111,9999);
          $customer->save();
          $cus_id   = $customer->id;

          $enquiry  = new enquiry;
          $enquiry->model_name  = $color->model->brand->name." ".$color->model->series." ".$model." ".$color->name;
          $enquiry->customer_id = $customer->id;
          $enquiry->save();
        }else{
          $cus_id   = $check->id;

          $enquiry  = new enquiry;
          $enquiry->model_name  = $color->model->brand->name." ".$color->model->series." ".$model." ".$color->name;
          $enquiry->customer_id = $cus_id;
          $enquiry->save();
        }
          Session::put('enq_id',$enquiry->id);
          Session::put('cus_id', $cus_id);
          Session::put('color_id',$color_id);
          if($color->name=='Black'){
            return redirect('screen-repair-'.$color->model->brand->name.'-'.$color->model->series.'-'.$model);
          }else{
            return redirect('product/'.$model.'/'.$color->name);
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
