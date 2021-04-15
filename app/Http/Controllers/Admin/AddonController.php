<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addon_products;

class AddonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addons = addon_products::all();
        return view('admin.addon', compact('addons'));
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
      $addon = new addon_products;
      $addon->name = $request->input('name');
      $image  = explode('/',$request->file('image')->store('public'));
      $addon->image  = $image[1];
      $addon->description = $request->input('description');
      $addon->cost  = $request->input('cost');
      $addon->price = $request->input('price');
      $addon->save();
      return redirect('/addon')->with('status','New Addon Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $addon = addon_products::findOrFail($id);
      return view('admin.addon')->with('addon',$addon);
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
      $addon = addon_products::findOrFail($id);
      $addon->name = $request->input('name');
      if($request->hasFile('image')){
      $image  = explode('/',$request->file('image')->store('public'));
      $addon->image  = $image[1];
      }
      $addon->description = $request->input('description');
      $addon->cost  = $request->input('cost');
      $addon->price = $request->input('price');
      $addon->update();
      return redirect('/addon')->with('status','Addon Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $addon = addon_products::findOrFail($id);
      //unlink('storage/'.$brands->brand_logo);
      $addon->delete();
      return redirect('/addon')->with('status','Deleted Successfully!');
    }
}
