@extends('layouts.dashboard')
@section('title') Enquiry Report | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                    <div class="widgetbar pull-right">
                      <form action="/enquiryreports" method="post" class="form-inline">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <select class="form-control" name="month">
                          <option value="">Select Month</option>
                          <option value="-01-">January</option>
                          <option value="-02-">Febuary</option>
                          <option value="-03-">March</option>
                          <option value="-04-">April</option>
                          <option value="-05-">May</option>
                          <option value="-06-">June</option>
                          <option value="-07-">July</option>
                          <option value="-08-">August</option>
                          <option value="-09-">September</option>
                          <option value="-10-">October</option>
                          <option value="-11-">November</option>
                          <option value="-12-">December</option>
                        </select>
                        <input type="number" class="form-control" name="year" style="width:100px;" placeholder="Year">
                        <button class="btn btn-sm btn-primary-rgba" type="submit">Filter</button>
                      </form>
                    </div>
                      <b>Enquiry Report</b>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <span class='col-md-2 btn btn-sm btn-success'>Converted: {{ $conv }}</span><br>
                      <span class='col-md-2 btn btn-sm btn-danger'>Stock Unavailable: {{ $stock_unav }}</span><br>
                      <span class='col-md-2 btn btn-sm btn-primary'>Not Interested: {{ $not_int }}</span><br>
                      <span class='col-md-2 btn btn-sm btn-warning'>Call Back: {{ $call_back }}</span><br>
                      <span class='col-md-2 btn btn-sm btn-default'>Duplicate: {{ $duplicate }}</span><br>
                      <span class='col-md-2 btn btn-sm btn-danger'>Open: {{ $open }}</span><br>
                    </div><hr>
                    <h6 class="card-subtitle">You can view enquiry reports here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Date</th>
                                  <th>Model Name</th>
                                  <th>Customer</th>
                                  <th>Locality</th>
                                  <th>Follow Up</th>
                                  <th>Notes</th>
                                  <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($enquiries as $enquiry)
                                  <tr>
                                    <td>{{ date('d-m-Y', strtotime($enquiry->created_at)) }}</td>
                                    <td>
                                      @if(empty($enquiry->url))
                                        {{ $enquiry->model_name }}
                                      @else
                                        <a href='/{{ $enquiry->url}}' target='_blank'>{{ $enquiry->model_name }}</a>
                                      @endif
                                    </td>
                                    <td><a href='/customer-profile/{{ $enquiry->customer->id }}'>{{ $enquiry->customer->name }}</a><br>
                                      <small><a href='exotel_calls/{{ $enquiry->customer->phone_number }}'>{{ $enquiry->customer->phone_number}}</a></small>
                                    </td>
                                    <td>{{ $enquiry->city }}</td>
                                    <td>
                                      @if(date('Y-m-d')==$enquiry->fdate)
                                        <span class="btn btn-sm btn-success">{{ date('d-m-Y', strtotime($enquiry->fdate)) }}</span>
                                      @elseif(!empty($enquiry->fdate))
                                        {{ date('d-m-Y',strtotime($enquiry->fdate)) }}
                                      @endif
                                    </td>
                                    <td>{{ $enquiry->notes }}</td>
                                    <td>
                                      @if(empty($enquiry->status))
                                        <a href='/enquiry/{{ $enquiry->id }}' class='btn btn-sm btn-warning'>Update Status</a>
                                      @else
                                        <a href="/enquiry/{{ $enquiry->id }}" class="btn btn-sm btn-default">{{ $enquiry->status }}</a>
                                      @endif
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table><hr>
                      </div>
                  </div>
              </div>
              <div class="col-lg-12">
                  <div class="card m-b-30">
                      <div class="card-header">
                          <h5 class="card-title">Day Wise Enquiry</h5>
                      </div>
                      <div class="card-body">
                          <canvas id="chartjs-dataset-area-chart" class="chartjs-chart"></canvas>
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
  <!-- Chart js -->
  <script src="assets\plugins\chart.js\chart.min.js"></script>
  <script src="assets\plugins\chart.js\chart-bundle.min.js"></script>
  <script>
  var datasetAreaID = document.getElementById("chartjs-dataset-area-chart").getContext('2d');
  var datasetArea = new Chart(datasetAreaID, {
      type: 'line',
      data: {
          labels: [
            @foreach($enquiries as $dates)
              '{{ date('d-m-Y', strtotime($dates->created_at)) }}',
            @endforeach
          ],
          datasets: [{
              backgroundColor: ["rgba(129,167,205,0.5)"],
              borderColor: ["#93b4d4"],
              pointBorderColor: ["#93b4d4","#93b4d4","#93b4d4","#93b4d4","#93b4d4","#93b4d4","#93b4d4","#93b4d4"],
              pointBackgroundColor: ["#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff"],
              pointBorderWidth: 2,
              data: [
                54, 55, 54, 60, 40, 28, 25, 72
              ],
              label: 'Converted',
              fill: 1
          }, {
              backgroundColor: ["rgba(255,63,63,0.5)"],
              borderColor: ["#ff3f3f"],
              pointBorderColor: ["#ff3f3f","#ff3f3f","#ff3f3f","#ff3f3f","#ff3f3f","#ff3f3f","#ff3f3f","#ff3f3f"],
              pointBackgroundColor: ["#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff"],
              pointBorderWidth: 2,
              data: [30, 20, 26, 44, 68, 76, 58, 21],
              label: 'Stock Unavailable',
              hidden: true,
              fill: '-1'
          }, {
              backgroundColor: ["rgba(24,210,107,0.5)"],
              borderColor: ["#18d26b"],
              pointBorderColor: ["#18d26b","#18d26b","#18d26b","#18d26b","#18d26b","#18d26b","#18d26b","#18d26b"],
              pointBackgroundColor: ["#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff"],
              pointBorderWidth: 2,
              data: [59, 22, 28, 77, 76, 39, 42, 22],
              label: 'Not Interested',
              hidden: true,
              fill: '-1'
          }, {
              backgroundColor: ["rgba(129,206,246,0.5)"],
              borderColor: ["#81cef6"],
              pointBorderColor: ["#81cef6","#81cef6","#81cef6","#81cef6","#81cef6","#81cef6","#81cef6","#81cef6"],
              pointBackgroundColor: ["#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff"],
              pointBorderWidth: 2,
              data: [59, 22, 28, 77, 76, 39, 42, 22],
              hidden: true,
              label: 'Call Back',
              fill: 1
          },  {
              backgroundColor: ["rgba(255,168,0,0.5)"],
              borderColor: ["#ffa800"],
              pointBorderColor: ["#ffa800","#ffa800","#ffa800","#ffa800","#ffa800","#ffa800","#ffa800","#ffa800"],
              pointBackgroundColor: ["#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff"],
              pointBorderWidth: 2,
              data: [50, 32, 61, 20, 68, 33, 29, 51],
              label: 'Duplicate',
              hidden: true,
              fill: '-1'
          }, {
              backgroundColor: ["rgba(0,128,255,0.5)"],
              borderColor: ["#0080ff"],
              pointBorderColor: ["#0080ff","#0080ff","#0080ff","#0080ff","#0080ff","#0080ff","#0080ff","#0080ff"],
              pointBackgroundColor: ["#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff","#ffffff"],
              pointBorderWidth: 2,
              data: [ 54, 35, 10, 30, 25, 50, 15 ],
              label: 'Open',
              hidden: true,
              fill: '+2'
          }]
      },
      options: {
          title: {
              text: 'fill: start',
              display: false
          },
          maintainAspectRatio: true,
          spanGaps: true,
          elements: {
              line: {
                  tension: 0.000001
              }
          },
          scales: {
              xAxes: [{
                  gridLines: {
                      color: 'rgba(0,0,0,0.05)',
                      lineWidth: 1,
                      borderDash: [0],
                      zeroLineColor: 'rgba(0,0,0,0.05)'
                  }
              }],
              yAxes: [{
                  stacked: true,
                  gridLines: {
                      color: 'rgba(0,0,0,0.05)',
                      lineWidth: 1,
                      borderDash: [0],
                      zeroLineColor: 'rgba(0,0,0,0.05)'
                  }
              }]
          },
          plugins: {
              filler: {
                  propagate: false
              },
              'samples-filler-analyser': {
                  target: 'chart-analyser'
              }
          }
      }
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
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
