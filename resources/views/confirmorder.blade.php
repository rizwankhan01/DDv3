@extends('layouts.master')
@section('title') Apple Products | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--100 pt_md--250 pt_sm--80 bg_image--8 breadcaump-title-bar breadcaump-title-white">
</div>
@endsection
@section('pagecontent')
<main class="page-content">
  <div class="modal fade" id="coupon" tabindex="-1" role="dialog" aria-labelledby="couponLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <center>
            <h5 class="modal-title" id="couponLabel">Got a Coupon?</h5>
          </center><br>
          <form action="/confirmorder" method="get">
          <center>
            <input type="text" placeholder="Enter Coupon Code">
            <button type="submit" class="brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Apply</button>
          </center>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="slot" tabindex="-1" role="dialog" aria-labelledby="slotLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <center>
            <h5 class="modal-title" id="slotLabel">When should we come to fix your phone?</h5>
          </center><br>
            <ul class="nav nav-tabs lead mb-4 justify-content-between align-items-end" id="myTab-4" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab-4" data-toggle="tab" href="#slot1" role="tab" aria-controls="home" aria-selected="true">13 Sat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab-4" data-toggle="tab" href="#slot2" role="tab" aria-controls="profile" aria-selected="false">14 Sun</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab-4" data-toggle="tab" href="#slot3" role="tab" aria-controls="contact" aria-selected="false">15 Mon</a>
              </li>
              <li class="nav-item hidden-xs">
                <a class="nav-link" id="contact-tab-4" data-toggle="tab" href="#slot4" role="tab" aria-controls="contact" aria-selected="false">16 Tue</a>
              </li>
            </ul>
            <div class="tab-content flex-grow-1 mt-3 mt-md-4" id="myTabContent-4">
              <div class="tab-pane fade show active" id="slot1" role="tabpanel" aria-labelledby="home-tab-4">
                <div class="card">
                  <div class="card-body row">
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="slot2" role="tabpanel" aria-labelledby="profile-tab-4">
                <div class="card">
                  <div class="card-body row">
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="slot3" role="tabpanel" aria-labelledby="contact-tab-4">
                <div class="card">
                  <div class="card-body row">
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="slot4" role="tabpanel" aria-labelledby="contact-tab-4">
                <div class="card">
                  <div class="card-body row">
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                    <button class='btn btn-sm btn-primary col-md-6 col-6'>10-11:30 AM</button><br><br>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cart_area pt--60">
      <div class="container">
          <div class="row">
              <div class="col-12">
                      <div class="cart-table table-responsive mb--40 hidden-xs">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th class="pro-thumbnail">Image</th>
                                      <th class="pro-title">Product</th>
                                      <th class="pro-price">Price</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="pro-thumbnail"><a href="#"><img src="img/models/01.png"
                                                  alt="Product"></a></td>
                                      <td class="pro-title"><a href="#">Apple iPhone 11 (Ordinary Quality Screen)</a></td>
                                      <td class="pro-price"><span>&#8377; 5000</span></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>

                  <div class="row">
                    <div class="checkout_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Checkout Form s-->
                                    <form action="#" class="checkout-form">
                                        <div class="row">

                                            <div class="col-lg-7 mb--20">

                                                <!-- Billing Address -->
                                                <div id="billing-form" class="mb--40">
                                                    <h4 class="checkout-title">Billing Address</h4>

                                                    <div class="row">

                                                        <div class="col-md-12 col-12 mb--20">
                                                            <label>Full Name*</label>
                                                            <input type="text" placeholder="Full Name">
                                                        </div>

                                                        <div class="col-md-6 col-12 mb--20">
                                                            <label>Email Address*</label>
                                                            <input type="email" placeholder="Email Address">
                                                        </div>

                                                        <div class="col-md-6 col-12 mb--20">
                                                            <label>Phone no*</label>
                                                            <input type="number" placeholder="Phone number">
                                                        </div>

                                                        <div class="col-12 mb--20">
                                                            <label>Address*</label>
                                                            <input type="text" placeholder="Address line 1">
                                                            <input type="text" placeholder="Address line 2">
                                                        </div>

                                                        <div class="col-md-6 col-12 mb--20">
                                                            <label>Pin Code*</label>
                                                            <input type="text" placeholder="Pin Code">
                                                        </div>

                                                        <div class="col-md-6 col-12 mb--20">
                                                            <label>Town/City*</label>
                                                            <input type="text" placeholder="Town/City" value='Chennai' disabled>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-5">
                                                <div class="row">

                                                    <!-- Cart Total -->
                                                    <div class="col-12 mb--60">

                                                        <h4 class="checkout-title">Cart Total</h4>

                                                        <div class="checkout-cart-total">

                                                            <h4>Product <span>Total</span></h4>

                                                            <ul>
                                                                <li>Apple iPhone 11 (Ordinary Quality Screen) <span>&#8377; 295</span></li>
                                                                <li>Tempered Glass<span>&#8377; 99</span></li>
                                                                <li>CGST<span>&#8377; 80</span></li>
                                                                <li>SGST<span>&#8377; 80</span></li>
                                                            </ul>
                                                            <br>
                                                            <h4>Grand Total <span>&#8377; 1250</span></h4>
                                                            <small>Payable at the time of appointment</small>
                                                        </div>

                                                        <div class="plceholder-button hidden-xs"><br>
                                                            <button class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between" data-toggle="modal" data-target="#coupon">Apply Coupon</button>
                                                            <button class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between" data-toggle="modal" data-target="#slot">Place Order</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Page End -->
                  </div>
                  <div class='stick2foot btn btn-primary noborder hidden-md'>
                    <div class='float-left'>&#8377; 3599<br><small><a  data-toggle="modal" data-target="#coupon">Apply Coupon</a></small></div>
                    <div class='float-right'><button class='brook-btn bk-btn-white btn-xs-size btn-rounded space-between' data-toggle="modal" data-target="#slot">Next</button></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
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
