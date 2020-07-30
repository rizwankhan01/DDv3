@extends('layouts.master')
@section('title') Apple Products | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--100 pt_md--250 pt_sm--80 bg_image--8 breadcaump-title-bar breadcaump-title-white">
</div>
@endsection
@section('pagecontent')
<main class="page-content">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <center>
            <h5 class="modal-title" id="exampleModalLabel">Would you like to buy Tempered glass as well?<br>
            <small>It will only cost you &#8377;99!</small></h5>
          </center><br>
          <form action="/confirmorder" method="get">
          <center>
            <button type="submit" class="brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Yes</button>
            <button type="submit" class="brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">No</button>
          </center>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcaump-area breadcaump-title-bar pull-left hidden-xs">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="breadcaump-inner">
                  <div class="breadcrumb-insite">
                  <small style="float:right;">Last Updated: 20-08-2020</small>
                      <ul class="core-breadcaump">
                          <li><a href="/">Home</a></li>
                          <li><a href="/allbrands">All Brands</a></li>
                          <li><a href="/colors">Apple Products</a></li>
                          <li class="current">iPhone 11</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
    <!-- Start Single Product -->
    <div class="brook-single-product plr--160 plr_lg--100 plr_md--50 plr_sm--50">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 hidden-xs">
                <div class="single-product-left-side">
                    <div class="product__details__container">
                        <div class="tab_container big_img_container">
                            <div class="big_img tab-pane fade show active" id="img1" role="tabpanel">
                                <img class="w-100" src="img/models/01.png" alt="model image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="single-product-details-side"><br><br>
                    <div class="product-details">
                        <div class="inner">
                            <div class="header">
                                  <img class="w-t float-left hidden-md" src="img/models/01.png" alt="model image">
                                <h1 class="heading heading-h4">Apple iPhone 11</h1>&nbsp;&nbsp;
                                <div class="product-badges">
                                    <span>New</span>
                                </div>
                            </div>
                            <div class="price">
                                <p class="theme-color">
                                  <a href=''><u>Space Grey</u></a> | <a href=''>Jet Black</a> | <a href=''>Gold White</a>
                                </p>
                            </div>
                            <div class="description row">
                              <div class="col-md-6 col-xs-6">
                              <input type='radio' name='screen_type' class='input-radio' required> Ordinary Quality<br><strike class="red">&#8377; 5000</strike> <span class="green">&#8377; 5000</span>
                              </div>
                              <div class="col-md-6 col-xs-6">
                              <input type='radio' name='screen_type' class='input-radio' required> Premium Quality<br><strike class="red">&#8377; 5000</strike> <span class="green">&#8377; 2500</span>
                              <br><br>
                              </div>
                                <p class="bk_pra">Add an extra-special touch to décor with this charming
                                    lantern that features sleek angles and a modern-edge design. A must-have
                                    for your house this holiday. Buy now to get a special discount for early
                                    bird order.
                                    </p><br>
                      <button type="button" data-toggle="modal" data-target="#exampleModal" class="hidden-xs col-md-12 brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Confirm</button>
                      <button type="button" data-toggle="modal" data-target="#exampleModal" class="stick2foot hidden-md col-md-12 brook-btn bk-btn-theme btn-xs-size">Confirm</button>
                                    <br><br>
