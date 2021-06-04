@extends('layouts.dashboard')
@section('title') Sales Report | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                    <div class="widgetbar pull-right">
                      <form action="/reports" method="post" class="form-inline">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        From: <input type="date" name="from" class="form-control" required @if(isset($from)) value="{{ $from }}" @else value="{{ date('Y-m-d') }}" @endif>
                        To: <input type="date" name="to" class="form-control" required @if(isset($to)) value="{{ $to }}" @else value="{{ date('Y-m-d') }}" @endif>
                        <button class="btn btn-sm btn-primary-rgba" type="submit">Filter</button>
                      </form>
                    </div>
                    <b>Sales Report</b>
                  </div>
                  <div class="card-body">
                    <h6 class="card-subtitle">You can view monthly sales reports here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          <table class="table table-striped table-bordered" id="datatable-buttons">
                              <thead>
                              <tr>
                                  <th>Date</th>
                                  <th>Order ID</th>
                                  <th>Model</th>
                                  <th>Stock Amount</th>
                                  <th>Transaction</th>
                                  <th>Profit</th>
                                  <th>Pay Type</th>
                                  <th>City</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php $ts = 0; $tt = 0; $tp = 0;?>
                                @foreach ($orders as $order)
                                  <tr>
                                    <td>{{ date('d-m-Y', strtotime($order->slot_date)) }}</td>
                                    <td><a href='/home/{{ $order->id }}'>#{{ $order->id }}</a></td>
                                    <td>
                                    @foreach($order->order_lists as $list)
                                      @if($list->prod_type!='COUPON' AND $list->prod_type!='ADDON')
                                        {{ $list->color->model->brand->name }} {{ $list->color->model->series}} {{ $list->color->model->name }} ({{ $list->color->name }}) - {{ $list->prod_type }}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>
                                    <?php
                                      $s  = $order->stock_price;
                                      $ts = $ts+$s;
                                    ?>
                                      &#8377; {{ $s }}
                                    </td>
                                    <td>
                                    <?php
                                      $t  = $order->order_lists->sum('price');
                                      $tt = $tt+$t;
                                    ?>
                                      &#8377; {{ $t }}
                                    </td>
                                    <td>
                                    <?php
                                      $p = $order->order_lists->sum('price')-$order->stock_price;
                                      $tp = $tp+$p;
                                    ?>
                                    &#8377; {{ $p }}
                                    </td>
                                    <td>{{ $order->closedorder->payment_type }}</td>
                                    <td>{{ $order->customer->address->city }}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table><hr>
                          <div class="pull-right">
                            @if(!empty($orders->count('id'))) <button class="btn btn-sm btn-secondary btn-rounded pull-right">Total Orders: {{ $orders->count('id') }}</button><br> @endif
                            @if($ts!=0) <button class="btn btn-sm btn-warning btn-rounded pull-right">Total Stock: &#8377; {{ $ts }}</button><br> @endif
                            @if($tt!=0) <button class="btn btn-sm btn-primary btn-rounded pull-right">Total Transaction: &#8377; {{ $tt }}</button><br> @endif
                            @if($tp!=0) <button class="btn btn-sm btn-success btn-rounded pull-right">Gross Profit: &#8377; {{ $tp }}</button><br> @endif
                            @if($tickets->sum('r_stock_amount')!=0)
                              <button class="btn btn-sm btn-danger btn-rounded pull-right">Total Ticket Amount: &#8377; {{ $tickets->sum('r_stock_amount') }}</button><br>
                            @endif
                            @if($expenses->sum('expenses')!=0)
                              <button class="btn btn-sm btn-danger btn-rounded pull-right">Total Expenses: &#8377; {{ abs($expenses->sum('expenses')) }}</button><br>
                            @endif
                            <button class="btn btn-lg btn-rounded btn-success pull-right">Net Profit: &#8377; {{ $tp-$tickets->sum('r_stock_amount')-abs($expenses->sum('expenses')) }}</button>
                            <br><br>
                          </div>
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
