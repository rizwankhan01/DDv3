@extends('layouts.dashboard')
@section('title') Enquiry | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                    @if(!empty($enquiry))
                        <h5 class="card-title">Enquiry for {{ $enquiry->model_name }}</h5>
                    @else
                        <h5 class="card-title">All Enquiries</h5>
                    @endif
                  </div>
                  @if(!empty($enquiry))
                    <div class="card-body">
                      <h6 class="card-subtitle">
                        <b>Customer Name:</b> <a href='/customer-profile/{{ $enquiry->customer->id }}'>{{ $enquiry->customer->name }}</a><br>
                        <b>Phone Number:</b> <a href='tel:{{ $enquiry->customer->phone_number }}'>{{ $enquiry->customer->phone_number }}</a>
                      </h6>
                        <div class="table-responsive">
                          <form action="/enquiry/{{ $enquiry->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            Follow Up Date:
                            <input type="date" class="form-control" name="fdate" value="{{ $enquiry->fdate }}" min="{{ date('Y-m-d') }}"><br>
                            <select class="form-control" name="status">
                              <option value="">Select Reason</option>
                              <option value="Call Back" @if($enquiry->status=='Call Back'){{ 'selected' }} @endif>Call Back</option>
                              <option value="Duplicate" @if($enquiry->status=='Duplicate'){{ 'selected' }} @endif>Duplicate</option>
                              <option value="Not Interested" @if($enquiry->status=='Not Interested'){{ 'selected' }} @endif>Not Interested</option>
                              <option value="Converted" @if($enquiry->status=='Converted'){{ 'selected' }} @endif>Converted</option>
                              <option value="Stock Unavailable" @if($enquiry->status=='Stock Unavailable'){{ 'selected' }} @endif>Stock Unavailable</option>
                            </select><br>
                            <input type="submit" class="btn btn-sm btn-primary pull-right" value="Update">
                          </form>
                        </div>
                    </div>
                  @else
                  <div class="card-body">
                    <h6 class="card-subtitle">You can moderate Enquiries Here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Model Name</th>
                                  <th>Customer</th>
                                  <th>City</th>
                                  <th>Follow back</th>
                                  <th>Created at</th>
                                  <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($enquiries as $enquiry)
                                  <tr>
                                    <td>{{ $enquiry->model_name }}</td>
                                    <td><a href='/customer-profile/{{ $enquiry->customer->id }}'>{{ $enquiry->customer->name }}</a><br>
                                      <small><a href='tel:{{ $enquiry->customer->phone_number }}'>{{ $enquiry->customer->phone_number}}</a></small>
                                    </td>
                                    <td>{{ $enquiry->city }}</td>
                                    <td>
                                      @if(date('Y-m-d')==$enquiry->fdate)
                                        <span class="btn btn-sm btn-success">{{ date('d-m-Y', strtotime($enquiry->fdate)) }}</span>
                                      @elseif(!empty($enquiry->fdate))
                                        {{ date('d-m-Y',strtotime($enquiry->fdate)) }}
                                      @endif
                                    </td>
                                    <td>{{ $enquiry->created_at }}</td>
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
                          </table>
                      </div>
                  </div>
                @endif
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
