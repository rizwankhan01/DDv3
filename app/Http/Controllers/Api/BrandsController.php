<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brands;
use App\Http\Resources\BrandsResource;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $brands = brands::orderBy('created_at','desc')->paginate(6);
      return BrandsResource::collection($brands);
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
        $brand = new brands;
        $brand->name              = $request->input('name');
        $brand_logo               = explode('/',$request->file('brand_logo')->store('public'));
        $brand->brand_logo        = $brand_logo[1];
        $brand->description       = $request->input('description');
        $brand->meta_title        = $request->input('meta_title');
        $brand->meta_description  = $request->input('meta_description');

        if($brand->save()){
          return new BrandsResource($brand);
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
        $brand = brands::findOrFail($id);
        return new BrandsResource($brand);
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
        $brand = brands::findOrFail($id);
        $brand->name              = $request->input('name');
        $brand->description       = $request->input('description');
        $brand->meta_title        = $request->input('meta_title');
        $brand->meta_description  = $request->input('meta_description');

        if($brand->update()){
          return new BrandsResource($brand);
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
        $brand = brands::findOrFail($id);
        if($brand->delete()){
          return new BrandsResource($brand);
        }
    }
}
