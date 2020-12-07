@extends('layouts.master')
@section('title') Confirm Order | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--100 pt_md--250 pt_sm--80 bg_image--8 breadcaump-title-bar breadcaump-title-white">
</div>
@endsection
@section('pagecontent')
<main class="page-content">
<!--<div class="modal fade" id="slot" tabindex="-1" role="dialog" aria-labelledby="slotLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body">
<center>
<h5 class="modal-title" id="slotLabel">When should we come to fix your phone?</h5>
</center><br>
<ul class="nav nav-tabs lead mb-4 justify-content-between align-items-end" id="myTab-4" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="home-tab-4" data-toggle="tab" href="#slot1" role="tab" aria-controls="home" aria-selected="true">13 Sat</a>
</li>
<li class="nav-item">
<a class="nav-link" id="profile-tab-4" data-toggle="tab" href="#slot2" role="tab" aria-controls="profile" aria-selected="false">14 Sun</a>
</li>
<li class="nav-item">
<a class="nav-link" id="contact-tab-4" data-toggle="tab" href="#slot3" role="tab" aria-controls="contact" aria-selected="false">15 Mon</a>
</li>
<li class="nav-item hidden-xs">
<a class="nav-link" id="contact-tab-4" data-toggle="tab" href="#slot4" role="tab" aria-controls="contact" aria-selected="false">16 Tue</a>
</li>
</ul>
<div class="tab-content flex-grow-1 mt-3 mt-md-4" id="myTabContent-4">
<div class="tab-pane fade show active" id="slot1" role="tabpanel" aria-labelledby="home-tab-4">
<div class="card">
<div class="card-body row">
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
</div>
</div>
</div>
<div class="tab-pane fade" id="slot2" role="tabpanel" aria-labelledby="profile-tab-4">
<div class="card">
<div class="card-body row">
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
</div>
</div>
</div>
<div class="tab-pane fade" id="slot3" role="tabpanel" aria-labelledby="contact-tab-4">
<div class="card">
<div class="card-body row">
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
</div>
</div>
</div>
<div class="tab-pane fade" id="slot4" role="tabpanel" aria-labelledby="contact-tab-4">
<div class="card">
<div class="card-body row">
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
<button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>-->
<div class="cart_area pt--60">
<div class="container">
<div class="row">
<div class="col-12">
<div class="cart-table table-responsive mb--40 hidden-xs">
<table class="table">
<thead>
<tr>
<th class="pro-thumbnail">Image</th>
<th class="pro-title">Product</th>
<th class="pro-price">Price</th>
</tr>
</thead>
<tbody>
@foreach($olist as $list)
@if($list->prod_type=='COUPON')
  <tr>
    <td></td>
    <td class="pro-title"><a href='#'>{{ $list->coupon->name }} - Coupon Code</a></td>
    <td class="pro-price"><span>&#8377; - {{ abs($list->price) }}</span></td>
  </tr>
@elseif($list->prod_type=='ADDON')
  <tr>
    <td class="pro-thumbnail"><a href="#">
      <img src="{{ URL::asset('img/tg.jpg') }}" alt="Product"></a></td>
    <td class="pro-title"><a href="#">{{ $list->addonproduct->name }}</a></td>
    <td class="pro-price"><span>&#8377; {{ $list->price }}</span></td>
  </tr>
@elseif($list->prod_type!='COUPON' AND $list->prod_type!='ADDON')
  <tr>
    <td class="pro-thumbnail"><a href="#"><img src="storage/{{ $list->color->image }}"></a></td>
    <td class="pro-title"><a href="#">{{ $list->color->model->name }} ({{ $list->color->name }}) - {{ $list->prod_type }}</a></td>
    <td class="pro-price"><span>&#8377; {{ $list->price }}</span></td>
  </tr>
@endif
@endforeach
</tbody>
</table>
</div>

<div class="row">
<div class="checkout_area">
<div class="container">
<div class="row">
<div class="col-12">
<!-- Checkout Form s-->
<form action="/confirmorder/{{ $order->id }}" method="post" class="checkout-form">
  {{ csrf_field() }}
  {{ method_field('put') }}
<div class="row">
<div class="col-lg-7 mb--20">
<!-- Billing Address -->
<div id="billing-form" class="mb--40">
<h4 class="checkout-title">Billing Address</h4>
<div class="row">
<div class="col-md-12 col-12 mb--20">
<label>Full Name*</label>
<input type="text" placeholder="Full Name" name="name" value="{{ $customer->name }}" required>
</div>
<div class="col-md-6 col-12 mb--20">
<label>Email Address*</label>
<input type="email" placeholder="Email Address" name="email" value="{{ $customer->email }}" required>
</div>
<div class="col-md-6 col-12 mb--20">
<label>Phone no*</label>
<input type="number" placeholder="Phone number" maxlength="10" name="phone" value="{{ $customer->phone_number }}" required>
</div>
<div class="col-12 mb--20">
<label>Address*</label>
<input type="text" placeholder="Address" name='address' required value="@if(!empty($customer->address->address)){{ $customer->address->address }}@endif">
</div>
<div class="col-md-4 col-12 mb--20">
<label>Area*</label>
<select class="nice-select" name='area' required>
<option value=''>Select Area</option>
@foreach($areas as $area)
<option value='{{$area->area}}' @if(!empty($customer->address->area) && $customer->address->area==$area->area){{ 'selected' }} @endif>{{$area->area}}</option>
@endforeach
</select>
</div>
<div class="col-md-4 col-12 mb--20">
<label>Pin Code*</label>
<input type="number" placeholder="Pin Code" name='pincode' value='@if(!empty($customer->address->pincode)){{ $customer->address->pincode }}@endif' required>
</div>

