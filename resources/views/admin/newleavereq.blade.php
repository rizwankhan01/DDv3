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
                      <div class="col-12 align-items-center">
                        <center><h6>Leaves Left</h6></center>
                        <div id="chart"></div>
                      </div>
                      <div class="col-md-12 col-lg-12 col-xl-12">
                        <form action="">
                          <div class="form-group">
                            <label>Type</label>
                            <select class="form-control select2">
                              <option value=''>Type</option>
                              <option value=''>Health</option>
                              <option value=''>Family</option>
                              <option value=''>Regular</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Reason</label>
                            <textarea class="form-control" placeholder="Enter your reason"></textarea>
                          </div>
                          <div class="row">
                          <div class="form-group col-md-6">
                            <label>From Date</label>
                            <input type='date' class='form-control'>
                          </div>
                          <div class="form-group col-md-6">
                            <label>To Date</label>
                            <input type='date' class='form-control'>
                          </div>
                          </div>
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary pull-right" value='Apply Leave'>
                          </div>
                        </form>
                    </div><hr>
                </div>
            </div>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
        <div class="card m-b-30 col-12">
          <div class="card-header">
            <div class="widgetbar pull-right">
              <button class="btn btn-primary-rgba"  href="javascript:void(0)" id="infobar-settings-open"><i class="feather icon-plus mr-2"></i>Create New</button>
            </div>
            <h5 class="card-title">Leave Requests</h5>
          </div>
        </div>
        <div class="card m-b-30 col-12">
        <table class="table">
          <thead>
            <th>Leave Type</th>
            <th>Duration</th>
            <th>Count</th>
            <th>Reason</th>
            <th>Status</th>
            <th></th>
          </thead>
          <tbody>
            <tr>
              <td><span class="btn btn-success-rgba">Health</span></td>
              <td>13 Apr 2020 - 17 Apr 2020</td>
              <td>5 Days</td>
              <td><b>Due to covid-19 virus lock-down</b></td>
              <td><span class="badge badge-warning-inverse">Pending</span></td>
              <td><a href='#' class="badge badge-primary-inverse"><i class="fa fa-pencil"></i></a> <a href='#' class='badge badge-danger-inverse'><i class="fa fa-trash"></i></a></td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
      <!-- End row -->
  </div>
@endsection

@section('scripts')
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
        labels: ['7/10'],
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
