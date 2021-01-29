@extends('layouts.dashboard')
@section('title') Enquiry Report | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                    <div class="widgetbar pull-right">
                      <form action="/enquiryreports" method="post" class="form-inline">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <select class="form-control" name="month">
                          <option value="">Select Month</option>
                          <option value="-01-">January</option>
                          <option value="-02-">Febuary</option>
                          <option value="-03-">March</option>
                          <option value="-04-">April</option>
                          <option value="-05-">May</option>
                          <option value="-06-">June</option>
                          <option value="-07-">July</option>
                          <option value="-08-">August</option>
                          <option value="-09-">September</option>
                          <option value="-10-">October</option>
                          <option value="-11-">November</option>
                          <option value="-12-">December</option>
                        </select>
                        <input type="number" class="form-control" name="year" style="width:100px;" placeholder="Year">
                        <button class="btn btn-sm btn-primary-rgba" type="submit">Filter</button>
                      </form>
                    </div>
                      <b>Enquiry Report</b>
                  </div>
                  <div class="card-body">
                    <h6 class="card-subtitle">You can view enquiry reports here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Date</th>
                                  <th>Model Name</th>
                                  <th>Customer</th>
                                  <th>Locality</th>
                                  <th>Follow Up</th>
                                  <th>Notes</th>
                                  <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($enquiries as $enquiry)
                                  <tr>
                                    <td>{{ date('d-m-Y', strtotime($enquiry->created_at)) }}</td>
                                    <td>
                                      @if(empty($enquiry->url))
                                        {{ $enquiry->model_name }}
                                      @else
                                        <a href='/{{ $enquiry->url}}' target='_blank'>{{ $enquiry->model_name }}</a>
                                      @endif
                                    </td>
                                    <td><a href='/customer-profile/{{ $enquiry->customer->id }}'>{{ $enquiry->customer->name }}</a><br>
                                      <small><a href='exotel_calls/{{ $enquiry->customer->phone_number }}'>{{ $enquiry->customer->phone_number}}</a></small>
                                    </td>
                                    <td>{{ $enquiry->city }}</td>
                                    <td>
                                      @if(date('Y-m-d')==$enquiry->fdate)
                                        <span class="btn btn-sm btn-success">{{ date('d-m-Y', strtotime($enquiry->fdate)) }}</span>
                                      @elseif(!empty($enquiry->fdate))
                                        {{ date('d-m-Y',strtotime($enquiry->fdate)) }}
                                      @endif
                                    </td>
                                    <td>{{ $enquiry->notes }}</td>
                                    <td>
                                      @if(empty($enquiry->status))
                                        <a href='/enquiry/{{ $enquiry->id }}' class='btn btn-sm btn-warning'>Update Status</a>
                                      @else
                                        <a href="/enquiry/{{ $enquiry->id }}" class="btn btn-sm btn-default">{{ $enquiry->status }}</a>
                                      @endif
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table><hr>
                          <div class='pull-right'>
                            <span class='btn btn-sm btn-success btn-rounded'>Converted: {{ $conv }}</span><br>
                            <span class='btn btn-sm btn-danger btn-rounded'>Stock Unavailable: {{ $stock_unav }}</span><br>
                            <span class='btn btn-sm btn-primary btn-rounded'>Not Interested: {{ $not_int }}</span><br>
                            <span class='btn btn-sm btn-warning btn-rounded'>Call Back: {{ $call_back }}</span><br>
                            <span class='btn btn-sm btn-danger btn-rounded'>Open: {{ $open }}</span>
                        </div>
                      </div>
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
