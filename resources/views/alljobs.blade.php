@extends('layouts.master')
@section('title') All Jobs | Doctor Display @endsection
@section('metadesc') @endsection
@section('breadcrumb')
<div class="breadcaump-area pt--125 pt_lg--300 pt_md--250 pt_sm--100 pb--25 bg_image--8 breadcaump-title-bar breadcaump-title-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcaump-inner text-center">
                    <h2 class="heading">All Jobs</h2>
                    <div class="breadcrumb-insite">
                        <ul class="core-breadcaump">
                            <li><a href="/">Home</a></li>
                            <li class="current">All Jobs</li>
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
          <form action="/jobs" method="post" enctype="multipart/form-data"  class="checkout-form">
            {{ csrf_field() }}
            {{ method_field('post') }}
              <div class="row">
                  <div class="col-lg-12 mb--20">
                      <!-- Billing Address -->
                      <div id="billing-form" class="mb--40">
                          <h4 class="checkout-title">Fill out the following form.</h4>

                          <div class="row">
                              <div class="col-md-6 col-12 mb--20">
                                  <label>First Name</label>
                                  <input type="text" placeholder="First Name" name="first_name">
                              </div>

                              <div class="col-md-6 col-12 mb--20">
                                  <label>Last Name</label>
                                  <input type="text" placeholder="Last Name" name="last_name">
                              </div>

                              <div class="col-md-4 col-12 mb--20">
                                  <label>Email Address</label>
                                  <input type="email" placeholder="Email Address" name="email_address">
                              </div>

                              <div class="col-md-4 col-12 mb--20">
                                  <label>Phone no</label>
                                  <input type="number" placeholder="Phone number" name="phone_number">
                              </div>

                              <div class="col-md-4 col-12 mb--20">
                                  <label>Age</label>
                                  <input type="number" placeholder="Age" name="age">
                              </div>

                              <div class="col-md-4 col-12 mb--20">
                                  <label>Gender</label>
                                  <select class="nice-select" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                              </div>

                              <div class="col-md-4 col-12 mb--20">
                                  <label>Nationality</label>
                                  <input type="text" placeholder="Nationality" name="nation">
                              </div>


                              <div class="col-md-4 col-12 mb--20">
                                  <label>Mother Tongue</label>
                                  <input type="text" placeholder="Mother Tongue" name="language">
                              </div>

                              <div class="col-12 mb--20">
                                  <label>Address</label>
                                  <input type="text" placeholder="Address line 1" name="address_line_1">
                                  <input type="text" placeholder="Address line 2" name="address_line_2">
                              </div>


                              <div class="col-md-4 col-12 mb--20">
                                  <label>Town/City</label>
                                  <input type="text" placeholder="Town/City" name="city">
                              </div>

                              <div class="col-md-4 col-12 mb--20">
                                  <label>State</label>
                                  <input type="text" placeholder="State" name="state">
                              </div>

                              <div class="col-md-4 col-12 mb--20">
                                  <label>Pin Code</label>
                                  <input type="number" placeholder="Pin Code" name="pincode">
                              </div>

                              <div class="col-md-6 col-12 mb--20">
                                  <label>Father's Name</label>
                                  <input type="text" placeholder="Father Name" name="father_name">
                              </div>

                              <div class="col-md-6 col-12 mb--20">
                                  <label>Father's Occupation</label>
                                  <input type="text" placeholder="Father Occupation" name="father_occu">
                              </div>

                              <div class="col-md-4 col-12 mb--20">
                                  <label>Marital Status</label>
                                  <div class="check-box">
                                    <input type="checkbox" name="marital_status" value="Single" id="single">
                                    <label for="single">Single</label>
                                  </div>
                                  <div class="check-box">
                                    <input type="checkbox" name="marital_status" value="Married" id="married">
                                    <label for="married">Married</label>
                                  </div>
                              </div>


                              <div class="col-md-4 col-12 mb--20">
                                  <label>Driving License</label>
                                  <div class="check-box">
                                    <input type="checkbox" name="driving" value="Yes" id="yes">
                                    <label for="yes">Yes</label>
                                  </div>
                                  <div class="check-box">
                                    <input type="checkbox" name="driving" value="No" id="no">
                                    <label for="no">No</label>
                                  </div>
                              </div>

                              <div class="col-md-4 col-12 mb--20">
                                  <label>Do you own a Bike?</label>
                                  <div class="check-box">
                                    <input type="checkbox" name="bike" value="Yes" id="yes2">
                                    <label for="yes2">Yes</label>
                                  </div>
                                  <div class="check-box">
                                    <input type="checkbox" name="bike" value="No" id="no2">
                                    <label for="no2">No</label>
                                  </div>
                              </div>

                              <div class="col-md-3 col-12 mb--20">
                                  <label>No. of Years in Mobile Servicing</label>
                                  <input type="number" placeholder="Years" name="years">
                              </div>

                              <div class="col-md-3 col-12 mb--20">
                                  <label>Previous Company Name</label>
                                  <input type="text" placeholder="Previous Company Name" name="prev_comp_name">
                              </div>

                              <div class="col-md-3 col-12 mb--20">
                                  <label>Current Employment Status</label>
                                  <select class="nice-select" name="status">
                                    <option value="">Select Status</option>
                                    <option value="Currently Employed">Currently Employed</option>
                                    <option value="Unemployed">Unemployed</option>
                                  </select>
                              </div>

                              <div class="col-md-3 col-12 mb--20">
                                  <label>Current Salary</label>
                                  <input type="number" placeholder="Current Salary" name="cur_salary">
                              </div>

                              <div class="col-md-6 col-12 mb--20">
                                  <label>Educational Qualification</label>
                                  <input type="text" placeholder="Educational Qualification" name="edu_qua">
                              </div>

                              <div class="col-md-6 col-12 mb--20">
                                  <label>School/ College Name</label>
                                  <input type="text" placeholder="School/ College Name" name="school_name">
                              </div>

                              <div class="col-md-12 col-12 mb--20">
                                <label>About Yourself</label>
                                <textarea rows=4 name="about" class="form-control"></textarea>
                              </div>
                              <div class="col-md-12 col-12 mb--20">
                                <label>Upload your Resume</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile" required>
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <script>
                                  // Add the following code if you want the name of the file appear on select
                                  $(".custom-file-input").on("change", function() {
                                    var fileName = $(this).val().split("\\").pop();
                                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                  });
                                </script>
                              </div>
                              <div class="col-md-12 col-12 mb--20">
                                <center>
                                <button class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between" type="submit">Send</button>
                                </center>
                              </div>
                          </div>

                      </div>

                  </div>
              </div>
          </form>
            <!--<div class="row">
              <div class="col-lg-6 col-md-6 col-12">
                  <div class="career mb--30">
                      <div class="inner">

                          <div class="title">
                              <h3 class="heading heading-h3 text-color-1">Service Executive</h3>
                          </div>

                          <div class="content mt--35">
                              <h6 class="heading heading-h6">ABOUT</h6>
                              <div class="desc mt--25">
                                  <p class="bk_pra">Location: Chennai, Bangalore</p>
                                  <div class="bkseparator--25"></div>
                                  <p class="bk_pra">
                                    We have an urgent job opening for the Mobile repair service executive in Chennai.
                                  </p>
                              </div>
                          </div>

                          <div class="career-list mt--65">
                              <h6 class="heading heading-h6">Desired Profile</h6>
                              <div class="bk-list--2 mt--35">
                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Basic understanding of Mobile phones and their repair techniques of All brands widely used in India</h6>
                                      </div>
                                  </div>
                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Any certification course on mobile servicing will be a additional bonus points</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Must have 1-4 years of experience in Level Mobile phone repair/ Mobile Phone repair</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Troubleshooting skills on Chip level repairs and moderate Soldering Skill</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Proficiency in testing tools like, Multimeter, Jigs and Fixtures</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Basic Computer knowledge and knows how to operate it</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Must be able to read and understand English</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Must have a 2 wheeler driving licence</h6>
                                      </div>
                                  </div>

                              </div>
                              <div class="career-btn mt--60">
                                  <a class="brook-btn bk-btn-dark btn-sd-size btn-rounded space-between" href="#">Apply
                                      now</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                  <div class="career mb--30">
                      <div class="inner">

                          <div class="title">
                              <h3 class="heading heading-h3 text-color-2">Senior designer</h3>
                          </div>

                          <div class="content mt--35">
                              <h6 class="heading heading-h6">ABOUT</h6>
                              <div class="desc mt--25">
                                  <p class="bk_pra">Location: New York city.</p>
                                  <div class="bkseparator--25"></div>
                                  <p class="bk_pra">The quality, integrity, and commitment of our employees
                                      are key factors in our company’s growth, market presence and our
                                      ability to help our clients stay a step ahead of the competition.</p>
                              </div>
                          </div>

                          <div class="career-list mt--65">
                              <h6 class="heading heading-h6">REQUIREMENTS</h6>
                              <div class="bk-list--2 mt--35">
                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Ensure high quality delivery</h6>
                                      </div>
                                  </div>
                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Experience with social media</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Good command of Java, PHP, etc.</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Participate in business discussions</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Good knowledge of technologies &
                                              architecture</h6>
                                      </div>
                                  </div>

                                  <div class="list-header with-ckeck">
                                      <div class="marker dark-color"></div>
                                      <div class="title-wrap">
                                          <h6 class="heading heading-h5">Follow strictly HIPAA and PHI data
                                              security guidelines</h6>
                                      </div>
                                  </div>

                              </div>
                              <div class="career-btn mt--60">
                                  <a class="brook-btn bk-btn-dark btn-sd-size btn-rounded space-between" href="#">Apply
                                      now</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>-->
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
