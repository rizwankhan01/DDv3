@extends('layouts.master')
@section('title') Apple Products | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">Apple Products</h2>
                    <small>If you are looking to fix your Apple phones, we are there for your rescue. Our team of trained screen repair technicians will come to your doorstep and get your screens replaced whenever you want to fix it.</small>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li><a href="/allbrands">All Brands</a></li>
                            <li class="current">Apple Products</li>
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
                            <div class="brand">
                            <a href="/colors">
                              <figure>
                              <img src="img/models/01.png" class="logo-thumbnail" alt="logo image">
                              <figcaption>iPhone 11</figcaption>
                              </figure>
                            </a>
                            </div>
                            <div class="brand move-up wow" data-wow-delay=".13s">
                            <a href="/colors">
                            <figure>
                            <img src="img/models/01.png" class="logo-thumbnail" alt="logo image">
                            <figcaption>iPhone 11</figcaption>
                            </figure>
                            </a>
                            </div>
                            <div class="brand move-up wow" data-wow-delay="0.16s">
                            <a href="/colors">
                            <figure>
                            <img src="img/models/01.png" class="logo-thumbnail" alt="logo image">
                            <figcaption>iPhone 11</figcaption>
                            </a>
                            </div>
                            <div class="brand move-up wow" data-wow-delay="0.19s">
                            <a href="/colors">
                            <figure>
                            <img src="img/models/01.png" class="logo-thumbnail" alt="logo image">
                            <figcaption>iPhone 11</figcaption>
                            </figure>
                            </a>
                            </div>
                            <div class="brand move-up wow" data-wow-delay="0.22s">
                            <a href="/colors">
                            <figure>
                            <img src="img/models/01.png" class="logo-thumbnail" alt="logo image">
                            <figcaption>iPhone 11</figcaption>
                            </figure>
                            </a>
                            </div>
                            <div class="brand move-up wow" data-wow-delay="0.25s">
                            <a href="/colors">
                            <figure>
                            <img src="img/models/01.png" class="logo-thumbnail" alt="logo image">
                            <figcaption>iPhone 11</figcaption>
                            </figure>
                            </a>
                            </div>
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
