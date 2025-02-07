@extends('layouts.serviceman')
@section('title') Tickets | Doctor Display Dashboard @endsection
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                    @if(isset($ticket))
                        <h5 class="card-title">Ticket for <a href='/serviceman/{{ $ticket->order_id }}'>Order ID: #{{ $ticket->order_id }}</a></h5>
                    @else
                        <h5 class="card-title">All Tickets</h5>
                    @endif
                  </div>
                  @if(isset($ticket))
                  <div class="card-body">
                    <div class="table-responsive">
                      <form action="/mytickets/{{ $ticket->id }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('put') }}
                          Resolution:
                          <textarea class="form-control" name="resolution" placeholder="Eg. Screen Replaced" required></textarea><br>
                          <input type='submit' class='btn btn-sm btn-primary pull-right' value='Update'>
                      </form>
                    </div>
                  </div>
                  @else
                  <div class="card-body">
                    <h6 class="card-subtitle">You can view Tickets Here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Order ID</th>
                                  <th>Customer</th>
                                  <th>Dealer</th>
                                  <th>Phone Model</th>
                                  <th>Issue</th>
                                  <th>Resolution</th>
                                  <th>Date Open</th>
                                  <th>Service Date</th>
                                  <th>Assigned To</th>
                                  <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($tickets as $ticket)
                              <tr>
                                  <td><a href='/serviceman/{{ $ticket->order_id }}'>#{{ $ticket->order_id }}</a></td>
                                  <td>{{ $ticket->order->customer->name }}<br>
                                  <small><a href='tel:{{ $ticket->order->customer->phone_number }}'>{{ $ticket->order->customer->phone_number }}</a></small></td>
                                  <td>{{ $ticket->order->dealer->dealer_name }}<br>
                                  <small><a href='tel:{{ $ticket->order->dealer->phone_number}}'>{{ $ticket->order->dealer->phone_number}}</a></small></td>
                                  <td>
                                    @foreach($ticket->order->order_lists as $list)
                                      @if($list->prod_type!='ADDON' AND $list->prod_type!='COUPON')
                                        {{ $list->color->model->brand->name }} {{ $list->color->model->name }} - <small>{{ $list->color->name }}</small>
                                      @endif
                                    @endforeach
                                  </td>
                                  <td>{{ $ticket->issue }}</td>
                                  <td>{{ $ticket->resolution }}</td>
                                  <td>{{ date('d-m-Y', strtotime($ticket->created_at)) }}</td>
                                  <td>{{ date('d-m-Y', strtotime($ticket->date_open)) }}</td>
                                  <td>{{ $ticket->serviceman->name }}</td>
                                  <td>
                                    @if($ticket->status==0)
                                      <a href="/mytickets/{{ $ticket->id }}" class="btn btn-sm btn-danger">Open</a>
                                    @else
                                      <span class="btn btn-sm btn-success">Closed on {{ date('d-m-Y', strtotime($ticket->date_close)) }}</span>
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
