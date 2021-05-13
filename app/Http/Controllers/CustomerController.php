<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use App\Models\colors;
use App\Models\enquiry;
use App\Models\models;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          $check        = customers::where('phone_number',$request->input('phone'))->first();

          $color_id     = $request->input('color_id');
          $color        = colors::findOrFail($color_id);
          $select_model = models::where('id',$color->model_id)->first();
          //dd($select_model);
          $model    = $select_model->name;
        if(empty($check->id)){ // checking if phone number already exists
          $customer = new customers();
          $customer->phone_number = $request->input('phone');
          $customer->ga_id        = $request->input('ga_id');
          $customer->otp          = rand(1111,9999);
          $customer->save();
          $cus_id   = $customer->id;

          $enquiry  = new enquiry;
          $enquiry->model_name  = $color->model->brand->name." ".$color->model->series." ".$model." ".$color->name;
          $enquiry->customer_id = $customer->id;
          $enquiry->url       = "screen-repair-".$color->model->brand->name."-".$color->model->series."-".$model;
          $enquiry->save();
        }else{
          $cus_id   = $check->id;

          $enquiry  = new enquiry;
          $enquiry->model_name  = $color->model->brand->name." ".$color->model->series." ".$model." ".$color->name;
          $enquiry->customer_id = $cus_id;
          $enquiry->url         = "screen-repair-".$color->model->brand->name."-".$color->model->series."-".$model;
          $enquiry->save();
        }

        //hubspot integration
        $hs_api_key = 'aa4d45d3-7213-4287-b1cc-b0ed645e2500';
        $hubSpot = \HubSpot\Factory::createWithApiKey($hs_api_key);

        //search if contact exists
        $filter = new \HubSpot\Client\Crm\Contacts\Model\Filter();
        $filter
            ->setOperator('EQ')
            ->setPropertyName('phone')
            ->setValue($request->input('phone'));

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
            "firstname" => "AC",
            "lname" => '',
            "email" => '',
            "phone" => $request->input('phone'),
            "message" => '',
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
            "dealname" => $color->model->brand->name." ".$color->model->series." ".$model." ".$color->name,
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

          Session::put('enq_id',$enquiry->id);
          Session::put('cus_id', $cus_id);
          Session::put('color_id',$color_id);
            return redirect('screen-repair-'.$color->model->brand->name.'-'.$color->model->series.'-'.$model);
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
        //
    }
}
