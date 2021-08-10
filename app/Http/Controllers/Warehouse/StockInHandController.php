<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brands;
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
        $stocks = stocks::all();
        $brands = brands::all();
        $dealers = dealers::all();
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

        $code = random_int(100000, 999999);
        $sku  = "SKU".$code;
        $check = stocks::where('sku_code',$sku)->first();
        if(empty($check->id)){
          $stocks->sku_code = $sku;
        }else{
          $stocks->sku_code = "SKU".($code-1);
        }
        $stocks->save();
        //dd($stocks);
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
        $qr = explode('.', $id);
        if($qr[0]=='qr'){
          $id = $qr[1];
          $stock  = stocks::findOrFail($id);
          $pdf = \App::make('dompdf.wrapper');
          $pdf->setPaper(array(0,0,225,345));
          $modelname = $stock->model->brand->name." ".$stock->model->series." ".$stock->model->name;
          $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($stock->sku_code));
          $output = "<img src='data:image/png;base64, ".$qrcode."'><br><br>Item Name: ".$modelname."  ".$stock->item_name."<br>Color: ".$stock->color."<br>Quality: ".$stock->quality."<br>SKU: ".$stock->sku_code;
          $pdf->loadHTML($output);
          return $pdf->stream();
        }else{
          $stock = stocks::findOrFail($id);
          $brands = brands::all();
          $dealers = dealers::all();
          $store_names  =  user::select('store_name')->whereNotNull('store_name')->groupby('store_name')->get();
          return view('warehouse.stockinhand', compact('stock','brands','dealers','store_names'));
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
        $stock = stocks::findOrFail($id);
        $stock->payment_status =  $request->input('payment_status');
        $stock->payment_type   =  $request->input('payment_type');
        $stock->update();

        return redirect()->back()->with('status','Payment Status Updated Successfully!');
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
