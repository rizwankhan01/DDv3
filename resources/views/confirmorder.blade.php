@extends('layouts.master')
@section('title') Confirm Order | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--100 pt_md--250 pt_sm--80 bg_image--8 breadcaump-title-bar breadcaump-title-white">
</div>
@endsection
@section('pagecontent')
<main class="page-content">
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
      <img src="{{ URL::asset('img/tg.jpg') }}" alt="Addon Product"></a></td>
    <td class="pro-title"><a href="#">@if(!empty($list->addonproduct->name)){{ $list->addonproduct->name }}@endif</a></td>
    <td class="pro-price"><span>&#8377; {{ $list->price }}</span></td>
  </tr>
@elseif($list->prod_type!='COUPON' AND $list->prod_type!='ADDON')
  <tr>
    <td class="pro-thumbnail"><a href="#"><img src="storage/{{ $list->color->image }}" alt="{{ $list->color->model->brand->name }} {{ $list->color->model->series }} {{ $list->color->model->name }} {{ $list->color->name }} image"></a></td>
    <td class="pro-title"><a href="#">{{ $list->color->model->brand->name }} {{ $list->color->model->series }} {{ $list->color->model->name }} ({{ $list->color->name }}) - {{ $list->prod_type }}</a></td>
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
<form method="post" action="/confirmorder/{{ $order->id }}" class="checkout-form">
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
<input type="text" placeholder="Full Name" name="name" value="{{ $customer->name }}" onkeyup='swap_name(this.value)' required>
</div>
<div class="col-md-6 col-12 mb--20">
<label>Email Address*</label>
<input type="email" autocomplete="chrome-off" placeholder="Email Address" name="email" value="{{ $customer->email }}" onkeyup='swap_email(this.value)' required>
</div>
<div class="col-md-6 col-12 mb--20">
<label>Phone no*</label>
<input type="text" autocomplete="chrome-off" placeholder="Phone number"  onkeypress="return isNumberKey(event)"
minlength="10" maxlength="10" name="phone" value="{{ $customer->phone_number }}" onkeyup='swap_phone(this.value)' required>
</div>
<div class="col-12 mb--20">
<label>Address*</label>
<input type="text" autocomplete="chrome-off" placeholder="Address" name='address' onkeyup="swap_address(this.value)" required value="@if(!empty($address->address)){{ $address->address }}@endif">
</div>
<div class="col-md-4 col-12 mb--20">
<label>Area* </label>
<select autocomplete="chrome-off" class="nice-select" name='area' required onchange='swap_area(this.value)'>
<option value=''>Select Area</option>
@foreach($areas as $area)
<option value='{{$area->area}}' @if(!empty($address->area) && $address->area==$area->area){{ 'selected' }} @endif>{{$area->area}}</option>
@endforeach
</select>
</div>
<div class="col-md-4 col-12 mb--20">
<label>Pin Code*</label>
<input type="text" placeholder="Pin Code" autocomplete="chrome-off" onkeypress="return isNumberKey(event)"
minlength="6" maxlength="6" onkeyup='swap_pincode(this.value)' name='pincode' value='@if(!empty($address->pincode)){{ $address->pincode }}@endif' required>
</div>

<div class="col-md-4 col-12 mb--20">
<label>Town/City* <small><a href='#' data-toggle="modal" data-target="#changeCity">Change City</a></small></label>
<select name="city" class="nice-select" onchange="swap_city(this.value)" autocomplete="chrome-off" required>
  <option value="">Select City</option>
  <option value="Chennai" @if(!empty(Session::get('city'))) selected @endif>Chennai</option>
  <option value="Bangalore" @if(!empty(Session::get('city'))) selected @endif>Bangalore</option>
  <option value="Other">Other</option>
