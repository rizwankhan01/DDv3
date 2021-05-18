@extends('layouts.dashboard')
@section('title') Customers | Doctor Display Dashboard @endsection
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
                  @if(!empty($customer))
                    <div class="row">
                    <div class="col-md-6">
                      <div class="card m-b-30">
                        <div class="card-body">
                            <div class="user-slider text-center">
                                <div class="user-slider-item">
                                  @if(!empty($customer->display_picture))
                                    <img src="{{ $customer->display_picture }}" alt="avatar" style="width:25%;height:auto;" class="rounded-circle mt-3 mb-4">
                                  @else
                                    <img src="../assets/images/users/men.svg" alt="avatar" style="width:25%;height:auto;" class="rounded-circle mt-3 mb-4">
                                  @endif
                                    <h5>{{ $customer->title }}. {{ $customer->name }}</h5>
                                    <p>{{ $customer->profession }}</p>
                                    <p>{{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}</p>
                                </div>
                            </div>
                            <div class="button-list text-center">
                              <a href='/exotel_calls/{{ $customer->phone_number }}'><button type="button" class="btn btn-round btn-primary-rgba"><i class="feather icon-phone"></i></button></a>
                              <a href='mailto:{{ $customer->email }}'><button type="button" class="btn btn-round btn-secondary-rgba"><i class="feather icon-mail"></i></button></a>
                              <button type="button" data-toggle="modal" data-target="#notesModal" class="btn btn-round btn-danger-rgba"><i class="feather icon-plus"></i></button>
                              <button type="button" class="btn btn-round btn-warning-rgba"><i class="feather icon-message-square"></i></button>
                              <a target='_blank' href="https://api.whatsapp.com/send?phone=91{{ $customer->phone_number }}&text=Hello%2C%20{{ $customer->name}}! Hope you're doing good today."><button type="button" class="btn btn-round btn-success-rgba"><i class="fa fa-whatsapp"></i></button></a>
                            </div><hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                         </div>
                            <div class="modal fade" id="notesModal" tabindex="-1" role="dialog" aria-labelledby="notesModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleStandardModalLabel">Create a Note</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="form-control" placeholder="Enter your note here."></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card m-b-30">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-borderless">
                                <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Model</th>
                                  <th>Updated</th>
                                  <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
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
                                    <tr>
                                      <td>
                                          <a href='/home/{{ $order->id }}'>#{{ $order->id }}</a>
                                      </td>
                                      <td>
                                          <figure style="display:flex; align-items:center;">
                                            <img src="../storage/{{ $image }}" class="img-fluid" id="bigimage" alt="{{ $model }} - {{ $color }}" style="max-width:25%;height:auto;">
                                            <img src="../storage/{{ $image }}" class="img-fluid" id="smallimage" alt="{{ $model }} - {{ $color }}" style="display:none;max-width:70%;height:auto;">
                                            <figcaption>{{ $model." - ".$color }}<br>
                                              @if($type=='PREMIUM')
                                                <span class="badge badge-primary-inverse mb-2 text-uppercase">{{ $type }}</span>
                                              @else
                                                <span class="badge badge-success-inverse mb-2 text-uppercase">{{ $type }}</span>
                                              @endif
                                            </figcaption>
                                          </figure>
                                      </td>
                                      <td>
                                        {{ $order->updated_at->diffForHumans() }}
                                      </td>
                                      <td>
                                        @if($order->status==1)
                                          <a href='/home/{{ $order->id }}' class='btn btn-sm btn-success col-md-12'>Open</a>
                                        @elseif($order->status==2)
                                          <a href='/home/{{ $order->id }}' class='btn btn-sm btn-warning col-md-12'>Assigned</a>
                                        @elseif($order->status==3)
                                          <a href='/home/{{ $order->id }}' class='btn btn-sm btn-success col-md-12'>Completed</a>
                                        @elseif($order->status==4)
                                          <a href='/home/{{ $order->id }}' class='btn btn-sm btn-danger col-md-12'>Cancelled</a>
                                        @endif
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="card m-b-30">
                          <div class="card-header">
                              <div class="row align-items-center">
                                  <div class="col-7">
                                      <h5 class="card-title mb-0">Recent Activity</h5>
                                  </div>
                                  <div class="col-5">
                                      <button class="btn btn-secondary-rgba float-right font-13">View All</button>
                                  </div>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="activities-history">
                                  <div class="activities-history-list">
                                      <div class="activities-history-item">
                                          <h6>Finished prototyping Project X.</h6>
                                          <p class="mb-0">Just Now</p>
                                      </div>
                                  </div>
                                  <div class="activities-history-list">
                                      <div class="activities-history-item">
                                          <h6>Received confirmation from marketing manager.</h6>
                                          <p class="mb-0">11:00 AM - 3 Oct, 2019</p>
                                      </div>
                                  </div>
                                  <div class="activities-history-list">
                                      <div class="activities-history-item">
                                          <h6>Zoe Updated quick start guide for development process.</h6>
                                          <p class="mb-0">09:25 PM - 27 Sep, 2019</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
                    <!--<div class="card m-b-30" style="background:#171C2A;">
                        <div class="card-header row">
                            <div class="col-md-10">
                            <ul class="vertical-menu">
                              <li><a href='#'><i class="fa fa-user-circle"></i> <span>{{ $customer->name }}</span></a></li>
                              <li><a href='exotel_calls/{{ $customer->phone_number }}'><i class="fa fa-phone"></i> <span>{{ $customer->phone_number }}</span></a></li>
                              <li><a href='mailto:{{ $customer->email }}'><i class="fa fa-envelope"></i> <span>{{ $customer->email }}</span></a></li>
                              @if(!empty($address->address))
                              <li><a href="https://maps.google.com/?q={{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}">
                                <i class="fa fa-map-marker"></i>{{ $address->address }}, {{ $address->area }}, {{ $address->city }} - {{ $address->pincode }}</a></li>
                              @endif
                            </ul>
                            </div>
                            <div class="col-md-2">
                              <span class="btn btn-lg btn-warning"><i class="fa fa-clock"></i> <h1 style="color:#fff;">{{ count($orders) }}</h1> Times Ordered</span>
                            </div>
                        </div>
                      </div>-->
                  @else
                  @livewire('all-customers')
                @endif
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
