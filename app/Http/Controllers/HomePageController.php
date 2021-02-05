<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\closedorder;
use App\Models\models;
use App\Models\colors;
use App\Models\pricings;
use App\Models\order_lists;
use Session;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = closedorder::whereNotNull('feedback')->get();
        $models    = models::inRandomOrder()->limit(10)->get();
        return view('welcome', compact('feedbacks','models'));
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
      $url      = explode('-',$id);
      if(empty($url[4])){ return abort(404); }
      $models   = models::where('name', $url[4])->where('series',$url[3])->first();
      if(empty($models->id)){ return abort(505); }
      $colors   = colors::where('model_id', $models->id)->get();
      if(!empty(Session::get('color_id'))){
      $color    = colors::findOrFail(Session::get('color_id'));
      }else{
      $color    = colors::where('model_id', $models->id)->first();
      }
      if(empty($color->id)){ return abort(505); }
      $pricing  = pricings::where('color_id', $color->id)->first();
      $orders   = order_lists::where('color_id', $color->id)->where('prod_type','BASIC')->orWhere('prod_type','PREMIUM')->get();
      return view('product', compact('models','colors','color','pricing','orders'));
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
