<?php

namespace App\Http\Controllers\Serviceman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\closedorder;
use App\Models\orders;
use App\Models\addresses;
use App\Models\order_lists;
use App\Models\addon_products;
use PDF;

class MyOrdersController extends Controller
{
    public function preimage(Request $request, $id)
    {
        $corder     = closedorder::where('order_id',$id)->first();
        $pre_image  = explode('/',$request->file('pre-image')->store('public'));
        $corder->pre_image  = $pre_image[1];
        $corder->order_id   = $id;
        $corder->update();

        return redirect()->back();
    }

    public function start_tracking(Request $request, $id)
    {
      $corder     = new closedorder;
      $corder->order_id   = $id;
      $corder->start_timestamp  = date('Y-m-d H:i:s');
      $corder->save();

      $order = orders::findOrFail($id);
      $model_ord    = order_lists::where('order_id',$id)->where('prod_type','!=','COUPON')->where('prod_type','!=','ADDON')->first();
      $model        = $model_ord->color->model->brand->name." ".$model_ord->color->model->series." ".$model_ord->color->model->name."
      (".$model_ord->color->name.")";
      $address      = addresses::where('customer_id',$order->customer->id)->first();
      // technician on his way mail
      $to        = $order->customer->email.", order@doctordisplay.in";
      $subject   = "Serviceman on his way  #".$id." | Doctor Display";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: <order@doctordisplay.in>' . "\r\n";

      $message = "<img src='http://doctordisplay.in/img/logo/logo-mail.png'><br><br>
      Hello ".$order->customer->name.",<br>
      Doctor Display here. Your technician ".auth()->user()->name." is on the way to your location with your brand new ".$model." display.
      To ensure a smooth repair experience, please be ready for our technician during the time scheduled.
      If you need to reach ".auth()->user()->name.", you may call ".auth()->user()->primary_phone.".<br><br>
      Appointment details<br>
      Date: ".$order->slot_date."<br>
      Time: ".$order->slot_time."<br>
      Location: ".$address->address.", ".$address->area.", ".$address->city." - ".$address->pincode."<br><br>
      Service Requirements<br>
      - Doctor Display practices social distancing on every order we complete. Please follow the guidelines to ensure a safe experience.<br>
      - Provide the technician sufficient space for service. The ideal space is a table & chair in close proximity to a power socket.<br><br>
      If there’s anything you need, just call us at ".auth()->user()->primary_phone." and we’ll help right away.<br><br>
      Regards,<br>
      Doctor Display
      ";
      mail($to,$subject,$message,$headers);
      //end of mail

      return redirect()->back();
    }

    public function addonproduct(Request $request, $id)
    {
      if($request->input('del')=='delete'){
        $addon = order_lists::findOrFail($id);
        //dd($addon);
        $addon->delete();
      }else{
        $getaddon=  addon_products::findOrFail($request->input('addonproduct'));
        $check  = order_lists::where('order_id', $id)
                              ->where('prod_type','ADDON')
                              ->where('color_id', $request->input('addonproduct'))
                              ->first();
        if(empty($check->id)){
          $addon            = new order_lists;
          $addon->order_id  = $id;
          $addon->color_id  = $request->input('addonproduct');
          $addon->price     = $getaddon->price;
          $addon->prod_type = 'ADDON';
          $addon->save();
        }
      }
      return redirect()->back();
    }

