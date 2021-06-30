@extends('layouts.dashboard')
@section('contentbar')
  <!--<div class="col-lg-12">
      <div class="modal fade" id="onboardingScreens" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-white border-0">
                      <button type="button" class="close text-muted" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body border-0">
                      <div id="onboard-screen" class="onboard-screen">
                          <div class="onboard-screen-list">
                              <img src="assets/images/ui-onboard/responsive.svg" class="img-fluid" alt="onboard">
                              <h5 class="card-title my-4">Highly Responsive</h5>
                              <p class="text-muted">Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                          </div>
                          <div class="onboard-screen-list">
                              <img src="assets/images/ui-onboard/customisable.svg" class="img-fluid" alt="onboard">
                              <h5 class="card-title my-4">Customisable</h5>
                              <p class="text-muted">Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                          </div>
                          <div class="onboard-screen-list">
                              <img src="assets/images/ui-onboard/easily-editable-code.svg" class="img-fluid" alt="onboard">
                              <h5 class="card-title my-4">Easily Editable Code</h5>
                              <p class="text-muted">Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                          </div>
                          <div class="onboard-screen-list">
                              <iframe width="560" height="315" src="https://www.youtube.com/embed/B2eK3R1blQI?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              <h5 class="card-title my-4">Unique Widgets</h5>
                              <p class="text-muted">Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>-->
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          @if(!empty($order))
            @section('title') Order ID: #{{ $order->id }} | Doctor Display Dashboard @endsection
            @extends('layouts.ordercontrols')
            <!--
            <div class="col-lg-7 col-xl-8">
              <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h5 class="card-title mb-0">Order No : #{{ $order->id }}</h5>
                        </div>
                        <div class="col-5 text-right">
                            <span class="badge badge-success-inverse">Completed</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="order-primary-detail mb-4">
                            <h6>Order Placed</h6>
                            <p class="mb-0">16/06/2019 at 04:23 PM</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="order-primary-detail mb-4">
                            <h6>Name</h6>
                            <p class="mb-0">Michelle Johnson</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="order-primary-detail mb-4">
                            <h6>Email ID</h6>
                            <p class="mb-0">demo@example.com</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="order-primary-detail mb-4">
                            <h6>Contact No</h6>
                            <p class="mb-0">+1 9876543210</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 ">
                            <div class="order-primary-detail mb-4">
                            <h6>Delivery Address <a href="#" class="badge badge-primary-inverse">Edit</a></h6>
                            <p>417 Redbud Drive, Manhattan Building,<br/> Whitestone, NY.<br/> New York-11357</p>
                            <p class="mb-0">+1 123 123 4567</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 ">
                            <div class="order-primary-detail mb-4">
                            <h6>Billing Address <a href="#" class="badge badge-primary-inverse">Edit</a></h6>
                            <p>417 Redbud Drive, Manhattan Building,<br/> Whitestone, NY.<br/> New York-11357</p>
                            <p class="mb-0">+1 123 123 4567</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="card-title">Order Items</h5>
              </div>
              <div class="card-body">
                  <div class="table-responsive ">
                      <table class="table table-borderless">
                          <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Action</th>
                                  <th scope="col">Photo</th>
                                  <th scope="col">Product</th>
                                  <th scope="col">Qty</th>
                                  <th scope="col">Price</th>
                                  <th scope="col" class="text-right">Total</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <th scope="row">1</th>
                                  <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                  <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                  <td>Apple MacBook Pro</td>
                                  <td>1</td>
                                  <td>$10</td>
                                  <td class="text-right">$500</td>
                              </tr>
                              <tr>
                                  <th scope="row">2</th>
                                  <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                  <td><img src="assets/images/ecommerce/product_02.svg" class="img-fluid" width="35" alt="product"></td>
                                  <td>Dell Alienware</td>
                                  <td>2</td>
                                  <td>$20</td>
                                  <td class="text-right">$200</td>
                              </tr>
                              <tr>
                                  <th scope="row">3</th>
                                  <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                  <td><img src="assets/images/ecommerce/product_03.svg" class="img-fluid" width="35" alt="product"></td>
                                  <td>Acer Predator Helios</td>
                                  <td>3</td>
                                  <td>$30</td>
                                  <td class="text-right">$300</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="row border-top pt-3">
                      <div class="col-md-12 order-2 order-lg-1 col-lg-4 col-xl-6">
                          <div class="order-note">
                              <p class="mb-5"><span class="badge badge-secondary-inverse">Free Shipping Order</span></p>
                              <h6>Note :</h6>
                              <p>Please, Pack with product air bag and handle with care.</p>
                          </div>
                      </div>
                      <div class="col-md-12 order-1 order-lg-2 col-lg-8 col-xl-6">
                          <div class="order-total table-responsive ">
                              <table class="table table-borderless text-right">
                                  <tbody>
                                      <tr>
                                          <td>Sub Total :</td>
                                          <td>$1000.00</td>
                                      </tr>
                                      <tr>
                                          <td>Shipping :</td>
                                          <td>$0.00</td>
                                      </tr>
                                      <tr>
                                          <td>Tax(18%) :</td>
                                          <td>$180.00</td>
                                      </tr>
                                      <tr>
                                          <td class="text-black f-w-7 font-18">Amount :</td>
                                          <td class="text-black f-w-7 font-18">$1180.00</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card-footer text-right">
                  <button type="button" class="btn btn-primary-rgba my-1"><i class="feather icon-plus mr-2"></i>Add Product</button>
                  <button type="button" class="btn btn-success-rgba my-1"><i class="feather icon-repeat mr-2"></i>Refund</button>
                  <button type="button" class="btn btn-danger-rgba my-1"><i class="feather icon-trash mr-2"></i>Cancel</button>
              </div>
          </div>
          <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h5 class="card-title mb-0">Invoice PDF Details</h5>
                        </div>
                        <div class="col-5 text-right">
                            <button type="button" class="btn btn-success py-1"><i class="feather icon-download mr-2"></i>Invoice</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="order-primary-detail">
                        <h6>Current PDF Details</h6>
                        <p class="mb-0">Invoice No : #986953</p>
                        <p class="mb-0">Seller GST : 24HY87078641Z0</p>
                        <p class="mb-0">Purchase GST : 24HG9878961Z1</p>
                    </div>
                </div>
            </div>
          </div>
            <div class="col-lg-5 col-xl-4">
              <div class="card m-b-30">
                  <div class="card-header">
                      <div class="row align-items-center">
                          <div class="col-12">
                              <h5 class="card-title mb-0">Customer Information</h5>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="user-slider text-center">
                          <div class="user-slider-item">
                            @if(!empty($order->customer->display_picture))
                              <img src="{{ $order->customer->display_picture }}" alt="avatar" style="width:25%;height:auto;" class="rounded-circle mt-3 mb-4">
                            @else
                              <img src="../assets/images/users/men.svg" alt="avatar" style="width:25%;height:auto;" class="rounded-circle mt-3 mb-4">
                            @endif
                              <h5><a href='#'>{{ $order->customer->title }}</a>. <a href='#'>{{ $order->customer->name }}</a></h5>
                              <p><a href="#">{{ $order->customer->profession }}</a></p>
                          </div>
                      </div>
                      <div class="button-list text-center">
                        <a href='/exotel_calls/{{ $order->customer->phone_number }}'><button type="button" class="btn btn-round btn-primary-rgba"><i class="feather icon-phone"></i></button></a>
                        <a href='mailto:{{ $order->customer->email }}'><button type="button" class="btn btn-round btn-secondary-rgba"><i class="feather icon-mail"></i></button></a>
                        <button type="button" class="btn btn-round btn-warning-rgba"><i class="feather icon-message-square"></i></button>
                        <a target='_blank' href="https://api.whatsapp.com/send?phone=91{{ $order->customer->phone_number }}&text=Hello%2C%20{{ $order->customer->name}}! Hope you're doing good today."><button type="button" class="btn btn-round btn-success-rgba"><i class="fa fa-whatsapp"></i></button></a>
                      </div>
                      <hr>
                      <table class="table table-bordered">
                        <tr>
                          <td><a href="#">{{ $order->customer->email }}</a></td>
                          <td><a href="#">{{ $order->customer->phone_number }}</a></td>
                        </tr>
                        <tr>
                          <td><a href="#">{{ $order->customer->date_of_birth }}</a></td>
                          <td><a href="#">{{ $order->customer->language }}</a></td>
                        </tr>
                      </table><hr>
                      @if(!empty($address->id))
                          <div class="address-box">
                              <div class="card border m-b-30">
                                  <div class="card-body">
                                      <p>{{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}</p>
                                  </div>
                                  <div class="card-footer">
                                      <div class="button-list">
                                          <button type="button" class="btn btn-round btn-success-rgba mb-1"><i class="feather icon-edit-2"></i></button>
                                          <button type="button" class="pull-right btn btn-rounded btn-primary-rgba font-16 mb-0">
                                            @if($address->address_type=='Office')
                                              <i class="feather icon-briefcase"></i>
                                            @else
                                              <i class="feather icon-home"></i>
                                            @endif
                                            {{ $address->address_type }}
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    @endif
                   </div>
              </div>
              <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Chat with Customers</h5>
                </div>
                <div class="card-body">
                    <div class="chat-detail order-chat-detail mb-0">
                        <div class="chat-body">
                            <div class="chat-day text-center mb-3">
                                <span class="badge badge-secondary">Today</span>
                            </div>
                            <div class="chat-message chat-message-right">
                                <div class="chat-message-text">
                                    <span>Hello!</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>4:18 pm<i class="feather icon-check ml-2"></i></span>
                                </div>
                            </div>
                            <div class="chat-message chat-message-left">
                                <div class="chat-message-text">
                                    <span>Yes, Sir</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                                </div>
                            </div>
                            <div class="chat-message chat-message-right">
                                <div class="chat-message-text">
                                    <span>Schedule demo.</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                                </div>
                            </div>
                            <div class="chat-message chat-message-left">
                                <div class="chat-message-text">
                                    <span>Sure, I will.</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                                </div>
                            </div>
                            <div class="chat-message chat-message-right">
                                <div class="chat-message-text">
                                    <span>Great. Thanks</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                                </div>
                            </div>
                            <div class="chat-message chat-message-left">
                                <div class="chat-message-text">
                                    <span>I have completed.</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                                </div>
                            </div>
                            <div class="chat-message chat-message-right">
                                <div class="chat-message-text">
                                    <span>Please, send me.</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                                </div>
                            </div>
                            <div class="chat-message chat-message-left">
                                <div class="chat-message-text">
                                    <span>Sure, I will email you.</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                                </div>
                            </div>
                            <div class="chat-message chat-message-right">
                                <div class="chat-message-text">
                                    <span>Ok, Got it.</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="chat-bottom px-0 pb-0">
                            <div class="chat-messagebar">
                                <form>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-secondary-rgba" type="button" id="button-addonmic"><i class="feather icon-mic"></i></button>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Type a message..." aria-label="Text">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary-rgba" type="submit" id="button-addonlink"><i class="feather icon-link"></i></button>
                                            <button class="btn btn-primary-rgba" type="button" id="button-addonsend"><i class="feather icon-send"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Downloads</h5>
                </div>
                <div class="card-body">
                    <p><button type="button" class="btn btn-primary-rgba my-1"><i class="feather icon-file mr-2"></i>Invoice</button></p>
                    <p><button type="button" class="btn btn-info-rgba my-1"><i class="feather icon-box mr-2"></i>Packaing Slip</button></p>
                    <p><button type="button" class="btn btn-success-rgba my-1"><i class="feather icon-gift mr-2"></i>Gift Wrap Detail</button></p>
                </div>
            </div>
          </div>-->
            <div class="col-lg-12">
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
             <div class="col-lg-12">
               <div class="card m-b-30">
                 <div class="card-header">
                   <h5 class="card-title">Mailables</h5>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                       <a href='/send-mail/confirm-{{ $order->id }}' class="badge badge-secondary">Resend Order Confirmation Mail <i class="feather icon-external-link"></i></a>
                       <a href='/send-mail/complete-{{ $order->id }}' class="badge badge-secondary">Resend Order Completed Mail <i class="feather icon-external-link"></i></a>
                     </div>
                   </div>
                 </div>
               </div>
             <div class="col-lg-12 m-b-30"><center><small>This order was placed {{ $order->created_at->diffForHumans() }}.</small></center></div>
          @else
          @section('title') Open Orders | Doctor Display Dashboard @endsection
            <div class="col-lg-12">
                <div class="card m-b-10">
                    <div class="card-header">
                        <div class="widgetbar pull-right">
                          <form action='/home' method='post'>
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <a href='/home' class="btn btn-sm btn-success">All <span class="badge badge-light">{{ count($orders) }}</span></a>
                            <button name='filter' value='Chennai' class="btn btn-sm btn-primary">Chennai <span class="badge badge-light">{{ $chn_count }}</span></button>
                            <button name='filter' value='Bangalore' class="btn btn-sm btn-warning">Bangalore <span class="badge badge-light">{{ $bgl_count }}</span></button>
                          </form>
                        </div>
                        <h5 class="card-title" id="bigimage">Orders</h5>
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
                                            <span class="font-12 mb-2">Booked {{ $order->created_at->diffForHumans() }}</span>
                                        </li>
                                    </div>
                                    <div class="col-12 col-md-2">
                                          <h4 class="mb-2 font-16 pull-right">&#8377; {{ $order->order_lists->sum('price') }}</h4>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
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
<!-- Slick js -->
<script src="{{ asset('assets\plugins\slick\slick.min.js') }}"></script>
<!-- Onboarding Screen -->
<script src="{{ asset('assets\js\custom\custom-onboarding-screens.js') }}"></script>
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
