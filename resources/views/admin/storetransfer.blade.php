@extends('layouts.dashboard')
@section('title') Store Stock ({{ auth()->user()->store_name }}) | Doctor Display Dashboard @endsection
@section('contentbar')
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                    <span class="pull-right">
                      @if ($stocks)
                          <span class="btn btn-sm btn-warning">Total Stock: {{ $stocks->count() }}</span>
                          <span class="btn btn-sm btn-success">Total Stock Value: &#8377; {{ $stocks->sum('cost') }}</span>
                      @endif
                    </span>
                    <h5 class="card-title">Store Stock ({{ auth()->user()->store_name }})</h5>
                  </div>
                  <div class="card-body">
                    <h6 class="card-subtitle">You can do returns, view stock Here.</h6>
                      <div class="table-responsive">
                        @if(session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                        @endif
                          @livewire('store-stock')
                      </div>
                  </div>
              </div>
          </div>
          <!-- End col -->
      </div>
      <!-- End row -->
  </div>
@endsection
