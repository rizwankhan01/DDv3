<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brands;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brands::orderBy('created_at','desc')->get();
        return view('admin.brands', compact('brands'));
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
        $brands = new brands;
        $brands->name = $request->input('name');
        $brand_image  = explode('/',$request->file('brand_image')->store('public'));
        $brands->brand_logo  = $brand_image[1];
        $brands->description = $request->input('description');
        $brands->meta_title  = $request->input('meta_title');
        $brands->meta_description = $request->input('meta_description');
        $brands->save();
        return redirect('/brands')->with('status','New Brand Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brands = brands::findOrFail($id);
        return view('admin.brands')->with('brand',$brands);
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
      $brands = brands::findOrFail($id);
      $brands->name = $request->input('name');
      if($request->hasFile('brand_image')){
      $brand_image  = explode('/',$request->file('brand_image')->store('public'));
      $brands->brand_logo  = $brand_image[1];
      }
      $brands->description = $request->input('description');
      $brands->meta_title  = $request->input('meta_title');
      $brands->meta_description = $request->input('meta_description');
      $brands->update();
      return redirect('/brands')->with('status','Brand Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $brands = brands::findOrFail($id);
      unlink('storage/'.$brands->brand_logo);
      $brands->delete();
      return redirect('/brands')->with('status','Deleted Successfully!');
    }
}
