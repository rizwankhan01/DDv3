<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\colors;
use App\Models\models;
use App\Models\pricings;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = models::all();
        $colors = colors::all();
        return view('admin.colors', compact('models','colors'));
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
      return view('admin.colors', compact('models','color','pricing'));
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
      unlink('storage/'.$colors->image);
      $colors->delete();
      $pricing = pricings::where('color_id',$id)->first();
      $pricing->delete();
      return redirect('/modelcolors')->with('status','Deleted Successfully!');
    }
}