<div class="col-md-4 col-12 mb--20">
<label>Town/City*</label>
<input type="text" placeholder="Town/City" name='city' value='@if(!empty($customer->address->city)){{ $customer->address->city }}@endif' required>
</div>
<div class="col-md-6 col-6 mb--20">
<label>Date*</label>
<input type="date" name="date" min="{{ date('Y-m-d',strtotime('now')) }}" max="{{ date('Y-m-d',strtotime('+1 week')) }}" required>
</div>
<div class="col-md-6 col-6 mb--20">
<label>Time Slot*</label>
<select name="time_slot" class="nice-select" required>
  <option value="">Select Slot</option>
  <option value='10:00AM to 11:30AM'>10:00AM to 11:30AM</option>
  <option value='11:30AM to 01:00PM'>11:30AM to 01:00PM</option>
  <option value='02:00PM to 03:30PM'>02:00PM to 03:30PM</option>
  <option value='03:30PM to 05:00PM'>03:30PM to 05:00PM</option>
  <option value='05:00PM to 06:30PM'>05:00PM to 06:30PM</option>
  <option value='06:30PM to 08:00PM'>06:30PM to 08:00PM</option>
  <option value='08:30PM to 10:00PM'>08:30PM to 10:00PM</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-lg-5">
<div class="row">
<!-- Cart Total -->
<div class="col-12 mb--60">
<h4 class="checkout-title">Cart Total</h4>
<div class="checkout-cart-total">
<h4>Product <span>Total</span></h4>
<ul>
@foreach($olist as $list)
@if($list->prod_type=='COUPON')
  <li>{{$list->coupon->name}} - COUPON <span>- &#8377; {{ abs($list->price )}}</span></li>
@elseif( $list->prod_type=='ADDON' )
  <li>{{ $list->addonproduct->name }} <span>&#8377; {{ $list->price }}</span></li>
@elseif($list->prod_type!='COUPON' AND $list->prod_type!='ADDON')
  <li>{{$list->color->model->name}} ({{$list->color->name }})<br class="hidden-md"> {{ $list->prod_type }} <span>&#8377; {{ $list->price }}</span></li>
@endif
@endforeach
</ul>
<br>
<h4>Grand Total <span>&#8377; {{ $olist->sum('price') }}</span></h4>
<small>Payable at the time of appointment</small>
</div>
@if(session('success'))
<div class="message-box bg_cat--3 mt--30 move-up wow">
    <div class="icon"><i class="fas fa-check-circle"></i></div>
    <div class="content">{{ session('success') }}</div>
</div>
@endif
@if(session('failure'))
<div class="message-box bg_cat--2 mt_md--30 mt_sm--30 move-up wow">
    <div class="icon"><i class="fas fa-bell"></i></div>
    <div class="content">{{ session('failure') }}</div>
</div>
@endif
<div class="plceholder-button hidden-xs"><br>
<button class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between" data-toggle="modal" data-target="#coupon">Apply Coupon</button>
<button type="submit" class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between">Confirm Order</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Checkout Page End -->
</div>
<div class='stick2foot btn btn-primary noborder hidden-md' style="background:#0038e3;">
<div class='float-left'>&#8377; {{ $olist->sum('price') }}<br><small><a data-toggle="modal" data-target="#coupon">Apply Coupon</a></small></div>
<div class='float-right'><button type="submit" class='brook-btn bk-btn-white btn-xs-size btn-rounded space-between'>Confirm</button></div>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="modal fade" id="coupon" tabindex="-1" role="dialog" aria-labelledby="couponLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body">
<center>
<h5 class="modal-title" id="couponLabel">Got a Coupon?</h5>
</center><br>
<form action="/confirmorder/{{ $order->id }}" method="post">
  {{ csrf_field() }}
  {{ method_field('put') }}
<center>
<input type="text" placeholder="Enter Coupon Code" name="coupon" required>
<button type="submit" class="brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Apply</button>
</center>
</form>
</div>
</div>
</div>
</div>
</main>
@endsection
@section('scripts')
<!--// Wrapper -->
<!-- Js Files -->
<!-- <script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script> -->

<!-- REVOLUTION JS FILES -->
<!-- <script src="js/jquery.themepunch.tools.min.js"></script>
<script src="js/jquery.themepunch.revolution.min.js"></script> -->

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<!-- <script src="js/revolution.extension.actions.min.js"></script>
<script src="js/revolution.extension.carousel.min.js"></script>
<script src="js/revolution.extension.kenburn.min.js"></script>
<script src="js/revolution.extension.layeranimation.min.js"></script>
<script src="js/revolution.extension.migration.min.js"></script>
<script src="js/revolution.extension.navigation.min.js"></script>
<script src="js/revolution.extension.parallax.min.js"></script>
<script src="js/revolution.extension.slideanims.min.js"></script>
<script src="js/revolution.extension.video.min.js"></script> -->



<!-- Use the minified version files listed below for better performance and remove the files listed above -->
<script src="{{ URL::asset('js/vendor/vendor.min.js') }}"></script>
<script src="{{ URL::asset('js/plugins.min.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ URL::asset('js/revolution.tools.min.js')}}"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
<script src="{{ URL::asset('js/revolution.extension.min.js')}}"></script>
<script src="{{ URL::asset('js/main.js')}}"></script>
<script src="{{ URL::asset('js/revoulation.js')}}"></script>
@endsection
