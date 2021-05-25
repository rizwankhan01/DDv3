@extends('layouts.dashboard')
@section('title') {{ $dealer->dealer_name }}'s Dealer Profile | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-body row">
                    <div class="col-lg-12 col-xl-12">
                      <div class="card m-b-30">
                          <div class="card-body">
                              <div class="parents-slider">
                                  <div class="parents-slider-item">
                                    <div class="card m-b-30 pull-right">
                                            <div class="card-body">
                                                <div class="media">
                                                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                                                    <div class="media-body">
                                                        <p class="mb-0">Total Orders</p>
                                                        <h5 class="mb-0">76</h5>
                                                    </div>
                                                </div><br>
                                                <div class="media">
                                                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                                                    <div class="media-body">
                                                        <p class="mb-0">Total Stock Value</p>
                                                        <h5 class="mb-0">85000</h5>
                                                    </div>
                                                </div><br>
                                                <div class="media">
                                                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                                                    <div class="media-body">
                                                        <p class="mb-0">Ticket Percentage</p>
                                                        <h5 class="mb-0">8%</h5>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <a href="javascript:void(0)" id="infobar-settings-open"><i class="fa fa-pencil"></i></a>
                                      <div class="row align-items-center">
                                          <div class="col-12 col-md-2">
                                            <div class="circular">
                                              <!--<img src="../storage/" class="img-fluid" style="border-radius:50%;" alt="parent">-->
                                              <img src="\assets\images\users\men.svg" class="img-fluid" style="width:50%;">
                                            </div>
                                          </div>
                                          <div class="col-12 col-md-10">
                                              <h5 class="card-title mb-1">{{ $dealer->dealer_name }}</h5>
                                              <p class="mb-4 badge badge-success">Dealer</p>
                                              <p>
                                                <div class="pull-left">
                                                  <p><i class="feather icon-mail"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $dealer->email }}</p>
                                                  <p><i class="feather icon-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $dealer->dealer_name }}</p>
                                                    <p><i class="feather icon-map-pin"></i>&nbsp;&nbsp;&nbsp;&nbsp;Chennai</p>
                                                    <p>with us since <a href='#'>{{ $dealer->created_at->diffForHumans() }}</a></p>
                                                </div>
                                              </p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer">
                            <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-info mr-2"></i>Stocks Procurred <span class="badge badge-primary-inverse">5</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab-line" data-toggle="tab" href="#contact-line" role="tab" aria-controls="contact-line" aria-selected="false"><i class="feather icon-award mr-2"></i>Tickets <span class="badge badge-primary-inverse">4</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-dollar-sign mr-2"></i>Model Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bank-tab-line" data-toggle="tab" href="#bank-line" role="tab" aria-controls="bank-line" aria-selected="false"><i class="fa fa-bank mr-2"></i>Banking</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="defaultTabContentLine">
                                <div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                                  <div class="row">
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
                                    <div class="col-md-6">
                                      <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2;">
                                          <div class="card-body">
                                              <div class="best-product-slider">
                                                  <div class="best-product-slider-item">
                                                      <div class="row">
                                                          <div class="col-4">
                                                              <center>
                                                                  <img src="../storage/{{ $image }}" class="img-fluid" id="bigimage" alt="{{ $model }} - {{ $color }}" style="max-width:40%;height:auto;">
                                                              </center>
                                                          </div>
                                                          <div class="col-8">
                                                            <span class="font-12 text-uppercase">#{{ $order->id }}
                                                            <span class="badge badge-success pull-right">Paid</span>
                                                            </span>
                                                            <h5 class="mt-2 font-20">{{ $model }} - {{ $color }}</h5>
                                                            @if($type=='PREMIUM')
                                                              <span class="badge badge-primary-inverse mb-2 text-uppercase">{{ $type }}</span>
                                                            @else
                                                              <span class="badge badge-success-inverse mb-2 text-uppercase">{{ $type }}</span>
                                                            @endif
                                                            <?php
                                                            $fdate = date('Y-m-d');
                                                            $tdate = $order->updated_at;
                                                            $datetime1 = new DateTime($fdate);
                                                            $datetime2 = new DateTime($tdate);
                                                            $interval = $datetime1->diff($datetime2);
                                                            $days = $interval->format('%a');
                                                            $warranty = 90-$days;
                                                            ?>
                                                            <span class="badge badge-warning-inverse">
                                                              @if($warranty<=0)
                                                                Warranty Expired
                                                              @else
                                                                <b>{{ $warranty }} days</b> left for warranty
                                                              @endif
                                                            </span>
                                                              <a href="#" class="btn btn-sm btn-success pull-right">&#8377; {{ $order->stock_price }}</a><br>
                                                              <small>Procured {{ $order->updated_at->diffForHumans() }}</small>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  @endforeach
                                </div>
                                </div>
                                <div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
                                  <div class="row">
                                    <div class="col-12">
                                      <div id="chart"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="contact-line" role="tabpanel" aria-labelledby="contact-tab-line">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2;">
                                          <div class="card-body">
                                              <div class="best-product-slider">
                                                  <div class="best-product-slider-item">
                                                      <div class="row">
                                                          <div class="col-4">
                                                              <center>
                                                                  <img src="../storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" id="bigimage" alt="" style="max-width:40%;height:auto;">
                                                              </center>
                                                          </div>
                                                          <div class="col-8">
                                                            <span class="font-12 text-uppercase">#17715
                                                            </span>
                                                            <h5 class="mt-2 font-20">Asus Zenfone Max Pro - Black</h5>
                                                              <span class="badge badge-primary-inverse mb-2 text-uppercase">PREMIUM</span>
                                                              <a href="javascript:void(0)" id="infobar-settings-open" class="btn btn-sm btn-success pull-right">Stock</a><br>
                                                              <small>Consulted few minutes ago</small>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="bank-line" role="tabpanel" aria-labelledby="bank-tab-line">
                                  <div class="col-md-12 m-b-20">
                                    <img src="https://www.unionbankofindia.co.in/UBI_IFRAME/image/new_bot/ubi_icon.png" style="width:6%;">
                                    <h6>Union Bank of India</h6><span class="badge badge-success-inverse">Verified <i class="feather icon-check-circle"></i></span>
                                    <table class="table table-borderless table-responsive">
                                      <tr>
                                        <th>IFSC</th>
                                        <td>UBOIB79000555</td>
                                      </tr>
                                      <tr>
                                        <th>Name</th>
                                        <td>Abhimanyu Rana</td>
                                      </tr>
                                      <tr>
                                        <th>Acc. No.</th>
                                        <td>05879654202xxxx</td>
                                      </tr>
                                      <tr>
                                        <th>Branch</th>
                                        <td>Sector 40, Gurgram</td>
                                      </tr>
                                      <tr>
                                        <th>Pan Number</th>
                                        <td>CBXM9909X</td>
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  </div>
              </div>
          </div>
          <!-- End col -->
      </div>
      <!-- End row -->
  </div>
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
  var options = {
          series: [{
          data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
          chart: {
          type: 'bar',
          height: 380
        },
        plotOptions: {
          bar: {
            barHeight: '100%',
            distributed: true,
            horizontal: true,
            dataLabels: {
              position: 'bottom'
            },
          }
        },
        colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4', '#90ee7e',
          '#f48024', '#69d2e7'
        ],
        dataLabels: {
          enabled: true,
          textAnchor: 'start',
          style: {
            colors: ['#fff']
          },
          formatter: function (val, opt) {
            return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
          },
          offsetX: 0,
          dropShadow: {
            enabled: true
          }
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        xaxis: {
          categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
            'United States', 'China', 'India'
          ],
        },
        yaxis: {
          labels: {
            show: false
          }
        },
        title: {
            text: 'Custom DataLabels',
            align: 'center',
            floating: true
        },
        subtitle: {
            text: 'Category Names as DataLabels inside bars',
            align: 'center',
        },
        tooltip: {
          theme: 'dark',
          x: {
            show: false
          },
          y: {
            title: {
              formatter: function () {
                return ''
              }
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
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

  <script src="{{ asset('assets\plugins\pnotify\js\pnotify.custom.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\sweet-alert2\sweetalert2.min.js') }}"></script>
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
