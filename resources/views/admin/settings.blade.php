@extends(Auth::user()->user_type === 'Admin' ? 'layouts.dashboard' : 'layouts.serviceman')
@section('title') Settings | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
    @if(session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-6">
              <div class="card m-b-30">
                  <div class="card-header">
                      Profile Settings
                  </div>
                  <div class="card-body">
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
                        <input type="number" class="form-control" name="secondary_phone" placeholder="Secondary Phone" value="{{ $user->secondary_phone }}">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ $user->email }}" required>
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
                        <input type='date' class='form-control' name='doj' disabled placeholder="Date of Joining" value="{{ $user->date_of_join }}" required>
                      </div>
                      <div class="form-group">
                        <label>Profile Picture</label>
                        <img src="../storage/{{ $user->profile_image }}" style="width:100px; height:auto;">
                        <input type='file' class='form-control' name='profile_picture' accept=".jpg, .jpeg, .png">
                      </div>
                      <div class="form-group">
                        <label>User Type</label>
                        <select class="form-control" name="user_type" disabled>
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
          <div class="col-lg-6">
              <div class="card m-b-30">
                  <div class="card-header">
                      Update Password
                  </div>
                  <div class="card-body">
                    <form action="/settings/{{ $user->id }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('put') }}
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Current Password" name="cur_password">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="New Password" name="new_password">
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right" value="Update" name="update">
                      </div>
                    </form>
                  </div>
              </div>
          </div>
          <div class="col-6">
                <form action='{{ route('notification') }}' method='post'>
                  {{ csrf_field() }}
                  {{ method_field('post') }}
                  <input type='text' class='form-control' name='title'>
                  <input type='text' class='form-control' name='message'>
                  <input type='submit' name='push'>
                </form>
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
