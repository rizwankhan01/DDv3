<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enquiry;
use App\Models\customers;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries  = enquiry::whereNull('status')->get();
        $open       = enquiry::whereNull('status')->count();
        $callback   = enquiry::where('status','Call Back')->count();

        return view('admin.enquiry', compact('enquiries','callback','open'));
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
        if(!empty($request->input('filter'))){
          $status = $request->input('filter');
          $callback   = enquiry::where('status','Call Back')->count();
          $open       = enquiry::whereNull('status')->count();
          if($status=='open'){
            $enquiries  = enquiry::whereNull('status')->get();
            return view('admin.enquiry', compact('enquiries','callback','open'));
          }else if($status=='Call Back'){
            $enquiries  = enquiry::where('status','Call Back')->get();
            return view('admin.enquiry', compact('enquiries','callback','open'));
          }else{
            $enquiries  = enquiry::whereNotNull('status')->where('status','!=','Call Back')->get();
            return view('admin.enquiry', compact('enquiries','callback','open'));
          }
        }else{
        $check    = customers::where('phone_number', $request->input('phone_number'))->first();
        if(empty($check->id)){
          $customer = new customers;
          $customer->name = $request->input('customer_name');
          $customer->phone_number = $request->input('phone_number');
          $customer->ga_id        = $request->input('ga_id');
          $customer->save();

          $enquiry  = new enquiry;
          $enquiry->model_name  = $request->input('model_name');
          $enquiry->customer_id = $customer->id;
          $enquiry->city        = $request->input('city');
        }else{
          $enquiry  = new enquiry;
          $enquiry->customer_id = $check->id;
          $enquiry->model_name  = $request->input('model_name');
          $enquiry->city        = $request->input('city');
        }
          $enquiry->save();
          //enquiry mail
          $to        = "order@doctordisplay.in";
          $subject   = "Enquiry Alert | Doctor Display";
          $headers   = "MIME-Version: 1.0" . "\r\n";
          $headers  .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers  .= 'From: <order@doctordisplay.in>' . "\r\n";

          $message   = "<img src='http://doctordisplay.in/img/logo/logo-mail.png'><BR><br>
          Hello there!<Br>
          We have a new enquiry for the model ".$request->input('model_name')." by ".$request->input('customer_name')." (".$request->input('phone_number').").
          Kindly login to your dashboard to know more.<BR><BR>
          Regards,<br>
          Doctor Display
          ";
          mail($to,$subject,$message,$headers);
          //end enquiry mail

          //hubspot integration
          $hs_api_key = 'aa4d45d3-7213-4287-b1cc-b0ed645e2500';
          $hubSpot = \HubSpot\Factory::createWithApiKey($hs_api_key);

          //search if contact exists
          $filter = new \HubSpot\Client\Crm\Contacts\Model\Filter();
          $filter
              ->setOperator('EQ')
              ->setPropertyName('phone')
              ->setValue($request->input('phone_number'));

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
          		"firstname" => $request->input('customer_name'),
          		"lname" => '',
          		"email" => '',
          		"phone" => $request->input('phone_number'),
          		"message" => '',
          		"code" => '',
          		"city" => $request->input('city'),
          		"radio1" => '',
          		"address" => '',
          		"totalsession" =>'',
          		"company" => ''
          	);
            $contactInput->setProperties($contact_data);
            $contact = $hubSpot->crm()->contacts()->basicApi()->create($contactInput);
            $contact_id = $contact['id'];
            //dd($contact_id); //test this
          }else{
            // creating new deal
            $dealInput = new \HubSpot\Client\Crm\Deals\Model\SimplePublicObjectInput();
            $deal_data = array(
              "dealname" => $request->input('model_name'),
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
          }


        return redirect('/thankyou');
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
        $enquiry  = enquiry::findOrFail($id);
        return view('admin.enquiry',compact('enquiry'));
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
        $enquiry            = enquiry::findOrFail($id);
        $enquiry->fdate     = $request->input('fdate');
        $enquiry->status    = $request->input('status');
        $enquiry->notes     = $request->input('notes');
        $enquiry->city      = $request->input('locality');
        $enquiry->update();

        $customer           = customers::findOrFail($request->input('customer_id'));
        $customer->name      = $request->input('customer_name');
        $customer->update();

        return redirect('/enquiry');
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
