@extends('layouts.master')
@section('title') Contact | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">Contact</h2>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li class="current">Contact</li>
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
    <div class="bk_contact_classic bg_color--1 ptb--160 ptb-md--80 ptb-sm--80">
        <div class="container">
            <div class="row">

                <!-- Start Single Slide -->
                <div class="col-lg-4 col-xl-4 col-md-6 col-12 col-sm-12 wow move-up">
                    <div class="classic-address text-center">
                        <h4 class="heading heading-h4">Visit our Office at</h4>
                        <div class="desc mt--15">
                            <p class="bk_pra line-height-2-22">Modern Tower, no.23, F6 ,First floor, Westcott Rd, <br>
                              Royapettah, Chennai, Tamil Nadu 600014</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->

                <!-- Start Single Slide -->
                <div class="col-lg-4 col-xl-4 col-md-6 col-12 col-sm-12 wow move-up mt_sm--40">
                    <div class="classic-address text-center">
                        <h4 class="heading heading-h4">Message us</h4>
                        <div class="desc mt--15">
                            <p class="bk_pra line-height-2-22"><a href="mailto:order@doctordisplay.in">order@doctordisplay.in</a> <br>
                              <a href="tel:04446270777">04446270777</a></p>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->

                <!-- Start Single Slide -->
                <div class="col-lg-4 col-xl-4 col-md-6 col-12 col-sm-12 wow move-up mt_md--40 mt_sm--40">
                    <div class="classic-address text-center">
                        <h4 class="heading heading-h4">Follow us</h4>
                        <div class="desc mt--15">
                            <ul class="social-icon icon-solid-rounded icon-size-medium text-center move-up wow">
                                <li class="facebook"><a href="#" class="link" aria-label="Facebook"><i class="fab fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#" class="link" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="instagram"><a href="#" class="link" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                                <li class="dribbble"><a href="#" class="link" aria-label="Dribbble"><i class="fab fa-youtube"></i></a></li>
                                <li class="pinterest"><a href="#" class="link" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
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
