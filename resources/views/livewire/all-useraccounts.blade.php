<div>
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
          <h5 class="card-title">
            <input type="type" class="form-control col-md-4" placeholder="Search all employees here..." wire:model="searchTerm">
          </h5>
      </div>
</div>
  <div class="row">
    @foreach($users as $user)
    <div class="col-lg-12 col-xl-6">
      <div class="card m-b-30">
          <div class="card-body">
              <div class="parents-slider">
                  <div class="parents-slider-item">
                      <div class="row align-items-center">
                          <div class="col-12 col-md-4">
                            <div class="circular">
                              @if(!empty($user->profile_image))
                                <img src="storage/{{ $user->profile_image }}" class="img-fluid" style="border-radius:50%;" alt="parent">
                              @else
                                <img src="\assets\images\users\men.svg" class="img-fluid" style="width:100%;">
                              @endif
                            </div>
                          </div>
                          <div class="col-12 col-md-8">
                              <h5 class="card-title mb-1">{{ $user->name }}</h5>
                              <p class="mb-0 font-14">{{ $user->user_type }}</p>
                              <p class="mb-4 badge badge-success">Operations</p>
                              <p>
                                <i class="feather icon-mail"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->email }}<br>
                                <i class="feather icon-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->primary_phone }}<br>
                                <i class="feather icon-map-pin"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->city }}<br>
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6 mb-0 font-14 font-italic">
                Employee since <a href='#'>May 2019</a>
              </div>
              <div class="col-md-6">
                <span class="pull-right"><a href='/accounts/{{ $user->id }}' class='btn btn-sm btn-secondary'>See All</a></span>
              </div>
            </div>
          </div>
      </div>
  </div>
@endforeach
</div>
</div>
