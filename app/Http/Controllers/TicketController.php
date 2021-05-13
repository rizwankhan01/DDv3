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
          $captcha  = $request->input('captcha');
          $ans      = $request->input('ans');

          $to       = "info.doctordisplay@gmail.com, samervj@gmail.com";
          $subject  = "Contact Page Submission";
          $txt      = "Name: ".$name." | Phone: ".$phone." Message: ".$message;
          $headers  = "From: noreply@doctordisplay.in";
          if($captcha == $ans){

          //hubspot integration
          $hs_api_key = 'aa4d45d3-7213-4287-b1cc-b0ed645e2500';
          $hubSpot = \HubSpot\Factory::createWithApiKey($hs_api_key);

          //search if contact exists
          $filter = new \HubSpot\Client\Crm\Contacts\Model\Filter();
          $filter
              ->setOperator('EQ')
              ->setPropertyName('phone')
              ->setValue($phone);

          $filterGroup = new \HubSpot\Client\Crm\Contacts\Model\FilterGroup();
          $filterGroup->setFilters([$filter]);

          $searchRequest = new \HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest();
          $searchRequest->setFilterGroups([$filterGroup]);

          $contactsPage = $hubSpot->crm()->contacts()->searchApi()->doSearch($searchRequest);
          if(!empty($contactsPage['results'][0]['id'])){
            $contact_id = $contactsPage['results'][0]['id'];
          }
          if(empty($contact_id)){ //if empty create new contact
            $contactInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
            $contact_data = array(
          		"firstname" => $name,
          		"lname" => '',
          		"email" => '',
          		"phone" => $phone,
          		"message" => $message,
          		"code" => '',
          		"city" => '',
          		"radio1" => '',
          		"address" => '',
          		"totalsession" =>'',
          		"company" => ''
          	);
            $contactInput->setProperties($contact_data);
            $contact = $hubSpot->crm()->contacts()->basicApi()->create($contactInput);
            $contact_id = $contact['id'];
            //dd($contact_id); //test this
          }
            // creating new deal
            $dealInput = new \HubSpot\Client\Crm\Deals\Model\SimplePublicObjectInput();
            $deal_data = array(
              "dealname" => $message,
              "pipeline" => 'default',
              "dealstage" => 'appointmentscheduled',
            );
            $dealInput->setProperties($deal_data);
            $deal   = $hubSpot->crm()->deals()->basicApi()->create($dealInput);

            //creating association between contact and deal
            //$association_url = "https://api.hubapi.com/crm-associations/v1/associations?hapikey=".$hs_api_key;
            $association_url = "https://api.hubapi.com/crm/v3/objects/deals/".$deal['id']."/associations/Contacts/".$contact_id."/3?hapikey=".$hs_api_key;
            $association_data = array(
              "fromObjectId" => $deal['id'],
              "toObjectId" => $contact_id,
              "category" => "HUBSPOT_DEFINED",
              "definitionId" => 3
            );
            $ch = curl_init($association_url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $association_data);
            $response = curl_exec($ch);
            //dd(curl_getinfo($ch, CURLINFO_HTTP_CODE));
            //dd(json_decode($response, true));
            curl_close($ch);

            if(mail($to,$subject,$txt,$headers)){
              return redirect('/thankyou');
            }else{
              return abort(404);
            }
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
