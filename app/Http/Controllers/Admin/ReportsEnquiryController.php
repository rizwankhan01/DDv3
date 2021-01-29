<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enquiry;

class ReportsEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conv       = enquiry::where('created_at','LIKE', date('Y-m-')."%")->where('status','Converted')->count();
        $stock_unav = enquiry::where('created_at','LIKE', date('Y-m-')."%")->where('status','Stock Unavailable')->count();
        $not_int    = enquiry::where('created_at','LIKE', date('Y-m-')."%")->where('status','Not Interested')->count();
        $call_back  = enquiry::where('created_at','LIKE', date('Y-m-')."%")->where('status','Call Back')->count();
        $open  = enquiry::where('created_at','LIKE', date('Y-m-')."%")->whereNull('status')->count();
        $enquiries  = enquiry::where('created_at','LIKE', date('Y-m-')."%")->get();
        return view('admin.reportsenquiry', compact('enquiries','conv','stock_unav','not_int','call_back','open'));
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
        $month  = $request->input('month');
        $year   = $request->input('year');
        $filter = $year.$month;
        $conv       = enquiry::where('created_at','LIKE', $filter."%")->where('status','Converted')->count();
        $stock_unav = enquiry::where('created_at','LIKE', $filter."%")->where('status','Stock Unavailable')->count();
        $not_int    = enquiry::where('created_at','LIKE', $filter."%")->where('status','Not Interested')->count();
        $call_back  = enquiry::where('created_at','LIKE', $filter."%")->where('status','Call Back')->count();
        $open  = enquiry::where('created_at','LIKE', $filter."%")->whereNull('status')->count();
        $enquiries  = enquiry::where('created_at','LIKE', $filter."%")->get();
        return view('admin.reportsenquiry', compact('enquiries','conv','stock_unav','not_int','call_back','open'));
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
