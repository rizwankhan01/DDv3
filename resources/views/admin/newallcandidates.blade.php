@extends('layouts.hr')
@section('title') All Candidates for Lead Technician | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="modal fade show" id="scheduleinterview" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true"
  v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="CreateModalLabel">Schedule Interview</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <form action='' method='post'>
    <div class="form-group">
      <label>Candidate Name</label>
      <input type='text' class='form-control' value='Sameer' disabled>
    </div>
    <div class="form-group">
      <label>Role</label>
      <input type='text' class='form-control' value='Service Man' disabled>
    </div>
    <div class="form-group">
      <label>Interview taken by</label>
      <select class="select2-multi-select form-control" name="states[]" multiple="multiple">
              <option value="AK">Rizwan</option>
              <option value="HI">Sheik</option>
              <option value="CA">Yasir</option>
      </select>
    </div>
    <div class="form-group">
      <label>Date</label>
      <input type='date' class='form-control'>
    </div>
    <div class="form-group">
      <label>Time</label>
      <input type='time' class='form-control'>
    </div>
    <div class='form-group'>
      <input type='submit' class='btn btn-primary pull-right' value='Schedule'>
    </div>
  </form>
  </div>
  </div>
  </div>
  </div>
  <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
          <h6>Candidate Information</h6> <a href="javascript:void(0)" id="infobar-settings-close"><i class="feather icon-x"></i></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row align-items-center pb-3">
                      <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">
                                  <li class="media">
                                      <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder">
                                      <div class="media-body">
                                      <h5 class="mt-0 mb-1 font-16">Candidate Name <span class="badge badge-danger">Unemployed</span>
                                        <span class="btn btn-sm btn-warning float-right font-14" data-toggle="modal" data-target="#scheduleinterview"><i class="feather icon-calendar"></i> Schedule Interview</span>
                                      </h5>
                                      <p class="mb-0"><a href='#'>candidate@email.com</a> | <a href='#'>9874563210</a><br><small>Applied two days ago</small></p>
                                      </div>
                                  </li>
                                </h5>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-info mr-2"></i>Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab-line" data-toggle="tab" href="#contact-line" role="tab" aria-controls="contact-line" aria-selected="false"><i class="feather icon-file-text mr-2"></i>Resume</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="defaultTabContentLine">
                                    <div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                                      <div class="row">
                                        <div class="m-b-30 col-md-6">
                                            <div class="card-body">
                                                <div class="media">
                                                    <span class="mr-3 rounded-circle"><i class="fa fa-2x fa-rupee"></i></span>
                                                    <div class="media-body">
                                                        <h5 class="mb-2">Current Salary</h5>
                                                        <p class="mb-0">20000</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-b-30 col-md-6">
                                            <div class="card-body">
                                                <div class="media">
                                                    <span class="mr-3 rounded-circle"><i class="fa fa-2x fa-certificate"></i></span>
                                                    <div class="media-body">
                                                        <h5 class="mb-2">Experience</h5>
                                                        <p class="mb-0">2 Years</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-b-30 col-md-6">
                                            <div class="card-body">
                                                <div class="media">
                                                    <span class="mr-3 rounded-circle"><i class="fa fa-2x fa-building-o"></i></span>
                                                    <div class="media-body">
                                                        <h5 class="mb-2">Prev. Company</h5>
                                                        <p class="mb-0">Cashify</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-b-30 col-md-6">
                                            <div class="card-body">
                                                <div class="media">
                                                    <span class="mr-3 rounded-circle"><i class="fa fa-2x fa-graduation-cap"></i></span>
                                                    <div class="media-body">
                                                        <h5 class="mb-2">Education</h5>
                                                        <p class="mb-0">Bsc. @ Anna University</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <p>
                                        <div class="row">
                                            <div class="col-md-4 col-12 mb--20">
                                                <label>Age</label>
                                                <input type="number" class="form-control" placeholder="Age" name="age"><br>
                                            </div>

                                            <div class="col-md-4 col-12 mb--20">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                  <option value="">Select Gender</option>
                                                  <option value="Male">Male</option>
                                                  <option value="Female">Female</option>
                                                </select><br>
                                            </div>

                                            <div class="col-md-4 col-12 mb--20">
                                                <label>Marital Status</label>
                                                <select class="form-control" name="marital">
                                                  <option value="Single">Single</option>
                                                  <option value="Married">Married</option>
                                                </select><br>
                                            </div>

                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Nationality</label>
                                                <input type="text" class="form-control" placeholder="Nationality" name="nation"><br>
                                            </div>


                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Mother Tongue</label>
                                                <input type="text" class="form-control" placeholder="Mother Tongue" name="language"><br>
                                            </div>

                                            <div class="col-12 mb--20">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Address line 1" name="address_line_1"><br>
                                                <input type="text" class="form-control" placeholder="Address line 2" name="address_line_2"><br>
                                            </div>

                                            <div class="col-md-4 col-12 mb--20">
                                                <label>Town/City</label>
                                                <input type="text" class="form-control" placeholder="Town/City" name="city"><br>
                                            </div>

                                            <div class="col-md-4 col-12 mb--20">
                                                <label>State</label>
                                                <input type="text" class="form-control" placeholder="State" name="state"><br>
                                            </div>

                                            <div class="col-md-4 col-12 mb--20">
                                                <label>Pin Code</label>
                                                <input type="number" class="form-control" placeholder="Pin Code" name="pincode"><br>
                                            </div>

                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Father's Name</label>
                                                <input type="text" class="form-control" placeholder="Father Name" name="father_name"><br>
                                            </div>

                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Father's Occupation</label>
                                                <input type="text" class="form-control" placeholder="Father Occupation" name="father_occu"><br>
                                            </div>

                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Driving License</label>
                                                <select class="form-control">
                                                  <option value="">Yes</option>
                                                  <option value="">No</option>
                                                </select><br>
                                            </div>

                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Do you own a Bike?</label>
                                                <select class="form-control">
                                                  <option value="">Yes</option>
                                                  <option value="">No</option>
                                                </select><br>
                                            </div>

                                            <div class="col-md-12 col-12 mb--20">
                                              <label>About Yourself</label>
                                              <textarea rows=4 name="about" class="form-control"></textarea>
                                            </div>
                                        </div>
                                      </p>
                                    </div>
                                    <div class="tab-pane fade" id="contact-line" role="tabpanel" aria-labelledby="contact-tab-line">
                                      <iframe src="{{ asset('assets/media/RESUME.pdf') }}" frameborder="0" width=100%; height=500></iframe><br>
                                      <a href='{{ asset('assets/media/RESUME.pdf') }}' target='_blank'><i class="feather icon-external-link"></i> Open in new tab</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
        <div class="col-12 card m-b-10">
          <div class="card m-b-30">
              <div class="card-body text-center">
                  <div class="course-slider">
                      <div class="course-slider-item">
                          <h4 class="my-0">Candidates for Lead Technician</h4>
                          <div class="row align-items-center my-4 py-3">
                              <div class="col-4 p-0">
                                  <h4>24</h4>
                                  <p class="mb-0">Applied</p>
                              </div>
                              <div class="col-4 py-3 px-0 bg-primary-rgba rounded">
                                  <h4 class="text-primary">12</h4>
                                  <p class="text-primary mb-0">Interviewed</p>
                              </div>
                              <div class="col-4 p-0">
                                  <h4>09</h4>
                                  <p class="mb-0">Shortlisted</p>
                              </div>
                          </div>
                          <div class="progress mb-2" style="height: 5px;">
                              <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="row align-items-center">
                              <div class="col-6 text-left">
                                  <span class="font-13">80% Completed</span>
                              </div>
                              <div class="col-6 text-right">
                                  <span class="font-13">19/25 Module</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
            <div class="card-body">
                <div class="best-product-slider">
                    <div class="best-product-slider-item">
                        <div class="row">
                            <div class="col-12 col-md-6">
                              <li class="media">
                                  <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder">
                                  <div class="media-body">
                                  <h5 class="mt-0 mb-1 font-16">Candidate Name
                                    <span class="badge badge-warning-inverse float-right font-14">95</span>
                                  </h5>
                                  <p class="mb-0"><a href='#'>candidate@email.com</a></p>
                                  </div>
                              </li>
                            </div>
                            <div class="col-12 col-md-2">
                                <b><a href='/exotel_calls/#'>9874563210</a></b>
                            </div>
                            <div class="col-12 col-md-2">
                                  <b>Applied 1 month ago</b>
                            </div>
                            <div class="col-12 col-md-2"><b>Web</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
            <div class="card-body">
                <div class="best-product-slider">
                    <div class="best-product-slider-item">
                        <div class="row">
                            <div class="col-12 col-md-6">
                              <li class="media">
                                  <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder">
                                  <div class="media-body">
                                  <h5 class="mt-0 mb-1 font-16">Candidate Name<span class="badge badge-warning-inverse float-right font-14">95</span></h5>
                                  <p class="mb-0"><a href='#'>candidate@email.com</a></p>
                                  </div>
                              </li>
                            </div>
                            <div class="col-12 col-md-2">
                                <b><a href='/exotel_calls/#'>9874563210</a></b>
                            </div>
                            <div class="col-12 col-md-2">
                                  <b>Applied 1 month ago</b>
                            </div>
                            <div class="col-12 col-md-2"><b>Web</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
            <div class="card-body">
                <div class="best-product-slider">
                    <div class="best-product-slider-item">
                        <div class="row">
                            <div class="col-12 col-md-6">
                              <li class="media">
                                  <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder">
                                  <div class="media-body">
                                  <h5 class="mt-0 mb-1 font-16">Candidate Name<span class="badge badge-warning-inverse float-right font-14">95</span></h5>
                                  <p class="mb-0"><a href='#'>candidate@email.com</a></p>
                                  </div>
                              </li>
                            </div>
                            <div class="col-12 col-md-2">
                                <b><a href='/exotel_calls/#'>9874563210</a></b>
                            </div>
                            <div class="col-12 col-md-2">
                                  <b>Applied 1 month ago</b>
                            </div>
                            <div class="col-12 col-md-2"><b>Web</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;">
            <div class="card-body">
                <div class="best-product-slider">
                    <div class="best-product-slider-item">
                        <div class="row">
                            <div class="col-12 col-md-6">
                              <li class="media">
                                  <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder">
                                  <div class="media-body">
                                  <h5 class="mt-0 mb-1 font-16">Candidate Name<span class="badge badge-warning-inverse float-right font-14">95</span></h5>
                                  <p class="mb-0"><a href='#'>candidate@email.com</a></p>
                                  </div>
                              </li>
                            </div>
                            <div class="col-12 col-md-2">
                                <b><a href='/exotel_calls/#'>9874563210</a></b>
                            </div>
                            <div class="col-12 col-md-2">
                                  <b>Applied 1 month ago</b>
                            </div>
                            <div class="col-12 col-md-2"><b>Web</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- End row -->
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('assets\js\jquery.min.js') }}"></script>
  <script src="{{ asset('assets\js\popper.min.js') }}"></script>
  <script src="{{ asset('assets\js\bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets\js\modernizr.min.js') }}"></script>
  <script src="{{ asset('assets\js\detect.js') }}"></script>
  <script src="{{ asset('assets\js\jquery.slimscroll.js') }}"></script>
  <script src="{{ asset('assets\js\vertical-menu.js') }}"></script>
  <!-- Switchery js -->
  <script src="{{ asset('assets\plugins\switchery\switchery.min.js') }}"></script>
  <!-- Select2 js -->
  <script src="{{ asset('assets\plugins\select2\select2.min.js') }}"></script>
  <!-- Datatable js -->
  <script src="{{ asset('assets\plugins\datatables\jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\jszip.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\datatables\responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets\js\custom\custom-table-datatable.js') }}"></script>

  <script src="{{ asset('assets\plugins\pnotify\js\pnotify.custom.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\sweet-alert2\sweetalert2.min.js') }}"></script>
  <!-- jQuery Bar Rating js -->
  <script src="{{ asset('assets\plugins\jquery-bar-rating\jquery.barrating.min.js') }}"></script>
  <script src="{{ asset('assets\js\custom\custom-barrating.js') }}"></script>
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
