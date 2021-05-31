@extends('layouts.hr')
@section('title') All Interviews | Doctor Display Dashboard @endsection

@section('contentbar')
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
                                        <span class="btn btn-sm btn-warning float-right font-14"><i class="feather icon-clock"></i> Pending</span>
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
                                    <li class="nav-item">
                                        <a class="nav-link" id="interview-tab-line" data-toggle="tab" href="#interview-line" role="tab" aria-controls="interview-line" aria-selected="false"><i class="feather icon-check-circle mr-2"></i>Interview</a>
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
                                    <div class="tab-pane fade" id="interview-line" role="tabpanel" aria-labelledby="interview-tab-line">
                                      <p>
                                        <small class="badge badge-success">5 - Exceeds Requirement</small>
                                        <small class="badge badge-warning">4 - Above Average</small>
                                        <small class="badge badge-primary">3 - Average</small>
                                        <small class="badge badge-secondary">2 - Below Average</small>
                                        <small class="badge badge-danger">1 - Unfit</small>
                                        <hr>
                                        <b>Relevant Experience: </b>
                                        <div class="stars stars-example-fontawesome pull-right">
                                            <select id="rating-fontawesome" name="rating" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <textarea class="form-control" name="rel_exp" placeholder="Comments"></textarea><hr>
                                        <b>Educational background or certifications: </b>
                                        <div class="stars stars-example-fontawesome pull-right">
                                            <select id="rating-fontawesome2" name="rating" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <textarea class="form-control" name="rel_exp" placeholder="Comments"></textarea><hr>
                                        <b>Communication Skills: </b>
                                        <div class="stars stars-example-fontawesome pull-right">
                                            <select id="rating-fontawesome3" name="rating" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <textarea class="form-control" name="rel_exp" placeholder="Comments"></textarea><hr>
                                        <b>Looks and presentation: </b>
                                        <div class="stars stars-example-fontawesome pull-right">
                                            <select id="rating-fontawesome4" name="rating" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <textarea class="form-control" name="rel_exp" placeholder="Comments"></textarea><hr>
                                        <b>Candidate Enthusiasm: </b>
                                        <div class="stars stars-example-fontawesome pull-right">
                                            <select id="rating-fontawesome5" name="rating" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <textarea class="form-control" name="rel_exp" placeholder="Comments"></textarea><hr>
                                        <b>Knowledge of company: </b>
                                        <div class="stars stars-example-fontawesome pull-right">
                                            <select id="rating-fontawesome6" name="rating" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <textarea class="form-control" name="rel_exp" placeholder="Comments"></textarea><hr>
                                        <b>Working collaboratively: </b>
                                        <div class="stars stars-example-fontawesome pull-right">
                                            <select id="rating-fontawesome7" name="rating" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <textarea class="form-control" name="rel_exp" placeholder="Comments"></textarea><hr>
                                        <b>Planning and Organizing Projects: </b>
                                        <div class="stars stars-example-fontawesome pull-right">
                                            <select id="rating-fontawesome8" name="rating" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <textarea class="form-control" name="rel_exp" placeholder="Comments"></textarea><hr>
                                        <b>Candidates values (Scenario based): </b>
                                        <div class="stars stars-example-fontawesome pull-right">
                                            <select id="rating-fontawesome9" name="rating" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <textarea class="form-control" name="rel_exp" placeholder="Comments"></textarea><hr>
                                        <textarea class="form-control" placeholder="Other Comments"></textarea><br>
                                        <div class="row">
                                          <button class="btn btn-rounded btn-outline-success col-3"><i class="feather icon-thumbs-up"></i><i class="feather icon-thumbs-up"></i> Strong Hire</button>
                                          <button class="btn btn-rounded btn-outline-success col-3"><i class="feather icon-thumbs-up"></i> Hire</button>
                                          <button class="btn btn-rounded btn-outline-danger col-3"><i class="feather  icon-thumbs-down"></i> No Hire</button>
                                          <button class="btn btn-rounded btn-outline-danger col-3"><i class="feather  icon-thumbs-down"></i><i class="feather  icon-thumbs-down"></i> Strong No Hire</button>
                                        </div>
                                      </p>
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
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
          <div class="card-body appointment-widget">
                <div class="row align-items-end">
                <div class="col-12 col-md-2">
                    <p class="bg-icon">
                      <span class="fa-stack">
                        <i class="feather icon-calendar fa-stack-2x"></i>
                        <strong class="fa-stack-1x text-inside-icon">22</strong>
                      </span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                  <li class="list-inline-item">
                  <h5 class="mt-2 font-20">Interview with Candidate Name</h5>
                  <p class="mb-2">for Lead Technician <small class="badge badge-success">Operations</small></p>
                  </li>
                </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30">
                      <span>Interview With: </span><br>
                      <div class="avatar-group">
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/men.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/women.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                      </div>
                    </li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30"><p class="mb-20">10-10:30 AM<br>22nd May 2021</p></li>
                  </div>
                  <div class="col-12 col-md-2 m-b-30">
                    <li class="list-inline-item"><p class="mb-20"><a href='' class="btn btn-warning">Approved</a></p></li>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
          <div class="card-body appointment-widget">
                <div class="row align-items-end">
                <div class="col-12 col-md-2">
                    <p class="bg-icon">
                      <span class="fa-stack">
                        <i class="feather icon-calendar fa-stack-2x"></i>
                        <strong class="fa-stack-1x text-inside-icon">22</strong>
                      </span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                  <li class="list-inline-item">
                  <h5 class="mt-2 font-20">Interview with Candidate Name</h5>
                  <p class="mb-2">for Lead Technician <small class="badge badge-success">Operations</small></p>
                  </li>
                </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30">
                      <span>Interview With: </span><br>
                      <div class="avatar-group">
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/men.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/women.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                      </div>
                    </li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30"><p class="mb-20">10-10:30 AM<br>22nd May 2021</p></li>
                  </div>
                  <div class="col-12 col-md-2 m-b-30">
                    <li class="list-inline-item"><p class="mb-20"><a href='' class="btn btn-warning">Approved</a></p></li>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
          <div class="card-body appointment-widget">
                <div class="row align-items-end">
                <div class="col-12 col-md-2">
                    <p class="bg-icon">
                      <span class="fa-stack">
                        <i class="feather icon-calendar fa-stack-2x"></i>
                        <strong class="fa-stack-1x text-inside-icon">22</strong>
                      </span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                  <li class="list-inline-item">
                  <h5 class="mt-2 font-20">Interview with Candidate Name</h5>
                  <p class="mb-2">for Lead Technician <small class="badge badge-success">Operations</small></p>
                  </li>
                </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30">
                      <span>Interview With: </span><br>
                      <div class="avatar-group">
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/men.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/women.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                      </div>
                    </li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30"><p class="mb-20">10-10:30 AM<br>22nd May 2021</p></li>
                  </div>
                  <div class="col-12 col-md-2 m-b-30">
                    <li class="list-inline-item"><p class="mb-20"><a href='' class="btn btn-warning">Approved</a></p></li>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
          <div class="card-body appointment-widget">
                <div class="row align-items-end">
                <div class="col-12 col-md-2">
                    <p class="bg-icon">
                      <span class="fa-stack">
                        <i class="feather icon-calendar fa-stack-2x"></i>
                        <strong class="fa-stack-1x text-inside-icon">22</strong>
                      </span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                  <li class="list-inline-item">
                  <h5 class="mt-2 font-20">Interview with Candidate Name</h5>
                  <p class="mb-2">for Lead Technician <small class="badge badge-success">Operations</small></p>
                  </li>
                </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30">
                      <span>Interview With: </span><br>
                      <div class="avatar-group">
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/men.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/women.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                      </div>
                    </li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30"><p class="mb-20">10-10:30 AM<br>22nd May 2021</p></li>
                  </div>
                  <div class="col-12 col-md-2 m-b-30">
                    <li class="list-inline-item"><p class="mb-20"><a href='' class="btn btn-warning">Approved</a></p></li>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
          <div class="card-body appointment-widget">
                <div class="row align-items-end">
                <div class="col-12 col-md-2">
                    <p class="bg-icon">
                      <span class="fa-stack">
                        <i class="feather icon-calendar fa-stack-2x"></i>
                        <strong class="fa-stack-1x text-inside-icon">22</strong>
                      </span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                  <li class="list-inline-item">
                  <h5 class="mt-2 font-20">Interview with Candidate Name</h5>
                  <p class="mb-2">for Lead Technician <small class="badge badge-success">Operations</small></p>
                  </li>
                </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30">
                      <span>Interview With: </span><br>
                      <div class="avatar-group">
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/men.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                          <div class="avatar">
                              <a href="#" title="Amy Adams">
                                  <img src="assets/images/users/women.svg" alt="avatar" class="rounded-circle">
                              </a>
                          </div>
                      </div>
                    </li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-30"><p class="mb-20">10-10:30 AM<br>22nd May 2021</p></li>
                  </div>
                  <div class="col-12 col-md-2 m-b-30">
                    <li class="list-inline-item"><p class="mb-20"><a href='' class="btn btn-warning">Approved</a></p></li>
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

  <script src="{{ asset('assets\plugins\pnotify\js\pnotify.custom.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\sweet-alert2\sweetalert2.min.js') }}"></script>
  <!-- jQuery Bar Rating js -->
  <script src="{{ asset('assets\plugins\jquery-bar-rating\jquery.barrating.min.js') }}"></script>
  <script src="{{ asset('assets\js\custom\custom-barrating.js') }}"></script>
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
