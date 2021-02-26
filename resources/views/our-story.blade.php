@extends('layouts.master')
@section('title') Our Story | Doctor Display @endsection
@section('metadesc') For years now I was carrying around a broken mobile screen which my nephew broke.... @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">Our Story</h2>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li class="current">Our Story</li>
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

    <!-- Start Contact Area -->
    <div class="bk_contact_classic bg_color--1 ptb--80 ptb-md--80 ptb-sm--80">
        <div class="container">
            <div class="row">

                <!-- Start Single Slide -->
                <div class="col-lg-12 col-xl-12 col-md-12 col-12 col-sm-12 wow move-up">
                    <div class="classic-address text-center">
                        <div class="desc mt--15">
                            <p>
                              For years now I was carrying around a broken mobile screen which my nephew broke. Not just was it affecting my ego but also my fingers and my work with my phone. Tried asking people where I can get my screen replaced. Went around almost all the service centres and ended up hearing their exorbitant prices for which I could afford a new phone. I always thought when buying a phone has become so easy why not getting my screen replaced be easy. In this process, I ended up having my phone cracked months together.<br><br>

One fine day my friend who had years of experience with mobile services and sales got me the screen replaced within an hour of time at his shop with an unbelievable price. There the Idea of doctor display was born. We thought if we could take this service to the doorstep of every customer who has a broken screen it would be so precious to him. When almost everything today is door delivered why can't this service be door delivered.
<br><br>
There started the journey of Doctor display. We wanted all the problems faced by cracked phone user to get it replace with so much ease and affordable pricing. The biggest problems faced by any customer who gives his phone away for service was the time it consumed, then comes the data security, also the risk of getting parts replaced and finally not having the phone for days together.
<br><br>
All we wanted to focus was a service which is trust worth extremely easy and fast at the best price point possible in the market. Our vision might be too big - No broken mobile screen in the whole world. But wait that is only until the real gorilla glass is invented.
<br><br>
Cheers!!!</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->

            </div>
        </div>
    </div>
    <!-- End Contact Area -->

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
