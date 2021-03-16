<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_lists;
use App\Models\tickets;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report');
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
        if(!empty($request->input('order_id'))){
          $order_id = $request->input('order_id');
          $order    = orders::where('id', $order_id)->where('status',3)->first();
          $olist    = order_lists::where('order_id', $order_id)->where('prod_type','!=','ADDON')->where('prod_type','!=','COUPON')->first();

          if(empty($order->id)){
            return redirect('/report')->with('status','Unable to find such order. Would you like to try again?');
          }else{
            return view('/report', compact('order','olist'));
          }
        }else if(!empty($request->input('message'))){
          $name     = $request->input('name');
          $phone    = $request->input('phone');
          $message  = $request->input('message');

          $to       = "info.doctordisplay@gmail.com, samervj@gmail.com";
          $subject  = "Contact Page Submission";
          $txt      = "Name: ".$name." | Phone: ".$phone." Message: ".$message;
          $headers  = "From: noreply@doctordisplay.in";
          if(mail($to,$subject,$txt,$headers)){
            return view('thankyou');
          }else{
            return abort(404);
          }
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
        $ticket  = new tickets;
        $ticket->order_id = $id;
        $ticket->issue  = $request->input('issue');
        $ticket->date_open  = $request->input('sdate');
        $ticket->status     = 0;
        $ticket->Save();

        $model_ord    = order_lists::where('order_id',$id)->where('prod_type','!=','COUPON')->where('prod_type','!=','ADDON')->first();
        $model        = $model_ord->color->model->brand->name." ".$model_ord->color->model->series." ".$model_ord->color->model->name."
        (".$model_ord->color->name.")";
        $order        = orders::findOrFail($id);

        //send mail to admin
        $to        = $order->customer->email.", order@doctordisplay.in";
        $subject   = "Ticket Created #".$ticket->id." | Doctor Display";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <order@doctordisplay.in>' . "\r\n";
        $message = "<img src='https://doctordisplay.in/images/logo-mail.png'><BR><br>
        Hello ".$order->customer->name.",<br>
        This email is to notify you that a ticket has been raised concerning your screen replacement order #".$id." of ".$model.".
        Our representative will be in touch with you shortly.<br><br>
        Your ticket number is #".$ticket->id.".<br><br>
        We apologize for any inconvenience this may have caused. If you have any queries, please reach out to 04446270777.
        ";

        mail($to,$subject,$message,$headers);
        // end of mail

        return redirect('/thankyou');
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
