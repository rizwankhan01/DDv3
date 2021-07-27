<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\dealers;
use App\Models\stocks;
use App\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class StockInHandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brands::all();
        $dealers = dealers::all();
        $stocks = stocks::all();
        $store_names  =  user::select('store_name')->whereNotNull('store_name')->groupby('store_name')->get();
        return view('warehouse.stockinhand', compact('brands','dealers','store_names','stocks'));
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
        $stocks = new stocks;
        $stocks->model_id   = $request->input('model_id');
        $stocks->item_name  = $request->input('item_name');
        $stocks->dealer_id  = $request->input('dealer_id');
        $stocks->cost       = $request->input('cost');
        $stocks->color      = $request->input('color');
        $stocks->quality    = $request->input('quality');
        $stocks->tested     = $request->input('tested');
        $stocks->store_name = $request->input('store_name');
        $stocks->posted_by  = auth()->user()->id;
        $stocks->payment_status = $request->input('payment_status');
        $stocks->payment_type   = $request->input('payment_type');
        $stocks->save();

        return redirect()->back();
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
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('STOCK'.$stock->id));
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
