@extends('layouts.master')
@section('title') Feedback | Doctor Display @endsection
@section('metadesc')  We value your feedback. Let us know how we did on our service. @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">Feedback</h2>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li class="current">Feedback</li>
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
    <div class="brook-contact-form-area ptb--150 ptb-md--80 ptb-sm--60 bg_color--5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="contact-form">
                      @if(!empty($status))
                        {{ $status }}
                      @elseif(!empty($feedback->order_id))
                      <p>Thanks for choosing us to replace your mobile screen! We hope you enjoyed our service.<br>
                      <small>Kindly let us know how we did so that we can improve any shortcomings in the future!</small></p><hr>
                        <Form action='/feedback/{{ $feedback->order_id }}' method='post'>
                          {{ csrf_field() }}
                          {{ method_field('put') }}
                          <table style='width:100%;' class='table'>
                          <tr>
                          <td>Is the Display working fine?</td>
                          <td></td>
                          <td><input type='radio' name='rate4' value='Yes' style='width:20px;height:20px;' required><br>Yes</td>
                          <td><input type='radio' name='rate4' value='No' style='width:20px;height:20px;' required><br>No</td>
                          </tr>
                          <tr>
                          <td>All the points in the display is working?</td>
                          <td></td>
                          <td><input type='radio' name='rate5' value='Yes' style='width:20px;height:20px;' required><br>Yes</td>
                          <td><input type='radio' name='rate5' value='No' style='width:20px;height:20px;' required><br>No</td>
                          </tr>
                          <tr>
                          <td>Is the Home button working?</td>
                          <td></td>
                          <td><input type='radio' name='rate6' value='Yes' style='width:20px;height:20px;' required><br>Yes</td>
                          <td><input type='radio' name='rate6' value='No' style='width:20px;height:20px;' required><br>No</td>
                          </tr>
                          <td>Is the Volume and Power button working?</td>
                          <td></td>
                          <td><input type='radio' name='rate7' value='Yes' style='width:20px;height:20px;' required><br>Yes</td>
                          <td><input type='radio' name='rate7' value='No' style='width:20px;height:20px;' required><br>No</td>
                          </tr>
                          <tr>
                          <td>Does the Mic & Speaker work fine?</td>
                          <td></td>
                          <td><input type='radio' name='rate8' value='Yes' style='width:20px;height:20px;' required><br>Yes</td>
                          <td><input type='radio' name='rate8' value='No' style='width:20px;height:20px;' required><br>No</td>
                          </tr>
                          <tr>
                          <td>Does the screen sensor work?</td>
                          <td></td>
                          <td><input type='radio' name='rate9' value='Yes' style='width:20px;height:20px;' required><br>Yes</td>
                          <td><input type='radio' name='rate9' value='No' style='width:20px;height:20px;' required><br>No</td>
                          </tr>
                          <tr>
                          <td>How much would you rate the service man?</td>
                          <td><input type='radio' name='rate1' value='Poor' style='width:20px;height:20px;' required><br>Poor</td>
                          <td><input type='radio' name='rate1' value='Good' style='width:20px;height:20px;' required><br>Good</td>
                          <td><input type='radio' name='rate1' value='Excellent' style='width:20px;height:20px;' required><br>Excellent</td>
                          </tr>
                          <tr>
                          <td>How good was his communication?</td>
                          <td><input type='radio' name='rate2' value='Poor' style='width:20px;height:20px;' required><br>Poor</td>
                          <td><input type='radio' name='rate2' value='Good' style='width:20px;height:20px;' required><br>Good</td>
                          <td><input type='radio' name='rate2' value='Excellent' style='width:20px;height:20px;' required><br>Excellent</td>
                          </tr>
                          <tr>
                          <td>How was his presentation?</td>
                          <td><input type='radio' name='rate3' value='Poor' style='width:20px;height:20px;' required><br>Poor</td>
                          <td><input type='radio' name='rate3' value='Good' style='width:20px;height:20px;' required><br>Good</td>
                          <td><input type='radio' name='rate3' value='Excellent' style='width:20px;height:20px;' required><br>Excellent</td>
                          </tr>
                          </table>
                          <textarea name='custfeed' cols='30' rows='5' class='form-control' placeholder='Give us your honest feedback!' required></textarea><br>
                          <input type='submit' class='btn btn-primary' name='feed' value='Submit'>
                        </form>
                      @endif
                    </div>
                </div>
            </div>
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
