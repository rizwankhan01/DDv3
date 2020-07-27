@extends('layouts.master')

@section('title') Jobs | Doctor Display @endsection
@section('breadcrumb')
<div class="brook-call-to-action bg_color--3 ptb--70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="call-content text-center text-sm-left">
                    <h3 class="heading heading-h3 text-white wow move-up">Apply for Jobs</h3>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="call-btn text-center text-sm-right mt_mobile--20 wow move-up">
                    <a class="brook-btn bk-btn-white text-theme btn-sd-size btn-rounded" href="https://doctordisplay.in/story">Find out
                        more</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagecontent')
<main class="page-content">


    <!-- Checkout Page Start -->
    <div class="checkout_area pt--80 pb--150">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Form s-->

                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Page End -->
</main>
@endsection
@section('scripts')

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="js/vendor/vendor.min.js"></script>
    <script src="js/plugins.min.js"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="js/revolution.tools.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="js/revolution.extension.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/revoulation.js"></script>
@endsection
