@extends('layouts.dashboard')
@section('title') Colors | Doctor Display Dashboard @endsection

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
                          <h5 class="modal-title" id="CreateModalLabel">Create New Color</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <form action="/modelcolors" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post')}}
                            <div class="modal-body">
                            <div class="form-group">
                              <label>Brand</label>
                              <select class="form-control" name="brand_id" required>
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                  <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Series</label>
                              <select class="form-control" name="series_id" required>
                                <option value="">Select Series</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Model Name</label>
                              <select class="form-control" name="model_id" required>
                                <option value="">Select Model</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                              <label>Screen Color</label>
                              <input type="text" class="form-control" name="screen_color" placeholder="Screen Color" required>
                            </div>
                            <div class="form-group">
                              <label>Image</label>
                              <input type='file' class='form-control' name='image' accept='.png' required>
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
                      @if(!empty($color))
                        <h5 class="card-title">{{ $color->name }}</h5>
                      @else
                        <h5 class="card-title">All Colors</h5>
                      @endif
                  </div>
                  <div class="card-body">
                    @if(!empty($color))
                      <form action="/modelcolors/{{ $color->id }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put')}}
                        <div class="modal-body">
                        <div class="form-group">
                          <label>Model Name</label>
                          <select class="form-control" name="model_id" required>
                            <option value="">Select Model</option>
                            @foreach($models as $model)
                              <option value="{{ $model->id }}" @if($model->id==$color->model_id) {{ 'selected' }} @endif>{{ $model->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $color->name }}" required>
                        </div>
                        <div class="form-group">
                          <label>Screen Color</label>
                          <input type="text" class="form-control" name="screen_color" value="{{ $color->screen_color }}" placeholder="Screen Color" required>
                        </div>
                        <div class="form-group">
                          <label>Image</label>
                          <img src='../storage/{{ $color->image }}' style="width:50px;height:50px;">
                          <input type='file' class='form-control' name='image' accept='.png'>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <a href="/modelcolors" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form><hr>
                      <h5 class="card-title">Pricing Details</h5>
                      <form action='/modelcolors/{{ $color->id }}' method='post' class="row">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <input type="number" class="form-control col-md-6" placeholder="Ordinary Selling Price" value="{{ $pricing->ord_selling_price }}" name="ord_selling_price" required><br>
                        <input type="number" class="form-control col-md-6" placeholder="Original Selling Price" value="{{ $pricing->org_selling_price }}" name="org_selling_price" required><br>
                        <input type="text" class="form-control col-md-12" placeholder="Preferred Type" value="{{ $pricing->preferred_type }}" name="preferred_type" required><br>
                        <select class="form-control col-md-6" name="ord_stock_availablity" required>
                          <option value="">Ord Stock Available?</option>
                          <option value="1" @if($pricing->ord_stock_availablity==1) {{ 'selected' }} @endif>Yes</option>
                          <option value="0" @if($pricing->ord_stock_availablity==0){{ 'selected' }} @endif>No</option>
                        </select><br>
                        <select class="form-control col-md-6" name="org_stock_availablity" required>
                          <option value="">Org Stock Available?</option>
                          <option value="1" @if($pricing->org_stock_availablity==1){{ 'selected' }} @endif>Yes</option>
                          <option value="0" @if($pricing->org_stock_availablity==0){{ 'selected' }} @endif>No</option>
                        </select><br>
                        <input type="text" class="form-control col-md-6" name="ord_compare_description" value="{{ $pricing->ord_compare_description }}" placeholder="Ordinary Compare Description" required><br>
                        <input type="text" class="form-control col-md-6" name="org_compare_description" value="{{ $pricing->org_compare_description }}" placeholder="Original Compare Description" required><br>
                        <input type="submit" class="btn btn-primary" value="Update" name="pricing">
                      </form>
                    @else
                    <h6 class="card-subtitle">You can Create/ Edit/ Delete Colors Here.</h6>
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
                                  <th>Model</th>
                                  <th>Color Name</th>
                                  <th>Screen Color</th>
                                  <th>Basic</th>
                                  <th>Premium</th>
                                  <th>Preferred</th>
                                  <th>Image</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($colors as $color)
                              <tr>
                                  <td>{{ $color->id }}</td>
                                  <td>{{ $color->model->brand->name }} {{ $color->model->series }} {{ $color->model->name }}</td>
                                  <td>{{ $color->name }}</td>
                                  <td>{{ $color->screen_color }}</td>
                                  <td>
                                    @if(!empty($color->pricings->ord_selling_price))
                                      &#8377; {{ $color->pricings->ord_selling_price }}
                                    @endif
                                  </td>
                                  <td>
                                    @if(!empty($color->pricings->org_selling_price))
                                      &#8377; {{ $color->pricings->org_selling_price }}
                                    @endif
                                  </td>
                                  <td>
                                    @if(!empty($color->pricings->preferred_type))
                                      {{ $color->pricings->preferred_type }}
                                    @endif
                                  </td>
                                  <td><img src='storage/{{ $color->image }}' style="width:50px;height:50px;"></td>
                                  <td>
                                    <form action='/modelcolors/{{ $color->id }}' method='post'>
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <a href='/modelcolors/{{ $color->id }}' class='btn btn-sm btn-warning'>Edit</a>
                                      <input type='submit' class='btn btn-sm btn-danger' onclick="return confirm('Are you sure you want to delete this?');" value='Delete'>
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="brand_id"]').on('change',function(){
               var brand = jQuery(this).val();
               if(brand)
               {
                  jQuery.ajax({
                     url : '/getseries/' +brand,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="series_id"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="series_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="series_id"]').empty();
               }
            });
    });
    jQuery(document).ready(function ()
    {
      jQuery('select[name="series_id"]').bind('change',function(){
               var series = jQuery(this).val();
               console.log(series);
               if(series)
               {
                  jQuery.ajax({
                     url : '/getmodels/' +series,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="model_id"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="model_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="model_id"]').empty();
               }
            });
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
