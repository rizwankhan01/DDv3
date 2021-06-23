@extends('layouts.master')
@section('title') Refund Policy | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">Refund Policy</h2>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li class="current">Refund Policy</li>
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
              <div class="brook-blog-details-area space_dec--100 pt_md--80 pt_sm--80">
                <div class="container">
                    <div class="row mb--85 mt--85">

                        <div class="col-lg-12">
                            <!-- Start Thumbnail -->
                            <div class="blog-modern-layout">
                                <!-- Start Thumbnail -->
                                <div class="blog-main-quote mb--60 bg_color--2">
                                    <div class="blogquote-inner">
                                        <div class="content">
                                            <div class="icon mb--35">
                                                <span class="fa fa-quote-right text-white"></span>
                                            </div>
                                            <h4 class="heading heading-h4 text-white">“The best preparation for
                                                tomorrow is doing your best today.”</h4>
                                            <div class="quote-name mt--25 mb--20">
                                                <h5 class="heading heading-h5 text-white">- Kasahara May</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Start Content -->
                            </div>
                            <!-- End Thumbnail -->
                        </div>

                        <div class="col-lg-2 order-2 order-lg-1 mt_md--40 mt_sm--40">
                            <div class="blog-post-return-button">
                                <a href="#"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="col-lg-8 order-1 order-lg-2">
                            <div class="blog-details-wrapper">
                                <article class="blog-post blog-modern-layout">
                                    <!-- Start Header -->
                                    <!-- Start Content -->
                                    <div class="content basic-dark2-line-1px pb--50 mb--35">
                                        <div class="inner">
                                            <h5 class="heading heading-h5 line-height-1-95 wow move-up">
                                                Sadly, we talk way too often about police arresting people for doing
                                                nothing other than taking a picture or filming them. The police
                                                officers being filmed and photographed make these arrests using various
                                                excuses, but frequently the charges get dropped for lack of merit. The
                                                reason charges rarely stick when an officer is filmed is because
                                                filming police, or anyone in a public space, is not illegal. Some
                                                people may not like it, but it is a fact.</h5>

                                            <div class="desc mt--45 mb--50">
                                                <p class="bk_pra wow move-up">The New York Times is waking up to this
                                                    fact that photography is not a crime. In an interview with Mickey
                                                    H. overreacher, general counselor for the National Press
                                                    Photographers Association, they get down to the nitty gritty of the
                                                    legalities surrounding this age old tradition. They also talk a bit
                                                    about just why such arrests are happening more frequently.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="thumbnail wow move-up">
                                            <img class="w-100" src="img/blog/big-img/standard-post-2.jpg" alt="Multipurpose">
                                        </div>
                                        <div class="desc mt--45">
                                            <p class="bk_pra wow move-up">I haven't really thought of criminalizing
                                                photography as something to do with 9/11 before. I know that a lot of
                                                our rights have been eroded since that day, but the photography aspect
                                                never really clicked until now. Just as Mickey can't make heads nor
                                                tails of this argument, I am struggling to find a connection here. I
                                                don't recall cameras being a part of the plots to destroy the Twin
                                                Towers, Pentagon or White House.</p>
                                        </div>

                                        <!-- Start Blockquote -->
                                        <div class="bk-quote-content">
                                            <blockquote class="brook-quote move-up wow">
                                                <div class="quote-text">Life seems to go on without effort when I am
                                                    filled with music. ― George Eliot</div>
                                            </blockquote>
                                        </div>
                                        <!-- End Blockquote -->
                                        <div class="desc mt--45">
                                            <p class="bk_pra wow move-up">Of course there could be more reasons for
                                                this increase in arresting photographers. Mickey suspects that part of
                                                the reason is the proliferation of the camera. Pretty much everyone
                                                with a smartphone has a camera capable of taking some very high quality
                                                pictures. Prior to this boom, the police had some modicum of control
                                                over the press. (Source: techdirt.com)</p>
                                        </div>
                                    </div>
                                    <!-- Start Footer -->
                                    <div class="blog-footer wow move-up">
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <div class="post-tag d-flex align-items-center justify-content-center">
                                                    <h6 class="heading heading-h6">TAGS:</h6>
                                                    <div class="blog-tag-list pl--5">
                                                        <a href="#">business</a>
                                                        <a href="#">format</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Blog Details -->
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
