@extends('layouts.master')
@section('title') Thank you | Doctor Display @endsection
@section('metadesc') Thanks for submitting that. Our representative will be in touch with you shortly. @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">Thank you</h2>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li class="current">Thank You</li>
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

    <!-- Start Contact Area -->
    <div class="bk_contact_classic bg_color--1 ptb--80 ptb-md--80 ptb-sm--80">
        <div class="container">
            <div class="row">

                <!-- Start Single Slide -->
                <div class="col-lg-12 col-xl-12 col-md-12 col-12 col-sm-12 wow move-up">
                    <div class="classic-address text-center">
                        <div class="desc mt--15">
                            <p>
                            @if(session('status'))
                                <h3>Your Premium Tempered Glass Order has been confirmed.</h3>
                                Our representative will reach out to you shortly.<br>
                                Meantime, if you have any queries you can call us at <a href="tel:04446270777">04446270777</a>! 
                            @else
                              Thanks for submitting that. Our representative will be in touch with you shortly.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->

            </div>
        </div>
    </div>
    <!-- End Contact Area -->

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
