<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_lists;
use App\Models\tickets;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report');
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
        $order_id = $request->input('order_id');
        $order    = orders::where('id', $order_id)->where('status',3)->first();
        $olist    = order_lists::where('order_id', $order_id)->where('prod_type','!=','ADDON')->where('prod_type','!=','COUPON')->first();
        //send mail to admin
        if(empty($order->id)){
          return redirect('/report')->with('status','Unable to find such order. Would you like to try again?');
        }else{
          return view('/report', compact('order','olist'));
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
        $ticket  = new tickets;
        $ticket->order_id = $id;
        $ticket->issue  = $request->input('issue');
        $ticket->date_open  = $request->input('sdate');
        $ticket->status     = 0;
        $ticket->Save();

        return redirect('/thankyou');
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
