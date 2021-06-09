@extends('layouts.master')
@section('title') {{ $models->brand->name }} {{ $models->series }} {{ $models->name }} Doorstep Screen Repair at {{ $pricing->ord_selling_price }} INR Only | Doctor Display @endsection
@section('metadesc') Get your {{ $models->brand->name }} {{ $models->series }} {{ $models->name }} screen repair from the most trusted
  screen replacement service in Chennai, Bangalore at your doorstep in 30 minutes. Our trained technicians follow covid guidelines when they come to
  fix your screens. You choose the place and time to repair your broken screens. Book your appointment now! @endsection
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
                <td>30 days</td>
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
                <td>&#8377; {{ $pricing->ord_selling_price ?? '' }}</td>
                <td>&#8377; {{ $pricing->org_selling_price ?? '' }}</td>
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
                  <small style="float:right;">Last Updated: {{ date("M jS, Y", strtotime($models->updated_at))}}</small>
                      <ul class="core-breadcaump">
                          <li><a href="/">Home</a></li>
                          <li><a href="/allbrands">All Brands</a></li>
                          <li><a href="/{{ $models->brand->name }}-screen-service-center">{{ $models->brand->name }} Screen Repairs</a></li>
                          <li class="current">{{ $models->series}} {{$models->name}}</li>
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
                                <img class="w-100" src="../../storage/{{$color->image}}" alt="{{$models->brand->name}} {{ $models->series }} {{$models->name}} - {{$color->name}} image">
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
                                <img class="w-t float-left hidden-md" src="../../storage/{{$color->image}}" alt="{{$models->brand->name}} {{ $models->series }} {{$models->name}} - {{$color->name}} image">
                                <h1 class="heading heading-h4">{{$models->brand->name}} {{ $models->series }} {{$models->name}}</h1>&nbsp;&nbsp;
                                <!--<div class="product-badges">
                                    <span>New</span>
                                </div>-->
                            </div>
                            <div class="product">
                            <!--<div class="product-info" style="float:left;">
                            <ul class="rating">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i> </li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                &nbsp;&nbsp;5 (8 Reviews)
                            </ul>
                          </div><br><br>-->
                              <span style="font-size:12px;">{{ $models->description }}</span>
                        </div><br>
                            <div class="price row col-12" style="margin-bottom:0px;">
                                <p class="theme-color">
                                  <?php $selected_color = $color->name; ?>
                                  @foreach($colors as $color)
                                    @if(!empty($color->pricings->ord_selling_price) || !empty($color->pricings->org_selling_price))
                                      @if($color->name==$selected_color)
                                        <a style="color:#FCC72D;float:left;cursor:pointer;" onclick="event.preventDefault();document.getElementById('color{{ $color->id }}').submit();">
                                          <u>{{ ucfirst($color->name) }}</u>
                                        </a>&nbsp;&nbsp;&nbsp;
                                        <form id="color{{ $color->id }}" action="screen-repair-{{ $models->brand->name }}-{{ $models->series }}-{{ $models->name }}" method="POST">
                                          {{ csrf_field() }}
                                          {{ method_field('post') }}
                                          <input type='hidden' name='color_id' value='{{ $color->id }}'>
                                        </form>
                                      @else
                                        <a style="float:left;cursor:pointer;" onclick="event.preventDefault();document.getElementById('color{{ $color->id }}').submit();">
                                          <u>{{ ucfirst($color->name) }}</u>
                                        </a>&nbsp;&nbsp;&nbsp;
                                        <form id="color{{ $color->id }}" action="screen-repair-{{ $models->brand->name }}-{{ $models->series }}-{{ $models->name }}" method="POST">
                                          {{ csrf_field() }}
                                          {{ method_field('post') }}
                                          <input type='hidden' name='color_id' value='{{ $color->id }}'>
                                        </form>
                                      @endif
                                    @endif
                                  @endforeach
                                </p>
                            </div>
                            <div class="description">
                              <p>Select Screen Quality:</p>
                              <div class="row">
                                    <ul class="nav nav-pills mb-3 col-md-12 col-xs-12" id="pills-tab" role="tablist">
                                      @if($pricing->ord_stock_availablity==1)
                                        <li class="nav-item col-md-3 col-xs-6">
                                            <a class="nav-link @if($pricing->preferred_type=='BASIC') active  @endif" id="basic-tab" data-toggle="pill"
                                                href="#basic" role="tab" aria-controls="basic"
                                                aria-selected="true" style="border: 1px solid #ddd;"
                                                onclick="changevalue({{ $pricing->ord_selling_price }},'BASIC')">Basic</a>
                                        </li>
                                      @else
                                        <li class="nav-item col-md-3 col-xs-6">
                                            <a class="nav-link @if($pricing->preferred_type=='BASIC') active  @endif" id="basic-tab" data-toggle="pill"
                                                href="#basicnone" role="tab" aria-controls="basic"
                                                aria-selected="true" style="border: 1px solid #ddd;"
                                                onclick="changevalue({{ $pricing->ord_selling_price }},'BASIC')">Basic</a>
                                        </li>
                                      @endif
                                      @if($pricing->org_stock_availablity==1)
                                        <li class="nav-item col-md-3 col-xs-6">
                                            <a class="nav-link @if($pricing->preferred_type=='PREMIUM') active  @endif" id="premium-tab" data-toggle="pill"
                                                href="#premium" role="tab" aria-controls="premium"
                                                aria-selected="false" style="border: 1px solid #ddd;"
                                                onclick="changevalue({{ $pricing->org_selling_price }},'PREMIUM')">Premium</a>
                                        </li>
                                      @else
                                        <li class="nav-item col-md-3 col-xs-6">
                                          <a class="nav-link @if($pricing->preferred_type=='PREMIUM') active  @endif" id="premium-tab" data-toggle="pill"
                                              href="#premiumnone" role="tab" aria-controls="premium"
                                              aria-selected="false" style="border: 1px solid #ddd;"
                                              onclick="changevalue({{ $pricing->org_selling_price }},'PREMIUM')">Premium</a>
                                        </li>
                                      @endif
                                    </ul>
                                    <span class="nav-item col-md-12 col-xs-12 tab-content" id="pills-tabContent">
                                      @if($pricing->ord_stock_availablity==1)
                                      <div class="tab-pane fade @if($pricing->preferred_type=='BASIC') show active  @endif" id="basic" role="tabpanel"
                                          aria-labelledby="basic-tab">
                                          <h4>Price: <strike class="red">&#8377; {{ $pricing->ord_selling_price+300 }}</strike> <span class="green">&#8377; {{ $pricing->ord_selling_price }}</span></h4>
                                          <button type="button" data-toggle="modal" data-target="#exampleModal" class="hidden-xs col-md-12 brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Book now & Pay Later!</button>
                                          <button type="button" data-toggle="modal" data-target="#exampleModal" class="stick2foot hidden-md col-md-12 brook-btn bk-btn-theme btn-lg-size">Book now & Pay Later!</button>
                                      </div>
                                      @else
                                      <div class="tab-pane fade @if($pricing->preferred_type=='BASIC') show active  @endif" id="basicnone" role="tabpanel"
                                          aria-labelledby="basic-tab">
                                          <h4>Stock Unavailable</h4>
                                      </div>
                                      @endif
                                      @if($pricing->org_stock_availablity==1)
                                      <div class="tab-pane fade @if($pricing->preferred_type=='PREMIUM') show active  @endif" id="premium" role="tabpanel"
                                          aria-labelledby="premium-tab">
                                          <h4>Price: <strike class="red">&#8377; {{ $pricing->org_selling_price+250 }}</strike> <span class="green">&#8377; {{ $pricing->org_selling_price }}</span></h4>
                                          <button type="button" data-toggle="modal" data-target="#exampleModal" class="hidden-xs col-md-12 brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Book now & Pay Later!</button>
                                          <button type="button" data-toggle="modal" data-target="#exampleModal" class="stick2foot hidden-md col-md-12 brook-btn bk-btn-theme btn-lg-size">Book now & Pay Later!</button>
                                      </div>
                                      @else
                                      <div class="tab-pane fade @if($pricing->preferred_type=='PREMIUM') show active  @endif" id="premiumnone" role="tabpanel"
                                          aria-labelledby="premium-tab">
                                          <h4>Stock Unavailable</h4>
                                      </div>
                                      @endif
                                      <u><small><a href="#" class="icon" data-toggle="modal" data-target="#compare">
                                        See the difference between Basic and Premium Screens?</a></small></u>
                                    </span>
                              </div>
                                    <br>
