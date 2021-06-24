<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\expenses;
use App\Models\tickets;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders   = orders::where('updated_at', 'LIKE', date('Y-m-d').'%')->where('status','3')->get();
        $expenses = expenses::where('created_at','LIKE',date('Y-m-d').'%')->get();
        $tickets  = tickets::where('date_close', date('Y-m-d'))->get();

        return view('investor.home', compact('orders','expenses','tickets'));
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
        $from = $request->input('from'); $fromf   = $from." 00:00:00";
        $to = $request->input('to'); $tof     = $to." 23:59:59";
        $orders = orders::whereBetween('updated_at', [$fromf, $tof])->where('status','3')->get();
        $expenses = expenses::whereBetween('created_at',[$fromf, $tof])->get();
        $tickets  = tickets::whereBetween('date_close', [$fromf, $tof])->get();

        return view('investor.home', compact('orders', 'from', 'to', 'expenses', 'tickets'));
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
