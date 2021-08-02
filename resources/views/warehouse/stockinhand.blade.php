@extends('layouts.warehouse')
@section('title') Stock in Hand | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                    @if(empty($stock))
                      <div class="widgetbar pull-right">
                          <button class="btn btn-primary-rgba" data-toggle="modal" data-target="#CreateModal"><i class="feather icon-plus mr-2"></i>Create New</button>
                          <div class="modal fade show" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true"
                          v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="CreateModalLabel">Add Stock</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <form action="/stockinhand" method="post" id="addstock">
                            {{ csrf_field() }}
                            {{ method_field('post')}}
                            <div class="modal-body">
                            <div class="row">
                              <div class="form-group col-4">
                                <label>Brand</label>
                                <select class="form-control" name="brand_id" required>
                                  <option value="">Select Brand</option>
                                  @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group col-4">
                                <label>Series</label>
                                <select class="form-control" name="series_id" required><option value="">Select series</option></select>
                              </div>
                              <div class="form-group col-4">
                                <label>Model</label>
                                <select class="form-control" name="model_id" required><option value="">Select Model</option></select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Item Name</label>
                              <select class="form-control" name="item_name" required>
                                <option value="">Select</option>
                                <option value="Display">Display</option>
                                <option value="Front glass">Front glass</option>
                                <option value="Battery">Battery</option>
                                <option value="Charging point">Charging point</option>
                                <option value="Back glass">Back glass</option>
                                <option value="Loud speaker">Loud speaker</option>
                                <option value="Ear speaker">Ear speaker</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Dealer</label>
                              <select class="form-control" name="dealer_id" required>
                                <option value="">Select Dealer</option>
                                @foreach($dealers as $dealer)
                                  <option value="{{ $dealer->id }}">{{ $dealer->dealer_name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Cost</label>
                              <input type="number" class="form-control" name="cost" placeholder="Cost" required>
                            </div>
                            <div class="form-group">
                              <label>Color</label>
                              <input type="text" class="form-control" name="color" placeholder="Color">
                            </div>
                            <div class="form-group">
                              <label>Type</label>
                              <select class="form-control" name="quality">
                                <option value="">Select Quality</option>
                                <option value="Basic">Basic</option>
                                <option value="Premium">Premium</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Tested?</label><br>
                              <input type="radio" name="tested" value="Yes" required> Yes
                              <input type="radio" name="tested" value="No" checked required> No
                            </div>
                            <div class="form-group">
                              <label>Store Name</label><br>
                              <select class="form-control" name="store_name">
                                <option value="">Select Store</option>
                                @foreach($store_names as $store_name)
                                  <option value="{{ $store_name->store_name }}">{{ $store_name->store_name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Payment Status</label>
                              <select class="form-control" name="payment_status" required>
                                <option value="">Select Status</option>
                                <option value="Paid">Paid</option>
                                <option value="Pending">Pending</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Payment Type</label>
                              <select class="form-control" name="payment_type">
                                <option value="">Select Payment Type</option>
                                <option value="Transfer/ UPI">Transfer/ UPI</option>
                                <option value="Cash">Cash</option>
                              </select>
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
                    </div>
                    @endif
                      @if(!empty($stock))
                        <h5 class="card-title">Edit Stock Details</h5>
                      @else
                        <h5 class="card-title">Stock in Hand</h5>
                      @endif
                  </div>
                  <div class="card-body">
                    @if(!empty($stock))
                      <div class="row">
                        <div class="col-12">
                          @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                          @endif
                          <form action="/stockinhand/{{$stock->id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('put')}}
                            <div class="modal-body">
                            <div class="form-group">
                              <label>Item Name</label>
                              <input type="text" class="form-control" value="{{ $stock->model->brand->name }} {{ $stock->model->series }} {{ $stock->model->name }} {{ $stock->item_name }}" disabled>
                            </div>
                            <div class="form-group">
                              <label>Dealer</label>
                              <input type="text" class="form-control" value="{{ $stock->dealer->dealer_name }}" disabled>
                            </div>
                            <div class="form-group">
                              <label>Cost</label>
                              <input type="number" class="form-control" name="cost" placeholder="Cost" value="{{ $stock->cost }}" disabled>
                            </div>
                            <div class="form-group">
                              <label>Color</label>
                              <input type="text" class="form-control" name="color" placeholder="Color" value="{{ $stock->color }}" disabled>
                            </div>
                            <div class="form-group">
                              <label>Type</label>
                              <input type="text" class="form-control" value="{{ $stock->quality }}" disabled>
                            </div>
                            <div class="form-group">
                              <label>Tested?</label><br>
                              <input type="radio" name="tested" value="Yes" @if($stock->tested=='Yes') checked @endif disabled> Yes
                              <input type="radio" name="tested" value="No" @if($stock->tested=='No') checked @endif disabled> No
                            </div>
                            <div class="form-group">
                              <label>Store Name</label><br>
                              <input type="text" class="form-control" value="{{ $stock->store_name }}" disabled>
                            </div>
                            <div class="form-group">
                              <label>Payment Status</label>
                              <select class="form-control" name="payment_status" required>
                                <option value="">Select Status</option>
                                <option value="Paid" @if($stock->payment_status=='Paid') selected @endif>Paid</option>
                                <option value="Pending" @if($stock->payment_status=='Pending') selected @endif>Pending</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Payment Type</label>
                              <select class="form-control" name="payment_type">
                                <option value="">Select Payment Type</option>
                                <option value="Transfer/ UPI" @if($stock->payment_type=='Transfer/ UPI') selected @endif>Transfer/ UPI</option>
                                <option value="Cash" @if($stock->payment_type=='Cash') selected @endif>Cash</option>
                              </select>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
                        </div>
                      </div>
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
                                  <th>Model</th>
                                  <th>Item Name</th>
                                  <th>Dealer</th>
                                  <th>Cost</th>
                                  <th>Store</th>
                                  <th>Payment</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($stocks as $stock)
                                  <tr>
                                    <td>{{ $stock->model->brand->name }} {{ $stock->model->series }} {{ $stock->model->name }}</td>
                                    <td>{{ $stock->item_name }}</td>
                                    <td>{{ $stock->dealer->dealer_name }}</td>
                                    <td>{{ $stock->cost }}</td>
                                    <td>{{ $stock->store_name }}</td>
                                    <td>{{ $stock->payment_status }} / {{ $stock->payment_type }}</td>
                                    <td>
                                      @if($stock->payment_status!=='Paid')<a href='/stockinhand/{{ $stock->id }}' class="badge badge-primary badge-rgba"><i class="fa fa-pencil"></i></a>@endif
                                      <a href='/stockinhand/qr.{{ $stock->id }}' class="badge badge-warning badge-rgba"><i class="fa fa-barcode"></i></a>
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
