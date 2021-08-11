<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city_areas;
use App\Models\tempered_glass_orders;
use App\Models\old_feedbacks;
use Session;
use Spatie\Referer\Referer;

class TemperedGlassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas  = city_areas::where('city', Session::get('city'))->get();
        $reviews      = old_feedbacks::whereNotNull('brand_id')->inRandomOrder()->limit(6)->get();
        return view('temperedglass', compact('areas','reviews'));
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
        $neworder                   =   new tempered_glass_orders;
        $neworder->model            =   $request->input('model');
        $neworder->name             =   $request->input('name');
        $neworder->phone_number     =   $request->input('mobile_number');
        $neworder->address          =   $request->input('address');
        $neworder->city             =   $request->input('city');
        $neworder->referer          = app(Referer::class)->get();

        if($neworder->save()){
            return redirect('/thankyou')->with('status','Tempered Glass');
        }else{
            return redirect('/404');
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
