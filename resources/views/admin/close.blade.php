@extends('layouts.dashboard')
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          @section('title') Closed Orders | Doctor Display Dashboard @endsection
          <div class="col-lg-12">
              <div class="card m-b-10">
                  <div class="card-header">
                      <div class="widgetbar pull-right" id="bigimage">
                          <button class="btn btn-sm btn-success">All</button>
                          <button class="btn btn-sm btn-primary">Today</button>
                          <button class="btn btn-sm btn-warning">Tomorrow</button>
                      </div>
                      <h5 class="card-title">Closed Orders</h5>
                  </div>
              </div>
          </div>
              <div class="col-lg-12">
                @foreach($orders as $order)
                    @foreach($order->order_lists as $list)
                      @if($list->prod_type=='PREMIUM' || $list->prod_type=='BASIC')
                        <?php
                          $model = $list->color->model->brand->name." ".$list->color->model->series." ".$list->color->model->name;
                          $color = $list->color->name;
                          $type  = $list->prod_type;
                          $image = $list->color->image;
                        ?>
                      @endif
                    @endforeach
                  <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2;">
                      <div class="card-body">
                          <div class="best-product-slider">
                              <div class="best-product-slider-item">
                                  <div class="row">
                                      <div class="col-4 col-md-2">
                                          <center>
                                              <img src="storage/{{ $image }}" class="img-fluid" id="bigimage" alt="{{ $model }} - {{ $color }}" style="max-width:50%;height:auto;">
                                              <img src="storage/{{ $image }}" class="img-fluid" id="smallimage" alt="{{ $model }} - {{ $color }}">
                                          </center>
                                      </div>
                                      <div class="col-8 col-md-4">
                                        <span class="font-12 text-uppercase">#{{ $order->id }}
                                          @if(strpos($order->created_at->diffForHumans(),'hour ago')!==false
                                            || strpos($order->created_at->diffForHumans(),'hours ago')!==false
                                            || strpos($order->created_at->diffForHumans(),'minutes ago')!==false
                                            || strpos($order->created_at->diffForHumans(),'seconds ago')!==false)
                                            <span class='badge badge-pill badge-danger'>New</span>
                                          @endif
                                        </span>
                                        <h5 class="mt-2 font-20">{{ $model }} - {{ $color }}</h5>
                                        @if($type=='PREMIUM')
                                          <span class="badge badge-primary-inverse mb-2 text-uppercase">{{ $type }}</span>
                                        @else
                                          <span class="badge badge-success-inverse mb-2 text-uppercase">{{ $type }}</span>
                                        @endif
                                      </div>
                                      <div class="col-6 col-md-2">
                                        <li class="list-inline-item">
                                            <h4 class="mb-2 font-16"><a href='/customers/{{ $order->customer_id }}'>{{ $order->customer->name }}</a></h4>
                                            <p class="mb-2"><a href='/exotel_calls/{{ $order->customer->phone_number }}'><i class='fa fa-phone'></i> Call</a></p>
                                            <span class="font-12 mb-2"><i class='fa fa-map-marker'></i> {{ $order->address->area }}</span>
                                        </li>
                                      </div>
                                      <div class="col-6 col-md-2">
                                          <li class="list-inline-item">
                                            <h4 class="mb-2 font-16">{{ date('d F, D',strtotime($order->slot_date)) }}</h4>
                                              <p class="mb-2">
                                                <?php
                                                $fdate = date('Y-m-d');
                                                $tdate = $order->updated_at;
                                                $datetime1 = new DateTime($fdate);
                                                $datetime2 = new DateTime($tdate);
                                                $interval = $datetime1->diff($datetime2);
                                                $days = $interval->format('%a');
                                                $warranty = 90-$days;
                                                ?>
                                                @if($warranty<=0)
                                                  Warranty Expired
                                                @else
                                                  <b>{{ $warranty }} days</b> left for warranty
                                                @endif
                                              </p>
                                              <span class="font-12 mb-2">
                                                <a href='/serviceman-profile/{{ $order->serviceman->id }}'>
                                                <img src="storage/{{ $order->serviceman->profile_image }}" style="width:35px;height:auto;border-radius:25px;">
                                                &nbsp;&nbsp;{{ $order->serviceman->name }}</a></span>
                                          </li>
                                      </div>
                                      <div class="col-12 col-md-2">
                                        <li class="list-inline-item">
                                            <h4 class="mb-2 font-16">&#8377; {{ $order->order_lists->sum('price') }}</h4>
                                            <!--<p class="mb-4"><i class='fa fa-credit-card-alt'></i> Card</p>-->
                                            <div class="row">
                                              <div class="col-12">
                                                <a href='/home/{{ $order->id }}' class='btn btn-sm btn-success'>Completed</a>
                                                <a href='/invoice/{{ $order->id }}' target='_blank' class='btn btn-sm btn-warning'>Invoice</a>
                                              </div>
                                            </div>
                                        </li>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                @endforeach
              </div>
              <div class="col-12">
                {{ $orders->links() }}
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
