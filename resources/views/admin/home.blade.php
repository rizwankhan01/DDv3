@extends('layouts.dashboard')
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          @if(!empty($order))
            @section('title') Order ID: #{{ $order->id }} | Doctor Display Dashboard @endsection
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="widgetbar pull-right">
                            @if($order->status==1)
                              <span class="btn btn-sm btn-success">Open</span>
                            @elseif($order->status==2)
                              <span class="btn btn-sm btn-warning">Assigned</span>
                            @elseif($order->status==3)
                              <span class="btn btn-sm btn-success">Completed</span>
                            @elseif($order->status==4)
                              <span class="btn btn-sm btn-danger">Closed</span>
                            @endif
                        </div>
                        <h5 class="card-title">Order ID: #{{ $order->id }}</h5><br>
                        <h6 class="card-subtitle">This order was placed on {{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}.</h6>
                    </div>
                  </div>
             </div>
             <div class="col-lg-6">
               <div class="card m-b-30">
                 <div class="card-header">
                   <h5 class="card-title">Order Information</h5>
                 </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-striped table-bordered">
                         <thead>
                           <th>Product</th>
                           <th>Price</th>
                         </thead>
                         <tbody>
                           @foreach($olist as $list)
                           <tr>
                           <td>
                           @if($list->prod_type=='COUPON')
                               {{ $list->coupon->name }}
                           @elseif($list->prod_type=='ADDON')
                               {{ $list->addonproduct->name }}
                           @elseif($list->prod_type!='COUPON' AND $list->prod_type!='ADDON')
                               <img src="../../storage/{{ $list->color->image }}" style="width:50px;height:50px;"> {{ $list->color->model->name }} ({{ $list->color->name }}) - {{ $list->prod_type }}
                           @endif
                           </td>
                           <td>
                           @if($list->prod_type=='COUPON')
                             - &#8377; {{ abs($list->price) }}
                           @else
                             &#8377; {{ $list->price }}
                           @endif
                           </td>
                           </tr>
                           @endforeach
                           <tr>
                             <td><b>Total:</b></td>
                             <td>&#8377; {{ $olist->sum('price') }}</td>
                           </tr>
                         </tbody>
                       </table>
                     </div>
                  </div>
                </div>
             </div>
             <div class="col-lg-6">
               <div class="card m-b-30">
                 <div class="card-header">
                   <h5 class="card-title">Stock Information</h5>
                 </div>
                <div class="card-body">

                </div>
                </div>
             </div>
          @else
          @section('title') Open Orders | Doctor Display Dashboard @endsection
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                      <div class="widgetbar pull-right">
                          <button class="btn btn-sm btn-success">All</button>
                          <button class="btn btn-sm btn-primary">Today</button>
                          <button class="btn btn-sm btn-warning">Tomorrow</button>
                      </div>
                      <h5 class="card-title">Orders</h5>
                  </div>
                  <div class="card-body">
                      <h6 class="card-subtitle">You can view here pending orders here.</h6>
                      <div class="table-responsive">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Customer Name</th>
                                  <th>Phone</th>
                                  <th>Slot Date</th>
                                  <th>Slot Time</th>
                                  <th>Area</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($orders as $order)
                                <tr>
                                  <td><b>{{ $order->customer->name }}</b></td>
                                  <td><a href='tel:{{ $order->customer->phone_number }}'>{{ $order->customer->phone_number }}</a></td>
                                  <td>
                                  @if($order->slot_date == date('Y-m-d'))
                                    <span class='btn btn-sm btn-danger'>{{ date('d-m-Y', strtotime($order->slot_date)) }}</span>
                                  @else
                                    {{ date('d-m-Y', strtotime($order->slot_date)) }}
                                  @endif
                                  </td>
                                  <td>{{ $order->slot_time }}</td>
                                  <td>{{ $order->address->area }}</td>
                                  <td>
                                    @if($order->status==1)
                                      <a href='/home/{{ $order->id }}' class='btn btn-sm btn-success'>Open</a>
                                    @elseif($order->status==2)
                                      <a href='/home/{{ $order->id }}' class='btn btn-sm btn-success'>Assigned</a>
                                    @endif
                                  </td>
                                </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          @endif
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
