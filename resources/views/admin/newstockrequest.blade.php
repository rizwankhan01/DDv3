@extends('layouts.warehouse')
@section('title') Stock Request | Doctor Display Dashboard @endsection

@section('contentbar')
  <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
          <h6>Stock Information</h6> <a href="javascript:void(0)" id="infobar-settings-close"><i class="feather icon-x"></i></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row align-items-center pb-3">
                      <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-3">
                                <center>
                                    <img src="storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" id="bigimage" alt="" style="max-width:60%;height:auto;">
                                </center>
                            </div>
                            <div class="col-9">
                              <span class="font-12 text-uppercase">#17715
                              </span>
                              <h5 class="mt-2 font-20">Asus Zenfone Max Pro - Black</h5>
                                <span class="badge badge-primary-inverse mb-2 text-uppercase">PREMIUM</span><br>
                                <small>Consulted few minutes ago</small>
                            </div>
                        </div><hr>
                        <form action="" method="post" class="row col-12">
                          <div class="form-group col-md-6">
                            <label>Dealer Name</label>
                            <select class="form-control">
                              <option>Select Dealer</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Stock Price</label>
                            <input type="number" class="form-control">
                          </div>
                          <div class="form-group col-12">
                            <input type="submit" class="btn btn-primary pull-right" value="Update">
                          </div>
                        </form><hr>
                        <div class="row">
                          <div class="col-12">
                            <div id="chart"></div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-10">
                <div class="card-header">
                    <div class="widgetbar pull-right" id="bigimage">
                        <button class="btn btn-sm btn-success">All</button>
                        <button class="btn btn-sm btn-primary">Today</button>
                        <button class="btn btn-sm btn-warning">Tomorrow</button>
                    </div>
                    <h5 class="card-title">To Stock</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2;">
              <div class="card-body">
                  <div class="best-product-slider">
                      <div class="best-product-slider-item">
                          <div class="row">
                              <div class="col-4">
                                  <center>
                                      <img src="storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" id="bigimage" alt="" style="max-width:40%;height:auto;">
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
        <div class="col-md-6">
          <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2;">
              <div class="card-body">
                  <div class="best-product-slider">
                      <div class="best-product-slider-item">
                          <div class="row">
                              <div class="col-4">
                                  <center>
                                      <img src="storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" id="bigimage" alt="" style="max-width:40%;height:auto;">
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
      <!-- End row -->
  </div>
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
  var options = {
          series: [{
            name: "Price",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Price History of Asus Zenfone Max Pro - Black',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
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

  <script src="{{ asset('assets\plugins\pnotify\js\pnotify.custom.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\sweet-alert2\sweetalert2.min.js') }}"></script>
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