</select>
<!--<input type="text" placeholder="Town/City" name='city' onkeyup='swap_city(this.value)' value="@if(!empty(Session::get('city'))) {{ Session::get('city')}} @else @if(!empty($address->city)){{ $address->city }}@endif @endif" required>-->
</div>
<div class="modal fade" id="changeCity" tabindex="-1" role="dialog" aria-labelledby="changeCityLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="top:-75px;">
    <div class="modal-content">
      <div class="modal-body">
        <center>
          <h5 class="modal-title" id="exampleModalLabel">Select Your City</h5><br>
          <a class="brook-btn bk-btn-theme-border btn-sd-size btn-rounded space-between" href="select-city/Chennai">Chennai</a>
          <a class="brook-btn bk-btn-theme-border btn-sd-size btn-rounded space-between" href="select-city/Bangalore">Bangalore</a>
        </center>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6 col-6 mb--20">
<label>Date*</label>
<input type="date" autocomplete="chrome-off" name="date" min="{{ date('Y-m-d',strtotime('now')) }}" onchange='swap_date(this.value)' value="{{ $order->slot_date }}" max="{{ date('Y-m-d',strtotime('+1 week')) }}" required>
</div>
<div class="col-md-6 col-6 mb--20">
<label>Time Slot*</label>
<select autocomplete="chrome-off" name="time_slot" class="nice-select" onchange='swap_time_slot(this.value)' required>
  <option value="">Select Slot</option>
  <option value='10:00AM to 11:30AM' @if($order->slot_time=='10:00AM to 11:30AM'){{ 'selected' }} @endif>10:00AM to 11:30AM</option>
  <option value='11:30AM to 01:00PM' @if($order->slot_time=='11:30AM to 01:00PM'){{ 'selected' }} @endif>11:30AM to 01:00PM</option>
  <option value='02:00PM to 03:30PM' @if($order->slot_time=='02:00PM to 03:30PM'){{ 'selected' }} @endif>02:00PM to 03:30PM</option>
  <option value='03:30PM to 05:00PM' @if($order->slot_time=='03:30PM to 05:00PM'){{ 'selected' }} @endif>03:30PM to 05:00PM</option>
  <option value='05:00PM to 06:30PM' @if($order->slot_time=='05:00PM to 06:30PM'){{ 'selected' }} @endif>05:00PM to 06:30PM</option>
  <option value='06:30PM to 08:00PM' @if($order->slot_time=='06:30PM to 08:00PM'){{ 'selected' }} @endif>06:30PM to 08:00PM</option>
  <option value='08:30PM to 10:00PM' @if($order->slot_time=='08:30PM to 10:00PM'){{ 'selected' }} @endif>08:30PM to 10:00PM</option>
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
  <li>@if(!empty($list->addonproduct->name)){{ $list->addonproduct->name }} @endif <span>&#8377; {{ $list->price }}</span></li>
@elseif($list->prod_type!='COUPON' AND $list->prod_type!='ADDON')
  <li>{{ $list->color->model->brand->name }} {{$list->color->model->series }} {{$list->color->model->name}} ({{$list->color->name }})<br class="hidden-md"> {{ $list->prod_type }} <span>&#8377; {{ $list->price }}</span></li>
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
<a class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between" data-toggle="modal" data-target="#coupon">Apply Coupon</a>
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
  <input type="hidden" name="name" id="name">
  <input type="hidden" name="email" id="email">
  <input type="hidden" name="phone" id="phone">
  <input type="hidden" name="address" id="address">
  <input type="hidden" name="area" id="area">
  <input type="hidden" name="pincode" id="pincode">
  <input type="hidden" name="city" id="city">
  <input type="hidden" name="date" id="date">
  <input type="hidden" name="time_slot" id="time_slot">
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
  <script>
  function swap_name(val){ var input = document.getElementById("name"); input.value = val; }
  function swap_email(val){ var input = document.getElementById("email"); input.value = val; }
  function swap_phone(val){ var input = document.getElementById("phone"); input.value = val; }
  function swap_address(val){ var input = document.getElementById("address"); input.value = val; }
  function swap_area(val){ var input = document.getElementById("area"); input.value = val; }
  function swap_pincode(val){ var input = document.getElementById("pincode"); input.value = val; }
  function swap_city(val){ var input = document.getElementById("city"); input.value = val; }
  function swap_date(val){ var input = document.getElementById("date"); input.value = val; }
  function swap_time_slot(val){ var input = document.getElementById("time_slot"); input.value = val; }
  </script>
<!--// Wrapper -->

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
