@extends('layouts.master')
@section('title') {{$color->model->brand->name}} {{ $color->model->series }} {{$color->model->name}} Colors | Doctor Display @endsection
@section('metadesc') Get your {{$color->model->brand->name}} {{ $color->model->series }} {{$color->model->name}} screen replaced at your doorstep in chennai within 30 minutes. Book appointment now! @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">Choose your {{$color->model->brand->name}} {{ $color->model->series }} {{ $color->model->name }}'s Color</h2>
                    <small>If you are looking to fix your {{ $color->model->brand->name }} phones, we are there for your rescue. Our team of trained screen repair technicians will come to your doorstep and get your screens replaced whenever you want to fix it.</small>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li><a href="/allbrands">All Brands</a></li>
                            <li><a href="/brand/{{ $color->model->brand->name }}">{{ $color->model->brand->name }} Products</a></li>
                            <li class="current">{{ $color->model->series}} {{ $color->model->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagecontent')
<!-- Modal -->
<main class="page-content brand-page">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <center>
            <h5 class="modal-title" id="exampleModalLabel">How do we reach you?</h5>
          </center><br>
          <form action="/customer" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
          <center>
            <input type="number" name="color_id" value="{{$color->id}}" hidden>
            <input type="hidden" name="ga_id" id="ga_id">
            <input type="text" placeholder="Enter Phone Number"  onkeypress="return isNumberKey(event)"
            minlength="10" maxlength="10" required name="phone">
            <button type="submit" class="brook-btn bk-btn-theme btn-xs-size btn-rounded space-between">Next</button>
          </center>
          </form>
          <center><small>We'll never spam you.</small></center>
        </div>
      </div>
    </div>
  </div>
    <!-- Start Brand Area -->
    <div class="bk-brand-area bg_color--1 ptb--100 ptb-md--80 ptb-sm--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-wrapper">
                        <div class="brand__list brand-default brand-style--3">
                            @foreach($colors as $color)
                            <div class="brand">
                              <a href="#" data-toggle="modal" data-target="#exampleModal">
                                <figure>
                                <img src="../storage/{{$color->image}}" class="logo-thumbnail" alt="{{$color->name}} image">
                                <figcaption>{{$color->name}}</figcaption>
                                </figure>
                              </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand Area -->

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
