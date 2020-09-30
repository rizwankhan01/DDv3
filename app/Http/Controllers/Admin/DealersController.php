<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dealers;

class DealersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dealers = dealers::all();
        return view('admin.dealers',compact('dealers'));
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
        $dealer = new dealers;
        $dealer->dealer_name  = $request->input('dealer_name');
        $dealer->phone_number = $request->input('phone_number');
        $dealer->address      = $request->input('address');
        $dealer->email        = $request->input('email');
        $dealer->save();
        return redirect('/dealers')->with('status','New Dealer created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dealer = dealers::findOrFail($id);
        return view('admin.dealers', compact('dealer'));
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
      $dealer = dealers::findOrFail($id);
      $dealer->dealer_name  = $request->input('dealer_name');
      $dealer->phone_number = $request->input('phone_number');
      $dealer->address      = $request->input('address');
      $dealer->email        = $request->input('email');
      $dealer->update();
      return redirect('/dealers')->with('status','Dealer updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dealer = dealers::findOrFail($id);
        $dealer->delete();
        return redirect('/dealers')->with('status','Dealer deleted Successfully!');
    }
}
