<div>
  <div class="col-lg-12">
    @foreach($tickets as $ticket)
      @foreach($ticket->order->order_lists as $list)
        @if($list->prod_type=='PREMIUM' || $list->prod_type=='BASIC')
          <?php
            $model = $list->color->model->brand->name." ".$list->color->model->series." ".$list->color->model->name;
            $color = $list->color->name;
            $type  = $list->prod_type;
            $image = $list->color->image;
          ?>
        @endif
      @endforeach
    <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2;">
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
                        <div class="col-8 col-md-3">
                          <span class="font-12 text-uppercase">#{{ $ticket->id }}
                            @if(strpos($ticket->created_at->diffForHumans(),'hour ago')!==false
                              || strpos($ticket->created_at->diffForHumans(),'hours ago')!==false
                              || strpos($ticket->created_at->diffForHumans(),'minutes ago')!==false
                              || strpos($ticket->created_at->diffForHumans(),'seconds ago')!==false)
                              <span class='badge badge-pill badge-danger'>New</span>
                            @endif
                          </span>
                          <h5 class="mt-2 font-20">{{ $model }} - {{ $color }}</h5>
                          @if($type=='PREMIUM')
                            <span class="badge badge-primary-inverse mb-2 text-uppercase">{{ $type }}</span>
                          @else
                            <span class="badge badge-success-inverse mb-2 text-uppercase">{{ $type }}</span>
                          @endif
                          <span class="badge badge-warning-inverse mb-2 text-uppercase">Order ID: #{{ $ticket->order_id }}</span><br>
                          <small>Created {{ $ticket->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="col-6 col-md-3">
                          <span class="font-12">
                              <span><i class='fa fa-map-marker'></i> {{ $ticket->order->address->area }}</span>
                          </span>
                          <h5 class="mt-2 font-20"><a href='/customers/#'>{{ $ticket->order->customer->name }}</a></h5>
                          <a href='/exotel_calls/{{ $ticket->order->customer->phone_number }}' class="badge badge-success mb-2"><i class='fa fa-phone'></i> Call</a><br>
                          <small>Stock From: <a href='/dealer-profile/{{ $ticket->order->dealer->id }}'>{{ $ticket->order->dealer->dealer_name }}</a></small>
                        </div>
                        <div class="col-6 col-md-2">
                          <span class="font-12">
                              <span><i class="feather icon-calendar"></i> {{ date('d M, Y', strtotime($ticket->order->slot_date)) }}</span>
                          </span><br>
                          <?php
                          $fdate = date('Y-m-d');
                          $tdate = $ticket->order->updated_at;
                          $datetime1 = new DateTime($fdate);
                          $datetime2 = new DateTime($tdate);
                          $interval = $datetime1->diff($datetime2);
                          $days = $interval->format('%a');
                          $warranty = 90-$days;
                          ?>
                          @if($warranty<=0)
                          <h5 class="mt-2 font-15 badge badge-danger-inverse"><i class="feather icon-alert-triangle"></i> Warranty Expired</h5><br>
                          @else
                          <h5 class="mt-2 font-15 badge badge-success-inverse">
                            <b>{{ $warranty }} days</b> left for warranty</h5><br>
                          @endif
                          <small>Service Man: <a href="/serviceman-profile/{{ $ticket->order->serviceman->id }}">{{ $ticket->order->serviceman->name }}</a></small>
                        </div>
                        <div class="col-12 col-md-2">
                          <li class="list-inline-item">
                              <h4 class="mb-2 font-16">&#8377; {{ $ticket->order->order_lists->sum('price') }} (Paid via {{ $ticket->order->closedorder->payment_type }})<br>&#8377; {{ $ticket->order->stock_price }} (Stock) </h4>
                              <div class="row">
                                <div class="col-12">
                                  @if($ticket->status==0)
                                    <button type="button" class='btn btn-sm btn-danger' wire:click="openSlider({{ $ticket->id }})">Open</button>
                                  @else
                                    <button type="button" class="btn btn-sm btn-success" wire:click="openSlider({{ $ticket->id }})">Closed {{ date('d M, Y', strtotime($ticket->date_close)) }}</button>
                                  @endif
                                </div>
                              </div>
                          </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>
  @if(!empty($expandTicket))
  <?php $ticket = $expandTicket; ?>
  @foreach($ticket->order->order_lists as $list)
    @if($list->prod_type=='PREMIUM' || $list->prod_type=='BASIC')
      <?php
        $model = $list->color->model->brand->name." ".$list->color->model->series." ".$list->color->model->name;
        $color = $list->color->name;
        $type  = $list->prod_type;
        $image = $list->color->image;
      ?>
    @endif
  @endforeach
  <div id="infobar-settings-sidebar" class="infobar-settings-sidebar sidebarshow">
  <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
    <h6>Ticket ID: #{{ $ticket->id }}</h6> <a href="#" wire:click="emptyExpandTickets()" id="infobar-settings-close"><i class="feather icon-x"></i></a>
  </div>
  <div class="infobar-settings-sidebar-body">
      <div class="custom-mode-setting">
          <div class="row pb-3">
            <div class="card m-b-30 col-12">
              <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <span class="font-12 text-uppercase">#{{ $ticket->id }}
                          @if(strpos($ticket->created_at->diffForHumans(),'hour ago')!==false
                            || strpos($ticket->created_at->diffForHumans(),'hours ago')!==false
                            || strpos($ticket->created_at->diffForHumans(),'minutes ago')!==false
                            || strpos($ticket->created_at->diffForHumans(),'seconds ago')!==false)
                            <span class='badge badge-pill badge-danger'>New</span>
                          @endif
                        </span>
                      <h5 class="mt-2 font-20">{{ $model }} - {{ $color }}</h5>
                      @if($type=='PREMIUM')
                        <span class="badge badge-primary-inverse mb-2 text-uppercase">{{ $type }}</span>
                      @else
                        <span class="badge badge-success-inverse mb-2 text-uppercase">{{ $type }}</span>
                      @endif
                      <span class="badge badge-warning-inverse mb-2 text-uppercase">Order ID: #{{ $ticket->order_id }}</span><br>
                      <small>Created {{ $ticket->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="col-4">
                      <span class="font-12">
                          <span><i class='fa fa-map-marker'></i> {{ $ticket->order->address->area }}</span>
                      </span>
                      <h5 class="mt-2 font-20"><a href='/customers/#'>{{ $ticket->order->customer->name }}</a></h5>
                      <a href='/exotel_calls/{{ $ticket->order->customer->phone_number }}' class="badge badge-success mb-2"><i class='fa fa-phone'></i> Call</a><br>
                      <small>Stock From: <a href='/dealer-profile/{{ $ticket->order->dealer->id }}'>{{ $ticket->order->dealer->dealer_name }}</a></small>
                    </div>
                    <div class="col-4">
                      <span class="font-12">
                          <span><i class="feather icon-calendar"></i> {{ date('d M, Y', strtotime($ticket->order->slot_date)) }}</span>
                      </span><br>
                      <?php
                      $fdate = date('Y-m-d');
                      $tdate = $ticket->order->updated_at;
                      $datetime1 = new DateTime($fdate);
                      $datetime2 = new DateTime($tdate);
                      $interval = $datetime1->diff($datetime2);
                      $days = $interval->format('%a');
                      $warranty = 90-$days;
                      ?>
                      @if($warranty<=0)
                      <h5 class="mt-2 font-15 badge badge-danger-inverse"><i class="feather icon-alert-triangle"></i> Warranty Expired</h5><br>
                      @else
                      <h5 class="mt-2 font-15 badge badge-success-inverse">
                        <b>{{ $warranty }} days</b> left for warranty</h5><br>
                      @endif
                      <small>Service Man: <a href="/serviceman-profile/{{ $ticket->order->serviceman->id }}">{{ $ticket->order->serviceman->name }}</a></small>
                    </div>
                    <div class="col-12"><br>
                      <li class="list-inline-item">
                          <h4 class="mb-2 font-16">&#8377; {{ $ticket->order->order_lists->sum('price') }} (Paid via {{ $ticket->order->closedorder->payment_type }})<br>&#8377; {{ $ticket->order->stock_price }} (Stock) </h4>
                      </li>
                    </div>
                </div><hr>
                <form action="/tickets/{{ $ticket->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    Issue:
                    <textarea class="form-control" name="issue" placeholder="Issue" required>{{ $ticket->issue }}</textarea><br>
                    Service Man:
                    <select class="form-control" name="serviceman_id">
                      <option value="">Select</option>
                      @foreach($smen as $sman)
                        <option value="{{ $sman->id }}" @if($ticket->assigned_to==$sman->id){{ 'selected' }} @endif>{{ $sman->name }}</option>
                      @endforeach
                    </select><br>
                    Date of Service:
                    <input type='date' name='date_open' value="{{ $ticket->date_open }}" class="form-control"><br>
                    Replacement Stock From:
                    <select class="form-control" name="dealer_id">
                      <option value="">Select</option>
                      @foreach($dealers as $dealer)
                        <option value="{{ $dealer->id }}" @if($ticket->r_stock_dealer==$dealer->id) {{ 'selected' }} @endif>{{ $dealer->dealer_name }}</option>
                      @endforeach
                    </select><br>
                    Replacement Stock Amount:
                    <input type="number" class="form-control" name="stock_amount" value="{{ $ticket->r_stock_amount }}" placeholder="Stock Amount"><br>
                    Select Status:
                    <select class="form-control" name="status">
                      <option value="">Select Status</option>
                      <option value="0" @if($ticket->status==0) selected @endif>Open</option>
                      <option value="1" @if($ticket->status==1) selected @endif>Closed</option>
                    </select><Br>
                    @if($ticket->status==0)
                      <input type='submit' class='btn btn-sm btn-primary pull-right' value='Update'>
                    @endif
                </form>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
  <div class="infobar-settings-sidebar-overlay" style="background: rgba(0,0,0,0.4);position:fixed;"></div>
@endif
</div>
