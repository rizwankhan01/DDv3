<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enquiry;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries  = enquiry::where('status','!=','Duplicate')->where('status','!=','Not Interested')->get();
        return view('admin.enquiry', compact('enquiries'));
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
        $enquiry  = new enquiry;
        $enquiry->model_name  = $request->input('model_name');
        $enquiry->customer_name = $request->input('customer_name');
        $enquiry->phone_number  = $request->input('phone_number');
        $enquiry->city          = $request->input('city');
        $enquiry->save();

        return redirect('/thankyou');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enquiry  = enquiry::findOrFail($id);
        return view('admin.enquiry',compact('enquiry'));
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
        $enquiry  = enquiry::findOrFail($id);
        $enquiry->fdate = $request->input('fdate');
        $enquiry->status = $request->input('status');
        $enquiry->update();

        return redirect('/enquiry');
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
