@extends('layouts.dashboard')
@section('title') Coupons | Doctor Display Dashboard @endsection

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
                          <h5 class="modal-title" id="CreateModalLabel">Create New Coupon</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <form action="/coupons" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post')}}
                            <div class="modal-body">
                            <div class="form-group">
                              <label>Coupon Code</label>
                              <input type="text" class="form-control" name="name" placeholder="Coupon Code" required>
                            </div>
                            <div class="form-group">
                              <label>Validity</label>
                              <input type="date" class="form-control" name="validity" min="{{ date('Y-m-d') }}" placeholder="Validity" required>
                            </div>
                            <div class="form-group">
                              <label>Amount</label>
                              <input type='number' class='form-control' name='amount' placeholder="Amount" required>
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
                      @if(!empty($coupon))
                        <h5 class="card-title">{{ $coupon->name }}</h5>
                      @else
                        <h5 class="card-title">All Coupons</h5>
                      @endif
                  </div>
                  <div class="card-body">
                    @if(!empty($coupon))
                      <form action="/coupons/{{ $coupon->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('put')}}
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Coupon Code</label>
                            <input type="text" class="form-control" name="name" value="{{ $coupon->name }}" placeholder="Coupon Code" required>
                          </div>
                          <div class="form-group">
                            <label>Validity</label>
                            <input type="date" class="form-control" name="validity" min="{{ date('Y-m-d') }}" value="{{ $coupon->validity }}" placeholder="Validity" required>
                          </div>
                          <div class="form-group">
                            <label>Amount</label>
                            <input type='number' class='form-control' name='amount' value="{{ $coupon->amount }}" placeholder="Amount" required>
                          </div>
                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option value="">Select Status</option>
                              <option value="1" @if($coupon->status==1){{ 'selected '}} @endif>Active</option>
                              <option value="0" @if($coupon->status==0){{ 'selected' }} @endif>Inactive</option>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <a href="/coupons" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    @else
                    <h6 class="card-subtitle">You can Create/ Edit/ Delete Coupons Here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Code</th>
                                  <th>Validity</th>
                                  <th>Amount</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($coupons as $coupon)
                              <tr>
                                  <td>{{ $coupon->name }}</td>
                                  <td>{{ date('d-m-Y', strtotime($coupon->validity)) }}</td>
                                  <td>{{ $coupon->amount }}</td>
                                  <td>
                                    @if($coupon->status == 1)
                                      <span class="btn btn-sm btn-success">Active</span>
                                    @else
                                      <span class="btn btn-sm btn-danger">Inactive</span>
                                    @endif
                                  </td>
                                  <td>
                                    <form action='/coupons/{{ $coupon->id }}' method='post'>
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <a href='/coupons/{{ $coupon->id }}' class='btn btn-sm btn-warning'>Edit</a>
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
