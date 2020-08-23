<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupons;
use App\Http\Resources\CouponsResource;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $coupons = coupons::orderBy('created_at','desc')->paginate(6);
      return CouponsResource::collection($coupons);
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
      $coupon = new coupons;
      $coupon->id = $request->input('coupon_id');
      $coupon->name = $request->input('name');
      $coupon->amount = $request->input('amount');
      $coupon->validity = $request->input('validity');

      if($coupon->save()){
        return new CouponsResource($coupon);
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
      $coupon = coupons::findOrFail($id);
      return new CouponsResource($coupon);
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
        $coupon = coupons::findOrFail($id);
        $coupon->name = $request->input('name');
        $coupon->amount = $request->input('amount');
        $coupon->validity = $request->input('validity');

        if($coupon->update()){
          return new CouponsResource($coupon);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = coupons::findOrFail($id);
        if($coupon->delete()){
          return new CouponsResource($coupon);
        }
    }
}
