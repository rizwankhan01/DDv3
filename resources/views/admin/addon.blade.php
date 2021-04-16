@extends('layouts.dashboard')
@section('title') Addon Products | Doctor Display Dashboard @endsection

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
                          <h5 class="modal-title" id="CreateModalLabel">Create New Addon Product</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <form action="/addon" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post')}}
                            <div class="modal-body">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                              <label>Cost</label>
                              <input type="number" class="form-control" placeholder="Cost" name="cost" required>
                            </div>
                            <div class="form-group">
                              <label>Price</label>
                              <input type="number" class="form-control" placeholder="Price" name="price" required>
                            </div>
                            <div class="form-group">
                              <label>Description</label>
                              <input type="text" class="form-control" name="description" placeholder="Description" required>
                            </div>
                            <div class="form-group">
                              <label>Image</label>
                              <input type='file' class='form-control' name='image' accept='.png' required>
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
                      @if(!empty($addon))
                        <h5 class="card-title">{{ $addon->name }}</h5>
                      @else
                        <h5 class="card-title">All Addons</h5>
                      @endif
                  </div>
                  <div class="card-body">
                    @if(!empty($addon))
                      <form action="/addon/{{ $addon->id }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put')}}
                        <div class="modal-body">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name" value="{{ $addon->name }}" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                          <label>Cost</label>
                          <input type="number" class="form-control" placeholder="Cost" value="{{ $addon->cost }}" name="cost" required>
                        </div>
                        <div class="form-group">
                          <label>Price</label>
                          <input type="number" class="form-control" placeholder="Price" value="{{ $addon->price }}" name="price" required>
                        </div>
                        <div class="form-group">
                          <label>Description</label>
                          <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $addon->description }}" required>
                        </div>
                        <div class="form-group">
                          <label>Image</label>
                          <img src="../storage/{{ $addon->image }}" style="width:25px;height:25px;">
                          <input type='file' class='form-control' name='image' accept='.png'>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <a href="/brands" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    @else
                    <h6 class="card-subtitle">You can Create/ Edit/ Delete Addons Here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Cost</th>
                                  <th>Price</th>
                                  <th>Description</th>
                                  <th>Image</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($addons as $addon)
                                  <tr>
                                    <td>{{ $addon->name }}</td>
                                    <td>&#8377; {{ $addon->cost }}</td>
                                    <td>&#8377; {{ $addon->price }}</td>
                                    <td>{{ $addon->description}}</td>
                                    <td><img src='storage/{{ $addon->image }}' alt="{{ $addon->image}}" style="width:50px;height:50px;"></td>
                                    <td>
                                      <form action='/addon/{{ $addon->id }}' method='post'>
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <a href='/addon/{{ $addon->id }}' class='btn btn-sm btn-warning'>Edit</a>
                                        <input type='submit' class='btn btn-sm btn-danger' onclick="return confirm('Are you sure you want to delete this?');" value='Delete'>
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
