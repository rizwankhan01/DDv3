<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dealers;
use App\Http\Resources\DealersResource;

class DealersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dealers = dealers::orderBy('created_at','desc')->paginate(6);
      return DealersResource::collection($dealers);
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
        $dealer->email        = $request->input('email');
        $dealer->address      = $request->input('address');

        if($dealer->save()){
          return new DealersResource($dealer);
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
      $dealer = dealers::findOrFail($id);
      return new DealersResource($dealer);
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
          $dealer->email        = $request->input('email');
          $dealer->address      = $request->input('address');

          if($dealer->update()){
            return new DealersResource($dealer);
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
        $dealer = dealers::findOrFail($id);
        if($dealer->delete()){
          return new DealersResource($dealer);
        }
    }
}
