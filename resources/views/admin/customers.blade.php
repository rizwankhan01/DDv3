@extends('layouts.dashboard')
@section('title') Customers | Doctor Display Dashboard @endsection
@section('contentbar')
  <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
          <h6>Notes</h6> <a href="javascript:void(0)" id="infobar-settings-close"><i class="feather icon-x"></i></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row align-items-center pb-3">
                    <div class="col-12">
                      <form action="" method="post">
                        <select class="select2-single form-control">
                          <option value="">Select Type</option>
                        </select><Br>
                        <input type="text" id="summernote" name="note"><Br>
                        Call back time:<Br>
                        <input id="range-slider-max-postfixes"><br>
                        <input type="submit" class="btn col-12 btn-lg btn-primary" value="Add">
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
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
                                <div class="button-list">
                                    <a href="#" class="btn btn-sm btn-primary-rgba font-18"><i class="feather icon-facebook"></i></a>
                                    <a href="#" class="btn btn-sm btn-info-rgba font-18"><i class="feather icon-twitter"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger-rgba font-18"><i class="feather icon-instagram"></i></a>
                                </div>
                                <div class="user-slider-item">
                                  @if(!empty($customer->display_picture))
                                    <img src="{{ $customer->display_picture }}" alt="avatar" style="width:25%;height:auto;" class="rounded-circle mt-3 mb-4">
                                  @else
                                    <img src="../assets/images/users/men.svg" alt="avatar" style="width:25%;height:auto;" class="rounded-circle mt-3 mb-4">
                                  @endif
                                    <h5><a href='#' id="xeditable-title">{{ $customer->title }}</a>. <a href='#' id="xeditable-name">{{ $customer->name }}</a></h5>
                                    <p><a href="#" id="xeditable-prof">{{ $customer->profession }}</a></p>
                                </div>
                            </div>
                            <div class="button-list text-center">
                              <a href='/exotel_calls/{{ $customer->phone_number }}'><button type="button" class="btn btn-round btn-primary-rgba"><i class="feather icon-phone"></i></button></a>
                              <a href='mailto:{{ $customer->email }}'><button type="button" class="btn btn-round btn-secondary-rgba"><i class="feather icon-mail"></i></button></a>
                              <button type="button" href="javascript:void(0)" id="infobar-settings-open" class="btn btn-round btn-danger-rgba"><i class="feather icon-plus"></i></button>
                              <button type="button" class="btn btn-round btn-warning-rgba"><i class="feather icon-message-square"></i></button>
                              <a target='_blank' href="https://api.whatsapp.com/send?phone=91{{ $customer->phone_number }}&text=Hello%2C%20{{ $customer->name}}! Hope you're doing good today."><button type="button" class="btn btn-round btn-success-rgba"><i class="fa fa-whatsapp"></i></button></a>
                            </div>
                            <hr>
                            <table class="table table-bordered">
                              <tr>
                                <td><a href="#" id="xeditable-username">{{ $customer->email }}</a></td>
                                <td><a href="#" id="xeditable-username2">{{ $customer->phone_number }}</a></td>
                              </tr>
                              <tr>
                                <td><a href="#" id="xeditable-dob">{{ $customer->date_of_birth }}</a></td>
                                <td><a href="#" id="xeditable-lang">{{ $customer->language }}</a></td>
                              </tr>
                            </table><hr>
                            @if(!empty($address->id))
                            <div class="col-lg-12 col-xl-6">
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
                            </div>
                          @endif
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
                            <table class="table table-borderless table-responsive">
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
                      <div class="card-body">
                          <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-home mr-2"></i>All</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-phone mr-2"></i>Calls</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" id="contact-tab-line" data-toggle="tab" href="#contact-line" role="tab" aria-controls="contact-line" aria-selected="false"><i class="feather icon-mail mr-2"></i>Emails</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link active" id="web-tab-line" data-toggle="tab" href="#web-line" role="tab" aria-controls="web-line" aria-selected="false"><i class="feather icon-globe mr-2"></i>Web Interaction</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" id="notes-tab-line" data-toggle="tab" href="#notes-line" role="tab" aria-controls="notes-line" aria-selected="false"><i class="feather icon-file mr-2"></i>Notes</a>
                              </li>
                          </ul>
                          <div class="tab-content" id="defaultTabContentLine">
                              <div class="tab-pane fade" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                                <div class="accordion accordion-light" id="accordionwithlight">
                                  <div class="card">
                                    <div class="card-header" id="headingOnelight">
                                      <h3 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOnelight" aria-expanded="true" aria-controls="collapseOnelight"><i class="feather icon-circle mr-2"></i>First title goes here</button>
                                      </h3>
                                    </div>
                                    <div id="collapseOnelight" class="collapse show" aria-labelledby="headingOnelight" data-parent="#accordionwithlight">
                                      <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                      </div>
                                    </div>
                                    <small style="padding-left:35px;">Just Now by Sooraj</small>
                                  </div>
                                  <div class="card">
                                    <div class="card-header" id="headingTwolight">
                                      <h3 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwolight" aria-expanded="false" aria-controls="collapseTwolight"><i class="feather icon-circle mr-2"></i>Second title goes here</button>
                                      </h3>
                                    </div>
                                    <div id="collapseTwolight" class="collapse" aria-labelledby="headingTwolight" data-parent="#accordionwithlight">
                                      <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                      </div>
                                    </div>
                                    <small style="padding-left:35px;">Just Now by Sooraj</small>
                                  </div>
                                  <div class="card">
                                    <div class="card-header" id="headingThreelight">
                                      <h3 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreelight" aria-expanded="false" aria-controls="collapseThreelight"><i class="feather icon-circle mr-2"></i>Third title goes here</button>
                                      </h3>
                                    </div>
                                    <div id="collapseThreelight" class="collapse" aria-labelledby="headingThreelight" data-parent="#accordionwithlight">
                                      <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                      </div>
                                    </div>
                                    <small style="padding-left:35px;">Just Now by Sooraj</small>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                              </div>
                              <div class="tab-pane fade" id="contact-line" role="tabpanel" aria-labelledby="contact-tab-line">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                              </div>
                              <div class="tab-pane fade show active" id="web-line" role="tabpanel" aria-labelledby="web-line">
                                <div class="activities-history">
                                @foreach($enquiries as $enquiry)
                                  <div class="activities-history-list">
                                      <div class="activities-history-item">
                                          <h6>
                                            @if(empty($enquiry->url))
                                              Enquired for <u>{{ $enquiry->model_name }}</u>
                                            @else
                                              Enquired for <u><a href='/{{ $enquiry->url }}' target='_blank'>{{ $enquiry->model_name }}</a></u>
                                            @endif
                                          </h6>
                                          <p class="mb-0">
                                              {{ $enquiry->created_at->diffForHumans() }}
                                              @if(empty($enquiry->status))
                                                <a href='/enquiry/{{ $enquiry->id }}' class='badge badge-warning'>Update Status</a>
                                              @else
                                                <a href="/enquiry/{{ $enquiry->id }}" class="badge badge-default">{{ $enquiry->status }}</a>
                                              @endif
                                      </div>
                                  </div>
                                @endforeach
                              </div>
                              </div>
                          </div>
                      </div>
                      </div>
                  </div>
                  </div>
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
  <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 100
      });
  </script>
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
  <!-- Slider-->
  <script src="{{ asset('assets\plugins\ion-rangeSlider\ion.rangeSlider.min.js') }}"></script>
  <script src="{{ asset('assets\js\custom\custom-range-slider.js') }}"></script>
  <!-- X-Editable -->
  <script src="{{ asset('assets\plugins\bootstrap-xeditable\js\bootstrap-editable.min.js') }}"></script>
  <script src="{{ asset('assets\js\custom\custom-form-xeditable.js') }}"></script>

  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
