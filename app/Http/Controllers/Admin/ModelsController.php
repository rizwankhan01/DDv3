<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\models;
use App\Models\brands;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $models = models::orderBy('created_at','desc')->get();
      $brands = brands::all();
      return view('admin.models', compact('models','brands'));
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
      $models = new models;
      $models->brand_id = $request->input('brand_id');
      $models->series = $request->input('series');
      $models->name = $request->input('name');
      $model_image  = explode('/',$request->file('model_image')->store('public'));
      $models->image  = $model_image[1];
      $models->description = $request->input('description');
      $models->meta_title  = $request->input('meta_title');
      $models->meta_description = $request->input('meta_description');
      $models->save();
      return redirect('/models')->with('status','New Model Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $model = models::findOrFail($id);
      $brands = brands::all();
      return view('admin.models', compact('model','brands'));
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
      $models = models::findOrFail($id);
      $models->brand_id = $request->input('brand_id');
      $models->series = $request->input('series');
      $models->name = $request->input('name');
      if($request->hasFile('model_image')){
        $model_image  = explode('/',$request->file('model_image')->store('public'));
        $models->image  = $model_image[1];
      }
      $models->description = $request->input('description');
      $models->meta_title  = $request->input('meta_title');
      $models->meta_description = $request->input('meta_description');
      $models->update();
      return redirect('/models')->with('status','Model Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $models = models::findOrFail($id);
      unlink('storage/'.$models->image);
      $models->delete();
      return redirect('/models')->with('status','Deleted Successfully!');
    }
}
