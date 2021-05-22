@extends('layouts.hr')
@section('title') Calendar Holiday | Doctor Display Dashboard @endsection
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
        <div class="card col-12 m-b-10">
          <div class="card-header">
            <div class="widgetbar pull-right">
              <button class="btn btn-primary-rgba pull-right" data-toggle="modal" data-target="#CreateModal"><i class="feather icon-plus mr-2"></i>Create New</button>
              <div class="modal fade show" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true"
              v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="CreateModalLabel">Add Holiday</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <form action="/" method="post">
                {{ csrf_field() }}
                {{ method_field('post')}}
                <div class="modal-body">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" required>
                  </div>
                <div class="form-group">
                  <label>Reason</label>
                  <input type="text" class="form-control" name="reason" placeholder="Reason" required>
                </div>
                <div class="form-group">
                  <label>City</label>
                  <select class="select2 form-control" name="city">
                    <option value="">Select City</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <select class="select2 form-control" name="type">
                    <option value="">Select Type</option>
                  </select>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
              </div>
              </div>
              </div>
            </div>
            <h5 class="card-title mb-0">Calendar Holidays</h5>
          </div>
        </div>
        <div class="card m-b-30 col-12">
              <div class="card-body">
                  <div class="activities-history">
                      <div class="activities-history-list">
                          <div class="activities-history-item">
                              <h6>March 21st</h6>
                              <p class="mb-0">Some Holiday</p>
                          </div>
                      </div>
                      <div class="activities-history-list">
                          <div class="activities-history-item">
                              <h6>March 21st</h6>
                              <p class="mb-0">Some Holiday</p>
                          </div>
                      </div>
                      <div class="activities-history-list">
                          <div class="activities-history-item">
                              <h6>March 21st</h6>
                              <p class="mb-0">Some Holiday</p>
                          </div>
                      </div>
                      <div class="activities-history-list">
                          <div class="activities-history-item">
                              <h6>March 21st</h6>
                              <p class="mb-0">Some Holiday</p>
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
