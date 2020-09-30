@extends('layouts.master')
@section('title') {{$models->brand->name}} {{$models->name}} | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--100 pt_md--250 pt_sm--80 bg_image--8 breadcaump-title-bar breadcaump-title-white">
</div>
@endsection
@section('pagecontent')
<main class="page-content">
  <div class="modal fade" id="compare" tabindex="-1" role="dialog" aria-labelledby="compareLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <table class="table">
            <thead style="background:#fccf27">
              <th></th>
              <th>Basic</th>
              <th>Premium</th>
            </thead>
            <tbody>
              <tr>
                <th>Warranty</th>
                <td>90 days</td>
                <td>90 days</td>
              </tr>
              <tr>
                <th>Stock</th>
                <td>Third Party</td>
                <td>OEM</td>
              </tr>
              <tr>
                <th>Quality</th>
                <td>Differed Color Temperature</td>
                <td>Same Color Temperature</td>
              </tr>
              <tr>
                <th>Prefer If</th>
                <td>Phone age > 1 Year</td>
                <td>Phone age < 6 Months</td>
              </tr>
              @if(!empty($pricing->ord_compare_description) AND !empty($pricing->org_compare_description))
              <tr>
                <th>Screen Type</th>
                <td>{{$pricing->ord_compare_description}}</td>
                <td>{{$pricing->org_compare_description}}</td>
              </tr>
              @endif
              <tr>
                <th>Price</th>
                <td>&#8377; {{$pricing->ord_selling_price}}</td>
                <td>&#8377; {{$pricing->org_selling_price}}</td>
              </tr>
            </tbody>
          </table>
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
                  <small style="float:right;">Last Updated: {{$models->updated_at}}</small>
                      <ul class="core-breadcaump">
                          <li><a href="/">Home</a></li>
                          <li><a href="/allbrands">All Brands</a></li>
                          <li class="current">{{$models->name}}</li>
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
                                <img class="w-100" src="../../storage/{{$color->image}}" alt="{{$color->name}} image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="single-product-details-side"><br>
                    <div class="product-details">
                        <div class="inner">
                            <div class="header">
                                  <img class="w-t float-left hidden-md" src="../../storage/{{$color->image}}" alt="{{$color->name}} image">
                                <h1 class="heading heading-h4">{{$models->brand->name}} {{$models->name}}</h1>&nbsp;&nbsp;
                                <div class="product-badges">
                                    <span>New</span>
                                </div>
                            </div>
                            <div class="product">
                            <div class="product-info" style="float:left;">
                            <ul class="rating">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i> </li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                &nbsp;&nbsp;5 (8 Reviews)
                            </ul>
                          </div><br><br>
                              <span style="font-size:12px;">{{$models->description}}</span>
                        </div><br>
                            <div class="price" style="margin-bottom:0px;">
                                <p class="theme-color">
                                  @foreach($colors as $color)
                                  <a href='/product/{{$models->name}}/{{$color->name}}'><u>{{$color->name}}</u></a>&nbsp;&nbsp;&nbsp;
                                  @endforeach
                                </p>
                                <p>Select Screen Quality:</p>
                            </div>
                            <div class="description">
                              <div class="row">
                                    <ul class="nav nav-pills mb-3 col-md-12 col-xs-12" id="pills-tab" role="tablist">
                                      @if($pricing->ord_stock_availablity==1)
                                        <li class="nav-item col-md-3 col-xs-6">
                                            <a class="nav-link active" id="basic-tab" data-toggle="pill"
                                                href="#basic" role="tab" aria-controls="basic"
                                                aria-selected="true" style="border: 1px solid #ddd;"
                                                onclick="changevalue({{ $pricing->ord_selling_price }},'BASIC')">Basic</a>
                                        </li>
                                      @endif
                                      @if($pricing->org_stock_availablity==1)
                                        <li class="nav-item col-md-3 col-xs-6">
                                            <a class="nav-link" id="premium-tab" data-toggle="pill"
                                                href="#premium" role="tab" aria-controls="premium"
                                                aria-selected="false" style="border: 1px solid #ddd;"
                                                onclick="changevalue({{ $pricing->org_selling_price }},'PREMIUM')">Premium</a>
                                        </li>
                                      @endif
                                    </ul>
                                    <span class="nav-item col-md-12 col-xs-12 tab-content" id="pills-tabContent">
                                      <div class="tab-pane fade show active" id="basic" role="tabpanel"
                                          aria-labelledby="basic-tab">
                                          <h4>Price: <strike class="red">&#8377; {{ $pricing->ord_selling_price+300 }}</strike> <span class="green">&#8377; {{ $pricing->ord_selling_price }}</span></h4>
                                      </div>
                                      <div class="tab-pane fade" id="premium" role="tabpanel"
                                          aria-labelledby="premium-tab">
                                          <h4>Price: <strike class="red">&#8377; {{ $pricing->org_selling_price+250 }}</strike> <span class="green">&#8377; {{ $pricing->org_selling_price }}</span></h4>
                                      </div>

                                      <u><small><a href="#" class="icon" data-toggle="modal" data-target="#compare">
                                        See the difference between Basic and Premium Screens?</a></small></u>
                                    </span>
                              </div>
                      <button type="button" data-toggle="modal" data-target="#exampleModal" class="hidden-xs col-md-12 brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Proceed</button>
                      <button type="button" data-toggle="modal" data-target="#exampleModal" class="stick2foot hidden-md col-md-12 brook-btn bk-btn-theme btn-lg-size">Proceed</button>


                                    <br>
