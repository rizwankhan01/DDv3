<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_lists;
use App\Models\tickets;
use App\Models\dealers;
use App\User;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets  = tickets::all();
        return view('admin.tickets', compact('tickets'));
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
        $ticket = tickets::findOrFail($id);
        $model  = order_lists::where('order_id',$ticket->order_id)
                              ->where('prod_type','!=','ADDON')
                              ->where('prod_type','!=','COUPON')->first();
        $smen   = user::where('user_type','Service Man')->get();
        $dealers = dealers::all();
        return view('admin.tickets', compact('ticket','smen','model','dealers'));
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
        $ticket = tickets::findOrFail($id);
        $ticket->date_open    = $request->input('date_open');
        $ticket->issue        = $request->input('issue');
        $ticket->assigned_to  = $request->input('serviceman_id');
        $ticket->r_stock_dealer = $request->input('dealer_id');
        $ticket->r_stock_amount = $request->input('stock_amount');
        $ticket->status       = $request->input('status');
        $ticket->date_close = date('Y-m-d');
        $ticket->update();

        return redirect('/tickets');
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
