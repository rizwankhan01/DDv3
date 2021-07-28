@extends('layouts.dashboard')
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          @section('title') Cancelled Orders | Doctor Display Dashboard @endsection
          <div class="col-lg-12">
              <div class="card m-b-10">
                  <div class="card-header">
                      <div class="widgetbar pull-right">
                        <form action='/cancel' method='post'>
                          {{ csrf_field() }}
                          {{ method_field('post') }}
                          <a href='/cancel' class="btn btn-sm btn-success">All</a>
                          <button name='filter' value='Chennai' class="btn btn-sm btn-primary">Chennai</button>
                          <button name='filter' value='Bangalore' class="btn btn-sm btn-warning">Bangalore</button>
                        </form>
                      </div>
                      <h5 class="card-title" id="bigimage">Cancelled Orders</h5>
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
                      $screen_color = $list->color->screen_color;
                      $type  = $list->prod_type;
                      $image = $list->color->image;
                    ?>
                  @endif
                @endforeach
              <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2; @if(!empty($screen_color)) border-left: 5px solid {{ $screen_color }};  @else border-left: 5px solid #FCC72D; @endif">
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
                                    @if(!empty($list->color->model->resource->indisplay_fingerprint) AND $list->color->model->resource->indisplay_fingerprint==1)
                                      <small><i class="fas fa-fingerprint" style="background: -webkit-radial-gradient(#B675FB, #008577);-webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i> In Display</small>
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
                                          <p class="mb-2"><i class='fa fa-clock-o'></i> {{ $order->slot_time }}</p>
                                          <span class="font-12 mb-2">Cancelled because, {{ $order->cancel_reason }}</span>
                                          @if($order->cancelledby)<span class="font-12 mb-2">Cancelled by {{ $order->cancelledby->name }}</span>@endif
                                      </li>
                                  </div>
                                  <div class="col-12 col-md-2">
                                        <h4 class="mb-2 font-16 pull-right">&#8377; {{ $order->order_lists->sum('price') }}</h4>
                                        <!--<p class="mb-4"><i class='fa fa-credit-card-alt'></i> Card</p>-->
                                        <a href='/home/{{ $order->id }}' class='btn btn-sm col-12 btn-danger'>Cancelled</a>
                                        <a href='/cancel/{{ $order->id }}' class='btn btn-sm col-12 btn-success'>Reopen</a>
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
