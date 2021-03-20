@extends(Auth::user()->user_type === 'Admin' ? 'layouts.dashboard' : 'layouts.serviceman')
@section('title') Expenses | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
    @if(session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                <div class="card-header">
                    <div class="widgetbar pull-right">
                        <button class="btn btn-primary-rgba pull-right" data-toggle="modal" data-target="#CreateModal"><i class="feather icon-plus mr-2"></i>Create New</button><br><br>
                        <!--<form action="/expenses" method="post" class="form-inline">
                          @csrf
                          {{ method_field('post') }}
                          From:&nbsp;<input type="date" name="from" class="form-control">&nbsp;
                          To:&nbsp;<input type="date" name="to" class="form-control">&nbsp;
                          <input type="submit" name="filter" value="Filter" class="btn btn-primary">
                        </form>-->
                        <div class="modal fade show" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true"
                        v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="CreateModalLabel">Add Expense</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="/expenses" method="post">
                          {{ csrf_field() }}
                          {{ method_field('post')}}
                          <div class="modal-body">
                          <div class="form-group">
                            <label>Reason</label>
                            <input type="text" class="form-control" name="reason" placeholder="Reason" required>
                          </div>
                          <div class="form-group">
                            <label>Amount</label>
                            <input type="number" class="form-control" min=1 name="amount" placeholder="Amount" required>
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
                      <h5 class="card-title">Expenses</h5>
                </div>
                  <div class="card-body">
                    <h6 class="card-subtitle">You can view expense reports here.</h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Reason</th>
                                <th>Amount</th>
                                <th>Posted By</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($expenses as $expense)
                                <tr>
                                  <td>{{ $expense->reason }}</td>
                                  <td>{{ $expense->expenses }} &#8377;</td>
                                  <td>{{ $expense->user->name }}</td>
                                  <td>{{ date('d-m-Y', strtotime($expense->created_at)) }}
                                    @if(date('d-m-Y',strtotime($expense->created_at))==date('d-m-Y'))
                                      <form action='/expenses/{{ $expense->id }}' method='post'>
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type='submit' class='btn btn-sm btn-danger' onclick="return confirm('Are you sure you want to delete this?');"><i class='fa fa-trash'></i></button>
                                      </form>
                                    @endif
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table><hr>
                        <div class="pull-right">

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
