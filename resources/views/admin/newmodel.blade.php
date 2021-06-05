@extends('layouts.dashboard')
@section('title') Create New Model | Doctor Display Dashboard @endsection

@section('contentbar')
  <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
          <h6>Add Resources</h6> <a href="javascript:void(0)" id="infobar-settings-close"><i class="feather icon-x"></i></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row align-items-center pb-3">
                      <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                          <form action='' method='post'>
                            <div class="form-group">
                              <label>Screen Type</label>
                              <select class="form-control">
                                <option value=''>Select</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Screen Size</label>
                              <select class="form-control">
                                <option value=''>Select</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Screen Resolution</label>
                              <select class="form-control">
                                <option value=''>Select</option>
                              </select>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
    <div class="infobar-settings-sidebar-overlay"></div>
  <div class="contentbar mt-100">
    @if(session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif
      <!-- Start row -->
        <form action="#" class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label>Brand Name</label>
                <select class="form-control" name="brand_id" required>
                  <option value="">Select Brand</option>
                </select>
              </div>
              <div class="form-group">
                <label>Series </label> <small><a href='#' class="pull-right">See all models in this series</a></small>
                <input list="browsers" name="browser" id="browser" class="form-control" placeholder="Series">
                <datalist id="browsers">
                  <option value="Edge">
                  <option value="Edge 2">
                  <option value="Fox">
                  <option value="Cow">
                  <option value="Bird">
                </datalist>
              </div>
              <div class="form-group">
                <label>Model Name</label>
                <input type="text" class="form-control" name="name" placeholder="Model Name" required>
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description" required>
              </div>
              <div class="form-group">
                <label>Big Description</label>
                <input type="text" id="summernote" name="big_description" required>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card m-b-30">
            <div class="card-body">
              <div class="form-group">
                <label>Meta Title</label>
                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" required>
              </div>
              <div class="form-group">
                <label>Meta Description</label>
                <input type="text" class="form-control" name="meta_description" placeholder="Meta Description" required>
              </div>
              <div class="form-group">
                <label>Model Image</label>
                <input name="file" type="file" multiple="multiple">
              </div>
              <div class="form-group pull-right">
                <button class="btn btn-secondary" href="javascript:void(0)" id="infobar-settings-open">Add Resource</button>
                <button class="btn btn-primary">Add Services</button>
                <button class="btn btn-warning">Add Colors</button>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <button class="btn btn-success col-md-12"><i class="fa fa-eye"></i> Preview</button><br>
              <div class="form-group"><br>
                <label><b>Note:</b> Please make sure your all entries are correct and there are no existing model already available.</label>
                <button class="btn btn-warning pull-right">Save</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- End row -->
  </div>
@endsection

@section('scripts')
  <script>
  $('#summernote').summernote({
    tabsize: 2,
    height: 70
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

  <script src="{{ asset('assets\plugins\pnotify\js\pnotify.custom.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\sweet-alert2\sweetalert2.min.js') }}"></script>
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
