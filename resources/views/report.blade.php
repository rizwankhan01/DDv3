@extends('layouts.master')
@section('title') Report an Issue | Doctor Display @endsection
@section('metadesc') We are sorry that you are facing a problem with our replaced screen! @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">Report an Issue</h2>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li class="current">Report an Issue</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagecontent')
<main class="page-content">

    <!-- Start Contact Form  -->
    <div class="brook-contact-form-area ptb--150 ptb-md--80 ptb-sm--60 bg_color--5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-form">
                      <p>We are sorry that you are facing a problem with our replaced screen!<br>
                      <small>We will fix that right away in a jiffy.</small></p><hr>
                      @if(!empty($order))
                        <p>
            				    <b>Name: </b>{{ $order->customer->name }}<BR>
            				    <b>Phone Model:</b> {{ $olist->color->model->name }} {{ $olist->color->name }} - {{ $olist->prod_type }}<BR>
            				    <b>Mobile Number: </b>{{ $order->customer->phone_number }}<BR><BR>
            				    Please elaborate your issue and select a date for us to come by and fix it.<BR>
            				    </p>
                        <form action='/report/{{ $order->id }}' method='post'>
                          {{ csrf_field() }}
                          {{ method_field('put') }}
                				    <textarea class='form-control' cols='4' placeholder='Eg. Touch not working properly' name='issue'></textarea><BR>
                				    Select Service Date:<BR>
                				    <input type='date' class='form-control' name='sdate' min='<?php $t  =   date('Y-m-d'); echo date('Y-m-d', strtotime($t. ' + 1 days'));?>'><BR>
                				    <input type='submit' class='btn btn-primary' name='submit'>
                				</form>
                      @else
                        <form action="/report" method="post">
                          {{ csrf_field() }}
                          {{ method_field('post') }}
                            <div class="row">
                                <div class="col-lg-12">
                                  <input name="order_id" type="number" placeholder="Order ID" required>
                                    @if(session('status'))
                                      <small>{{ session('status') }}</small>
                                    @endif
                                </div>
                                <div class="col-lg-12 mt--30">
                                    <input name="phone" type="number" placeholder="Phone Number" required>
                                </div>
                                <div class="col-lg-12 mt--30">
                                  <input type="submit" value="Search">
                                </div>
                            </div>
                        </form>
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Form  -->

</main>
@endsection
@section('scripts')
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

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8346739.js"></script>
<!-- End of HubSpot Embed Code -->
@endsection
