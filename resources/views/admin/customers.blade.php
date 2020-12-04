@extends('layouts.dashboard')
@section('title') Customers | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
                  @if(!empty($customer))
                    <div class="card m-b-30" style="background:#171C2A;">
                        <div class="card-header row">
                            <div class="col-md-10">
                            <ul class="vertical-menu">
                              <li><a href='#'><i class="fa fa-user-circle"></i> <span>{{ $customer->name }}</span></a></li>
                              <li><a href='tel:{{ $customer->phone_number }}'><i class="fa fa-phone"></i> <span>{{ $customer->phone_number }}</span></a></li>
                              <li><a href='mailto:{{ $customer->email }}'><i class="fa fa-envelope"></i> <span>{{ $customer->email }}</span></a></li>
                              <li><a href="https://maps.google.com/?q={{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}"><i class="fa fa-map-marker"></i>{{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}</a></li>
                            </ul>
                            </div>
                            <div class="col-md-2">
                              <span class="btn btn-lg btn-warning"><i class="fa fa-clock"></i> <h1 style="color:#fff;">{{ count($orders) }}</h1> Times Ordered</span>
                            </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                  <th>Order ID</th>
                                  <th>Slot Date</th>
                                  <th>Slot Time</th>
                                  <th>Area</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach($orders as $order)
                                    <tr>
                                      <td>
                                          <a href='/home/{{ $order->id }}'>#{{ $order->id }}</a>
                                      </td>
                                      <td>
                                      @if($order->slot_date == date('Y-m-d'))
                                        <span class='btn btn-sm btn-danger'>{{ date('d-m-Y', strtotime($order->slot_date)) }}</span>
                                      @elseif(!empty($order->slot_date))
                                        {{ date('d-m-Y', strtotime($order->slot_date)) }}
                                      @endif
                                      </td>
                                      <td>{{ $order->slot_time }}</td>
                                      <td>@if(!empty($order->address->area)) {{ $order->address->area }} @endif</td>
                                      <td>
                                        @if($order->status==1)
                                          <a href='/home/{{ $order->id }}' class='btn btn-sm btn-success col-md-12'>Open</a>
                                        @elseif($order->status==2)
                                          <a href='/home/{{ $order->id }}' class='btn btn-sm btn-warning col-md-12'>Assigned</a>
                                        @elseif($order->status==3)
                                          <a href='/home/{{ $order->id }}' class='btn btn-sm btn-success col-md-12'>Completed</a>
                                        @elseif($order->status==4)
                                          <a href='/home/{{ $order->id }}' class='btn btn-sm btn-danger col-md-12'>Cancelled</a>
                                        @endif
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                  @else
                  <div class="card m-b-30">
                  <div class="card-header">
                    <h5 class="card-title">All Customers</h5>
                  </div>
                  <div class="card-body">
                    <h6 class="card-subtitle">You can moderate customers here.</h6>
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
                                  <th>Phone Number</th>
                                  <th>Email</th>
                                  <th>Analytics</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($customers as $customer)
                                  <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->phone_number }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td><a href="https://analytics.google.com/analytics/web/#/report/visitors-user-activity/a65390322w119310705p124818505/_r.userId={{ $customer->ga_id }}&_r.userListReportStates=&_r.userListReportId=visitors-legacy-user-id/" target="_blank">Open GA</a></td>
                                    <td><a href='/customers/{{ $customer->id}}' class='btn btn-sm btn-primary'>Expand</a></td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
                </div>
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
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
@endsection
