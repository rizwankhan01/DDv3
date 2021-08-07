<div>
  <table id="datatable-buttons" class="table table-striped table-bordered">
      <thead>
      <tr>
          <th>Model</th>
          <th>Item Name</th>
          <th>Dealer</th>
          <th>Cost</th>
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
            <td>{{ $stock->payment_status }} / {{ $stock->payment_type }}</td>
            <td>
              @if($stock->status)
                <a href='/home/{{ $stock->status }}' class='btn btn-success btn-sm'>Order ID: {{ $stock->status }}</a>
              @else
              @if(!empty($stock->transfered_by) AND $stock->approved_by==0)
                <button wire:click="approveStock({{ $stock->id }})" class="btn btn-sm btn-warning"><i class="fa fa-clock-o"></i> Pending Approval</button>
              @else
                <a href='/storestock/{{ $stock->id }}' class="btn btn-sm btn-warning"><i class="fa fa-barcode"></i></a>
                <button wire:click="returnStock({{ $stock->id }})" class="btn btn-sm btn-primary"><i class="fa fa-exchange"></i> Return</button>
              @endif
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>
  @if(!empty($approve))
    <?php $stock = $approve; ?>
    <div id="infobar-settings-sidebar" class="infobar-settings-sidebar sidebarshow">
    <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
      <h6>Stock ID: #{{ $stock->id }}</h6> <a wire:click="closeModal()" id="infobar-settings-close"><i class="feather icon-x"></i></a>
    </div>
    <div class="infobar-settings-sidebar-body">
        <div class="custom-mode-setting">
            <div class="row pb-3">
              <div class="card m-b-30 col-12">
                  <div class="row">
                      <div class="col-12">
                        <table class="table">
                          <tr>
                            <th>Item Name</th>
                            <td>{{ $stock->model->brand->name }} {{ $stock->model->series }} {{ $stock->model->name }} {{ $stock->item_name }}</td>
                          </tr>
                          <tr>
                            <th>Dealer</th>
                            <td>{{ $stock->dealer->dealer_name }}</td>
                          </tr>
                          <tr>
                            <th>Color</th>
                            <td>{{ $stock->color }}</td>
                          </tr>
                          <tr>
                            <th>Quality</th>
                            <td>{{ $stock->quality }}</td>
                          </tr>
                          <tr>
                            <th>Cost</th>
                            <td>{{ $stock->cost }}</td>
                          </tr>
                        </table>
                      </div>
                  </div><hr>
                  <form action="/storestock/{{$stock->id}}" method="post" class="row">
                      {{ csrf_field() }}
                      {{ method_field('put') }}
                      <div class="col-12"><br>
                        <label>Would you like to approve this stock?</label>
                        <div class='row'>
                          <button type='submit' class='btn btn-sm btn-primary btn-block col-6' name='transfer' value='Accept'>Accept</button>
                          <button type='submit' class='btn btn-sm btn-warning btn-block col-6' name='transfer' value='Reject'>Reject</button>
                        </div>
                      </div>
                      <div class="col-12"><br>
                      </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
  </div>
    <div class="infobar-settings-sidebar-overlay" style="background: rgba(0,0,0,0.4);position:fixed;"></div>
  @endif
  @if(!empty($return))
    <?php $stock = $return; ?>
    <div id="infobar-settings-sidebar" class="infobar-settings-sidebar sidebarshow">
    <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
      <h6>Return Stock ID: #{{ $stock->id }}</h6> <a wire:click="closeModal()" id="infobar-settings-close"><i class="feather icon-x"></i></a>
    </div>
    <div class="infobar-settings-sidebar-body">
        <div class="custom-mode-setting">
            <div class="row pb-3">
              <div class="card m-b-30 col-12">
                  <div class="row">
                      <div class="col-12">
                        <table class="table">
                          <tr>
                            <th>Item Name</th>
                            <td>{{ $stock->model->brand->name }} {{ $stock->model->series }} {{ $stock->model->name }} {{ $stock->item_name }}</td>
                          </tr>
                          <tr>
                            <th>Dealer</th>
                            <td>{{ $stock->dealer->dealer_name }}</td>
                          </tr>
                          <tr>
                            <th>Color</th>
                            <td>{{ $stock->color }}</td>
                          </tr>
                          <tr>
                            <th>Quality</th>
                            <td>{{ $stock->quality }}</td>
                          </tr>
                          <tr>
                            <th>Cost</th>
                            <td>{{ $stock->cost }}</td>
                          </tr>
                        </table>
                      </div>
                  </div><hr>
                  <form action="/storestock/{{$stock->id}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{ method_field('put') }}
                      <div class="form-group"><br>
                        <label>Please enter a reason for stock return</label>
                        <input type="text" class="form-control" placeholder="Reason" name="reason" required>
                      </div>
                      <div class="col-12"><br>
                        <label>Stock Image:</label><br>
                        <input type="file" accept=".png, .jpg, .jpeg, .pdf" name="stock_image"><br>
                      </div><br>
                      <button type='submit' class='btn btn-sm btn-primary pull-right' name='return'>Return Stock</button>
                  </form>
              </div>
            </div>
        </div>
    </div>
  </div>
    <div class="infobar-settings-sidebar-overlay" style="background: rgba(0,0,0,0.4);position:fixed;"></div>
  @endif
  @section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
</div>
