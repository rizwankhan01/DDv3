<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\enquiry;
use App\Models\exotel_calls;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $today          = date('Y-m-d');
      $torders        =  orders::WhereNotNull('status')
                        ->where('created_at','LIKE', $today."%")
                        ->count();
      $tenquiry       = enquiry::where('created_at','LIKE', $today."%")->count();
      //exotel reports
      $exotel         = exotel_calls::where('Direction','inbound')->get();
      $exotelbyusers  = DB::table('exotel_calls')
                          ->select(DB::raw('sum(Duration) as t, AnsweredBy'))
                          ->where('Direction','inbound')
                          ->groupBy('AnsweredBy')
                          ->get();
      $exotelbycust   = DB::table('exotel_calls')
                          ->select(DB::raw('count(customer_phone) as t, AnsweredBy'))
                          ->where('Direction','inbound')
                          ->groupBy('AnsweredBy')
                          ->get();
      $exoteltotcust  = exotel_calls::groupBy('customer_phone')->get();

      return view('admin.dashboard', compact('torders','tenquiry','exotel','exotelbyusers','exotelbycust','exoteltotcust'));
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
