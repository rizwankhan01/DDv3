<?php

namespace App\Http\Controllers\Serviceman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_lists;
use App\Models\consultation;
use App\Models\dealers;
use App\Models\closedorder;
use App\Models\address;
use App\user;
use Auth;

class ServicemanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $orders = orders::where('status',2)
                    ->where('serviceman_id',Auth::user()->id)
                    ->get();
        return view('serviceman.serviceman', compact('orders'));
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
        $order  = orders::where('id',$id)->where('serviceman_id',Auth::user()->id)->first();
        $screen = order_lists::where('order_id',$id)
                              ->where('prod_type','!=','ADDON')
                              ->where('prod_type','!=','COUPON')
                              ->first();
        $olist = order_lists::where('order_id',$id)->get();
        $consultation = consultation::where('order_id',$id)->first();
        $smen  =  user::where('user_type','Service Man')->get();
        $dealers  = dealers::all();
        $corder = closedorder::where('order_id',$id)->first();
        $address = address::where('customer_id',$order->customer_id)->first();
        return view('serviceman.serviceman', compact('order','olist','screen','consultation','smen','dealers','corder','address'));
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
