<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupons;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = coupons::all();
        return view('admin.coupons', compact('coupons'));
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
        $coupon->name     =   $request->input('name');
        $coupon->validity =   $request->input('validity');
        $coupon->amount   =   $request->input('amount');
        $coupon->status   =   1;
        $coupon->save();
        return redirect('/coupons')->with('status','New Coupon Created Successfully!');
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
      return view('admin.coupons', compact('coupon'));
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
        $coupon->name     =   $request->input('name');
        $coupon->validity =   $request->input('validity');
        $coupon->amount   =   $request->input('amount');
        $coupon->status   =   $request->input('status');
        $coupon->update();
        return redirect('/coupons')->with('status','Coupon Updated Successfully!');
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
        $coupon->delete();
        return redirect('/coupons')->with('status','Coupon Deleted Successfully!');
    }
}