<p class="bk_pra">* In case of any queries regarding repairing your screen, Kindly contact us at <a href='tel:04446270777'>04446270777</a><br>
* Prices displayed are inclusive of 18% GST.<br>
* Extra charges might be applicable if the Service location is more than 20 kms from our operation radius.</p>
<br><br>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Product -->

    <!-- Start Product Review -->
    <div class="product_review pb--100 pb_md--80 pb_sm--60" style="padding-top:0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="description_nav nav nav-tabs d-block" role="tablist">
                      <a class="active" id="nav-review" data-toggle="tab" href="#review" role="tab"
                        aria-controls="review" aria-selected="false">Reviews</a>
                        <a id="descrip-tab" data-toggle="tab" href="#descrip" role="tab"
                            aria-controls="descrip" aria-selected="true">Description</a>
                    </div>
                </div>
            </div>
            <div class="tab_container">
              <div class="single_review_content tab-pane fade show active" id="review" role="tabpanel">
                <div class="brook-testimonial-area ptb-md--80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12"><h4>Customers who replaced iPhone 11 Screen</h4></div>
                            <!-- Start Single Testimonial -->
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="testimonial testimonial_style--1">
                                    <div class="content">
                                        <p class="bk_pra">“Theme is <span class="theme-color">@intuitive</span> to use.
                                            Even for a
                                            WordPress beginner like me, Brook
                                            offers all the functions and features with simple instructions”</p>
                                        <div class="testimonial-info">
                                            <div class="post-thumbnail">
                                                <img src="img/testimonial/clint-1/clint-1.jpg" alt="clint image">
                                            </div>
                                            <div class="clint-info">
                                                <h6>Harley Mills</h6>
                                                <span>PR Officer</span>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Testimonial -->

                            <!-- Start Single Testimonial -->
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 wow move-up">
                                <div class="testimonial testimonial_style--1 mt_sm--30">
                                    <div class="content">
                                        <p class="bk_pra">“I’m running a multi-area website so this multipurpose theme is
                                            just what I need. <span class="theme-color">@Brook</span> really has great
                                            concepts for creative agencies like ours.”</p>
                                        <div class="testimonial-info">
                                            <div class="post-thumbnail">
                                                <img src="img/testimonial/clint-1/clint-2.jpg" alt="clint image">
                                            </div>
                                            <div class="clint-info">
                                                <h6>Harley Mills</h6>
                                                <span>PR Officer</span>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Testimonial -->

                            <!-- Start Single Testimonial -->
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 wow move-up">
                                <div class="testimonial testimonial_style--1 mt_sm--30">
                                    <div class="content">
                                        <p class="bk_pra">“Theme is <span class="theme-color">@intuitive</span> to use.
                                            Even for a
                                            WordPress beginner like me, Brook
                                            offers all the functions and features with simple instructions”</p>
                                        <div class="testimonial-info">
                                            <div class="post-thumbnail">
                                                <img src="img/testimonial/clint-1/clint-3.jpg" alt="clint image">
                                            </div>
                                            <div class="clint-info">
                                                <h6>Blanche Fields</h6>
                                                <span>Apple, Marketing</span>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Testimonial -->

                            <!-- Start Single Testimonial -->
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 wow move-up">
                                <div class="testimonial testimonial_style--1 mt--30">
                                    <div class="content">
                                        <p class="bk_pra">“Theme is <span class="theme-color">@intuitive</span> to use.
                                            Even for a
                                            WordPress beginner like me, Brook
                                            offers all the functions and features with simple instructions”</p>
                                        <div class="testimonial-info">
                                            <div class="post-thumbnail">
                                                <img src="img/testimonial/clint-1/clint-4.jpg" alt="clint image">
                                            </div>
                                            <div class="clint-info">
                                                <h6>Leck Cassie</h6>
                                                <span>Lamium, Marketing</span>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Testimonial -->

                            <!-- Start Single Testimonial -->
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 wow move-up">
                                <div class="testimonial testimonial_style--1 mt--30">
                                    <div class="content">
                                        <p class="bk_pra">“Theme is <span class="theme-color">@intuitive</span> to use.
                                            Even for a
                                            WordPress beginner like me, Brook
                                            offers all the functions and features with simple instructions”</p>
                                        <div class="testimonial-info">
                                            <div class="post-thumbnail">
                                                <img src="img/testimonial/clint-1/clint-5.jpg" alt="clint image">
                                            </div>
                                            <div class="clint-info">
                                                <h6>Cassie Ventura</h6>
                                                <span>Product Manager</span>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Testimonial -->

                            <!-- Start Single Testimonial -->
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 wow move-up">
                                <div class="testimonial testimonial_style--1 mt--30">
                                    <div class="content">
                                        <p class="bk_pra">“This is just the most powerful theme I’ve ever met. Love to talk
                                            with their staff about how to explore all the capabilities of the <span class="theme-color">@Brook
                                                theme.</span>”</p>
                                        <div class="testimonial-info">
                                            <div class="post-thumbnail">
                                                <img src="img/testimonial/clint-1/clint-6.jpg" alt="clint image">
                                            </div>
                                            <div class="clint-info">
                                                <h6>Rex Watson</h6>
                                                <span>Marketing</span>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Testimonial -->

                        </div>
                    </div>
                </div>
              </div>
                <div class="single_review_content tab-pane fade" id="descrip" role="tabpanel">
                    <div class="content">
                        <p>Add an extra-special touch to décor with this charming lantern that features sleek
                            angles and a modern-edge design. A must-have for your house this holiday. Buy now
                            to get a special discount for early bird order.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Review -->


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
