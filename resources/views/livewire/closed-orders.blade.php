<div>
  <div class="col-lg-12">
      <div class="card m-b-10">
          <div class="card-header">
              <div class="widgetbar">
                <!--<form action='/close' method='post'>
                  {{ csrf_field() }}
                  {{ method_field('post') }}
                  <a href='/close' class="btn btn-sm btn-success">All</a>
                  <button name='filter' value='Chennai' class="btn btn-sm btn-primary">Chennai</button>
                  <button name='filter' value='Bangalore' class="btn btn-sm btn-warning">Bangalore</button>
                </form>
              </div>-->
              <input type="type" class="form-control col-md-4" placeholder="Search closed orders here..." wire:model="searchTerm">
          </div>
      </div>
  </div>
</div>
  <div class="col-lg-12">
    @foreach($orders as $order)
        @foreach($order->order_lists as $list)
          @if($list->prod_type=='PREMIUM' || $list->prod_type=='BASIC')
            <?php
              $model = $list->color->model->brand->name." ".$list->color->model->series." ".$list->color->model->name;
              $color = $list->color->name;
              $screen_color = $list->color->screen_color;
              $type  = $list->prod_type;
              $image = $list->color->image;
            ?>
          @endif
        @endforeach
      <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2; @if(!empty($screen_color)) border-left: 5px solid {{ $screen_color }};  @else border-left: 5px solid #FCC72D; @endif">
          <div class="card-body">
              <div class="best-product-slider">
                  <div class="best-product-slider-item">
                      <div class="row">
                          <div class="col-4 col-md-2">
                              <center>
                                  <img src="storage/{{ $image }}" class="img-fluid" id="bigimage" alt="{{ $model }} - {{ $color }}" style="max-width:50%;height:auto;">
                                  <img src="storage/{{ $image }}" class="img-fluid" id="smallimage" alt="{{ $model }} - {{ $color }}">
                              </center>
                          </div>
                          <div class="col-8 col-md-4">
                            <span class="font-12 text-uppercase">#{{ $order->id }}
                              @if(strpos($order->created_at->diffForHumans(),'hour ago')!==false
                                || strpos($order->created_at->diffForHumans(),'hours ago')!==false
                                || strpos($order->created_at->diffForHumans(),'minutes ago')!==false
                                || strpos($order->created_at->diffForHumans(),'seconds ago')!==false)
                                <span class='badge badge-pill badge-danger'>New</span>
                              @endif
                            </span>
                            <h5 class="mt-2 font-20">{{ $model }} - {{ $color }}</h5>
                            @if($type=='PREMIUM')
                              <span class="badge badge-primary-inverse mb-2 text-uppercase">{{ $type }}</span>
                            @else
                              <span class="badge badge-success-inverse mb-2 text-uppercase">{{ $type }}</span>
                            @endif
                            @if(!empty($list->color->model->resource->indisplay_fingerprint) AND $list->color->model->resource->indisplay_fingerprint==1)
                              <small><i class="fas fa-fingerprint" style="background: -webkit-radial-gradient(#B675FB, #008577);-webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i> In Display</small>
                            @endif
                          </div>
                          <div class="col-6 col-md-2">
                            <li class="list-inline-item">
                                <h4 class="mb-2 font-16"><a href='/customers/{{ $order->customer_id }}'>{{ $order->customer->name }}</a></h4>
                                <p class="mb-2"><a href='/exotel_calls/{{ $order->customer->phone_number }}'><i class='fas fa-phone'></i> Call</a></p>
                                <span class="font-12 mb-2"><i class='fas fa-map-marker'></i> {{ $order->address->area }}</span>
                            </li>
                          </div>
                          <div class="col-6 col-md-2">
                              <li class="list-inline-item">
                                <h4 class="mb-2 font-16">{{ date('d F, D',strtotime($order->slot_date)) }}</h4>
                                  <p class="mb-2">
                                    <?php
                                    $fdate = date('Y-m-d');
                                    $tdate = $order->updated_at;
                                    $datetime1 = new DateTime($fdate);
                                    $datetime2 = new DateTime($tdate);
                                    $interval = $datetime1->diff($datetime2);
                                    $days = $interval->format('%a');
                                    $warranty = 90-$days;
                                    ?>
                                    @if($warranty<=0)
                                      Warranty Expired
                                    @else
                                      <b>{{ $warranty }} days</b> left for warranty
                                    @endif
                                  </p>
                                  <span class="font-12 mb-2">
                                    <a href='/serviceman-profile/{{ $order->serviceman->id }}'>
                                    <div class="circular2">
                                      <img src="storage/{{ $order->serviceman->profile_image }}" style="width:100%;height:auto">
                                    </div>
                                    &nbsp;&nbsp;{{ $order->serviceman->name }}</a></span>
                              </li>
                          </div>
                          <div class="col-12 col-md-2">
                                <h4 class="mb-2 font-16 pull-right">&#8377; {{ $order->order_lists->sum('price') }}</h4>
                                <!--<p class="mb-4"><i class='fas fa-credit-card-alt'></i> Card</p>-->
                                <a href='/home/{{ $order->id }}' class='btn col-12 btn-sm btn-success'>Completed</a>
                                <a href='/invoice/{{ $order->id }}' target='_blank' class='col-12 btn btn-sm btn-warning'>Invoice</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    @endforeach
  </div>
<div>
  @if($search==0)
    {{ $orders->links('pagination::bootstrap-4') }}
  @endif
</div>
</div>
