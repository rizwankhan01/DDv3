@extends('layouts.master')
@section('title') Order Confirmed | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--100 pt_md--250 pt_sm--80 bg_image--8 breadcaump-title-bar breadcaump-title-white">
</div>
@endsection
@section('pagecontent')
<main class="page-content">
  <div class="container"><br><br>
    <div class="row justify-content-center">
      @if(session('err'))
      Error: {{ session('err') }}
      @endif

      @if(session('response'))
      Response: {{ session('response') }}
      @endif
      <h4 class="h3">Thank you. Your Order has been placed!<Br>
      <center><p class="lead">We've sent you an email. Go check that out.</p></center></h4>
      <div class="col-xl-9 col-lg-10">
        <div class="card card-body shadow-lg">
          <div class="d-flex justify-content-between align-items-start pb-4 pb-md-5 mb-4 mb-md-5 border-bottom">
            <div>
              <h6>Doctor Display Inc.</h6>
              <address>
                <p>Radhakrishnan Saalai,</p>
                <p>Mylapore</p>
                <p>Chennai</p>

              </address>
              <a href="#">info@doctordisplay.com</a>
            </div>
            <img src="https://doctordisplay.in/images/logo-mail.png" class="hidden-xs" alt="DoctorDisplay Logo">
          </div>
          <div class="mb-4">
            <h4>Invoice <small class="badge badge-success">Payable after service</small></h4>
          </div>
          <div class="row justify-content-between mb-4 mb-md-5">
            <div class="col-sm">
              <h6>Invoice to:</h6>
              <div>
                <div>{{ $customer->name }}</div>
                <address>
                  {{ $address->address }}
                  <br />{{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}
                </address>
              </div>
            </div>
            <div class="col-sm col-lg-4">
              <dl class="row text-sm-right">
                <dt class="col-6"><strong>Invoice No.</strong></dt>
                <dd class="col-6">{{ $order->id }}</dd>
                <dt class="col-6"><strong>Appointment Date:</strong></dt>
                <dd class="col-6">{{ $order->slot_date }}</dd>
                <dt class="col-6"><strong>Time:</strong></dt>
                <dd class="col-6">{{ $order->slot_time }}</dd>
              </dl>
            </div>
          </div>
          <div>
            <table class="table mb-0 text-right">
              <thead class="bg-light border-top">
                <tr>
                  <th scope="col" class="border-0 text-left">
                    Item
                  </th>
                  <th scope="col" class="border-0 text-right">
                    Rate
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($olist as $list)
                @if($list->prod_type=='ADDON')
                <tr>
                  <th scope="row" class="text-left">
                    {{$list->addonproduct->name}}
                  </th>
                  <td class="text-right">
                    &#8377; {{ $list->price }}
                  </td>
                </tr>
                @elseif($list->prod_type!='COUPON')
                <tr>
                  <th scope="row" class="text-left">
                    {{ $list->color->model->brand->name}} {{ $list->color->model->series }} {{$list->color->model->name}} ({{$list->color->name}})<br class="hidden-md"> {{ $list->prod_type }}
                  </th>
                  <td class="text-right">
                    &#8377; {{ round($list->price) }}
                  </td>
                </tr>
                @else
                <tr>
                  <th scope="row" class="text-left">
                    {{$list->coupon->name}} - COUPON
                  </th>
                  <td class="text-right">
                    - &#8377; {{ abs($list->price )}}
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-end text-right mb-4 py-4 border-bottom">
              <div>
                <div>Balance due:</div>
                <div class="h4 mb-0 mt-2">&#8377; {{ $olist->sum('price') }}</div>
              </div>
            </div>
          </div>
        </div><br><br>
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