    public function completeorder(Request $request, $id)
    {
      $corder     = closedorder::where('order_id',$id)->first();
      $post_image = explode('/',$request->file('post-image')->store('public'));
      $corder->post_image = $post_image[1];
      $corder->imei = $request->input('imei');
      $corder->payment_type = $request->input('payment_type');
      $corder->company_name = $request->input('company_name');
      $corder->company_gst  = $request->input('company_gst');
      $corder->company_address  = $request->input('company_address');
      $corder->notes          = $request->input('notes');
      $corder->end_timestamp  = date('Y-m-d H:i:s');
      $corder->update();

      $order  = orders::findOrFail($id);
      if($request->input('tg')=='Yes'){
        $check =  order_lists::where('order_id',$id)->where('prod_type','ADDON')->first();
        if(empty($check->id)){
          $addon = new order_lists;
          $addon->order_id = $id;
          $addon->color_id = 1;
          $addon->price = 99;
          $addon->prod_type = 'ADDON';
          $addon->save();
        }
      }else{
          $addon = order_lists::where('order_id',$id)->where('prod_type','ADDON')->first();
          if(!empty($addon->id)){
            $addon->delete();
          }
      }
      $order->status  = 3;
      $order->update();


      //send mail and invoice to customer
      $order_list = order_lists::where('order_id',$order->id)->get();
      $pdf = \App::make('dompdf.wrapper');
      $output = "
      <body style='font-family:sans-serif'>
      <center><h3>TAX INVOICE</h3></center><hr>
      <div style='width:100%;height:300px;'>
      <div style='float:left;font-size:14px;'><br><br>
      <img src='http://doctordisplay.in/img/logo/logo-mail.png'><br><br>
      Invoice Number: ".$id."<br>
      Invoice Date: ".date('d-m-Y',strtotime($order->updated_at))."<br>
      Invoice Time: ".date('H:i',strtotime($order->updated_at))."<br>
      Date of Booking: ".date('d-m-Y',strtotime($order->slot_date))."<br>
      </div>
      <div style='float:right;font-size:14px;'><br><br>
      <b>Doctor Display Services</b><br>
      128, Radhakrishnan Salai,<br>
      Mylapore,<br>
      Chennai, Tamil Nadu 600014, India<br>
      04446270777 | order@doctordisplay.in<br><br>
      <b>Bill To</b><Br>
      ".$order->customer->name."<br>
      ".$order->customer->address->address."<br>
      ".$order->customer->address->area."<br>
      ".$order->customer->address->city." - ".$order->customer->address->pincode."
      </div>
      </div>
      <table style='width:100%;font-size:14px;'>
      <tr style='background:#FDC101;padding:15px;'><th>#</th><th>Item & Description</th><th>Amount</th></tr>";
      foreach($order_list as $list){
        if($list->prod_type=='BASIC' || $list->prod_type=='PREMIUM'){
          $product = $list->color->model->brand->name." ".$list->color->model->series." ".$list->color->model->name." ".$list->color->name;
        }else if($list->prod_type=='ADDON'){
          $product = 'Tempered Glass';
        }else if($list->prod_type=='COUPON'){
          $product = "Coupon Code: ".$list->coupon->name;
        }
      $output .= "<tr><td></td><td>".$product."</td><td>".$list->price." INR</td></tr>";
      }
      $output .= "<tr><td></td><td></td><td>".$order_list->sum('price')." INR</td>";
      $no = round($order_list->sum('price'));
      $point = round($order_list->sum('price') - $no, 2) * 100;
      $hundred = null;
      $digits_1 = strlen($no);
      $i = 0;
      $str = array();
      $words = array('0' => '', '1' => 'One', '2' => 'Two',
      '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
      '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
      '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
      '13' => 'Thirteen', '14' => 'Fourteen',
      '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
      '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
      '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
      '60' => 'Sixty', '70' => 'Seventy',
      '80' => 'Eighty', '90' => 'Ninety');
      $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
      while ($i < $digits_1) {
      $divider = ($i == 2) ? 10 : 100;
      $number = floor($no % $divider);
      $no = floor($no / $divider);
      $i += ($divider == 10) ? 1 : 2;
      if ($number) {
      $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
      $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
      $str [] = ($number < 21) ? $words[$number] .
      " " . $digits[$counter] . $plural . " " . $hundred
      :
      $words[floor($number / 10) * 10]
      . " " . $words[$number % 10] . " "
      . $digits[$counter] . $plural . " " . $hundred;
      } else $str[] = null;
      }
      $str = array_reverse($str);
      $result = implode('', $str);
      $points = ($point) ?
      "." . $words[$point / 10] . " " .
      $words[$point = $point % 10] : '';

      $inwords    =   "Total in words:<br>".$result . "Rupees";
      if($order->customer->address->city=='Chennai'){
        $state = "Tamil Nadu";
      }else{
        $state = "Karnataka";
      }
      $output .= "
      </table><br>
      <span style='float:right;font-size:14px;'>".$inwords."</span>
      <br><br><br><br><br>
      <p style='font-size:14px;'>
      <b>Notes:</b><br>
      This is system generate invoice, Hence signature or stamp is not required.<br>
      All disputes are subjected to ".$state." Jurisdiction.<br>
      Thanks for your business.<br>
      From the date of order completion the product will have a replacement warranty for 90 days for premium and 30 days for basic screens.<br><br><br><br><br>
      <b>Declaration:</b>
      We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct!
      </p>
      </body>
      ";
      $pdf->loadHTML($output);


      $model_ord    = order_lists::where('order_id',$id)->where('prod_type','!=','COUPON')->where('prod_type','!=','ADDON')->first();
      $model        = $model_ord->color->model->brand->name." ".$model_ord->color->model->series." ".$model_ord->color->model->name."
      (".$model_ord->color->name.")";
      $to        = $order->customer->email.", order@doctordisplay.in";
      $from      = "order@doctordisplay.in";
      $subject   = "Order Completed #".$id." | Doctor Display";
      $message = "<img src='http://doctordisplay.in/img/logo/logo-mail.png'><BR><br>
                  Hello ".$order->customer->name.",<br>
                  Phone Model: ".$model."<br>
                  IMEI No.: ".$corder->imei."<br>
                  Service attended by: ".$order->serviceman->name."<br>
                  Total Price: INR ".$order_list->sum('price')."<Br>
                  Hope you are happy with the service! Attached is the invoice for your Order ID. #".$order->id.".
                  For any concerns, Kindly write to us at order@doctordisplay.in or call us at 04446270777.<br><br>
                  If you have a second, please let us know how we did. As a growing company, your feedback is essential to our success.<br><br>
                  Fill it out <a href='www.doctordisplay.co.in/feedback/".$order->id."'>here</a> and get a discount on your next order!<br><br>
                  Thank you for choosing Doctordisplay.in!
                  ";
      // a random hash will be necessary to send mixed content
      $separator = md5(time());

      // carriage return type (we use a PHP end of line constant)
      $eol = PHP_EOL;

      // attachment name
      $filename = "Invoice.pdf";

      // encode data (puts attachment in proper format)
      $pdfdoc = $pdf->Output("", "S");
      $attachment = chunk_split(base64_encode($pdfdoc));

      // main header
      $headers  = "From: ".$from.$eol;
      $headers .= "MIME-Version: 1.0".$eol;
      $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

      // no more headers after this, we start the body! //

      $body = "--".$separator.$eol;
      $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;

      // message
      $body .= "--".$separator.$eol;
      $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
      $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
      $body .= $message.$eol;

      // attachment
      $body .= "--".$separator.$eol;
      $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
      $body .= "Content-Transfer-Encoding: base64".$eol;
      $body .= "Content-Disposition: attachment".$eol.$eol;
      $body .= $attachment.$eol;
      $body .= "--".$separator."--";

      //send message
      mail($to, $subject, $body, $headers);

      //end of mail

      return redirect()->back();
    }

    public function pickup(Request $request, $id)
    {
      $order  = orders::findOrFail($id);
      $order->pickup_reason = $request->input('pickup_reason');
      $order->update();
      //send mail to customer
      return redirect()->back();
    }
}
