<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brands;
use App\Models\dealers;
use App\Models\stocks;
use App\User;
use Carbon\Carbon;

class StoreTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $brands = brands::all();
      $dealers = dealers::all();
      $stocks = stocks::all();
      $store_names  =  user::select('store_name')->whereNotNull('store_name')->groupby('store_name')->get();
      return view('warehouse.storetransfer', compact('brands','dealers','store_names','stocks'));
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
        $stock = stocks::findOrFail($id);
        //dd($stock);
        $stock->store_name = $request->input('store_name');
        $stock->transfer_cost = $request->input('transfer_cost');
        $stock->transfered_by = auth()->user()->id;
        $stock->transfered_at = Carbon::now()->toDateTimeString();
        if($request->hasFile('lr_image')){
          $lr_image  = explode('/',$request->file('lr_image')->store('public'));
          $stock->lr_image  = $lr_image[1];
        }
        $stock->update();
        return redirect()->back();
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
