<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\closedorder;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(403);
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
        $feedback = closedorder::where('order_id',$id)->first();
        if(empty($feedback->id)){
          return redirect(403);
        }else if(!empty($feedback->id) AND !empty($feedback->feedback)){
          $status = "You have already submitted your feedback for this order! If you still have any discrepancies, you can reach us at order@doctordisplay.in or 04446270777";
          return view('feedback')->with('status', $status);
        }else if(!empty($feedback->id) AND empty($feedback->feedback)){
          return view('feedback', compact('feedback'));
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
        $feedback = closedorder::where('order_id',$id)->first();
        $feedback->rate1  = $request->input('rate1');
        $feedback->rate2  = $request->input('rate2');
        $feedback->rate3  = $request->input('rate3');
        $feedback->rate4  = $request->input('rate4');
        $feedback->rate5  = $request->input('rate5');
        $feedback->rate6  = $request->input('rate6');
        $feedback->rate7  = $request->input('rate7');
        $feedback->rate8  = $request->input('rate8');
        $feedback->rate9  = $request->input('rate9');
        $feedback->feedback = $request->input('custfeed');
        $feedback->update();

        $status=  "Thanks for your valuable feedback! If you still have any discrepancies, you can reach us at order@doctordisplay.in or 04446270777";
        return view('feedback')->with('status', $status);
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
