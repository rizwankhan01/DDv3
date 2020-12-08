@extends(Auth::user()->user_type === 'Admin' ? 'layouts.dashboard' : 'layouts.serviceman')
@section('title') Search Results for "{{ $term }}" | Doctor Display Dashboard @endsection

@section('contentbar')
  <div class="contentbar mt-100">
    @if(session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif
      <!-- Start row -->
    <div class="row">
      <div class="card col-md-12">
        <div class="card-header">
            Search Results for "{{ $term }}"
        </div>
        <div class="card-body row">
          @foreach($results as $result)
          <div class="col-md-4">
              <div class="card m-b-30">
                <a href="/colors/{{ $result->id }}" target="_blank">
                  <img class="card-img-top" src="{{ asset('storage/'.$result->image ) }}" alt="{{ $result->name }}">
                  <div class="card-body">
                      <h5 class="card-title font-18">{{ $result->brand->name }} {{ $result->series }} {{ $result->name }}</h5>
                      <table class="table table-border">
                        <thead>
                          <tr>
                            <th>Color</th>
                            <th>Ord Price</th>
                            <th>Org Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($result->colortypes as $color)
                              <tr>
                                <td>{{ $color->name }}</td>
                                <td>
                                  <a href="#" class="btn btn-sm btn-rounded @if($color->pricings->ord_stock_availablity==1) btn-success-rgba @else btn-danger-rgba @endif">
                                    &#8377; {{ $color->pricings->ord_selling_price }}
                                  </a>
                                </td>
                                <td>
                                  <a href="#" class="btn btn-sm btn-rounded @if($color->pricings->org_stock_availablity==1) btn-success-rgba @else btn-danger-rgba @endif">
                                    &#8377; {{ $color->pricings->org_selling_price }}
                                  </a>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                        </table>
                  </div>
                </a>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
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
