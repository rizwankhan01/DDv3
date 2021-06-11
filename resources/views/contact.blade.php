@extends('layouts.master')
@section('title') Contact | Doctor Display @endsection
@section('metadesc') Got any queries? Hit us up at 04446270777! We are fixing broken phone screens at your doorstep under 30 minutes in Bangalore and Chennai. @endsection
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
                            <p class="bk_pra line-height-2-22"><b>Chennai:</b> Modern Tower, no.23, F6 ,First floor, Westcott Rd, Royapettah, Chennai, Tamil Nadu 600014</p><br>
                            <p class="bk_pra line-height-2-22"><b>Bangalore:</b> No.18 /386, second floor S.N. Arcade, mahalingeshwara layout, Adugodi, Bangalore, Karnataka 560005</p>
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
                                <li class="facebook"><a href="https://www.facebook.com/displaydoctors" class="link" aria-label="Facebook"><i class="fab fa-facebook"></i></a></li>
                                <li class="twitter"><a href="https://twitter.com/doctor_display" class="link" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="instagram"><a href="https://www.instagram.com/doctordisplay/" class="link" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                                <li class="youtube"><a href="https://www.youtube.com/channel/UCtnKHSIMmcyR_FfMEiDvg6A" class="link" aria-label="youtube"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->

            </div>
            <div class="row">
              <div class="col-12 wow move-up mt_md--80 mt_sm--40 mt--80">
                  <div class="classic-address text-center">
                      <h4 class="heading heading-h4">Got any queries? Hit us up!</h4>
                      <div class="desc mt--15">
                        <form action="/enquire" method="post">
                          {{ csrf_field() }}
                          {{ method_field('post') }}
                            <div class="row">
                                <div class="col-lg-12">
                                  <input name="customer_name" type="text" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-lg-12 mt--30">
                                    <input name="phone_number" type="number" class="form-control" placeholder="Your Phone" required>
                                </div>
                                <div class="col-lg-12 mt--30">
                                    <textarea name="model_name" rows=3 class="form-control" placeholder="Type your message" required></textarea>
                                </div>
                                <div class="col-lg-12 mt--30">
                                  <?php $one = rand(0,20); $two = rand(0,20); $ans = $one + $two; ?>
                                  <input type="number" placeholder="What is {{ $one }} + {{ $two }} ?" class="form-control" name="captcha">
                                  <input type="hidden" name="ans" value="{{ $ans }}">
                                </div>
                                <div class="col-lg-12 mt--30">
                                  <input type="submit" name="enquire" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
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
