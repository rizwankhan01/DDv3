<div>
  <h5 class="card-title">
    <input type="type" class="form-control col-md-4" placeholder="Search all colors here..." wire:model="searchTerm">
  </h5>
  <div class="col-md-12">
  <div class="row">
  @foreach($colors as $color)
  <div class="card m-b-10 col-md-4" style="box-shadow: 3px 3px #e6ebf2;">
      <div class="card-body">
          <div class="best-product-slider">
              <div class="best-product-slider-item">
                  <div class="row">
                      <div class="col-4 col-md-4">
                          <center>
                              <img src="storage/{{ $color->image }}" class="img-fluid" id="bigimage" alt="{{ $color->model->brand->name }} {{ $color->model->series }} {{ $color->model->name }} - {{ $color->name }}">
                              <img src="storage/{{ $color->image }}" class="img-fluid" id="smallimage" alt="{{ $color->model->brand->name }} {{ $color->model->series }} {{ $color->model->name }} - {{ $color->name }}">
                          </center>
                      </div>
                      <div class="col-8 col-md-8">
                        <h5 class="mt-2 font-20">{{ $color->model->brand->name }} {{ $color->model->series }} {{ $color->model->name }} - {{ $color->name }}</h5>
                          <div class="row">
                          <div class="col-12"><span class="badge badge-success-inverse mb-2 text-uppercase">Basic</span> <span class="mb-2 font-16 pull-right" style="font-weight:bold;">&#8377; {{ $color->pricings->ord_selling_price ?? '' }}</span></div>
                          <div class="col-12"><span class="badge badge-primary-inverse mb-2 text-uppercase">Premium</span> <span class="mb-2 font-16 pull-right" style="font-weight:bold;">&#8377; {{ $color->pricings->org_selling_price ?? '' }}</span></div>
                          <div class="col-12"><span class="badge badge-warning-inverse mb-2 text-uppercase">Glass</span> <span class="mb-2 font-16 pull-right" style="font-weight:bold;">&#8377; {{ $color->pricings->glass_price ?? '' }}</span></div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-4 col-md-4">
                      <a href="/modelcolors/{{ $color->id }}"><i class="fa fa-pencil"></i></span>
                    </div>
                    <div class="col-8 col-md-8">
                      <a href='/screen-repair-{{ $color->model->brand->name }}-{{ $color->model->series }}-{{ $color->model->name }}' target='_blank' class="btn btn-sm btn-success col-md-12">Place Order</a>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endforeach
  <div class="col-12">
    @if($search==0)
      {{ $colors->links() }}
    @endif
  </div>
</div>
</div>
</div>
