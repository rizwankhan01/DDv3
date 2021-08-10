<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brands;
use App\Models\dealers;
use App\Models\stocks;
use App\User;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class StoreTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stocks = stocks::where('store_name',auth()->user()->store_name)->get();
      return view('admin.storetransfer', compact('stocks'));
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
        $stock  = stocks::findOrFail($id);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper(array(0,0,225,345));
        $modelname = $stock->model->brand->name." ".$stock->model->series." ".$stock->model->name;
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($stock->sku_code));
        $output = "<img src='data:image/png;base64, ".$qrcode."'><br><br>Item Name: ".$modelname."  ".$stock->item_name."<br>Color: ".$stock->color."<br>Quality: ".$stock->quality;
        $pdf->loadHTML($output);
        return $pdf->stream();
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
        if(!empty($request->input('reason'))){
          $stock->notes = $request->input('reason');
          $stock->returned_by = auth()->user()->id;
          $stock->returned_at = Carbon::now()->toDateTimeString();
          $stock->store_name = '';
          if($request->hasFile('stock_image')){
            $stock_image  = explode('/',$request->file('stock_image')->store('public'));
            $stock->stock_image  = $stock_image[1];
          }
        }else{
          if($request->input('transfer')=='Accept'){
            $stock->approved_by = auth()->user()->id;
            $stock->approved_at = Carbon::now()->toDateTimeString();
          }else if($request->input('transfer')=='Reject'){
            $stock->store_name  = '';
            $stock->transfered_by = '';
            $stock->transfered_at = '';
          }
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
