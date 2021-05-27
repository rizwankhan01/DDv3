@extends('layouts.crm')
@section('title') Enquiry | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
        <div class="col-lg-6 col-xl-6">
          <div class="chat-list">
              <div class="chat-search">
                  <form class="row">
                      <div class="input-group col-md-4">
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon3">
                        <div class="input-group-append">
                          <button class="btn" type="submit" id="button-addon3"><i class="feather icon-search"></i></button>
                        </div>
                      </div>
                      <div class="input-group col-md-4">
                        <select class="select2-single form-control">
                          <option value="">Chennai</option>
                          <option value="">Bangalore</option>
                        </select>
                      </div>
                      <div class="input-group col-md-4">
                      <select class="select2-single form-control">
                        <option value="">All</option>
                        <option value="">Calls</option>
                        <option value="">Enquiry</option>
                        <option value="">Incomplete</option>
                      </select>
                      </div>
                  </form><br>
                  <span class="badge badge-success"><i class='fa fa-refresh'></i> Mark Closed</span>
                  <span class="badge badge-danger"><i class='fa fa-trash'></i> Mark Duplicate</span>
              </div>
              <div class="chat-user-list">
                  <ul class="list-unstyled mb-0">
                      <li class="media" onclick="switchVisible();">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="emailCheck2">
                          <label class="custom-control-label psn-abs" for="emailCheck2"></label>
                          <img class="align-self-center rounded-circle" src="assets/images/users/girl.svg" alt="Generic placeholder image">
                      </div>
                          <div class="media-body">
                              <h5>Enquiry for Model<span class="badge badge-success ml-2">Low</span> <span class="timing">Jan 22</span></h5>
                              <p><i class="feather icon-home"></i> Amy Adams</p>
                          </div>
                      </li>
                  </ul>
                  <ul class="list-unstyled mb-0">
                      <li class="media" onclick="switchVisible();">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="emailCheck3">
                          <label class="custom-control-label psn-abs" for="emailCheck3"></label>
                          <img class="align-self-center rounded-circle" src="assets/images/users/girl.svg" alt="Generic placeholder image">
                      </div>
                          <div class="media-body">

                              <h5>Incoming Calls<span class="badge badge-danger ml-2">High</span> <span class="timing">Jan 22</span></h5>
                              <p><i class="feather icon-phone"></i> Amy Adams</p>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="col-lg-6 col-xl-6">
        <div class="chat-detail">
            <div class="chat-head">
                <ul class="list-unstyled mb-0">
                    <li class="media">
                        <img class="align-self-center mr-3 rounded-circle" src="assets/images/users/girl.svg" alt="Generic placeholder image">
                        <div class="media-body"><br>
                            <div class="pull-right" style="text-align:right">
                              <a href='/exotel_calls/9876543210'><i class="feather icon-phone"></i> 9874563210</a><br>
                              <a href='#'><i class="feather icon-map-pin"></i> Chennai</a>
                            </div>
                            <h5 class="font-18"><a href='#'>Amy Adams</a> <span class="badge badge-success">75</span></h5>
                            <div class="stars stars-example-fontawesome">
                                    <select id="rating-fontawesome" name="rating" autocomplete="off">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="chat-body">
              <form action='' class="row" method='' id="call" style="display:none;">
                <span class="pull-right">12:53 20-05-2021</span>
                Attended By: Sooraj | <span class="badge badge-success">Incoming Call</span><br><br>
                <div class="col-md-12">
                <audio class="col-12" controls>
                    <source src="horse.ogg" type="audio/ogg">
                    <source src="horse.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio><br><br>
              </div>
                <div class="col-md-6">
                  <input type="text" class='form-control' placeholder='Model Enquired'><br>
                </div>
                <div class="col-md-6">
                  <select class="form-control">
                    <option value=''>Select City</option>
                  </select><br>
                </div>
                <div class="col-md-12">
                  <textarea class='form-control' placeholder='Notes'></textarea><br>
                </div>
                <div class='col-md-12'>
                  <input type="submit" class="btn btn-sm btn-primary pull-right" value="Update">
                </div>
              </form>
                  <a href="" class="btn btn-sm btn-success-rgba pull-right"><i class="fa fa-whatsapp"></i> Send Link</a>
                  <div class="modal fade show" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true"
                  v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
                  <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Price History of Apple iPhone 6 - Black</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="chart"></div>
                  </div>
                  </div>
                  </div>
                  </div>
                <p class="m-b-20 col-12"><b>Model enquired:</b> <br><a class="m-b-20" href='#'>Apple iPhone 6 - Black</a><br>
                <span class="badge badge-success-inverse">Basic - &#8377; 1500</span>
                <span class="badge badge-primary-inverse">Premium - &#8377; 4500</span>
                <span class="badge badge-warning-inverse">Glass - &#8377; 1000</span>
                <a href="" class="badge badge-secondary-inverse pull-right" data-toggle="modal" data-target="#CreateModal">See Price History</a>
                </p>
                <form action="/enquiry/" method="post" id="enq">
                  {{ csrf_field() }}
                  {{ method_field('put') }}
                  <div class="row">
                    <div class='col-md-6'>
                      <input type='text' class='form-control' name='customer_name' value='' placeholder='Customer Name'><br>
                    </div>
                    <div class="col-md-6">
                      <input type="number" class="form-control" name="phone_number" value='' placeholder="Phone Number"><br>
                    </div>
                    <div class='col-md-6'>
                      <input type='text' class='form-control' name='locality' value='' placeholder='Locality'><br>
                    </div>
                    <input type='hidden' name='customer_id' value=''>
                    <div class='col-md-6'>
                      Follow Up Date:
                      <input type="date" class="form-control" name="fdate" value="" min="{{ date('Y-m-d') }}"><br>
                    </div>
                    <div class='col-md-12'>
                      <select class="form-control" name="status">
                        <option value="">Select Reason</option>
                        <option value="Call Back">Call Back</option>
                        <option value="Duplicate">Duplicate</option>
                        <option value="Not Interested">Not Interested</option>
                        <option value="Converted">Converted</option>
                        <option value="Stock Unavailable">Stock Unavailable</option>
                      </select><br>
                    </div>
                    <div class='col-md-12'>
                      <textarea class='form-control' name='notes' placeholder='Notes'></textarea><br>
                    </div>
                    <div class='col-md-12'>
                      <input type="submit" class="btn btn-sm btn-primary pull-right" value="Update">
                    </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
      </div>
      <!-- End row -->
  </div>
@endsection

@section('scripts')
  <script>
    function switchVisible() {
      if (document.getElementById('call')) {
          if (document.getElementById('call').style.display == 'none') {
              document.getElementById('call').style.display = 'block';
              document.getElementById('enq').style.display = 'none';
          }else{
              document.getElementById('call').style.display = 'none';
              document.getElementById('enq').style.display = 'block';
          }
      }
  }
  </script>
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
  <!-- jQuery Bar Rating js -->
  <script src="{{ asset('assets\plugins\jquery-bar-rating\jquery.barrating.min.js') }}"></script>
  <script src="{{ asset('assets\js\custom\custom-barrating.js') }}"></script>
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
