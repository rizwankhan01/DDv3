@extends('layouts.master')
@section('title') All Brands | Doctor Display @endsection
@section('metadesc') Repair your Broken Apple, Asus, COOLPAD, Gionee, Google, HTC, Huawei, Leeco, LENOVO, LG, Motorola, Nokia, ONE PLUS, OPPO, REDMI, Samsung, Sony, VIVO, mobile display instantly at your doorstep.  @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">All Brands</h2>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li class="current">All Brands</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagecontent')
<main class="page-content brand-page">

    <!-- Start Brand Area -->
    <div class="bk-brand-area bg_color--1 ptb--100 ptb-md--80 ptb-sm--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-wrapper">
                        <div class="brand__list brand-default brand-style--2">
                          @foreach($brands as $brand)
                          <div class="brand">
                          <a href="{{$brand->name}}-screen-service-center">
                            <figure>
                              <img src="storage/{{ $brand->brand_logo }}" class="logo-thumbnail" alt="{{$brand->name}} logo">
                              <figcaption>{{$brand->name}}</figcaption>
                            </figure>
                          </a>
                          </div>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand Area -->

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
