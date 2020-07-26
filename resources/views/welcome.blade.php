@extends('layouts.master')

@section('title') Jobs | Doctor Display @endsection
@section('breadcrumb')
<div class="brook-call-to-action bg_color--3 ptb--70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="call-content text-center text-sm-left">
                    <h3 class="heading heading-h3 text-white wow move-up">Apply for Jobs</h3>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="call-btn text-center text-sm-right mt_mobile--20 wow move-up">
                    <a class="brook-btn bk-btn-white text-theme btn-sd-size btn-rounded" href="https://doctordisplay.in/story">Find out
                        more</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagecontent')
<main class="page-content">


    <!-- Checkout Page Start -->
    <div class="checkout_area pt--80 pb--150">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Form s-->
                    <form action="/insert-jobs" method="post" class="checkout-form">
                      {{ csrf_field() }}
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
                                          <textarea rows=4 name="about"></textarea>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Page End -->
</main>
@endsection
@section('scripts')

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="js/vendor/vendor.min.js"></script>
    <script src="js/plugins.min.js"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="js/revolution.tools.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="js/revolution.extension.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/revoulation.js"></script>
@endsection
