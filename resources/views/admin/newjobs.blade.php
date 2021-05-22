@extends('layouts.hr')
@section('title') All Jobs | Doctor Display Dashboard @endsection

@section('contentbar')
  <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
          <h6>Job Information</h6> <a href="javascript:void(0)" id="infobar-settings-close"><i class="feather icon-x"></i></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row align-items-center pb-3">
                      <div class="col-md-12 col-lg-12 col-xl-12">
                        <form action="" method="post">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Job Title">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Job Location">
                          </div>
                          <div class="form-group">
                            <select class="form-control select2">
                              <option value="">Select Type</option>
                              <option value="Full Time">Full Time</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Department">
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" placeholder="Description"></textarea>
                          </div>
                          <div class="form-group">
                            <label>No. of Openings</label>
                            <input type="text" class="form-control" id="touchspin-value-attribute" name="touchspin-value-attribute" value="50">
                          </div>
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary pull-right" value="Create">
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="card m-b-30">
      <div class="card-header">
        <div class="widgetbar pull-right">
          <a href="javascript:void(0)" id="infobar-settings-open">
            <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Create New</button>
          </a>
        </div>
        <h5 class="card-title">All Jobs</h5>
      </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-xl-3">
          <div class="card m-b-30">
              <div class="card-header text-center">
                <h5>Lead Technician <span class="badge badge-danger">2</span></h5>
              </div>
              <div class="card-body text-center">
                  <div id="chart"></div>
                  <p class="mb-5">Bangalore | Full Time<br><br>
                  Published</p>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-6">
                    <span class="badge badge-success">Operations</span>
                  </div>
                  <div class="col-md-6">
                    <a href="javascript:void(0)" id="infobar-settings-open" class="pull-right"><i class="fa fa-pencil"></i></a>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="col-lg-12 col-xl-3">
        <div class="card m-b-30">
            <div class="card-header text-center">
              <h5>Lead Technician <span class="badge badge-danger">2</span></h5>
            </div>
            <div class="card-body text-center">
                <div id="chart2"></div>
                <p class="mb-5">Bangalore | Full Time<br><br>
                Published</p>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-6">
                  <span class="badge badge-success">Operations</span>
                </div>
                <div class="col-md-6">
                  <a href="javascript:void(0)" id="infobar-settings-open" class="pull-right"><i class="fa fa-pencil"></i></a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-3">
      <div class="card m-b-30">
          <div class="card-header text-center">
            <h5>Lead Technician <span class="badge badge-danger">2</span></h5>
          </div>
          <div class="card-body text-center">
              <div id="chart3"></div>
              <p class="mb-5">Bangalore | Full Time<br><br>
              Published</p>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <span class="badge badge-success">Operations</span>
              </div>
              <div class="col-md-6">
                <a href="javascript:void(0)" id="infobar-settings-open" class="pull-right"><i class="fa fa-pencil"></i></a>
              </div>
            </div>
          </div>
      </div>
  </div>
  <div class="col-lg-12 col-xl-3">
    <div class="card m-b-30">
        <div class="card-header text-center">
          <h5>Lead Technician <span class="badge badge-danger">2</span></h5>
        </div>
        <div class="card-body text-center">
            <div id="chart4"></div>
            <p class="mb-5">Bangalore | Full Time<br><br>
            Published</p>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-md-6">
              <span class="badge badge-success">Operations</span>
            </div>
            <div class="col-md-6">
              <a href="javascript:void(0)" id="infobar-settings-open" class="pull-right"><i class="fa fa-pencil"></i></a>
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
  <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 100
      });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
  var options = {
          series: [70],
          chart: {
          height: 200,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            hollow: {
              size: '70%',
            }
          },
        },
        labels: ['Applied'],
        };
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  var chart2 = new ApexCharts(document.querySelector("#chart2"), options);
  var chart3 = new ApexCharts(document.querySelector("#chart3"), options);
  var chart4 = new ApexCharts(document.querySelector("#chart4"), options);
  chart.render(); chart2.render(); chart3.render(); chart4.render();
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
  <!-- jQuery Bar Rating js -->
  <script src="{{ asset('assets\plugins\jquery-bar-rating\jquery.barrating.min.js') }}"></script>
  <script src="{{ asset('assets\js\custom\custom-barrating.js') }}"></script>
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
  <script src="{{ asset('assets\plugins\summernote\summernote-bs4.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

  <script src="{{ asset('assets\plugins\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js') }}"></script>
  <script src="{{ asset('assets\js\custom\custom-form-touchspin.js') }}"></script>
@endsection
