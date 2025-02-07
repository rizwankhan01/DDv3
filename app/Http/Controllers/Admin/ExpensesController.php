<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\expenses;
use App\User;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->user_type=='Admin'){
          $expenses = expenses::where('created_at','LIKE',date('Y-m-d').'%')->get();
        }else{
          $expenses = expenses::where('postedby',auth()->user()->id)
                              ->where('created_at','LIKE',date('Y-m-d').'%')
                              ->get();
        }
        return view('admin.expenses', compact('expenses'));
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
      if(!empty($request->input('from'))){
        $from   = $request->input('from');
        $to     = $request->input('to');
        if(auth()->user()->user_type=='Admin'){
          $expenses = expenses::whereBetween('created_at',[$from,$to])
                              ->get();
        }else{
          $expenses = expenses::where('postedby',auth()->user()->id)
                              ->whereBetween('created_at',[$from,$to])
                              ->get();
        }
        return view('admin.expenses', compact('expenses','from','to'));
      }else{
        $expense  = new expenses;
        $expense->reason = $request->input('reason');
        $expense->expenses = "-".$request->input('amount');
        $expense->pay_type  = $request->input('pay_type');
        $expense->postedby = auth()->user()->id;
        $expense->save();

        return redirect()->back()->with('status','New Expense added!');
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
        $expense  = expenses::findorFail($id);
        $expense->delete();
        return redirect()->back()->with('status','Deleted Successfully!');
    }
}
