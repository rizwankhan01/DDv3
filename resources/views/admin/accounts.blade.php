@extends('layouts.dashboard')
@section('title') Accounts | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                      <div class="widgetbar pull-right">
                          <button class="btn btn-primary-rgba" data-toggle="modal" data-target="#CreateModal"><i class="feather icon-plus mr-2"></i>Create New</button>
                          <div class="modal fade show" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true"
                          v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="CreateModalLabel">Create New Account</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <form action="/accounts" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <div class="modal-body">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                              <label>Father's Name</label>
                              <input type="text" class="form-control" name="father_name" placeholder="Father's Name" required>
                            </div>
                            <div class="form-group">
                              <label>Gender</label>
                              <select class='form-control' name='gender' required>
                                <option value=''>Select Option</option>
                                <option value='Male'>Male</option>
                                <option value='Female'>Female</option>
                                <option value='Other'>Other</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Date of Birth</label>
                              <input type='date' class='form-control' name='dob' placeholder="Date of Birth" required>
                            </div>
                            <div class="form-group">
                              <label>Primary Phone</label>
                              <input type="number" class="form-control" name="primary_phone" placeholder="Primary Phone" required>
                            </div>
                            <div class="form-group">
                              <label>Secondary Phone</label>
                              <input type="number" class="form-control" name="secondary_phone" placeholder="Secondary Phone" required>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                              <label>Address</label>
                              <input type="text" class="form-control" name="address" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" name="city" placeholder="City" required>
                            </div>
                            <div class="form-group">
                              <label>Date of Joining</label>
                              <input type='date' class='form-control' name='doj' placeholder="Date of Joining" required>
                            </div>
                            <div class="form-group">
                              <label>Profile Picture</label>
                              <input type='file' class='form-control' name='profile_picture' accept=".jpg, .jpeg, .png" required>
                            </div>
                            <div class="form-group">
                              <label>User Type</label>
                              <select class="form-control" name="user_type">
                                <option value="">Select Option</option>
                                <option value="Service Man">Service Man</option>
                                <option value="Admin">Admin</option>
                              </select>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                          </div>
                          </div>
                          </div>
                      </div>
                      @if(!empty($user))
                        <h5 class="card-title">{{ $user->name }}</h5>
                      @else
                        <h5 class="card-title">All Accounts</h5>
                      @endif
                  </div>
                  <div class="card-body">
                    @if(!empty($user))
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
                    @else
                    <h6 class="card-subtitle">You can Create/ Edit/ Delete User Accounts Here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th></th>
                                  <th>Name</th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th>Address</th>
                                  <th>DOB</th>
                                  <th>DOJ</th>
                                  <th>User Type</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($users as $user)
                                <tr>
                                  <td>
                                    @if($user->profile_image) <img src='storage/{{ $user->profile_image }}' class='img img-rounded' style="width:75px;height:auto;"> @endif
                                  </td>
                                  <td>
                                    @if($user->user_type=='Service Man')
                                      <a href='serviceman-profile/{{ $user->id }}'>{{ $user->name }}</a>
                                    @else
                                      {{ $user->name }}
                                    @endif
                                      <br><small>{{ $user->fathers_name }}</small>
                                  </td>
                                  <td>
                                      <small><a href='exotel_calls/{{ $user->primary_phone }}'>{{ $user->primary_phone }}</a><br>
                                      <a href='exotel_calls/{{ $user->secondary_phone }}'>{{ $user->secondary_phone }}</a></small>
                                  </td>
                                  <td>{{ $user->email }}</td>
                                  <td>{{ $user->address }}, {{ $user->city }}</td>
                                  <td>@if(!empty($user->date_of_birth)) {{ date('d-m-Y',strtotime($user->date_of_birth)) }} @endif</td>
                                  <td>@if(!empty($user->date_of_join)) {{ date('d-m-Y',strtotime($user->date_of_join)) }} @endif</td>
                                  <td>{{ $user->user_type }}</td>
                                  <td>
                                    <form action='/accounts/{{ $user->id }}' method='post'>
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <a href='/accounts/{{ $user->id }}' class='btn btn-sm btn-warning'>Edit</a>
                                      <!--<input type='submit' class='btn btn-sm btn-danger' onclick="return confirm('Are you sure you want to delete this?');" value='Delete'>-->
                                    </form>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                    @endif
                  </div>
              </div>
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
