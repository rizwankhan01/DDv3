<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pricings;
use App\Models\colors;
use App\Models\models;
use App\Models\model_resources;
use App\Models\order_lists;

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
        //
    }

    public function getproduct($name, $color){
      $models = models::where('id',$name)->first();
      $colors = colors::where('model_id',$models->id)->get();
      $colorr  = colors::where('name', $color)->where('model_id',$models->id)->first();
      $pricing  = pricings::where('color_id', $colorr->id)->first();
      $orders = order_lists::where('color_id', $colorr->id)->where('prod_type','BASIC')->orWhere('prod_type','PREMIUM')->get();
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
