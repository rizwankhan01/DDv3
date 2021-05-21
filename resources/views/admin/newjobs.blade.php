@extends('layouts.dashboard')
@section('title') All Jobs | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
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
                    <span class="pull-right"><i class="fa fa-pencil"></i></span>
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
                  <span class="pull-right"><i class="fa fa-pencil"></i></span>
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
                <span class="pull-right"><i class="fa fa-pencil"></i></span>
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
              <span class="pull-right"><i class="fa fa-pencil"></i></span>
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
