@extends('layouts.dashboard')
@section('title') Dealers | Doctor Display Dashboard @endsection

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
                          <h5 class="modal-title" id="CreateModalLabel">Create New Dealer</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <form action="/dealers" method="post">
                            {{ csrf_field() }}
                            {{ method_field('post')}}
                            <div class="modal-body">
                            <div class="form-group">
                              <label>Dealer Name</label>
                              <input type="text" class="form-control" name="dealer_name" placeholder="Dealer Name" required>
                            </div>
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                              <label>Address</label>
                              <input type='text' class='form-control' name='address' placeholder="Address" required>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type='email' class='form-control' name='email' placeholder="Email Address" required>
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
                      @if(!empty($dealer))
                        <h5 class="card-title">{{ $dealer->dealer_name }}</h5>
                      @else
                        <h5 class="card-title">All Dealers</h5>
                      @endif
                  </div>
                  <div class="card-body">
                    @if(!empty($dealer))
                      <form action="/dealers/{{ $dealer->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('put')}}
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Dealer Name</label>
                            <input type="text" class="form-control" name="dealer_name" value="{{ $dealer->dealer_name }}" placeholder="Dealer Name" required>
                          </div>
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" value="{{ $dealer->phone_number }}" placeholder="Phone Number" required>
                          </div>
                          <div class="form-group">
                            <label>Address</label>
                            <input type='text' class='form-control' name='address' value="{{ $dealer->address }}" placeholder="Address" required>
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type='email' class='form-control' name='email' placeholder="Email Address" value="{{ $dealer->email }}" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <a href="/dealers" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form><hr>
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                              <th>Order ID</th>
                              <th>Slot Date</th>
                              <th>Slot Time</th>
                              <th>Stock Price</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($orders as $order)
                              <tr>
                                <td><a href="/home/{{$order->id}}">#{{ $order->id }}</a></td>
                                <td>{{ $order->slot_date }}</td>
                                <td>{{ $order->slot_time }}</td>
                                <td>&#8377; {{ $order->stock_price }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    @else
                    <h6 class="card-subtitle">You can Create/ Edit/ Delete Dealers Here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Dealer Name</th>
                                  <th>Phone Number</th>
                                  <th>Address</th>
                                  <th>Email</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($dealers as $dealer)
                              <tr>
                                  <td>{{ $dealer->dealer_name }}</td>
                                  <td>{{ $dealer->phone_number }}</td>
                                  <td>{{ $dealer->address }}</td>
                                  <td>{{ $dealer->email }}</td>
                                  <td>
                                    <form action='/dealers/{{ $dealer->id }}' method='post'>
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <a href='/dealers/{{ $dealer->id }}' class='btn btn-sm btn-warning'>Edit</a>
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
