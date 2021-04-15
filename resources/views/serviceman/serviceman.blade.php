@extends('layouts.serviceman')
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          @if(!empty($order))
            @section('title') Order ID: #{{ $order->id }} | Doctor Display Dashboard @endsection
            @extends('layouts.servicemancontrols')
            <div class="col-lg-12">
            @if(session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
            @endif
                <div class="card m-b-30" style="background:#171C2A;">
                    <div class="card-header row">
                        <div class="col-md-10">
                        <ul class="vertical-menu">
                          <li><a href='/home/{{ $order->id }}'><i class="fa fa-archive"></i> <span>Order ID: #{{ $order->id }} | {{ date('d-m-Y', strtotime($order->slot_date)) }} - {{ $order->slot_time }}</span></a></li>
                          <li><a href='#'><i class="fa fa-user-circle"></i> <span>{{ $order->customer->name }}</span></a></li>
                          <li><a href='tel:{{ $order->customer->phone_number }}'><i class="fa fa-phone"></i> <span>{{ $order->customer->phone_number }}</span></a></li>
                          <li><a href='mailto:{{ $order->customer->email }}'><i class="fa fa-envelope"></i> <span>{{ $order->customer->email }}</span></a></li>
                          <li><a href="https://maps.google.com/?q={{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}"><i class="fa fa-map-marker"></i>{{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}</a></li>
                        </ul>
                        </div>
                        <div class="col-md-2">
                          @if($order->status==4)
                              <button class="btn btn-sm btn-danger pull-right col-md-12">Order Cancelled</button>
                              <br><br><span>Reason: {{ $order->cancel_reason }}</span>
                          @elseif($order->status==3)
                              <button class="btn btn-sm btn-success pull-right col-md-12">Order Completed</button><br><br>
                              <button class="btn btn-sm btn-danger pull-right col-md-12">Paid &#8377; {{ $olist->sum('price') }} by {{ $corder->payment_type }}</button><br><br>
                              <button class="btn btn-sm btn-primary pull-right col-md-12">IMEI: {{ $corder->imei }}</button>
                          @else
                            @if(empty($corder->start_timestamp))
                              <button data-toggle="modal" data-target=".bd-example-modal-lg2" class="btn btn-sm btn-warning pull-right col-md-12"><i class="fa fa-map-marker"></i> Start Tracking</button><br><hr>
                            @elseif(empty($corder->pre_image))
                              <button data-toggle="modal" data-target=".bd-example-modal-lg1" class="btn btn-sm btn-warning pull-right col-md-12"><i class="fa fa-camera"></i> Pre - Image</button><br><hr>
                            @else
                              <button data-toggle="modal" data-target=".bd-example-modal-lg3" class="btn btn-sm btn-success pull-right col-md-12">Complete Order</button><br><br>
                              @if(empty($order->pickup_reason))
                              <button data-toggle="modal" data-target=".bd-example-modal-lg4" class="btn btn-sm btn-primary pull-right col-md-12">Pickup Phone</button><br><br>
                              @else
                              <button class="btn btn-sm btn-default pull-right col-md-12">Device Picked Up</button><br><br>
                              @endif
                            @endif
                              <button data-toggle="modal" data-target=".bd-example-modal-lg5" class="btn btn-sm btn-danger pull-right col-md-12">Cancel Order</button>
                          @endif
                        </div>
                    </div>
                  </div>
             </div>
             <div class="col-lg-12">
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
                               <img src="../../storage/{{ $list->color->image }}" style="width:50px;height:50px;">
                               {{ $list->color->model->brand->name }} {{ $list->color->model->series }} {{ $list->color->model->name }} ({{ $list->color->name }}) - {{ $list->prod_type }}
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
             @if(!empty($consultation->id))
               <div class="col-lg-12">
                 <div class="card m-b-30">
                   <div class="card-header">
                     <h5 class="card-title">Consultation Information</h5>
                   </div>
                   <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-striped table-bordered">
                           <tbody>
                             <tr>
                               <td>Is the phone in Working Condition?</td>
                               <td>{{ $consultation->q1 }}</td>
                             </tr>
                             <tr>
                               <td>What kind of damage has happened?</td>
                               <td>{{ $consultation->q2 }}</td>
                             </tr>
                             <tr>
                               <td>How did the phone fall down?</td>
                               <td>{{ $consultation->q3 }}</td>
                             </tr>
                             <tr>
                               <td>Is there any water drop?</td>
                               <td>{{ $consultation->q4 }}</td>
                             </tr>
                             <tr>
                               <td>How old is the phone?</td>
                               <td>{{ $consultation->q5 }}</td>
                             </tr>
                             <tr>
                               <td>Has the screen been changed before?</td>
                               <td>{{ $consultation->q6 }}</td>
                             </tr>
                             <tr>
                               <td>Any other issue with the phone?</td>
                               <td>{{ $consultation->q7 }}</td>
                             </tr>
                           </tbody>
                         </table>
                       </div>
                   </div>
                 </div>
               </div>
             @endif
             <div class="col-lg-12 m-b-30"><center><small>This order was placed on {{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}.</small></center></div>
          @else
          @section('title') My Orders | Doctor Display Dashboard @endsection
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                      <div class="widgetbar pull-right" id="bigimage">
                          <button class="btn btn-sm btn-success">All</button>
                          <button class="btn btn-sm btn-primary">Today</button>
                          <button class="btn btn-sm btn-warning">Tomorrow</button>
                      </div>
                      <h5 class="card-title">My Orders</h5>
                  </div>
                  <div class="card-body">
                      <h6 class="card-subtitle">You can view pending orders here.</h6>
                      <div class="table-responsive">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Model</th>
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
                                  <td>
                                  @foreach($order->order_lists as $list)
                                    @if($list->prod_type!='COUPON' AND $list->prod_type!='ADDON')
                                      {{ $list->color->model->brand->name }} {{ $list->color->model->series}} {{ $list->color->model->name }} ({{ $list->color->name }}) - {{ $list->prod_type }}
                                    @endif
                                  @endforeach
                                  </td>
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
                                      <a href='/serviceman/{{ $order->id }}' class='btn btn-sm btn-success'>Open</a>
                                    @elseif($order->status==2)
                                      <a href='/serviceman/{{ $order->id }}' class='btn btn-sm btn-success'>Assigned</a>
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
