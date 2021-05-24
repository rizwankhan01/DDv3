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
                      <div class="input-group col-md-8">
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon3">
                        <div class="input-group-append">
                          <button class="btn" type="submit" id="button-addon3"><i class="feather icon-search"></i></button>
                        </div>
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
                            <h5 class="font-18">Amy Adams <span class="badge badge-success">75</span></h5>
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
              <form action="/enquiry/" method="post" class='row' id="enq">
                <p class="m-b-20 col-12">Model enquired: Apple iPhone 6</p>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class='col-md-6'>
                  <input type='text' class='form-control' name='customer_name' value='' placeholder='Customer Name'><br>
                </div>
                <div class='col-md-6'>
                <input type='text' class='form-control' name='locality' value='' placeholder='Locality'><br>
                </div>
                <input type='hidden' name='customer_id' value=''>
                <div class='col-md-6'>
                  Follow Up Date:
                  <input type="date" class="form-control" name="fdate" value="" min="{{ date('Y-m-d') }}"><br>
                </div>
                <div class='col-md-6'>
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
