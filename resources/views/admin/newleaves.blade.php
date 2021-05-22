@extends('layouts.hr')
@section('title') All Leaves | Doctor Display Dashboard @endsection

@section('contentbar')
  <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
          <h6>Leave Details</h6> <a href="javascript:void(0)" id="infobar-settings-close"><i class="feather icon-x"></i></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row align-items-center pb-3">
                      <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">
                                  <li class="media">
                                      <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder">
                                      <div class="media-body">
                                      <h5 class="mt-0 mb-1 font-16">Employee Name<span class="float-right font-14"><span class="badge badge-warning-inverse ">3 days leave request</span><br><span class="badge badge-success-inverse">Health</span></span></h5>
                                      <p class="mb-0"><a href='#'>Dec 3 - 5th, 2021</a></p>
                                      </div>
                                  </li>
                                </h5>
                            </div>
                            <div class="card-body">
                                <form action="" class="row">
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                  <div class="form-group col-12">
                                    <textarea class="form-control" placeholder="Notes"></textarea>
                                  </div>
                                  <div class="form-group col-12">
                                    <button type="submit" class="btn btn-danger pull-right">Reject</button>
                                    <button type="submit" class="btn btn-success pull-right">Approve</button>
                                  </div>
                                </form>
                                <hr>
                                <div class="row">
                                  <h6>Leave History</h6>
                                  <div class="col-12">
                                    <div id="chart"></div>
                                  </div>
                                </div>
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
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
          <div class="card-body appointment-widget">
                <div class="row align-items-end">
                <div class="col-12 col-md-2 m-b-20">
                    <p class="bg-icon">
                      <span class="fa-stack">
                        <i class="feather icon-calendar fa-stack-2x"></i>
                        <strong class="fa-stack-1x text-inside-icon">5</strong>
                      </span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                  <li class="list-inline-item m-b-20">
                  <h5 class="mt-2 font-20">Leave Application for 3 days <span class="badge badge-success">Health</span></h5>
                  <p class="mb-2">Applied Today</p>
                  </li>
                </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20">
                      <a href='#' class="align-items-center">
                      <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder"><br>
                      Sheik Service</a>
                    </li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20"><p class="mb-20">Dec 26th, 27th, 28th</p></li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20"><p class="mb-20"><a href='' class="btn btn-warning">Approved</a></p></li>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
          <div class="card-body appointment-widget">
                <div class="row align-items-end">
                <div class="col-12 col-md-2 m-b-20">
                    <p class="bg-icon">
                      <span class="fa-stack">
                        <i class="feather icon-calendar fa-stack-2x"></i>
                        <strong class="fa-stack-1x text-inside-icon">5</strong>
                      </span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                  <li class="list-inline-item m-b-20">
                  <h5 class="mt-2 font-20">Leave Application for 3 days <span class="badge badge-success">Health</span></h5>
                  <p class="mb-2">Applied Today</p>
                  </li>
                </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20">
                      <a href='#' class="align-items-center">
                      <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder"><br>
                      Sheik Service</a>
                    </li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20"><p class="mb-20">Dec 26th, 27th, 28th</p></li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20"><p class="mb-20"><a href='' class="btn btn-warning">Approved</a></p></li>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
          <div class="card-body appointment-widget">
                <div class="row align-items-end">
                <div class="col-12 col-md-2 m-b-20">
                    <p class="bg-icon">
                      <span class="fa-stack">
                        <i class="feather icon-calendar fa-stack-2x"></i>
                        <strong class="fa-stack-1x text-inside-icon">5</strong>
                      </span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                  <li class="list-inline-item m-b-20">
                  <h5 class="mt-2 font-20">Leave Application for 3 days <span class="badge badge-success">Health</span></h5>
                  <p class="mb-2">Applied Today</p>
                  </li>
                </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20">
                      <a href='#' class="align-items-center">
                      <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder"><br>
                      Sheik Service</a>
                    </li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20"><p class="mb-20">Dec 26th, 27th, 28th</p></li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20"><p class="mb-20"><a href='' class="btn btn-warning">Approved</a></p></li>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" href="javascript:void(0)" id="infobar-settings-open">
          <div class="card-body appointment-widget">
                <div class="row align-items-end">
                <div class="col-12 col-md-2 m-b-20">
                    <p class="bg-icon">
                      <span class="fa-stack">
                        <i class="feather icon-calendar fa-stack-2x"></i>
                        <strong class="fa-stack-1x text-inside-icon">5</strong>
                      </span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                  <li class="list-inline-item m-b-20">
                  <h5 class="mt-2 font-20">Leave Application for 3 days <span class="badge badge-success">Health</span></h5>
                  <p class="mb-2">Applied Today</p>
                  </li>
                </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20">
                      <a href='#' class="align-items-center">
                      <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="placeholder"><br>
                      Sheik Service</a>
                    </li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20"><p class="mb-20">Dec 26th, 27th, 28th</p></li>
                  </div>
                  <div class="col-12 col-md-2">
                    <li class="list-inline-item m-b-20"><p class="mb-20"><a href='' class="btn btn-warning">Approved</a></p></li>
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
          name: 'Inflation',
          data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + "%";
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },

        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "%";
            }
          }

        },
        title: {
          text: 'Monthly Inflation in Argentina, 2002',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
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
  <!-- jQuery Bar Rating js -->
  <script src="{{ asset('assets\plugins\jquery-bar-rating\jquery.barrating.min.js') }}"></script>
  <script src="{{ asset('assets\js\custom\custom-barrating.js') }}"></script>
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
