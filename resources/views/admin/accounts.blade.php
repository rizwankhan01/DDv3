@extends('layouts.dashboard')
@section('title') Accounts | Doctor Display Dashboard @endsection

@section('contentbar')
  <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
          <h6>Employee Information</h6> <a href="javascript:void(0)" id="infobar-settings-close"><i class="feather icon-x"></i></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row align-items-center pb-3">
                      <div class="col-md-12 col-lg-12 col-xl-12">
                          <form action="/accounts/{{ $user->id }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="modal-body">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                              <label>Father's Name</label>
                              <input type="text" class="form-control" name="father_name" placeholder="Father's Name" value="{{ $user->fathers_name }}" required>
                            </div>
                            <div class="form-group">
                              <label>Gender</label>
                              <select class='form-control' name='gender' required>
                                <option value=''>Select Option</option>
                                <option value='Male' @if($user->gender=='Male'){{ 'selected' }} @endif>Male</option>
                                <option value='Female' @if($user->gender=='Female'){{ 'selected' }} @endif>Female</option>
                                <option value='Other' @if($user->gender=='Other'){{ 'selected' }} @endif>Other</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Date of Birth</label>
                              <input type='date' class='form-control' name='dob' placeholder="Date of Birth" value="{{ $user->date_of_birth }}" required>
                            </div>
                            <div class="form-group">
                              <label>Primary Phone</label>
                              <input type="number" class="form-control" name="primary_phone" placeholder="Primary Phone" value="{{ $user->primary_phone }}" required>
                            </div>
                            <div class="form-group">
                              <label>Secondary Phone</label>
                              <input type="number" class="form-control" name="secondary_phone" placeholder="Secondary Phone" value="{{ $user->secondary_phone }}" required>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                              <label>Reset Password</label>
                              <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                              <label>Address</label>
                              <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $user->address }}" required>
                            </div>
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" name="city" placeholder="City" value="{{ $user->city }}" required>
                            </div>
                            <div class="form-group">
                              <label>Date of Joining</label>
                              <input type='date' class='form-control' name='doj' placeholder="Date of Joining" value="{{ $user->date_of_join }}" required>
                            </div>
                            <div class="form-group">
                              <label>Profile Picture</label>
                              <img src="../storage/{{ $user->profile_image }}" style="width:100px; height:auto;">
                              <input type='file' class='form-control' name='profile_picture' accept=".jpg, .jpeg, .png">
                            </div>
                            <div class="form-group">
                              <label>User Type</label>
                              <select class="form-control" name="user_type">
                                <option value="">Select Option</option>
                                <option value="Service Man" @if($user->user_type=='Service Man'){{ 'selected' }} @endif>Service Man</option>
                                <option value="Admin" @if($user->user_type=='Admin'){{ 'selected'}} @endif>Admin</option>
                              </select>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
                    @if(!empty($user))
                      <div class="col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="parents-slider">
                                    <div class="parents-slider-item">
                                      <a href="javascript:void(0)" id="infobar-settings-open"><i class="fa fa-pencil"></i></a>
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-2">
                                              @if(!empty($user->profile_image))
                                                <img src="storage/{{ $user->profile_image }}" class="img-fluid" style="border-radius:50%;" alt="parent">
                                              @else
                                                <img src="\assets\images\users\men.svg" class="img-fluid" style="width:50%;">
                                              @endif
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <h5 class="card-title mb-1">{{ $user->name }}</h5>
                                                <p class="mb-0 font-14">{{ $user->user_type }}</p>
                                                <p class="mb-4 badge badge-success">Operations</p>
                                                <p>
                                                  <span class="pull-left">
                                                    <i class="feather icon-mail"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->email }}<br><br>
                                                    <i class="feather icon-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->primary_phone }}<br>
                                                  </span>
                                                  <span class="pull-right">
                                                      <i class="feather icon-map-pin"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->city }}<br><br>
                                                      Employee since <a href='#'>May 2019</a><br>
                                                  </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                              <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-info mr-2"></i>About</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-dollar-sign mr-2"></i>Incentives</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="contact-tab-line" data-toggle="tab" href="#contact-line" role="tab" aria-controls="contact-line" aria-selected="false"><i class="feather icon-award mr-2"></i>Awards</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="attend-tab-line" data-toggle="tab" href="#attend-line" role="tab" aria-controls="attend-line" aria-selected="false"><i class="feather icon-watch mr-2"></i>Attendance</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="documents-tab-line" data-toggle="tab" href="#documents-line" role="tab" aria-controls="documents-line" aria-selected="false"><i class="feather icon-file mr-2"></i>Documents</a>
                                  </li>
                              </ul>
                              <div class="tab-content" id="defaultTabContentLine">
                                  <div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                                  </div><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                  <div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                  </div>
                                  <div class="tab-pane fade" id="contact-line" role="tabpanel" aria-labelledby="contact-tab-line">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                  </div>
                                  <div class="tab-pane fade" id="attend-line" role="tabpanel" aria-labelledby="attend-tab-line">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                  </div>
                                  <div class="tab-pane fade" id="documents-line" role="tabpanel" aria-labelledby="documents-tab-line">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    @else
                          @livewire('all-useraccounts')
                    @endif
          </div>
          <!-- End col -->
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
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
