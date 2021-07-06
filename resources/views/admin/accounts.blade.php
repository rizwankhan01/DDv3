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
                        @if(!empty($user->id))
                          <form action="/accounts/{{ $user->id }}" method="post" enctype="multipart/form-data" class="col-md-12">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="row">
                            <div class="form-group col-md-6">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Father's Name</label>
                              <input type="text" class="form-control" name="father_name" placeholder="Father's Name" value="{{ $user->fathers_name }}" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Gender</label>
                              <select class='form-control' name='gender' required>
                                <option value=''>Select Option</option>
                                <option value='Male' @if($user->gender=='Male'){{ 'selected' }} @endif>Male</option>
                                <option value='Female' @if($user->gender=='Female'){{ 'selected' }} @endif>Female</option>
                                <option value='Other' @if($user->gender=='Other'){{ 'selected' }} @endif>Other</option>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Date of Birth</label>
                              <input type='date' class='form-control' name='dob' placeholder="Date of Birth" value="{{ $user->date_of_birth }}" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Primary Phone</label>
                              <input type="number" class="form-control" name="primary_phone" placeholder="Primary Phone" value="{{ $user->primary_phone }}" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Secondary Phone</label>
                              <input type="number" class="form-control" name="secondary_phone" placeholder="Secondary Phone" value="{{ $user->secondary_phone }}" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Reset Password</label>
                              <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Address</label>
                              <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $user->address }}" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label>City</label>
                              <input type="text" class="form-control" name="city" placeholder="City" value="{{ $user->city }}" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Date of Joining</label>
                              <input type='date' class='form-control' name='doj' placeholder="Date of Joining" value="{{ $user->date_of_join }}" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Profile Picture</label>
                                <img src="../storage/{{ $user->profile_image }}" style="width:100px; height:auto;">
                              <input type='file' class='form-control' name='profile_picture' accept=".jpg, .jpeg, .png">
                            </div>
                            <div class="form-group col-md-6">
                              <label>User Type</label>
                              <select class="form-control" name="user_type" required>
                                <option value="">Select Option</option>
                                <option value="Investor" @if($user->user_type=='Investor'){{ 'selected' }} @endif>Investor</option>
                                <option value="Service Man" @if($user->user_type=='Service Man'){{ 'selected' }} @endif>Service Man</option>
                                <option value="Admin" @if($user->user_type=='Admin'){{ 'selected'}} @endif>Admin</option>
                              </select>
                            </div>
                            <div class="form-group col-md-12"><hr><h6>Personal Information</h6></div>
                            <div class="form-group col-md-6">
                              <label>Blood Group</label>
                              <input type="text" class="form-control" name="blood_group" value="{{ $user->blood_group }}" placeholder="Blood Group">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Mother Tongue</label>
                              <input type="text" class="form-control" name="mother_tongue" value="{{ $user->mother_tongue }}" placeholder="Mother Tongue">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Nationality</label>
                              <input type="text" class="form-control" name="nationality" value="{{ $user->nationality }}" placeholder="Nationality">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Religion</label>
                              <input type="text" class="form-control" name="religion" value="{{ $user->religion }}" placeholder="Religion">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Languages Known</label>
                              <input type="text" class="form-control" name="languages_known" value="{{ $user->languages_known }}" placeholder="Tamil, English, Hindi">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Emergency Contact Name</label>
                              <input type="text" class="form-control" name="emergency_contact_name" value="{{ $user->emergency_contact_name }}" placeholder="Emergency Contact Name">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Emergency Contact Relation</label>
                              <input type="text" class="form-control" name="emergency_contact_relation" value="{{ $user->emergency_contact_relation }}" placeholder="Emergency Contact Relation">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Emergency Contact Phone</label>
                              <input type="number" class="form-control" name="emergency_contact_phone" value="{{ $user->emergency_contact_phone }}" placeholder="Emergency Contact Phone">
                            </div>
                            <div class="form-group col-md-12"><hr><h6>Education Information</h6></div>
                            <div class="form-group col-md-6">
                              <label>School</label>
                              <input type="text" class="form-control" name="school" value="{{ $user->school }}" placeholder="School, Class">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Course</label>
                              <input type="text" class="form-control" name="course" value="{{ $user->course }}" placeholder="Course, College">
                            </div>
                            <div class="form-group col-md-12"><hr><h6>Banking Information</h6></div>
                            <div class="form-group col-md-6">
                              <label>Bank Name</label>
                              <input type="text" class="form-control" name="bank_name" value="{{ $user->bank_name }}" placeholder="Bank Name">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Bank IFSC</label>
                              <input type="text" class="form-control" name="bank_ifsc" value="{{ $user->bank_ifsc }}" placeholder="Bank IFSC">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Account Name</label>
                              <input type="text" class="form-control" name="account_name" value="{{ $user->account_name }}" placeholder="Account Name">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Account Number</label>
                              <input type="text" class="form-control" name="account_number" value="{{ $user->account_number }}" placeholder="Account Number">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Branch Name</label>
                              <input type="text" class="form-control" name="account_branch" value="{{ $user->account_branch }}" placeholder="Account Branch">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Pan Number</label>
                              <input type="text" class="form-control" name="pan_number" value="{{ $user->pan_number }}" placeholder="Pan Number">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Bank Logo</label>
                              <img src="../storage/{{ $user->bank_logo }}" style="width:100px; height:auto;">
                              <input type='file' class='form-control' name='bank_logo' accept=".jpg, .jpeg, .png">
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        @endif
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
                                      <a href="javascript:void(0)" id="infobar-settings-open"><i class="fa fa-edit"></i></a>
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-2">
                                              <div class="circular">
                                              @if(!empty($user->profile_image))
                                                <img src="../storage/{{ $user->profile_image }}" class="img-fluid" style="border-radius:50%;" alt="parent">
                                              @else
                                                <img src="\assets\images\users\men.svg" class="img-fluid" style="width:50%;">
                                              @endif
                                              </div>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <h5 class="card-title mb-1">{{ $user->name }}</h5>
                                                <p class="mb-0 font-14">{{ $user->user_type }}</p>
                                                <p class="mb-4 badge badge-success">Operations</p>
                                                <p>
                                                  <div class="pull-left">
                                                    <p><i class="feather icon-mail"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->email }}</p>
                                                    <p><i class="feather icon-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->primary_phone }}</p>
                                                  </div>
                                                  <div class="pull-right">
                                                      <p><i class="feather icon-map-pin"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->city }}</p>
                                                      <p>Employee since <a href='#'>{{ date('F Y', strtotime($user->date_of_join)) }}</a></p>
                                                  </div>
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
                                  <li class="nav-item">
                                      <a class="nav-link" id="bank-tab-line" data-toggle="tab" href="#bank-line" role="tab" aria-controls="bank-line" aria-selected="false"><i class="fa fa-bank mr-2"></i>Banking</a>
                                  </li>
                              </ul>
                              <div class="tab-content" id="defaultTabContentLine">
                                  <div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <h6 class="btn btn-info-rgba">Personal</h6>
                                      <table class="table table-borderless table-responsive">
                                        <tr>
                                          <th>Gender</th>
                                          <td>{{ $user->gender }}</td>
                                          <th>DOB</th>
                                          <td>{{ $user->date_of_birth }}</td>
                                        </tr>
                                        <tr>
                                          <th>Blood Group</th>
                                          <td>{{ $user->blood_group }}</td>
                                          <th>Nationality</th>
                                          <td>{{ $user->nationality }}</td>
                                        </tr>
                                        <tr>
                                          <th>Mother Tongue</th>
                                          <td>{{ $user->mother_tongue }}</td>
                                          <th>Religion</th>
                                          <td>{{ $user->religion }}</td>
                                        </tr>
                                        <tr>
                                          <th>Languages Known</th>
                                          <td>{{ $user->languages_known }}</td>
                                        </tr>
                                      </table><hr>
                                    </div>
                                    <div class="col-md-6">
                                      <h6 class="btn btn-info-rgba">Contact</h6>
                                      <table class="table table-borderless table-responsive">
                                        <tr>
                                          <th>Address</th>
                                          <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                          <th>Secondary Contact Number</th>
                                          <td>{{ $user->secondary_phone }}</td>
                                        </tr>
                                        <tr>
                                          <th>Emergency Contact</th>
                                          <td>{{ $user->emergency_contact_name }} ({{ $user->emergency_contact_relation }}) - {{ $user->emergency_contact_phone }}</td>
                                        </tr>
                                      </table><hr>
                                    </div>
                                    <!--<div class="col-md-6">
                                      <h6 class="btn btn-info-rgba">Dependents</h6>
                                      <table class="table table-borderless table-responsive">
                                        <tr>
                                          <th>Mother</th>
                                          <td>{Divya Chauhan}</td>
                                        </tr>
                                        <tr>
                                          <th>Child</th>
                                          <td>{Raj Chauhan}</td>
                                        </tr>
                                        <tr>
                                          <th>Spouse</th>
                                          <td>{Shreya Chauhan}</td>
                                        </tr>
                                        <tr>
                                          <th>Nominee</th>
                                          <td>Father</td>
                                          <td>{Father Chauhan}</td>
                                        </tr>
                                      </table><hr>
                                    </div>-->
                                    <div class="col-md-6">
                                      <h6 class="btn btn-info-rgba">Education</h6>
                                      <table class="table table-borderless table-responsive">
                                        <tr>
                                          <th>School</th>
                                          <td>{{ $user->school }}</td>
                                        </tr>
                                        <tr>
                                          <th>Course</th>
                                          <td>{{ $user->course }}</td>
                                        </tr>
                                      </table><hr>
                                    </div>
                                  </div>
                                  </div>
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
                                    <a href='#'>View ID Card</a>
                                    <ul>
                                      <li><a href='/viewidcard/front.{{ $user->id }}' target='_blank'>Front</a></li>
                                      <li><a href='/viewidcard/back.{{ $user->id }}' target='_blank'>Back</a></li>
                                    </ul>
                                  </div>
                                  <div class="tab-pane fade" id="bank-line" role="tabpanel" aria-labelledby="bank-tab-line">
                                    <div class="col-md-12 m-b-20">
                                      <img src="../storage/{{ $user->bank_logo }}" style="width:6%;">
                                      <h6>{{ $user->bank_name }}</h6><span class="badge badge-success-inverse">Verified <i class="feather icon-check-circle"></i></span>
                                      <table class="table table-borderless table-responsive">
                                        <tr>
                                          <th>IFSC</th>
                                          <td>{{ $user->bank_ifsc }}</td>
                                        </tr>
                                        <tr>
                                          <th>Name</th>
                                          <td>{{ $user->account_name }}</td>
                                        </tr>
                                        <tr>
                                          <th>Acc. No.</th>
                                          <td>{{ $user->account_number }}</td>
                                        </tr>
                                        <tr>
                                          <th>Branch</th>
                                          <td>{{ $user->account_branch }}</td>
                                        </tr>
                                        <tr>
                                          <th>Pan Number</th>
                                          <td>{{ $user->pan_number }}</td>
                                        </tr>
                                      </table>
                                    </div>
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
