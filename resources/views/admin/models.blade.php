@extends('layouts.dashboard')
@section('title') Models | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                      <div class="widgetbar pull-right">
                          <button class="btn btn-primary-rgba" data-toggle="modal" data-target="#CreateModal"><i class="feather icon-plus mr-2"></i>Create New</button>
                          <div class="modal fade show" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true"
                          v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="CreateModalLabel">Create New Model</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <form action="/models" method="post" enctype="multipart/form-data" id="addmodel">
                            {{ csrf_field() }}
                            {{ method_field('post')}}
                            <div class="modal-body">
                            <div class="form-group">
                              <label>Brand Name</label>
                              <select class="form-control" name="brand_id" required>
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                  <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Series</label>
                              <input type="text" class="form-control" name="series" placeholder="Series" required>
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
                              <input type='file' class='form-control' name='model_image' accept='.png' required>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" onclick="document.getElementById('addmodel').submit();" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                          </div>
                          </div>
                          </div>
                      </div>
                      @if(!empty($model))
                        <h5 class="card-title">Update {{ $model->name }}'s details</h5>
                      @else
                        <h5 class="card-title">All Models</h5>
                      @endif
                  </div>
                  <div class="card-body">
                    @if(!empty($model))
                      <div class="row">
                      <form action="/models/{{ $model->id }}" method="post" enctype="multipart/form-data" id="updatemodel" class="col-md-6">
                        {{ csrf_field() }}
                        {{ method_field('put')}}
                        <h6>Model Information</h6><br>
                        <div class="modal-body">
                        <div class="form-group">
                          <label>Brand Name</label>
                          <select class="form-control" name="brand_id" required>
                            <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                              <option value="{{ $brand->id }}" @if($model->brand_id == $brand->id) {{ 'selected' }} @endif>{{ $brand->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Series</label>
                          <input type="text" class="form-control" name="series" value="{{ $model->series }}" placeholder="Series" required>
                        </div>
                        <div class="form-group">
                          <label>Model Name</label>
                          <input type="text" class="form-control" name="name" value="{{ $model->name }}" placeholder="Model Name" required>
                        </div>
                        <div class="form-group">
                          <label>Description</label>
                          <input type="text" class="form-control" name="description" value="{{ $model->description }}" placeholder="Description" required>
                        </div>
                        <div class="form-group">
                          <label>Big Description</label>
                          <textarea id="summernote2" name="big_description">{{ $model->big_description }}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Meta Title</label>
                          <input type="text" class="form-control" name="meta_title" value="{{ $model->meta_title }}" placeholder="Meta Title" required>
                        </div>
                        <div class="form-group">
                          <label>Meta Description</label>
                          <input type="text" class="form-control" name="meta_description" value="{{ $model->meta_description }}" placeholder="Meta Description" required>
                        </div>
                        <div class="form-group">
                          <label>Model Image</label>
                          <img src='../storage/{{ $model->image }}' style='width:25px;height:25px;'>
                          <input type='file' class='form-control' name='model_image' accept='.png'>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <a href="/models" class="btn btn-secondary">Back</a>
                        <button type="submit" onclick="document.getElementById('updatemodel').submit();" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                      <form action="/models/{{ $model->id }}" method="post"  class="col-md-6">
                        {{ csrf_field() }}
                        {{ method_field('put')}}
                        <h6>Model Resources</h6><br>
                        <div class="modal-body row">
                        <div class="form-group col-md-6">
                          <label>Screen Type</label>
                          <input type="text" class="form-control" name="screen_type" placeholder="Eg. TFT, 90Hz" value="{{ $model->resource->screen_type ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Screen Size</label>
                          <input type="text" class="form-control" name="screen_size" placeholder="Eg. 6.6 inches" value="{{ $model->resource->screen_size ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Screen Resolution</label>
                          <input type="text" class="form-control" name="screen_resolution" placeholder="Eg. 1080 x 2400" value="{{ $model->resource->screen_resolution ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Screen Protection</label>
                          <input type="text" class="form-control" name="screen_protection" placeholder="Eg. Protection" value="{{ $model->resource->screen_protection ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Fix Type</label>
                          <input type="text" class="form-control" name="fix_type" placeholder="Eg. Fix Type" value="{{ $model->resource->fix_type ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Screen Fix Type</label>
                          <input type="text" class="form-control" name="screen_fixtype" placeholder="Eg. Screen Fix Type" value="{{ $model->resource->screen_fixtype ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Release Date</label>
                          <input type="date" class="form-control" name="release_date" value="{{ $model->resource->release_date ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Production Status</label>
                          <input type="text" class="form-control" name="production_status" placeholder="Eg. Production Status" value="{{ $model->resource->production_status ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Tutorial Link</label>
                          <input type="text" class="form-control" name="tut_link" placeholder="Eg. Youtube Tutorial Link" value="{{ $model->resource->tut_link ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Buy Link</label>
                          <input type="text" class="form-control" name="buy_link" placeholder="Eg. Flipkart/ Amazon buy link" value="{{ $model->resource->buy_link ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Phone Price</label>
                          <input type="number" class="form-control" name="phone_price" placeholder="Eg. 50000" value="{{ $model->resource->phone_price ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Display Type</label>
                          <input type="text" class="form-control" name="display_type" placeholder="Eg. Display Type" value="{{ $model->resource->display_type ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Display Size</label>
                          <input type="text" class="form-control" name="display_size" placeholder="Eg. Display Size" value="{{ $model->resource->display_size ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Display Resolution</label>
                          <input type="text" class="form-control" name="display_resolution" placeholder="Eg. Display Resolution" value="{{ $model->resource->display_resolution ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Display Protection</label>
                          <input type="text" class="form-control" name="display_protection" placeholder="Eg. Display Protection" value="{{ $model->resource->display_protection ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Colors</label>
                          <input type="text" class="form-control" name="colors" placeholder="Eg. Gray, White, Mint, Violet" value="{{ $model->resource->colors ?? ''}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Fingerprint</label>
                          <select class="form-control" name="fingerprint">
                            <option value="">Select</option>
                            <option value="1" @if(!empty($model->resource->fingerprint) AND $model->resource->fingerprint=='Yes') selected @endif>Yes</option>
                            <option value="0" @if(!empty($model->resource->fingerprint) AND $model->resource->fingerprint=='No') selected @endif>No</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>In Display Fingerprint</label>
                          <select class="form-control" name="indisplay_fingerprint">
                            <option value="">Select</option>
                            <option value="1" @if(!empty($model->resource->indisplay_fingerprint) AND $model->resource->indisplay_fingerprint) selected @endif>Yes</option>
                            <option value="0" @if(!empty($model->resource->indisplay_fingerprint) AND $model->resource->indisplay_fingerprint) selected @endif>No</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Company Display Price</label>
                          <input type="text" class="form-control" name="company_display_price" placeholder="Company Display Price" value="{{ $model->resource->company_display_price }}">
                        </div>
                        </div>
                        <div class="modal-footer">
                          <a href="/models" class="btn btn-secondary">Back</a>
                          <input type="submit" class="btn btn-primary" name="update_resources" value="Save Changes">
                        </div>
                      </form>
                    </div>
                      <hr>
                      <form action="/models/{{ $model->id }}" method="post" class="col-md-6">
                        <h6>Send Enquiry Mail to customers</h6><br>
                        {{ csrf_field() }}
                        {{ method_field('put')}}
                        <input type="email" class="form-control" name="email" placeholder="Email address" required><Br>
                        <input type="submit" class="btn btn-primary" value="Send Chaser Mail" name="chaser">
                      </form>
                    @else
                    <h6 class="card-subtitle">You can Create/ Edit/ Delete Models Here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Brand</th>
                                  <th>Series</th>
                                  <th>Model</th>
                                  <th>Image</th>
                                  <th>Description</th>
                                  <th>Meta Title</th>
                                  <th>Meta Description</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($models as $model)
                              <tr>
                                  <td>{{ $model->id }}</td>
                                  <td>{{ $model->brand->name }}</td>
                                  <td>{{ $model->series }}</td>
                                  <td>{{ $model->name }}</td>
                                  <td><img src='storage/{{ $model->image }}' style="width:50px;height:50px;"></td>
                                  <td>{{ $model->description }}</td>
                                  <td>{{ $model->meta_title }}</td>
                                  <td>{{ $model->meta_description }}</td>
                                  <td>
                                    <form action='/models/{{ $model->id }}' method='post'>
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <a href='/screen-repair-{{ $model->brand->name }}-{{ $model->series }}-{{ $model->name }}' class='btn btn-sm btn-primary' target='_blank'><i class='fa fa-link'></i></a>
                                      <a href='/models/{{ $model->id }}' class='btn btn-sm btn-warning'><i class='fa fa-edit'></i></a>
                                      <!--<button type='submit' class='btn btn-sm btn-danger' onclick="return confirm('Are you sure you want to delete this?');"><i class='fa fa-trash'></i></button>-->
                                    </form>
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                    @endif
                  </div>
              </div>
          </div>
          <!-- End col -->
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
      $('#summernote2').summernote({
        tabsize: 2,
        height: 100
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
