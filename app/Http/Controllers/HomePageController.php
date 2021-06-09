<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\closedorder;
use App\Models\models;
use App\Models\colors;
use App\Models\pricings;
use App\Models\order_lists;
use App\Models\brands;
use App\Models\old_feedbacks;
use Session;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = closedorder::whereNotNull('feedback')->get();
        $models    = models::inRandomOrder()->limit(10)->get();
        return view('welcome', compact('feedbacks','models'));
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
      $color = colors::findOrFail($request->input('color_id'));
      Session::put('color_id',$color->id);
      $models = models::where('id',$color->model_id)->first();
      $colors = colors::where('model_id',$models->id)->get();
      $pricing  = pricings::where('color_id',$color->id)->first();
      if(empty($pricing->id)){ return abort(500); }
      $orders = order_lists::where('color_id', $color->id)->where('prod_type','BASIC')->orWhere('prod_type','PREMIUM')->get();
      $otherbrands  = brands::where('name','!=', $models->brand->name)->get();
      $othermodels  = models::where('id','!=',$models->id)->where('brand_id',$models->brand_id)->inRandomOrder()->limit(8)->get();
      return view('product', compact('models','colors','color','pricing','orders','otherbrands','othermodels'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if(strpos($id,'-screen-service-center') !== false){
        $url    = explode('-',$id);
        //dd($url);
        $brands = brands::where('name', $url[0])->first();
        if(empty($brands->id)){ return abort(404); }
        $models = models::where('brand_id',$brands->id)->orderBy('id','asc')->get()->groupBy('series');
        return view('brand', compact('brands','models'));
      }else if(strpos($id,'screen-repair-')!== false){
        $url      = explode('-',$id);
        //dd($url);
        if(empty($url[4])){ return abort(404); }
        $models   = models::where('name', $url[4])->where('series',$url[3])->first();
        if(empty($models->id)){ return abort(404); }
        $colors   = colors::where('model_id', $models->id)->get();
        if(empty(auth()->user()->id)){
          if(empty(session::get('color_id'))){
            $color    = colors::where('model_id', $models->id)->first();
            Session::put('color_id', $color->id);
          }else{
            $color    = colors::where('id', session::get('color_id'))->first();
          }
        }else{
          $color    = colors::where('model_id', $models->id)->first();
          Session::put('color_id', $color->id);
        }
        if(empty($color->id)){ return abort(500); }
        $pricing  = pricings::where('color_id', $color->id)->first();
        $orders   = order_lists::where('color_id', $color->id)->where('prod_type','BASIC')->orWhere('prod_type','PREMIUM')->get();
        $otherbrands  = brands::where('name','!=', $models->brand->name)->get();
        $othermodels  = models::where('id','!=',$models->id)->where('brand_id',$models->brand_id)->inRandomOrder()->limit(8)->get();
        $reviews  = old_feedbacks::inRandomOrder()->limit(20)->get();

        return view('product', compact('models','colors','color','pricing','orders','otherbrands','othermodels','reviews'));
      }else{
        return abort(404);
      }
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
        //
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
