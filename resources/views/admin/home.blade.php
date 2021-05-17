@extends('layouts.dashboard')
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          @if(!empty($order))
            @section('title') Order ID: #{{ $order->id }} | Doctor Display Dashboard @endsection
            @extends('layouts.ordercontrols')
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
                          <li><a href='/exotel_calls/{{ $order->customer->phone_number }}'><i class="fa fa-phone"></i> <span>{{ $order->customer->phone_number }}</span></a></li>
                          <li><a href='mailto:{{ $order->customer->email }}'><i class="fa fa-envelope"></i> <span>{{ $order->customer->email }}</span></a></li>
                          <li><a href="https://maps.google.com/?q={{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}" target='_blank'><i class="fa fa-map-marker"></i>{{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}</a></li>
                        </ul>
                        </div>
                        <div class="col-md-2">
                            @if($order->status==1)
                              @if(empty($consultation->id))
                                <button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success pull-right col-md-12">Open</button><br><br>
                              @else
                                <button data-toggle="modal" data-target=".bd-example-modal-lg2" class="btn btn-sm btn-success pull-right col-md-12">Assign</button><br><br>
                              @endif
                              <button data-toggle="modal" data-target=".bd-example-modal-lg3" class="btn btn-sm btn-primary pull-right col-md-12">Reschedule?</button><br><br>
                              <button data-toggle="modal" data-target=".bd-example-modal-lg4" class="btn btn-sm btn-warning pull-right col-md-12">Apply Coupon</button><br><br>
                              <button data-toggle="modal" data-target=".bd-example-modal-lg5" class="btn btn-sm btn-danger pull-right col-md-12">Cancel Order</button>
                            @elseif($order->status==2)
                              <a href="#" class="btn btn-sm btn-warning pull-right col-md-12">Assigned</a><br><br>
                              <button data-toggle="modal" data-target=".bd-example-modal-lg3" class="btn btn-sm btn-primary pull-right col-md-12">Reschedule?</button><br><br>
                              <button data-toggle="modal" data-target=".bd-example-modal-lg4" class="btn btn-sm btn-warning pull-right col-md-12">Apply Coupon</button><br><br>
                              <button data-toggle="modal" data-target=".bd-example-modal-lg5" class="btn btn-sm btn-danger pull-right col-md-12">Cancel Order</button>
                            @elseif($order->status==3)
                              <a href="#" class="btn btn-sm btn-success pull-right col-md-12">Completed</a>
                              <button class="btn btn-sm btn-danger pull-right col-md-12">Paid &#8377; {{ $olist->sum('price') }} by {{ $corder->payment_type }}</button>
                              <button class="btn btn-sm btn-primary pull-right col-md-12">IMEI: {{ $corder->imei }}</button>
                              <div class="row">
                                <img src="../storage/{{ $corder->pre_image }}" class="col-md-6">
                                <img src="../storage/{{ $corder->post_image }}" class="col-md-6">
                              </div>
                            @elseif($order->status==4)
                              <a href="#" class="btn btn-sm btn-danger pull-right col-md-12">Cancelled</a><br><br><span>Reason: {{ $order->cancel_reason }}</span><br><br>
                            @endif
                        </div>
                    </div>
                  </div>
             </div>
             <div class="col-lg-6">
               <div class="card m-b-30">
                 <div class="card-header">
                   <h5 class="card-title">Order Information
                   @if($order->status!=3 AND $order->status!=4 AND !empty($order->stock_price))
                     <a data-toggle="modal" data-target=".changeprice"><i class="fa fa-edit"></i></a>
                   @endif</h5>
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
                               {{ $list->color->model->brand->name }} {{ $list->color->model->series}} {{ $list->color->model->name }} ({{ $list->color->name }}) - {{ $list->prod_type }}
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
                           @if(!empty($corder->payment_type))
                             <tr>
                               <td><b>Paid by</b></td>
                               <td>{{ $corder->payment_type }}</td>
                             </tr>
                           @endif
                         </tbody>
                       </table>
                     </div>
                  </div>
                </div>
             </div>
             <div class="col-lg-6">
               <div class="card m-b-30">
                 <div class="card-header">
                   <h5 class="card-title">Technical & Stock Information
                     @if($order->status!=3 AND $order->status!=4 AND !empty($order->stock_price))
                       <a data-toggle="modal" data-target=".bd-example-modal-lg2"><i class="fa fa-edit"></i></a>
                     @endif
                   </h5>
                 </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          @if(!empty($order->dealer->dealer_name))
                          <tr>
                            <td><b>Dealer</b></td>
                            <td><a href='/dealer-profile/{{ $order->dealer->id }}'>{{ $order->dealer->dealer_name }}</a></td>
                            <td>&#8377; {{ $order->stock_price }}</td>
                          </tr>
                          @endif
                          @if(!empty($order->serviceman->name))
                          <tr>
                            <td><b>Service Man</b></td>
                            <td>
                                <figure>
                                <img src="../storage/{{ $order->serviceman->profile_image }}" style="width:150px;height:auto;border-radius:25px;">
                                  <figcaption>
                                    <a href='/serviceman-profile/{{ $order->serviceman->id }}'>{{ $order->serviceman->name }}</a>
                                  </figcaption>
                                </figure>
                            </td>
                            <td>
                              @if(!empty($corder->start_timestamp))
                                <?php
                                $start_t  = new DateTime($corder->start_timestamp);
                                $end_t    = new DateTime($corder->end_timestamp);
                                $diff   = $start_t->diff($end_t);
                                ?>
                                Completed in {{ $diff->format('%H:%I:%S') }} hours
                              @endif
                            </td>
                          </tr>
                          @endif
                          @if(!empty($order->reschedule_reason))
                            <tr>
                              <td><b>Rescheduled</b></td>
                              <td>{{ $order->reschedule_reason }}</td>
                              <td></td>
                            </tr>
                          @endif
                          @if(!empty($order->cancel_reason))
                            <tr>
                              <td><b>Cancelled</b></td>
                              <td>{{ $order->cancel_reason }}</td>
                              <td></td>
                            </tr>
                          @endif
                          @if(!empty($order->pickup_reason))
                            <tr>
                              <td><b>Picked Up</b></td>
                              <td>{{ $order->pickup_reason }}</td>
                              <td></td>
                            </tr>
                          @endif
                          @if(!empty($corder->imei))
                            <tr>
                              <td><b>IMEI</b></td>
                              <td>{{ $corder->imei }}</td>
                              <td></td>
                            </tr>
                          @endif
                          @if(!empty($ticket->r_stock_amount))
                            <tr>
                              <td><b>Ticket</b></td>
                              <td><a href='/dealer-profile/{{ $ticket->dealer->id }}'>{{ $ticket->dealer->dealer_name }}</a></td>
                              <td>&#8377; {{ $ticket->r_stock_amount }}</td>
                            </tr>
                          @endif
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
             @if(!empty($corder->feedback))
               <div class="col-lg-12">
                 <div class="card m-b-30">
                   <div class="card-header">
                     <h5 class="card-title">Feedback Information</h5>
                   </div>
                   <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-striped table-bordered">
                           <tbody>
                             <tr>
                               <td>Is the display working fine?</td>
                               <td>{{ $corder->rate4 }}</td>
                             </tr>
                             <tr>
                               <td>All the points in the display is working?</td>
                               <td>{{ $corder->rate5 }}</td>
                             </tr>
                             <tr>
                               <td>Is the Home button working?</td>
                               <td>{{ $corder->rate6 }}</td>
                             </tr>
                             <tr>
                               <td>Is the Volume and Power button working?</td>
                               <td>{{ $corder->rate7 }}</td>
                             </tr>
                             <tr>
                               <td>Does the Mic & Speaker work fine?</td>
                               <td>{{ $corder->rate8 }}</td>
                             </tr>
                             <tr>
                               <td>Does the screen sensor work?</td>
                               <td>{{ $corder->rate9 }}</td>
                             </tr>
                             <tr>
                               <td>How much would you rate the service man?</td>
                               <td>{{ $corder->rate1 }}</td>
                             </tr>
                             <tr>
                               <td>How good was his communication?</td>
                               <td>{{ $corder->rate2 }}</td>
                             </tr>
                             <tr>
                               <td>How was his presentation?</td>
                               <td>{{ $corder->rate3 }}</td>
                             </tr>
                             <tr>
                               <td>Customer Feedback</td>
                               <td>{{ $corder->feedback }}</td>
                             </tr>
                           </tbody>
                         </table>
                       </div>
                   </div>
                 </div>
               </div>
             @endif
             <div class="col-lg-12 m-b-30"><center><small>This order was placed {{ $order->created_at->diffForHumans() }}.</small></center></div>
          @else
          @section('title') Open Orders | Doctor Display Dashboard @endsection
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="widgetbar pull-right" id="bigimage">
                            <button class="btn btn-sm btn-success">All</button>
                            <button class="btn btn-sm btn-primary">Today</button>
                            <button class="btn btn-sm btn-warning">Tomorrow</button>
                        </div>
                        <h5 class="card-title">Orders</h5>
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
                                          <h4 class="mb-2 font-16">{{ $order->customer->name }}</h4>
                                          <p class="mb-2"><a href='/exotel_calls/{{ $order->customer->phone_number }}'><i class='fa fa-phone'></i> Call</a></p>
                                          <span class="font-12 mb-2"><i class='fa fa-map-marker'></i> {{ $order->address->area }}</span>
                                      </li>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <li class="list-inline-item">
                                            <h4 class="mb-2 font-16">{{ date('d F, D',strtotime($order->slot_date)) }}</h4>
                                            <p class="mb-2"><i class='fa fa-clock-o'></i> {{ $order->slot_time }}</p>
                                            <span class="font-12 mb-2">Booked {{ $order->created_at->diffForHumans() }}</span>
                                        </li>
                                    </div>
                                    <div class="col-12 col-md-2">
                                      <li class="list-inline-item">
                                          <h4 class="mb-2 font-16">&#8377; {{ $order->order_lists->sum('price') }}</h4>
                                          <!--<p class="mb-4"><i class='fa fa-credit-card-alt'></i> Card</p>-->
                                          @if($order->pickup_reason==NULL)
                                            @if($order->status==1)
                                              <a href='/home/{{ $order->id }}' class='btn btn-sm col-12 btn-success'>Open</a>
                                            @elseif($order->status==2)
                                              <a href='/home/{{ $order->id }}' class='btn btn-sm col-12 btn-success'>Assigned</a>
                                            @endif
                                          @else
                                            <a href="/home/{{ $order->id }}" class='btn btn-sm col-12 btn-warning'>Picked Up</a>
                                          @endif
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