<p class="bk_pra">
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

    <script>
      function changevalue(price, type){
        document.getElementById('price').value = price;
        document.getElementById('price2').value = price;
        document.getElementById('prod_type').value = type;
        document.getElementById('prod_type2').value = type;
      }
    </script>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <center>
              <h5 class="modal-title" id="exampleModalLabel">Would you like to buy Tempered glass as well?<br>
              <small>It will only cost you &#8377;99!</small></h5>
            </center><br>
            <span class='row'>
              <!-- with tg -->
            <form action="/confirmorder" method="post" class='col-md-6 col-6'>
              {{ csrf_field() }}
              {{ method_field('post') }}
              <input type='hidden' name='ga_id' id='ga_id'>
              <input type='text' name='cus_id' value="{{ Session::get('cus_id') }}" hidden>
              @if(empty(Session::get('color_id')))
              <input type='hidden' name='color_id' value='{{ $color->id }}'>
              @else
              <input type='text' name='color_id' value="{{ Session::get('color_id') }}" hidden>
              @endif
            <input type='hidden' name='price' id='price' value='{{ $pricing->ord_selling_price }}'>
            <input type='hidden' name='prod_type' id='prod_type' value='BASIC'>
            <input type='number' name='tg' value='99' hidden>
              <button type="submit" class="float-right brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Yes</button>
            </form>
            <!-- without tg -->
            <form action="/confirmorder" method="post" class='col-md-6 col-6'>
              {{ csrf_field() }}
              {{ method_field('post') }}
              <input type='hidden' name='ga_id' id='ga_id2'>
              <input type='text' name='cus_id' value="{{ Session::get('cus_id') }}" hidden>
              @if(empty(Session::get('color_id')))
              <input type='hidden' name='color_id' value='{{ $color->id }}'>
              @else
              <input type='text' name='color_id' value="{{ Session::get('color_id') }}" hidden>
              @endif
            <input type='hidden' name='price' id='price2' value='{{ $pricing->ord_selling_price }}'>
            <input type='hidden' name='prod_type' id='prod_type2' value='PREMIUM'>
            <input type='number' name='tg' value='0' hidden>
              <button type="submit" class="float-left brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">No</button>
            </form>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- End Single Product -->
    <div class="brook-icon-boxes-area pb--120 bg_color--1">
        <div class="container">
            <div class="row mt--30">
                <!-- Start Single Icon Boxes -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="icon-box text-center no-border mt--30">
                        <div class="inner">
                            <div class="icon">
                                <i class="ion-ios-eye-outline"></i>
                            </div>
                            <div class="content">
                                <h5 class="heading heading-h5">Modern design</h5>
                                <p class="bk_pra">Brook embraces a modern look with various enhanced
                                    pre-defined page elements.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Icon Boxes -->

                <!-- Start Single Icon Boxes -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="icon-box text-center no-border mt--30">
                        <div class="inner">
                            <div class="icon">
                                <i class="ion-ios-bookmarks-outline"></i>
                            </div>
                            <div class="content">
                                <h5 class="heading heading-h5">Modern design</h5>
                                <p class="bk_pra">This is the theme for businesses & companies operating in a
                                    wide range of areas.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Icon Boxes -->

                <!-- Start Single Icon Boxes -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="icon-box text-center no-border mt--30">
                        <div class="inner">
                            <div class="icon">
                                <i class="ion-ios-browsers-outline"></i>
                            </div>
                            <div class="content">
                                <h5 class="heading heading-h5">Modern design</h5>
                                <p class="bk_pra">Brook is highly responsive thanks to built-in WP Bakery Page
                                    Builder & Slider Revolution.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Icon Boxes -->

            </div>
        </div>
    </div>
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
                        <p>{{ $color->model->description }}</p>
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
