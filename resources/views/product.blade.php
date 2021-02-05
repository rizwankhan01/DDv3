@extends('layouts.master')
@section('title') {{$models->brand->name}} {{ $models->series }} {{$models->name}} Screen Repair | Doctor Display @endsection
@section('metadesc') Get your {{$models->brand->name}} {{ $models->series }} {{$models->name}} screen replaced at your doorstep in chennai within 30 minutes. Book appointment now! @endsection
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
                  <small style="float:right;">Last Updated: {{ date("M jS, Y", strtotime($models->updated_at))}}</small>
                      <ul class="core-breadcaump">
                          <li><a href="/">Home</a></li>
                          <li><a href="/allbrands">All Brands</a></li>
                          <li><a href="/brand/{{ $models->brand->name }}">{{ $models->brand->name }} Products</a></li>
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
                              <span style="font-size:12px;">{{$models->description}}</span>
                        </div><br>
                            <div class="price" style="margin-bottom:0px;">
                                <p class="theme-color">
                                  <?php $selected_color = $color->name; ?>
                                  @foreach($colors as $color)
                                    @if($color->name==$selected_color)
                                      <!-- Insert form like logout button here to change value-->
                                      <a href='/product/{{$models->id}}/{{$color->name}}' style="color:#FCC72D;"><u>{{ ucfirst($color->name) }}</u></a>&nbsp;&nbsp;&nbsp;
                                    @else
                                      <a href='/product/{{$models->id}}/{{$color->name}}'><u>{{ ucfirst($color->name) }}</u></a>&nbsp;&nbsp;&nbsp;
                                    @endif
                                  @endforeach
                                </p>
                                <p>Select Screen Quality:</p>
                            </div>
                            <div class="description">
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
                      <button type="button" data-toggle="modal" data-target="#exampleModal" class="hidden-xs col-md-12 brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Proceed</button>
                      <button type="button" data-toggle="modal" data-target="#exampleModal" class="stick2foot hidden-md col-md-12 brook-btn bk-btn-theme btn-lg-size">Proceed</button>


                                    <br>
<p class="bk_pra">
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
                                <p class="bk_pra">Get your screens replaced with warranty for 3 months, No Questions asked.</p>
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
    <!-- Start Product Review -->
    <div class="product_review pb--100 pb_md--80 pb_sm--60" style="padding-top:0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="description_nav nav nav-tabs d-block" role="tablist">
                      <a class="active" id="nav-review" data-toggle="tab" href="#review" role="tab"
                        aria-controls="review" aria-selected="false">Reviews</a>
                        <!--<a id="descrip-tab" data-toggle="tab" href="#descrip" role="tab"
                            aria-controls="descrip" aria-selected="true">Description</a>-->
                    </div>
                </div>
            </div>
            <div class="tab_container">
              <div class="single_review_content tab-pane fade show active" id="review" role="tabpanel">
                <div class="brook-testimonial-area ptb-md--80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12"><h4>Customers who replaced {{ $models->brand->name }} {{ $models->series }} {{ $models->name }} screen said</h4></div>

                            @foreach($orders as $olist)
                            @if(!empty($olist->order->closedorder->feedback))
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="testimonial testimonial_style--1">
                                    <div class="content">
                                        <p class="bk_pra">{{ $olist->order->closedorder->feedback }}</p>
                                        <div class="testimonial-info">
                                            <div class="clint-info">
                                                <h6>{{ $olist->order->customer->name }}</h6>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="fa fa-quote-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach

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
