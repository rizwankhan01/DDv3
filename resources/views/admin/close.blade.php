@extends('layouts.dashboard')
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          @section('title') Closed Orders | Doctor Display Dashboard @endsection
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                      <div class="widgetbar pull-right">
                          <button class="btn btn-sm btn-success">All</button>
                          <button class="btn btn-sm btn-primary">Today</button>
                          <button class="btn btn-sm btn-warning">Tomorrow</button>
                      </div>
                      <h5 class="card-title">Closed Orders</h5>
                  </div>
                  <div class="card-body">
                      <h6 class="card-subtitle">You can view here pending orders here.</h6>
                      <div class="table-responsive">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Model</th>
                                  <th>Slot Date</th>
                                  <th>Slot Time</th>
                                  <th>Amount</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ts = 0; $tt = 0; $tp = 0;?>
                              @foreach($orders as $order)
                                <tr>
                                  <td><a href='/home/{{ $order->id }}'>#{{ $order->id }}</a></td>
                                  <td>
                                  @foreach($order->order_lists as $list)
                                    @if($list->prod_type!='COUPON' AND $list->prod_type!='ADDON')
                                      {{ $list->color->model->brand->name }} {{ $list->color->model->series}} {{ $list->color->model->name }} ({{ $list->color->name }}) - {{ $list->prod_type }}
                                    @endif
                                  @endforeach
                                  </td>
                                  <td>
                                  @if($order->slot_date == date('Y-m-d'))
                                    <span class='btn btn-sm btn-danger'>{{ date('d-m-Y', strtotime($order->slot_date)) }}</span>
                                  @else
                                    {{ date('d-m-Y', strtotime($order->slot_date)) }}
                                  @endif
                                  </td>
                                  <td>{{ $order->slot_time }}</td>
                                  <td>
                                    <?php
                                      $t  = $order->order_lists->sum('price');
                                      $tt = $tt+$t;
                                    ?>
                                    &#8377; {{ $t }}
                                  </td>
                                  <td>
                                      <a href='/home/{{ $order->id }}' class='btn btn-sm btn-success'>Completed</a>
                                      <a href='/invoice/{{ $order->id }}' target='_blank' class='btn btn-sm btn-warning'>Invoice</a>
                                  </td>
                                </tr>
                              @endforeach
                              </tbody>
                          </table>
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
