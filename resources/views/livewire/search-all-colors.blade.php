<div>
  <h5 class="card-title">
    <input type="type" class="form-control col-md-4" placeholder="Search all colors here..." wire:model="searchTerm">
  </h5>
  <div class="row">
  @foreach($colors as $color)
  <div class="col-md-4">
  <div class="card m-b-10" style="box-shadow: 3px 3px #e6ebf2; @if(!empty($color->screen_color)) border-left: 5px solid {{ $color->screen_color }}; @else border-left: 5px solid #FCC72D; @endif">
      <div class="card-body">
          <div class="best-product-slider">
              <div class="best-product-slider-item">
                  <div class="row">
                      <div class="col-4 col-md-4">
                          <center>
                              <img src="storage/{{ $color->image }}" class="img-fluid" id="bigimage" alt="{{ $color->model->brand->name }} {{ $color->model->series }} {{ $color->model->name }} - {{ $color->name }}">
                              <img src="storage/{{ $color->image }}" class="img-fluid" id="smallimage" alt="{{ $color->model->brand->name }} {{ $color->model->series }} {{ $color->model->name }} - {{ $color->name }}">
                          </center>
                          @if($color->model->resource->indisplay_fingerprint==1)<center><i class="fas fa-fingerprint" style="background: -webkit-radial-gradient(#B675FB, #008577);-webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i><br><small>In Display</small></center>@endif
                      </div>
                      <div class="col-8 col-md-8">
                        <h5 class="mt-2 font-20"><img src="../storage/{{ $color->model->brand->brand_logo }}" style="width:50px;height:auto;"> {{ $color->model->series }} {{ $color->model->name }} <small>{{ $color->name }}</small></h5>
                          <div class="row">
                          <div class="col-12"><span class="badge badge-success-inverse mb-2 text-uppercase">Basic</span> <span class="mb-2 font-16 pull-right" style="font-weight:bold;">&#8377; {{ $color->pricings->ord_selling_price ?? '' }}</span></div>
                          <div class="col-12"><span class="badge badge-primary-inverse mb-2 text-uppercase">Premium</span> <span class="mb-2 font-16 pull-right" style="font-weight:bold;">&#8377; {{ $color->pricings->org_selling_price ?? '' }}</span></div>
                          <div class="col-12"><span class="badge badge-warning-inverse mb-2 text-uppercase">Glass</span> <span class="mb-2 font-16 pull-right" style="font-weight:bold;">&#8377; {{ $color->pricings->glass_price ?? '' }}</span></div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-4 col-md-4">
                      <a href="/modelcolors/{{ $color->id }}"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                    <div class="col-8 col-md-8">
                      <a href='/screen-repair-{{ $color->model->brand->name }}-{{ $color->model->series }}-{{ $color->model->name }}' target='_blank' class="btn btn-sm btn-success col-md-12">Place Order</a>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
  @endforeach
  <div>
    @if($search==0)
      {{ $colors->links('pagination::bootstrap-4') }}
    @endif
  </div>
</div>
</div>
