@extends('layouts.master')
@section('title') {{ $brands->name }} Products | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">
                      {{ $brands->name }}
                       Products</h2>
                    <small>If you are looking to fix your {{ $brands->name }} phones, we are there for your rescue. Our team of trained screen repair technicians will come to your doorstep and get your screens replaced whenever you want to fix it.</small>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li><a href="/allbrands">All Brands</a></li>
                            <li class="current">{{ $brands->name }} Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagecontent')
<main class="page-content brand-page">

    <!-- Start Brand Area -->
    <div class="bk-brand-area bg_color--1 ptb--100 ptb-md--80 ptb-sm--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                      <?php $series = $models; ?>
                      <div class="brand-wrapper">
                        @foreach($series as $serie => $models)
                        <center><h3>{{ $serie }}</h3></center>
                        <div class="brand__list brand-default brand-style--2">
                          @foreach($models  as  $model)
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
                                  @if(!empty($image))
                                    <img src="../storage/{{$image}}" class="logo-thumbnail" alt="{{ $image }} image">
                                  @else
                                    <img src="../storage/placeholder.png" class="logo-thumbnail" alt="{{ $model->image }} image">
                                  @endif
                                  <figcaption>{{ $model->brand->name }} {{$model->series }} {{ $model->name }}</figcaption>
                                </figure>
                              </a>
                            </div>
                          @endforeach<br><br><br>
                        </div><br><br>
                        @endforeach
                      </div>
                </div>
            </div><hr><br><br>
            <div class="row">
              <div class="col-lg-12">
                <center>
                  <h5>Unable to find your Model?<br>
                  <small>Generate an enquiry with your model information and we will get back to you.</small></h5>
                  <form action="/enquire" method="post" class="col-md-8">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <input type="text" class="form-control" name="model_name" placeholder="Brand & Model Name"><br>
                    <input type="text" class="form-control" name="customer_name" placeholder="Your Name"><br>
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" onkeypress="return isNumberKey(event)"
                    minlength="10" maxlength="10"><br>
                    <input type="text" class="form-control" name="city" placeholder="City"><br>
                    <input type="hidden" name="ga_id" id="ga_id">
                    <input type="submit" class="btn btn-sm btn-primary col-md-6" value="Enquire" name="enquire">
                  </form>
                </center>
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
