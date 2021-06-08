@extends('layouts.dashboard')
@section('title') Colors | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-10">
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
                              <label>Color Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Color Name" required>
                            </div>
                            <div class="form-group">
                              <label>Screen Color</label>
                              <input type="color" id="favcolor" name="screen_color" value="#FCC72D" class="form-control">
                              <!--<input type="text" class="form-control" name="screen_color" placeholder="Screen Color" required>-->
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
                    @if(!empty($color))
                      <div class="card-body">
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
                          <input type="color" id="favcolor" name="screen_color" value="{{ $color->screen_color }}" class="col-md-2 form-control" required>
                          <!--<input type="text" class="form-control" name="screen_color" value="" placeholder="Screen Color" required>-->
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
                      <h5 class="card-title">Pricing Details</h5><br>
                      <form action='/modelcolors/{{ $color->id }}' method='post' class="row">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="col-md-6">
                          Ordinary Selling Price:
                          <input type="number" class="form-control" placeholder="Ordinary Selling Price" value="{{ $pricing->ord_selling_price ?? '' }}" name="ord_selling_price" required><br>
                        </div>
                        <div class="col-md-6">
                          Original Selling Price:
                          <input type="number" class="form-control" placeholder="Original Selling Price" value="{{ $pricing->org_selling_price ?? '' }}" name="org_selling_price" required><br>
                        </div>
                        <div class="col-md-12">
                          Preferred Type
                        <select class="form-control" name="preferred_type" required>
                          <option value=''>Select Preferred Type</option>
                          <option value='BASIC' @if(!empty($pricing->preferred_type) AND $pricing->preferred_type=='BASIC') {{ 'selected' }} @endif>BASIC</option>
                          <option value='PREMIUM' @if(!empty($pricing->preferred_type) AND $pricing->preferred_type=='PREMIUM'){{ 'selected' }} @endif>PREMIUM</option>
                        </select><br>
                        </div>
                        <div class="col-md-6">
                          Ord Stock Available?
                        <select class="form-control" name="ord_stock_availablity" required>
                          <option value="">Ord Stock Available?</option>
                          <option value="1" @if(!empty($pricing->ord_stock_availablity) AND $pricing->ord_stock_availablity==1) {{ 'selected' }} @endif>Yes</option>
                          <option value="0" @if(!empty($pricing->ord_stock_availablity) AND $pricing->ord_stock_availablity==0){{ 'selected' }} @endif>No</option>
                        </select><br>
                        </div>
                        <div class="col-md-6">
                          Org Stock Available?
                        <select class="form-control" name="org_stock_availablity" required>
                          <option value="">Org Stock Available?</option>
                          <option value="1" @if(!empty($pricing->org_stock_availablity) AND $pricing->org_stock_availablity==1){{ 'selected' }} @endif>Yes</option>
                          <option value="0" @if(!empty($pricing->org_stock_availablity) AND $pricing->org_stock_availablity==0){{ 'selected' }} @endif>No</option>
                        </select><br>
                        </div>
                        <div class="col-md-6">
                          Ordinary Description:
                          <input type="text" class="form-control" name="ord_compare_description" value="{{ $pricing->ord_compare_description ?? '' }}" placeholder="Ordinary Compare Description" required><br>
                        </div>
                        <div class="col-md-6">
                          Original Description:
                          <input type="text" class="form-control" name="org_compare_description" value="{{ $pricing->org_compare_description ?? '' }}" placeholder="Original Compare Description" required><br>
                        </div>
                        <div class="col-md-12">
                          Glass Replacement Price:
                          <input type="text" class="form-control" name="glass_price" value="{{ $pricing->glass_price ?? '' }}" placeholder="Glass Replacement Price"><br>
                        </div>
                        <div class="col-md-12"><input type="submit" class="btn btn-primary" value="Update" name="pricing"></div>
                      </form>
                    </div>
                    @else
              </div>
              @livewire('search-all-colors')
            @endif
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
