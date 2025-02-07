<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pricings;
use App\Models\colors;
use App\Models\models;
use App\Models\model_resources;
use App\Models\order_lists;
use Session;

class ProductController extends Controller
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
        //dd($request->input('color_id'));
        $color = colors::findOrFail($request->input('color_id'));
        Session::put('color_id',$color->id);
        $models = models::where('id',$color->model_id)->first();
        $colors = colors::where('model_id',$models->id)->get();
        $pricing  = pricings::where('color_id',$color->id)->first();
        if(empty($pricing->id)){ return abort(500); }
        $orders = order_lists::where('color_id', $color->id)->where('prod_type','BASIC')->orWhere('prod_type','PREMIUM')->get();
        return redirect('screen-repair-'.$models->brand->name."-".$models->series."-".$models->name)->with(compact('models','colors','color','pricing','orders'));
        //return view('product',compact('models','colors','color','pricing','orders'));
    }

    public function getproduct($name, $color_name){
      $models = models::where('id',$name)->first();
      if(empty($models->id)){ return abort(404); }
      $colors = colors::where('model_id', $models->id)->get();
      //dd($name." ".$color_name." ".$models->id);
      $color  = colors::where('name', $color_name)->where('model_id',$models->id)->first();
      $pricing  = pricings::where('color_id', $color->id)->first();
      if(empty($pricing->id)){ return abort(500); }
      $orders = order_lists::where('color_id', $color->id)->where('prod_type','BASIC')->orWhere('prod_type','PREMIUM')->get();
      return view('product', compact('models','colors','color','pricing','orders'));
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