<p class="bk_pra">
* We accept payments by Card, Cash and UPI only after you're happy with the replaced screens.<br>
* You can cancel your appointment anytime if you change your mind.<br>
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
            @if($pricing->preferred_type=='PREMIUM')
              <input type='hidden' name='price' id='price' value='{{ $pricing->org_selling_price }}'>
              <input type='hidden' name='prod_type' id='prod_type' value='PREMIUM'>
            @else
              <input type='hidden' name='price' id='price' value='{{ $pricing->ord_selling_price }}'>
              <input type='hidden' name='prod_type' id='prod_type' value='BASIC'>
            @endif
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
            @if($pricing->preferred_type=='PREMIUM')
              <input type='hidden' name='price' id='price2' value='{{ $pricing->org_selling_price }}'>
              <input type='hidden' name='prod_type' id='prod_type2' value='PREMIUM'>
            @else
              <input type='hidden' name='price' id='price2' value='{{ $pricing->ord_selling_price }}'>
              <input type='hidden' name='prod_type' id='prod_type2' value='BASIC'>
            @endif
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
                            <i class="ion-ios-analytics-outline"></i>
                        </div>
                        <div class="content">
                            <h5 class="heading heading-h5">100% Data Security</h5>
                            <p class="bk_pra">Get your screen replaced right in front of your eyes. All your data is safe.</p>
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
                                <i class="ion-ios-calendar-outline"></i>
                            </div>
                            <div class="content">
                                <h5 class="heading heading-h5">90 Days Warranty</h5>
                                <p class="bk_pra">Get your premium screens replaced with warranty for 3 months, No Questions asked.</p>
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
                                <i class="ion-happy-outline"></i>
                            </div>
                            <div class="content">
                                <h5 class="heading heading-h5">5000+ Happy Customers</h5>
                                <p class="bk_pra">Professional service at your doorstep. Don't believe us? See Our Google Reviews.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Icon Boxes -->

            </div>
        </div>
    </div>
    @if(empty($reviews)===false)
      <div class="brook-testimonial-area bg_color--7">
          <div class="row row--0 align-items-center">
              <div class="col-lg-3 col-xl-6 text-center ptb-md--80 ptb-sm--80">
                  <div class="brook-section-title text-left title-max-width plr_sm--30 plr_md--40">
                      <h3 class="heading heading-h3 text-white">What <br>people say<br> about us</h3>
                  </div>
              </div>

              <div class="col-lg-9 col-xl-6">
                  <div class="brook-element-carousel slick-arrow-center slick-arrow-triggle slick-arrow-trigglestyle-2 testimonial-space-right testimonial-color-variation"
                      data-slick-options='{
                              "spaceBetween": 0,
                              "slidesToShow": 2,
                              "slidesToScroll": 1,
                              "arrows": true,
                              "infinite": true,
                              "centerMode":true,
                              "dots": false,
                              "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fas fa-angle-left" },
                              "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fas fa-angle-right" }
                          }'
                      data-slick-responsive='[
                              {"breakpoint":768, "settings": {"slidesToShow": 3}},
                              {"breakpoint":577, "settings": {"slidesToShow": 1}},
                              {"breakpoint":481, "settings": {"slidesToShow": 1}}
                          ]'>
                      @foreach($reviews as $review)
                      <!-- Start Single Testimonial -->
                      <div class="testimonial testimonial_style--1 hover-transparent space-large--topbottom bg-dark">
                          <div class="content">
                              <p class="bk_pra">“{{ $review->feedback }}”</p>
                              <div class="testimonial-info">
                                  <div class="post-thumbnail">
                                      <img src="/storage/{{ $review->model->image }}" alt="{{ $review->model->name }}">
                                  </div>
                                  <div class="clint-info">
                                      <h6>{{ $review->customer->name }}</h6>
                                      <span>{{ $review->model->name }}</span>
                                  </div>
                              </div>
                              <div class="testimonial-quote">
                                  <span class="fa fa-quote-right"></span>
                              </div>
                          </div>
                      </div>
                      @endforeach
                      <!-- End Single Testimonial -->
                  </div>
              </div>
          </div>
      </div>
    @endif
    <!-- Start Product Review -->
    @if(!empty($color->model->big_description))
    <div class="product_review pb--100 pb_md--80 pb_sm--60" style="padding-top:0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="description_nav nav nav-tabs d-block" role="tablist">
                      <!--<a class="active" id="nav-review" data-toggle="tab" href="#review" role="tab"
                        aria-controls="review" aria-selected="false">Reviews</a>-->
                        <a class="active" id="descrip-tab" data-toggle="tab" href="#descrip" role="tab"
                            aria-controls="descrip" aria-selected="true">Description</a>
                    </div>
                </div>
            </div>
            <div class="tab_container">
              <div class="single_review_content tab-pane fade" id="review" role="tabpanel">
                <div class="brook-testimonial-area ptb-md--80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12"><h4>Customers who replaced screens with us said</h4></div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="testimonial testimonial_style--1">
                                    <div class="content">
                                        <p class="bk_pra">Thanks for your prompt service,  All the vendors I contacted were providing
                                          service at their centers with pick up and drop facility, you were the only one willing to do
                                          service at door step, broken Motorola one fusion plus screen was fixed in less than 30 mins,
                                          best part was no unnecessary conversation, safety protocol followed.
                                          Happy to see talented young professionals offering quality service at door step. Keep it up</p>
                                        <div class="testimonial-info">
                                            <div class="clint-info">
                                                <h6>Dee v</h6>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="testimonial testimonial_style--1">
                                    <div class="content">
                                        <p class="bk_pra">Fantastic job done.. I had changed display  twice within 2 months as I broke it twice..
                                          Professional tools used and the service person is knowledgeable on his work and does it real quick.
                                          Maximum time 30 mins if the display matches your phone without any other issues..
                                          Price is slightly higher than market but worth it for the timely and error free service..
                                          Most importantly zero data theft.. They do it in front of you at your place so no need to worry about backing
                                          up the data or formatting the phone before you give it to them.. Great service.. Keep rocking Doctor Display.
                                          100% Recommended for reliable, fast and timely service.</p>
                                        <div class="testimonial-info">
                                            <div class="clint-info">
                                                <h6>Shobs</h6>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="testimonial testimonial_style--1">
                                    <div class="content">
                                        <p class="bk_pra">Hands down, one of the best way to get your mobile fixed.
                                          Hassle free experience the person attended was polite and we'll knowledge of what is required.
                                          If your looking for a display to be replaced Doctor Display is the right guys to get it done</p>
                                        <div class="testimonial-info">
                                            <div class="clint-info">
                                                <h6>Karthi Keyan</h6>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="testimonial testimonial_style--1">
                                    <div class="content">
                                        <p class="bk_pra">Whenever my screen is broken I always search for doctor display. And Yasir (hope the spelling is correct)is the man.. always a smile on his face and clean in his work. He will take utmost care and tell you openly what all is wrong. The most important thing about them is they will do the repair in front of you so you need not be worried about you phone privacy. I had repaired my honor 8pro screen and now honor play. Special mention to Rizwan for arranging the screen and appointment before the new year. You guys rock please continue this good work. And yea the cost is very affordable. Thank you guys Happy New year 2021</p>
                                        <div class="testimonial-info">
                                            <div class="clint-info">
                                                <h6>Jay Kumar</h6>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="testimonial testimonial_style--1">
                                    <div class="content">
                                        <p class="bk_pra">Replaced my iPhone XR screen recently and Doctor Display did a commendable job. Best customer service, high quality display and cheap price. And all this at my doorstep. The technician who visited was very professional, followed all Covid-19 safety protocols and replaced the display in under 20 minutes. I highly recommend Doctor Display.</p>
                                        <div class="testimonial-info">
                                            <div class="clint-info">
                                                <h6>Arun Raghupathy</h6>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="testimonial testimonial_style--1">
                                    <div class="content">
                                        <p class="bk_pra">Replaced  Xiaomi Note 5 Pro screen today with Doctor Display. Quick response to order. Got my order done on the same day! the service guy was very courteous and well behaved took his time to explain in detail the issues. did a neat service. my phone is good as new.  These guys really understood the urgency of the situation and responded real quick! Thank you Doctordisplay!</p>
                                        <div class="testimonial-info">
                                            <div class="clint-info">
                                                <h6>Jai</h6>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
              </div>
                <div class="single_review_content tab-pane fade show active" id="descrip" role="tabpanel">
                    <div class="content">
                        <?php echo $color->model->big_description; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- End Product Review -->
    <div class="container" style="padding-top:50px;">
        <div class="row">
            <div class="col-lg-12">
              <div class="brand-wrapper">
                <center><h5>Other {{ $models->brand->name }} Phone's we repair</h5></center>
                <div class="brand__list brand-default brand-style--2">
                  @if(!empty($othermodels))
                  @foreach($othermodels  as  $model)
                    @if($model->colortypes!='[]')
                    <div class="brand">
                      <a href="/colors/{{ $model->id }}">
                        <figure>
                          @foreach($model->colortypes as $colors)
                            @if(!empty($colors->image))
                              <?php $image = $colors->image; ?>
                              @break
                            @else
                              <?php $image = $model->image; ?>
                            @endif
                          @endforeach
                          <?php $file = '/var/www/DDV2/storage/app/public/'.$image; ?>
                          @if(!empty($image) AND file_exists($file))
                            <img src="../storage/{{$image}}" class="logo-thumbnail" alt="{{ $image }} image">
                          @else
                            <img src="../storage/placeholder.png" class="logo-thumbnail" alt="{{ $model->brand->name }} {{$model->series }} {{ $model->name }} image">
                          @endif
                          <figcaption>{{ $model->brand->name }} {{$model->series }} {{ $model->name }}</figcaption>
                        </figure>
                      </a>
                    </div>
                    @endif
                  @endforeach<br><br><br>
                @endif
                </div>
              </div>
            </div>
        </div><br><br>
      </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <div class="brand-wrapper">
                <center><h5>Other Brands we repair</h5></center>
                <div class="brand__list brand-default brand-style--2">
                  @if(!empty($otherbrands))
                  @foreach($otherbrands as $brand)
                    <div class="brand">
                      <a href="{{$brand->name}}-screen-service-center">
                        <figure>
                          <img src="storage/{{ $brand->brand_logo }}" class="logo-thumbnail" alt="{{$brand->name}} logo">
                          <figcaption>{{$brand->name}}</figcaption>
                        </figure>
                      </a>
                    </div>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
        </div><br><br>
      </div>

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

@endsection
