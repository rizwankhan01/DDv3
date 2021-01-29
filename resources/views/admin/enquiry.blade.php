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
                  @if(empty($enquiry))
                    <div class="widgetbar pull-right">
                      <form action='/enquiry' method='post'>
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <button type='submit' name='filter' value='open' class="btn btn-sm btn-warning">({{ $open }}) Open Enquiries</button>
                        <button type='submit' name='filter' value='Call Back' class="btn btn-sm btn-primary">({{ $callback }}) To Call Back</button>
                        <button type='submit' name='filter' value='Others' class="btn btn-sm btn-success">Others</button>
                      </form>
                    </div>
                  @endif
                    <h5 class="card-title">
                      @if(!empty($enquiry))
                          <h5 class="card-title">Enquiry for
                            @if(empty($enquiry->url))
                              {{ $enquiry->model_name }}
                            @else
                              <a href='/{{ $enquiry->url }}' target='_blank'>{{ $enquiry->model_name }}</a>
                            @endif
                            <br><br>
                            Call: <a href='exotel_calls/{{ $enquiry->Customer->phone_number }}'>{{ $enquiry->customer->phone_number }}</a>
                          </h5>
                      @else
                          <h5 class="card-title">All Enquiries</h5>
                      @endif
                    </h5>
                </div>
                  @if(!empty($enquiry))
                    <div class="card-body">
                        <div class="table-responsive">
                          <form action="/enquiry/{{ $enquiry->id }}" method="post" class='row'>
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class='col-md-6'>
                              <input type='text' class='form-control' name='customer_name' value='{{ $enquiry->customer->name }}' placeholder='Customer Name' required><br>
                            </div>
                            <div class='col-md-6'>
                            <input type='text' class='form-control' name='locality' value='{{ $enquiry->city }}' placeholder='Locality' required><br>
                            </div>
                            <input type='hidden' name='customer_id' value='{{ $enquiry->customer->id }}'>
                            <div class='col-md-6'>
                              Follow Up Date:
                              <input type="date" class="form-control" name="fdate" value="{{ $enquiry->fdate }}" min="{{ date('Y-m-d') }}"><br>
                            </div>
                            <div class='col-md-6'>
                              <select class="form-control" name="status">
                                <option value="">Select Reason</option>
                                <option value="Call Back" @if($enquiry->status=='Call Back'){{ 'selected' }} @endif>Call Back</option>
                                <option value="Duplicate" @if($enquiry->status=='Duplicate'){{ 'selected' }} @endif>Duplicate</option>
                                <option value="Not Interested" @if($enquiry->status=='Not Interested'){{ 'selected' }} @endif>Not Interested</option>
                                <option value="Converted" @if($enquiry->status=='Converted'){{ 'selected' }} @endif>Converted</option>
                                <option value="Stock Unavailable" @if($enquiry->status=='Stock Unavailable'){{ 'selected' }} @endif>Stock Unavailable</option>
                              </select><br>
                            </div>
                            <div class='col-md-12'>
                              <textarea class='form-control' name='notes' placeholder='Notes'>{{ $enquiry->notes }}</textarea><br>
                            </div>
                            <div class='col-md-12'>
                              <input type="submit" class="btn btn-sm btn-primary pull-right" value="Update">
                            </div>
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
                                  <th>ID</th>
                                  <th>Model Name</th>
                                  <th>Customer</th>
                                  <th>Locality</th>
                                  <th>Follow back</th>
                                  <th>Created at</th>
                                  <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($enquiries as $enquiry)
                                  <tr>
                                    <td>{{ $enquiry->id }}</td>
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
                                    <td>{{ $enquiry->created_at->diffForHumans() }}</td>
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
