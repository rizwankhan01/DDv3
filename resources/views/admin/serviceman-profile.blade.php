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
                          <div class="parents-slider">
                              <div class="parents-slider-item">
                                  <div class="row align-items-center">
                                      <div class="col-12 col-md-2">
                                        <div class="circular">
                                        @if(!empty($user->profile_image))
                                          <img src="../storage/{{ $user->profile_image }}" class="img-fluid" style="border-radius:50%;" alt="parent">
                                        @else
                                          <img src="\assets\images\users\men.svg" class="img-fluid" style="width:50%;">
                                        @endif
                                        </div>
                                      </div>
                                      <div class="col-12 col-md-10">
                                      <p>
                                        <div class="pull-left">
                                          <h5 class="card-title mb-1">{{ $user->name }}</h5>
                                          <p class="mb-0 font-14">{{ $user->user_type }}</p>
                                          <p class="mb-4 badge badge-success">Operations</p>
                                          @if($user->active==1)
                                            <p class="mb-4 badge badge-success"><i class="mdi mdi-circle text-white"></i> Active</p>
                                          @else
                                            <p class="mb-4 badge badge-secondary"><i class="mdi mdi-circle text-white"></i> Inactive</p>
                                          @endif
                                              <p><i class="feather icon-mail"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->email }}</p>
                                              <p><i class="feather icon-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->primary_phone }}</p>
                                            </div>
                                            <div class="pull-right">
                                                <p>
                                                <figure style="display:flex;align-items:center;">
                                                  <img src="{{ asset('assets/images/trophy.png') }}" style="width:10%;height:auto;">
                                                  <figcaption><i>
                                                    @if($orders->count() < 100)
                                                      <h3>Fixer</h3>
                                                    @elseif($orders->count() > 100)
                                                      <h3>Super Fixer</h3>
                                                    @elseif($orders->count() > 500)
                                                      <h3>Pro Fixer</h3>
                                                    @elseif($orders->count() > 1000)
                                                      <h3>Master Fixer</h3>
                                                    @elseif($orders->count() > 2000)
                                                      <h3>Chief Fixer</h3>
                                                    @endif
                                                  </i></figcaption>
                                                </figure>
                                                </p>
                                                <p class="btn btn-success btn-sm btn-block"><i class="feather icon-shield"></i>&nbsp;&nbsp;{{ $orders->count() }} Orders</p>
                                                <p class="btn btn-warning btn-sm btn-block"><i class="fa fa-ticket"></i>&nbsp;&nbsp;{{ $tickets->count() }} Tickets</p>
                                                <p><i class="feather icon-map-pin"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->city }}</p>
                                                <p>Employee since <a href='#'>{{ date('F Y', strtotime($user->date_of_join)) }}</a></p>
                                            </div>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div><hr>
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
