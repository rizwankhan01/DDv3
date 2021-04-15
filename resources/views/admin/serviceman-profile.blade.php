@extends('layouts.dashboard')
@section('title') {{ $user->name }}'s Serviceman Profile | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                      @if(!empty($user) AND $user->user_type=='Service Man')
                        <h5 class="card-title">{{ $user->name }}'s Serviceman Profile</h5>
                      @endif
                  </div>
                  <div class="card-body">
                    @if(!empty($user))
                      @if($user->user_type=='Service Man')
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Model</th>
                                <th>Slot Date</th>
                                <th>Slot Time</th>
                                <th>Time Taken</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($orders as $order)
                                <tr>
                                  <td><a href="/home/{{$order->id}}">#{{ $order->id }}</a></td>
                                  <td>
                                    @foreach($order->order_lists as $list)
                                      @if($list->prod_type!='COUPON' AND $list->prod_type!='ADDON')
                                        {{ $list->color->model->brand->name }} {{ $list->color->model->series}} {{ $list->color->model->name }} ({{ $list->color->name }}) - {{ $list->prod_type }}
                                      @endif
                                    @endforeach
                                  </td>
                                  <td>{{ $order->slot_date }}</td>
                                  <td>{{ $order->slot_time }}</td>
                                  <td>@if(!empty($order->closedorder->id))
                                    <?php
                                    $start_t  = new DateTime($order->closedorder->start_timestamp);
                                    $end_t    = new DateTime($order->closedorder->end_timestamp);
                                    $diff   = $start_t->diff($end_t);
                                    ?>
                                    {{ $diff->format('%H:%I:%S') }} Hours
                                  @endif</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                      @endif
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
