@extends('layouts.master')
  @section('title')
    @if($brands->name == 'Apple')
      Apple Mobile Doorstep Screen Replacement in Chennai, Bangalore | Doorstep Service| Doctor Display
    @elseif($brands->name == 'Redmi')
      Redmi Mi Mobile Doorstep Screen Replacement service, Chennai, Bangalore | Doctor Display
    @elseif($brands->name == 'One Plus')
      One plus Mobile Doorstep Screen Repair | Replacement at Your Doorstep
    @elseif($brands->name == 'Samsung')
      Samsung Mobile Doorstep Screen Repair Service, Chennai, Bangalore | Doorstep Service | Doctor Display
    @elseif($brands->name == 'Motorola')
      Motorola Mobile Doorstep Screen Replacement | Cracked Screen Repair Service| Doctor Display
    @elseif($brands->name == 'Huawei')
      Huawei Mobile Doorstep Screen Replacement | Doorstep Mobile Repair | Doctor Display
    @elseif($brands->name == 'Lenovo')
      Lenovo Mobile Doorstep Screen service in Chennai, Bangalore | Screen Replacement | Doctor Display
    @elseif($brands->name == 'Asus')
      Asus Mobile Doorstep Screen Replacement | Screen Repair Service | Doctor Display
    @elseif($brands->name == 'Honor')
      Honor Mobile Doorstep Screen Replacement Service at Doorstep | Doctor Display | Book Now
    @elseif($brands->name == 'Nokia')
      Nokia Mobile Doorstep Screen Replacement | Mobile Screen Service | Doctor Display
    @elseif($brands->name == 'Oppo')
      Oppo Mobile Doorstep Screen Service | Screen Replacement | Doctor Display
    @elseif($brands->name == 'Realme')
      Realme Mobile Doorstep Screen Replacement, Chennai, Bangalore | Doctor Display
    @elseif($brands->name == 'Vivo')
      Vivo Mobile Doorstep Screen Replacement | Doctor Display at Your Doorstep
    @elseif($brands->name == 'Sony')
      Sony Mobile Doorstep Screen Replacement in Chennai, Bangalore | Doorstep Service | Doctor Display
    @elseif($brands->name == 'Leeco')
      LeEco Mobile Doorstep Screen Service | Replacement at your Doorstep | Doctor Display
    @elseif($brands->name == 'Gionee')
      Gionee Mobile Screen Doorstep Repair Replacement| Doctor Display | Doorstep Service
    @elseif($brands->name == 'Coolpad')
      Cool pad Mobile Doorstep screen Service In Chennai, Bangalore | Doctor Display
    @elseif($brands->name == 'Google')
      Google pixel Mobile Doorstep Screen Repair Service Online | Doctor Display
    @elseif($brands->name == 'HTC')
      HTC Mobile Doorstep Screen Service | Screen Replacement at Your Doorstep | Doctor Display
    @elseif($brands->name == 'LG')
      LG Mobile Doorstep Screen Replacement in Chennai, Bangalore | Doctor Display
    @endif
  @endsection
  @section('metadesc')
    @if($brands->name == 'Apple')
      Change your broken iPhone screen at your door step. We at Doctor Display get your screens replaced whenever needed at the best price and comfort.
    @elseif($brands->name == 'Redmi')
      Get the best screen replacement for Xiaomi mobiles. We specialize in a variety of Xiaomi Screen repairs and troubleshooting services at affordable costs with high professional service.
    @elseif($brands->name == 'One Plus')
      Book now, get the One Plus mobiles screen placement service, our team of trained screen repair technicians will come to your doorstep and get your screens replaced whenever you want to fix it.
    @elseif($brands->name == 'Samsung')
      Doctor Display provides a reliable Samsung Mobile Screen Replacement service at best costs. Book now and get the service delivered at your door step.
    @elseif($brands->name == 'Motorola')
      Motorola mobile screen repairs anywhere in Chennai, Bangalore, Now enjoy mobile phone Screen replacements at your home or office by our expert technicians with Doctor Display.
    @elseif($brands->name == 'Huawei')
      Doctor Display offers the Chennai, Bangalore’s leading Huawei mobile screen replacement service; submit the form and our experienced technicians will reach you at your door step.
    @elseif($brands->name == 'Lenovo')
      Replace your old damaged Mobile screen in to new, Doctor Display we use genuine parts for Lenovo mobile screen replacement, book now our experienced technicians will reach you at your door step.
    @elseif($brands->name == 'Asus')
      Looking for a reliable service to repair your mobile screen, Doctor Display is the Leading Asus mobile screen replacement service in Chennai, Bangalore offering door step service at best rates.
    @elseif($brands->name == 'Honor')
      Doctor Display is the leading honor Mobile screens Repair & services in Chennai, Bangalore, Get your Online Mobile screen Repair Services at your doorstep.
    @elseif($brands->name == 'Nokia')
      Get your Nokia mobile screen replacement service at your doorstep, Doctor Display is Chennai, Bangalore’s leading Smartphone screen repair destination for millions of people.
    @elseif($brands->name == 'Oppo')
      Doctor Display, All your OPPO phone Screen repairs can be done at your doorstep, get the best mobile screen replacement at an affordable price..
    @elseif($brands->name == 'Realme')
      We offer the best mobile screen service with Doctor Display team; submit a form and our experienced technicians will reach you at your doorstep.
    @elseif($brands->name == 'Vivo')
      Looking for mobile screen service, our team of qualified vivo mobile screen repair technicians will come to your home and replace them.
    @elseif($brands->name == 'Sony')
      Doctor Display offers the best Sony mobile screen service, at your home or workplace. Save your Xperia Phone with Professional Sony screen repair service with us.
    @elseif($brands->name == 'Leeco')
      Get your LeEco le 1 screen replaced at your doorstep in Chennai, Bangalore at affordable rates. Book appointment now.
    @elseif($brands->name == 'Gionee')
      Best Gionee Mobile screen repair services in Chennai, Bangalore, Enquire now and get our technician at your doorstep, your mobile screen will be replaced with in a day.
    @elseif($brands->name == 'Coolpad')
      We provide the same high-quality cool pad mobile screen replacement at your doorstep; get your mobile screen service at doctor display, book now.
    @elseif($brands->name == 'Google')
      Google mobile screen replacement for all models, get your mobile screen repair online book now, our technicians will reach you at your doorstep.
    @elseif($brands->name == 'HTC')
      HTC mobile screen repair services at your doorstep. One stop solution for your entire mobile screen repair. Call us today!
    @elseif($brands->name == 'LG')
      Doctor Display, Chennai, Bangalore's first choice for LG mobile phone screen repair service at best costs in your doorstep. Request a Repair for LG mobile screen service.
    @endif
  @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h1 class="heading">
                      {{ $brands->name }}
                       Screen Repairs</h1>
                    <small>If you are looking to fix your {{ $brands->name }} phones, we are there for your rescue. Our team of trained screen repair technicians will come to your doorstep and get your screens replaced whenever you want to fix it.</small>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li><a href="/allbrands">All Brands</a></li>
                            <li class="current">{{ $brands->name }} Screen Repairs</li>
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
                        <center><h3>{{ $serie }} Series</h3></center>
                        <div class="brand__list brand-default brand-style--2">
                          @foreach($models  as  $model)
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
                    <input type="text" class="form-control" name="model_name" placeholder="Brand & Model Name" required><br>
                    <input type="text" class="form-control" name="customer_name" placeholder="Your Name" required><br>
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" onkeypress="return isNumberKey(event)"
                    minlength="10" maxlength="10" required><br>
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
