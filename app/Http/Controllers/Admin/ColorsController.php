<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\colors;
use App\Models\models;
use App\Models\brands;
use App\Models\pricings;

class ColorsController extends Controller
{

    public function getseries($id){
      $series = models::where('brand_id',$id)->pluck('series','series');
      return json_encode($series);
    }

    public function getmodels($id){
      $models = models::where('series',$id)->pluck('name','id');
      return json_encode($models);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brands::all();
        $models = models::all();
        $colors = colors::all();
        return view('admin.colors', compact('models','colors','brands'));
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
      $colors = new colors;
      $colors->model_id = $request->input('model_id');
      $colors->name = $request->input('name');
      $colors->screen_color = $request->input('screen_color');
      $image  = explode('/',$request->file('image')->store('public'));
      $colors->image  = $image[1];
      $colors->save();
      $pricings = new pricings;
      $pricings->color_id = $colors->id;
      $pricings->save();
      return redirect('/modelcolors')->with('status','New Color Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $models  = models::all();
      $color   = colors::findOrFail($id);
      $pricing = pricings::where('color_id',$id)->first();
      $brands  = brands::all();
      return view('admin.colors', compact('models','color','pricing','brands'));
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
      $colors = colors::findOrFail($id);
      if(!empty($request->input('pricing'))){
        $pricing = pricings::where('color_id',$id)->first();
        $pricing->ord_selling_price       = $request->input('ord_selling_price');
        $pricing->org_selling_price       = $request->input('org_selling_price');
        $pricing->preferred_type          = $request->input('preferred_type');
        $pricing->ord_stock_availablity   = $request->input('ord_stock_availablity');
        $pricing->org_stock_availablity   = $request->input('org_stock_availablity');
        $pricing->ord_compare_description = $request->input('ord_compare_description');
        $pricing->org_compare_description = $request->input('org_compare_description');
        $pricing->update();
      }else{
        $colors->model_id = $request->input('model_id');
        $colors->name = $request->input('name');
        $colors->screen_color = $request->input('screen_color');
          if($request->hasFile('image')){
            $image  = explode('/',$request->file('image')->store('public'));
            $colors->image  = $image[1];
          }
      }
      $colors->update();
      return redirect('/modelcolors')->with('status','Color Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $colors = colors::findOrFail($id);
      if(file_exists('storage/'.$colors->image)){
        unlink('storage/'.$colors->image);
      }
      $colors->delete();
      $pricing = pricings::where('color_id',$id)->first();
      $pricing->delete();
      return redirect('/modelcolors')->with('status','Deleted Successfully!');
    }
}
