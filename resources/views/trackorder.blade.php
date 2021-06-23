@extends('layouts.master')
@section('title') Track your Order | Doctor Display @endsection
@section('metadesc') You can track your Screen Replacement order/ appointment here! @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">Track your Order</h2>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li class="current">Track your Order</li>
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

    <!-- Start Contact Form  -->
    <div class="brook-contact-form-area pt--80 pb--150 ptb-md--80 ptb-sm--60 bg_color--5">
      @if(!empty($order))
        @foreach($order->order_lists as $list)
          @if($list->prod_type=='PREMIUM' || $list->prod_type=='BASIC')
            <?php
              $model = $list->color->model->brand->name." ".$list->color->model->series." ".$list->color->model->name;
              $color = $list->color->name;
              $screen_color = $list->color->screen_color;
              $type  = $list->prod_type;
              $image = $list->color->image;
            ?>
          @endif
        @endforeach
        <div class="container">
          <div class="row pb--80">
                        <!-- Portfolio Left -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="portfolio-left bk-portfolio-details wow move-up">
                                <div class="portfolio-main-info">
                                    <h2 class="heading heading-h2 line-height-1-42">
                                      <img src='/storage/{{ $image }}' style="width:20%;height:auto;">
                                        {{ $model }}  {{ $color }} - <small>{{ $type }}</small>
                                    </h2>
                                    <!-- Start Details List -->
                                    <div class="portfolio-details-list mt--60">

                                        <div class="details-list">
                                          <label>Appointment Date</label>
                                            <span>{{ date('d-m-Y',strtotime($order->slot_date)) }}</span>
                                        </div>

                                        <div class="details-list">
                                            <label>Appointment Time</label>
                                            <span>{{ $order->slot_time }}</span>
                                        </div>

                                        <div class="details-list">
                                            <label>Customer</label>
                                            <span><a href="#">{{ $order->customer->name }}<br>{{ $order->customer->phone_number }}<br>{{ $order->customer->email }}</a></span>
                                        </div>

                                        <div class="details-list">
                                            <label>Address</label>
                                            <span>{{ $order->address->address }}, {{ $order->address->area }}, {{ $order->address->city }} - {{ $order->address->pincode }}</span>
                                        </div>

                                    </div>
                                    <!-- End Details List -->
                                </div>
                            </div>
                        </div>

                        <!-- Portfolio Right -->
                        <div class="col-lg-7 col-md-6 offset-lg-1 col-12">
                            <div class="portfolio-left bk-portfolio-details mt_sm--30">
                                <div class="portfolio-main-info">
                                    <div class="portfolio-content">
                                        <h6 class="heading heading-h6 wow move-up">MORE INFO ABOUT THE PHONE</h6>

                                        <div class="desc mt--40">
                                            <div class="content mb--25 wow move-up">
                                              <div class="portfolio-details-list mt--60">

                                                  <div class="details-list">
                                                    <label>Phone Age</label>
                                                      <span>{{ $consult->q5 ?? 'Not Found' }}</span>
                                                  </div>

                                                  <div class="details-list">
                                                      <label>Phone Condition</label>
                                                      <span>{{ $consult->q1 ?? 'Not Found' }}</span>
                                                  </div>

                                                  <div class="details-list">
                                                      <label>Damage Type</label>
                                                      <span>{{ $consult->q2 ?? 'Not Found' }}</span>
                                                  </div>

                                                  <div class="details-list">
                                                      <label>Screen replaced before</label>
                                                      <span>{{ $consult->q6 ?? 'Not Found' }}</span>
                                                  </div>

                                              </div>
                                            </div>

                                            <!--<div class="portfolio-btn">
                                                <a class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between"
                                                    href="#">Go to link</a>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                            <div class="container">
                                <div class="row pb--100">
                                    <div class="col-lg-12">

                                        <div class="bk-title--default text-center">
                                            <h5 class="heading heading-h5 theme-color">Order ID: #{{ $order->id }}</h5>
                                            <div class="bkseparator--30"></div>
                                            <h3 class="heading heading-h3">Order Status</h3>
                                        </div>

                                        <div class="bk-gradation mt--30 mt_sm--5">

                                            <!-- Start Single Gradation -->
                                            <div class="item-grid mt--40 move-up-x wow" data-wow-delay=".13s">
                                                <div class="line"></div>
                                                <div class="dot-wrap">
                                                    <div class="dot" @if($order->status>=1) style="background:#24b11b" @else style="background:#ccc" @endif>
                                                        <div class="count">1</div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h5 class="heading heading-h5">Order Recieved</h5>
                                                    <p class="bk_pra">We've got your order and are working on it.</p>
                                                </div>
                                            </div>
                                            <!-- End Single Gradation -->

                                            <!-- Start Single Gradation -->
                                            <div class="item-grid mt--40 move-up-x wow" data-wow-delay=".19s">
                                                <div class="line"></div>
                                                <div class="dot-wrap">
                                                    <div class="dot" @if(!empty($consult->id)) style="background:#24b11b" @else style="background:#ccc" @endif>
                                                        <div class="count">2</div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h5 class="heading heading-h5">Consultation Done</h5>
                                                    <p class="bk_pra">
                                                      @if(!empty($consult->id))
                                                        We spoke with you to consult your damaged phone.
                                                      @else
                                                        We will call your shortly to consult your damaged phone
                                                      @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- End Single Gradation -->

                                            <!-- Start Single Gradation -->
                                            <div class="item-grid mt--40 move-up-x wow" data-wow-delay=".2s">
                                                <div class="line"></div>
                                                <div class="dot-wrap">
                                                    <div class="dot" @if(!empty($order->serviceman_id)) style="background:#24b11b" @else style="background:#ccc" @endif>
                                                        <div class="count">3</div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h5 class="heading heading-h5">Technician Assigned</h5>
                                                    <p class="bk_pra">
                                                      @if(!empty($order->serviceman->name))
                                                        <a tooltip="Service Technician">{{ $order->serviceman->name }}</a> has been assigned to fix your screen.
                                                      @else
                                                        we are yet to assign a technician for your order
                                                      @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- End Single Gradation -->

                                            <!-- Start Single Gradation -->
                                            <div class="item-grid mt--40 move-up-x wow" data-wow-delay=".25s">
                                                <div class="line"></div>
                                                <div class="dot-wrap">
                                                    <div class="dot" @if($order->status==3) style="background:#24b11b" @else style="background:#ccc" @endif>
                                                        <div class="count">4</div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h5 class="heading heading-h5">Order Completed</h5>
                                                    <p class="bk_pra">
                                                      @if($order->status==3)
                                                        Thanks for fixing screen with us. See Warranty Policy.
                                                      @else
                                                        This is the final step. You know when it happens.
                                                      @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- End Single Gradation -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                          @else
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-form">
                      <p>Enter the following details to check your order status!<br>
                      <small>Your brand new screen is on it's way.</small></p><hr>
                        <form action="/track-your-order" method="post">
                          {{ csrf_field() }}
                          {{ method_field('post') }}
                            <div class="row">
                                <div class="col-lg-12">
                                  <input name="order_id" type="number" placeholder="Order ID" required>
                                    @if(session('status'))
                                      <small><b>{{ session('status') }}</b></small>
                                    @endif
                                </div>
                                <div class="col-lg-12 mt--30">
                                    <input name="phone" type="number" placeholder="Phone Number" required>
                                </div>
                                <div class="col-lg-12 mt--30">
                                  <input type="submit" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          @endif
        </div>
    </div>
    <!-- End Contact Form  -->

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
