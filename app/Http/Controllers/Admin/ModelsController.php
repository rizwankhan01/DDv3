<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\models;
use App\Models\brands;
use App\Models\old_feedbacks;
use App\Models\model_resources;

use App\Mail\EnquiryChaserMail;
use Mail;

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
        $models->big_description  = $request->input('big_description');
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
      if(!empty($request->input('update_resources'))){
        $model_resources = model_resources::where('model_id',$id)->first();
        if(!empty($model_resources->id)){
          $model_resources->model_id           = $id;
          $model_resources->screen_type        = $request->input('screen_type');
          $model_resources->screen_size        = $request->input('screen_size');
          $model_resources->screen_resolution  = $request->input('screen_resolution');
          $model_resources->screen_protection  = $request->input('screen_protection');
          $model_resources->fix_type           = $request->input('fix_type');
          $model_resources->screen_fixtype     = $request->input('screen_fixtype');
          $model_resources->release_date       = $request->input('release_date');
          $model_resources->production_status  = $request->input('production_status');
          $model_resources->tut_link           = $request->input('tut_link');
          $model_resources->buy_link           = $request->input('buy_link');
          $model_resources->phone_price        = $request->input('phone_price');
          $model_resources->display_type       = $request->input('display_type');
          $model_resources->display_size       = $request->input('display_size');
          $model_resources->display_resolution = $request->input('display_resolution');
          $model_resources->display_protection = $request->input('display_protection');
          $model_resources->colors             = $request->input('colors');
          $model_resources->fingerprint        = $request->input('fingerprint');
          $model_resources->indisplay_fingerprint  = $request->input('indisplay_fingerprint');
          $model_resources->company_display_price = $request->input('company_display_price');
          $model_resources->update();
        }else{
          $model_resources  = new model_resources;
          $model_resources->model_id           = $id;
          $model_resources->screen_type        = $request->input('screen_type');
          $model_resources->screen_size        = $request->input('screen_size');
          $model_resources->screen_resolution  = $request->input('screen_resolution');
          $model_resources->screen_protection  = $request->input('screen_protection');
          $model_resources->fix_type           = $request->input('fix_type');
          $model_resources->screen_fixtype     = $request->input('screen_fixtype');
          $model_resources->release_date       = $request->input('release_date');
          $model_resources->production_status  = $request->input('production_status');
          $model_resources->tut_link           = $request->input('tut_link');
          $model_resources->buy_link           = $request->input('buy_link');
          $model_resources->phone_price        = $request->input('phone_price');
          $model_resources->display_type       = $request->input('display_type');
          $model_resources->display_size       = $request->input('display_size');
          $model_resources->display_resolution = $request->input('display_resolution');
          $model_resources->display_protection = $request->input('display_protection');
          $model_resources->colors             = $request->input('colors');
          $model_resources->fingerprint        = $request->input('fingerprint');
          $model_resources->indisplay_fingerprint  = $request->input('indisplay_fingerprint');
            $model_resources->company_display_price = $request->input('company_display_price');
          $model_resources->save();
        }
        return redirect('/models')->with('status','Model Resource Updated Succesfully!');
      }else if(!empty($request->input('email'))){
        $model     = Models::where('id',$id)->first();
        $feedbacks = old_feedbacks::inRandomOrder()->limit(2)->get();
        Mail::to($request->input('email'))->send(new EnquiryChaserMail($model,$feedbacks));

        return redirect('/models')->with('status','Mail sent successully!');
      }else{
        //dd($request->input('big_description'));
        $models = models::findOrFail($id);
        $models->brand_id = $request->input('brand_id');
        $models->series = $request->input('series');
        $models->name = $request->input('name');
        if($request->hasFile('model_image')){
          $model_image  = explode('/',$request->file('model_image')->store('public'));
          $models->image  = $model_image[1];
        }
        $models->description = $request->input('description');
        $models->big_description  = $request->input('big_description');
        $models->meta_title  = $request->input('meta_title');
        $models->meta_description = $request->input('meta_description');
        $models->update();
        return redirect('/models')->with('status','Model Edited Successfully!');
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
      $models = models::findOrFail($id);
      unlink('storage/'.$models->image);
      $models->delete();
      return redirect('/models')->with('status','Deleted Successfully!');
    }
}
