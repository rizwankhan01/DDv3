<div>
  <div class="card m-b-10">
    <div class="card-header">
      <h5 class="card-title">
        <input type="text"  class="form-control" placeholder="All Customers..." wire:model="searchTerm" />
      </h5>
    </div>
  </div>
  @foreach($customers as $customer)
  <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2;" onclick="window.open('/customers/{{ $customer->id }}','_self')">
      <div class="card-body">
          <div class="best-product-slider">
              <div class="best-product-slider-item">
                  <div class="row">
                      <div class="col-12 col-md-6">
                        <li class="media">
                          @if(!empty($customer->display_picture))
                            <img class="mr-3 rounded-circle" src="{{ $customer->display_picture }}" style="width:10%;height:auto;" alt="{{ $customer->name }}">
                          @else
                            <img class="mr-3 rounded-circle" src="..\assets\images\users\men.svg" alt="{{ $customer->name }}">
                          @endif
                            <div class="media-body">
                            <h5 class="mt-0 mb-1 font-16"><a href='/customers/{{ $customer->id }}'>{{ $customer->name }}</a><span class="badge badge-warning-inverse float-right font-14">95</span></h5>
                            <p class="mb-0"><a href='mailto:{{ $customer->email }}'>{{ $customer->email }}</a></p>
                            </div>
                        </li>
                      </div>
                      <div class="col-12 col-md-2">
                          <b><a href='/exotel_calls/{{ $customer->phone_number }}'>{{ $customer->phone_number }}</a></b>
                      </div>
                      <div class="col-12 col-md-2">
                            <b>Joined {{ $customer->created_at->diffForHumans() }}</b>
                      </div>
                      <div class="col-12 col-md-2"><b> @if(!empty($customer->referer)) {{ $customer->referer  }} @else Direct @endif</b></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endforeach
  <div class="col-12">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="{{$customers->previousPageUrl()}}">Previous</a></li>
        @for($i=1;$i<=$customers->lastPage();$i++)
          <li class="page-item"><a class="page-link" href="{{$customers->url($i)}}">{{$i}}</a></li>
        @endfor
        <li class="page-item"><a class="page-link" href="{{$customers->nextPageUrl()}}">Next</a></li>
      </ul>
    </nav>
  </div>
</div>
