@extends('layouts.crm')
@section('title') Create New Order | Doctor Display Dashboard @endsection

@section('contentbar')
<div class="contentbar mt-100">
<!-- Start row -->
<div class="row">
<!-- Start col -->
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-header">
    <h5 class="card-title">Create New Order</h5>
</div>
<div class="card-body">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-12">
            <form id="basic-form-wizard" action="#">
                <div>
                    <h3>#1 Choose products</h3>
                    <section>
                      <div class="row">
                      <div class="col-md-3">
                        <select class="form-control">
                          <option value="">Model</option>
                          <option value="">Coupon</option>
                          <option value="">Addon</option>
                        </select><br>
                      </div>
                      <div class="col-md-3">
                        <select class="form-control">
                          <option value="">Apple iPhone 6 - Black</option>
                          <option value="">DD200</option>
                          <option value="">Spearker for Apple iPhone 6 - Black</option>
                        </select><br>
                      </div>
                      <div class="col-md-3">
                        <input type="number" class="form-control" placeholder="Price">
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-primary-rgba">+ Add</button>
                      </div>
                    </div>
                    <div class="table-responsive">
                          <table class="table table-borderless">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Action</th>
                                      <th scope="col">Photo</th>
                                      <th scope="col">Product</th>
                                      <th scope="col">Qty</th>
                                      <th scope="col">Price</th>
                                      <th scope="col" class="text-right">Total</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                      <td><img src="storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" width="35" alt="product"></td>
                                      <td>Apple MacBook Pro</td>
                                      <td>1</td>
                                      <td>&#8377; 10</td>
                                      <td class="text-right">&#8377; 500</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">2</th>
                                      <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                      <td><img src="storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" width="35" alt="product"></td>
                                      <td>Dell Alienware</td>
                                      <td>2</td>
                                      <td>&#8377; 20</td>
                                      <td class="text-right">&#8377; 200</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">3</th>
                                      <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                      <td><img src="storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" width="35" alt="product"></td>
                                      <td>Acer Predator Helios</td>
                                      <td>3</td>
                                      <td>&#8377; 30</td>
                                      <td class="text-right">&#8377; 300</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="row border-top pt-3">
                          <div class="col-md-12 order-2 order-lg-1 col-lg-4 col-xl-6">
                              <div class="order-note">
                                  <p class="mb-5"><span class="badge badge-secondary-inverse">Free Shipping Order</span></p>
                                  <h6>Note :</h6>
                                  <p>Please, Pack with product air bag and handle with care.</p>
                              </div>
                          </div>
                          <div class="col-md-12 order-1 order-lg-2 col-lg-8 col-xl-6">
                              <div class="order-total table-responsive ">
                                  <table class="table table-borderless text-right">
                                      <tbody>
                                          <tr>
                                              <td>Sub Total :</td>
                                              <td>&#8377; 1000.00</td>
                                          </tr>
                                          <tr>
                                              <td>Shipping :</td>
                                              <td>&#8377; 0.00</td>
                                          </tr>
                                          <tr>
                                              <td>Tax(18%) :</td>
                                              <td>&#8377; 180.00</td>
                                          </tr>
                                          <tr>
                                              <td class="text-black f-w-7 font-18">Amount :</td>
                                              <td class="text-black f-w-7 font-18">&#8377; 1180.00</td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                    </section>
                    <h3>#2 Customer Details</h3>
                    <section>
                        <div class="row">
                        <div class="col-md-1">
                          <label>Title</label>
                          <select class='form-control'>
                            <option value=''>Mr</option>
                            <option value=''>Mrs</option>
                          </select>
                        </div>
                        <div class="col-md-3 col-12 mb--20">
                          <label>Full Name*</label>
                          <input class="form-control" type="text" placeholder="Full Name" name="name" value="" required><br>
                        </div>
                        <div class="col-md-4 col-12 mb--20">
                          <label>Email Address*</label>
                          <input class="form-control" type="email" placeholder="Email Address" name="email" value="" required><br>
                        </div>
                        <div class="col-md-4 col-12 mb--20">
                          <label>Phone no*</label>
                          <input class="form-control" type="text" placeholder="Phone number"minlength="10" maxlength="10" name="phone" value="" required><br>
                        </div>
                        <div class="col-md-4 col-12 mb--20">
                          <label>Address Type</label>
                          <select class='form-control' name='address_type' required>
                          <option value=''>Select Address Type</option>
                          <option value='Office' value='Office'>Office</option>
                          <option value='Home' value='Home'>Home</option>
                          </select><br>
                        </div>
                        <div class="col-md-8 col-12 mb--20">
                        <label>Address*</label>
                          <input class="form-control" type="text" placeholder="Address" name='address' required value=""><br>
                        </div>
                        <div class="col-md-3 col-12 mb--20">
                        <label>Town/City*</label>
                          <input class="form-control" type="text" placeholder="Town/City" name='city' value='' required><br>
                        </div>
                        <div class="col-md-3 col-12 mb--20">
                        <label>Area*</label>
                          <select class="form-control" class="nice-select" name='area' required>
                            <option value=''>Select Area</option>
                          </select><br>
                        </div>
                        <div class="col-md-3 col-12 mb--20">
                        <label>Pin Code*</label>
                          <input class="form-control" type="text" placeholder="Pin Code" minlength="6" maxlength="6" onkeyup='swap_pincode(this.value)' name='pincode' value='' required><br>
                        </div>
                        <div class="col-md-3 col-12 mb--20">
                        <label>Preferred Language</label>
                          <select class="form-control">
                            <option value=''>English</option>
                            <option value=''>Tamil</option>
                            <option value=''>Hindi</option>
                          </select>
                        </div>
                      </div>
                    </section>
                    <h3>#3 Other Device issue</h3>
                    <section>
                      <div class="row">
                        <div class='col-md-4'>
                          <label>Is the phone in Working Condition?</label>
                          <select class='form-control' name='q1' required>
                          <option value=''>Select</option>
                          <option value='Yes'>Yes</option>
                          <option value='No'>No</option></select><br>
                        </div>
                        <div class="col-md-4">
                          <label>What kind of damage has happened?</label>
                          <select class='form-control' name='q2' required>
                          <option value=''>Select</option>
                          <option value='Screen Damaged'>Screen Damaged</option>
                          <option value='Frame Damaged'>Frame Damaged</option>
                          <option value='Screen Bend'>Screen Bend</option>
                          </select><br>
                        </div>
                        <div class="col-md-4">
                          <label>How did the phone fall down?</label>
                          <input type='text' class='form-control' name='q3' required placeholder='How did the phone fall down?'><br>
                        </div>
                        <div class="col-md-4">
                          <label>Is there any water drop?</label>
                          <select class='form-control' name='q4' required>
                          <option value=''>Select</option>
                          <option value='Yes'>Yes</option>
                          <option value='No'>No</option>
                          </select><br>
                        </div>
                        <div class="col-md-4">
                          <label>How old is the phone?</label>
                          <input type='text' class='form-control' name='q5' required placeholder='How old is the phone?'><br>
                        </div>
                        <div class="col-md-4">
                          <label>Has the screen been changed before?</label>
                          <select class='form-control' name='q6' required>
                          <option value=''>Select</option>
                          <option value='Yes'>Yes</option>
                          <option value='No'>No</option>
                          </select><br>
                        </div>
                        <div class="col-md-4">
                          <label>Any other issue with the phone?</label>
                          <input type='text' class='form-control' name='q7' required placeholder='Any other issue with the phone?'><br>
                        </div>
                        <div class="col-md-4"></div>
                        </div>
                    </section>
                    <h3>#4 Choose a Slot</h3>
                    <section>
                      <div class="row">
                        <div class='col-md-3'>
                          Appointment Date: <input type='date' class='form-control' name='date' min="{{ date('Y-m-d') }}" value=""><br>
                          Appointment Time:
                          <select class='form-control' name='time_slot'>
                            <option value=''>Select Time Slot</option>
                            <option value='10:00AM to 11:30AM'>10:00AM to 11:30AM</option>
                            <option value='11:30AM to 01:00PM'>11:30AM to 01:00PM</option>
                            <option value='02:00PM to 03:30PM'>02:00PM to 03:30PM</option>
                            <option value='03:30PM to 05:00PM'>03:30PM to 05:00PM</option>
                            <option value='05:00PM to 06:30PM'>05:00PM to 06:30PM</option>
                            <option value='06:30PM to 08:00PM'>06:30PM to 08:00PM</option>
                            <option value='08:30PM to 10:00PM'>08:30PM to 10:00PM</option>
                          </select><br>
                          Service Man:
                          <select class="form-control" name="service_man">
                            <option value="">Select</option>
                          </select><br>
                        </div>
                        <div class="col-md-9">
                          <table class="table table-bordered" style="text-align:center;">
                            <thead>
                              <th>#</th>
                              <th>27-05-2021</th>
                              <th>10 to 11:30</th>
                              <th>11:30 to 1</th>
                              <th>2 to 3:30</th>
                              <th>3:30 to 5</th>
                              <th>5 to 6:30</th>
                              <th>6:30 to 8</th>
                              <th>8:30 to 10</th>
                            </thead>
                            <tbody>
                              <tr>
                                <td><div class="circular2 col-12"><img src="storage/{{ Auth()->user()->profile_image }}" style="width:100%;height:auto"></div></td>
                                <td><a href='#'>Yasir</a></td>
                                <td><a href="#" class="btn btn-success-rgba">#1575</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Royapettah</small>
                                </td>
                                <td></td>
                                <td></td>
                                <td><a href="#" class="btn btn-success-rgba">#1577</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Mylapore</small>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td><div class="circular2 col-12"><img src="storage/{{ Auth()->user()->profile_image }}" style="width:100%;height:auto"></div></td>
                                <td><a href='#'>Noufal</a></td>
                                <td><a href="#" class="btn btn-success-rgba">#1578</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Velachery</small>
                                </td>
                                <td></td>
                                <td><a href="#" class="btn btn-success-rgba">#1579</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Triplicane</small>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td><div class="circular2 col-12"><img src="storage/{{ Auth()->user()->profile_image }}" style="width:100%;height:auto"></div></td>
                                <td><a href='#'>Saran</a></td>
                                <td></td>
                                <td><a href="#" class="btn btn-success-rgba">#1581</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Adyar</small>
                                </td>
                                <td></td>
                                <td></td>
                                <td><a href="#" class="btn btn-success-rgba">#1580</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Teynampet</small>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td><div class="circular2 col-12"><img src="storage/{{ Auth()->user()->profile_image }}" style="width:100%;height:auto"></div></td>
                                <td><a href='#'>Sheik</a></td>
                                <td></td>
                                <td><a href="#" class="btn btn-success-rgba">#1585</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Gopalapuram</small>
                                </td>
                                <td><a href="#" class="btn btn-success-rgba">#1583</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Royapettah</small>
                                </td>
                                <td><a href="#" class="btn btn-success-rgba">#1586</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Royapettah</small>
                                </td>
                                <td><a href="#" class="btn btn-success-rgba">#1598</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Alandur</small>
                                </td>
                                <td></td>
                                <td><a href="#" class="btn btn-success-rgba">#1600</a><br>
                                  <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Alandur</small>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="custom-control custom-checkbox"><br>
                        <input type="checkbox" class="custom-control-input" id="acceptTerms">
                        <label class="custom-control-label" for="acceptTerms">I hereby declare that the information furnished above is true, complete and correct to the best of my knowledge and belief.</label>
                      </div>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<form action="" method="post">
<!--
<div class="card m-b-30">
<div class="card-header"><h6 class="btn btn-rounded btn-info-rgba">Step 1: Choose your products</h6></div>
<div class="card-body">
  <div class="row">
  <div class="col-md-3">
    <select class="form-control">
      <option value="">Model</option>
      <option value="">Coupon</option>
      <option value="">Addon</option>
    </select><br>
  </div>
  <div class="col-md-3">
    <select class="form-control">
      <option value="">Apple iPhone 6 - Black</option>
      <option value="">DD200</option>
      <option value="">Spearker for Apple iPhone 6 - Black</option>
    </select><br>
  </div>
  <div class="col-md-3">
    <input type="number" class="form-control" placeholder="Price">
  </div>
  <div class="col-md-3">
    <button class="btn btn-primary-rgba">+ Add</button>
  </div>
</div>
<div class="table-responsive">
      <table class="table table-borderless">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Action</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Product</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Price</th>
                  <th scope="col" class="text-right">Total</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <th scope="row">1</th>
                  <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                  <td><img src="storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" width="35" alt="product"></td>
                  <td>Apple MacBook Pro</td>
                  <td>1</td>
                  <td>$10</td>
                  <td class="text-right">$500</td>
              </tr>
              <tr>
                  <th scope="row">2</th>
                  <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                  <td><img src="storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" width="35" alt="product"></td>
                  <td>Dell Alienware</td>
                  <td>2</td>
                  <td>$20</td>
                  <td class="text-right">$200</td>
              </tr>
              <tr>
                  <th scope="row">3</th>
                  <td><a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a><a href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                  <td><img src="storage/AsFp2gXFq6Ea0yerjeXk774YAPoNGnyWeCNOhQXv.png" class="img-fluid" width="35" alt="product"></td>
                  <td>Acer Predator Helios</td>
                  <td>3</td>
                  <td>$30</td>
                  <td class="text-right">$300</td>
              </tr>
          </tbody>
      </table>
  </div>
  <div class="row border-top pt-3">
      <div class="col-md-12 order-2 order-lg-1 col-lg-4 col-xl-6">
          <div class="order-note">
              <p class="mb-5"><span class="badge badge-secondary-inverse">Free Shipping Order</span></p>
              <h6>Note :</h6>
              <p>Please, Pack with product air bag and handle with care.</p>
          </div>
      </div>
      <div class="col-md-12 order-1 order-lg-2 col-lg-8 col-xl-6">
          <div class="order-total table-responsive ">
              <table class="table table-borderless text-right">
                  <tbody>
                      <tr>
                          <td>Sub Total :</td>
                          <td>$1000.00</td>
                      </tr>
                      <tr>
                          <td>Shipping :</td>
                          <td>$0.00</td>
                      </tr>
                      <tr>
                          <td>Tax(18%) :</td>
                          <td>$180.00</td>
                      </tr>
                      <tr>
                          <td class="text-black f-w-7 font-18">Amount :</td>
                          <td class="text-black f-w-7 font-18">$1180.00</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
</div>
<div class="card m-b-30">
<div class="card-header"><h6>Step 2: Add Customer Details</h6></div>
<div class="card-body">
<div class="row">
<div class="col-md-4 col-12 mb--20">
<label>Full Name*</label>
<input class="form-control" type="text" placeholder="Full Name" name="name" value="" required><br>
</div>
<div class="col-md-4 col-12 mb--20">
<label>Email Address*</label>
<input class="form-control" type="email" placeholder="Email Address" name="email" value="" required><br>
</div>
<div class="col-md-4 col-12 mb--20">
<label>Phone no*</label>
<input class="form-control" type="text" placeholder="Phone number"minlength="10" maxlength="10" name="phone" value="" required><br>
</div>
<div class="col-md-4 col-12 mb--20">
<label>Address Type</label>
<select class='form-control' name='address_type' required>
<option value=''>Select Address Type</option>
<option value='Office' value='Office'>Office</option>
<option value='Home' value='Home'>Home</option>
</select><br>
</div>
<div class="col-md-4 col-12 mb--20">
<label>Town/City*</label>
<input class="form-control" type="text" placeholder="Town/City" name='city' value='' required><br>
</div>
<div class="col-md-4 col-12 mb--20">
<label>Area*</label>
<select class="form-control" class="nice-select" name='area' required>
  <option value=''>Select Area</option>
</select><br>
</div>
<div class="col-md-4 col-12 mb--20">
<label>Address*</label>
<input class="form-control" type="text" placeholder="Address" name='address' required value=""><br>
</div>
<div class="col-md-4 col-12 mb--20">
<label>Pin Code*</label>
<input class="form-control" type="text" placeholder="Pin Code" minlength="6" maxlength="6" onkeyup='swap_pincode(this.value)' name='pincode' value='' required><br>
</div>
</div>
</div>
</div>

<div class="card m-b-30">
<div class="card-header"><h6>Step 3: Assign Slot and Serviceman</h6></div>
<div class="card-body">
<div class="row">
<div class='col-md-3'>
Appointment Date: <input type='date' class='form-control' name='date' min="{{ date('Y-m-d') }}" value=""><br>
Appointment Time:
<select class='form-control' name='time_slot'>
  <option value=''>Select Time Slot</option>
  <option value='10:00AM to 11:30AM'>10:00AM to 11:30AM</option>
  <option value='11:30AM to 01:00PM'>11:30AM to 01:00PM</option>
  <option value='02:00PM to 03:30PM'>02:00PM to 03:30PM</option>
  <option value='03:30PM to 05:00PM'>03:30PM to 05:00PM</option>
  <option value='05:00PM to 06:30PM'>05:00PM to 06:30PM</option>
  <option value='06:30PM to 08:00PM'>06:30PM to 08:00PM</option>
  <option value='08:30PM to 10:00PM'>08:30PM to 10:00PM</option>
</select><br>
Service Man:
<select class="form-control" name="service_man">
  <option value="">Select</option>
</select><br>
</div>
<div class="col-md-9">
<table class="table table-bordered" style="text-align:center;">
  <thead>
    <th>#</th>
    <th>27-05-2021</th>
    <th>10 to 11:30</th>
    <th>11:30 to 1</th>
    <th>2 to 3:30</th>
    <th>3:30 to 5</th>
    <th>5 to 6:30</th>
    <th>6:30 to 8</th>
    <th>8:30 to 10</th>
  </thead>
  <tbody>
    <tr>
      <td><div class="circular2 col-12"><img src="storage/{{ Auth()->user()->profile_image }}" style="width:100%;height:auto"></div></td>
      <td><a href='#'>Yasir</a></td>
      <td><a href="#" class="btn btn-success-rgba">#1575</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Royapettah</small>
      </td>
      <td></td>
      <td></td>
      <td><a href="#" class="btn btn-success-rgba">#1577</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Mylapore</small>
      </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><div class="circular2 col-12"><img src="storage/{{ Auth()->user()->profile_image }}" style="width:100%;height:auto"></div></td>
      <td><a href='#'>Noufal</a></td>
      <td><a href="#" class="btn btn-success-rgba">#1578</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Velachery</small>
      </td>
      <td></td>
      <td><a href="#" class="btn btn-success-rgba">#1579</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Triplicane</small>
      </td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><div class="circular2 col-12"><img src="storage/{{ Auth()->user()->profile_image }}" style="width:100%;height:auto"></div></td>
      <td><a href='#'>Saran</a></td>
      <td></td>
      <td><a href="#" class="btn btn-success-rgba">#1581</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Adyar</small>
      </td>
      <td></td>
      <td></td>
      <td><a href="#" class="btn btn-success-rgba">#1580</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Teynampet</small>
      </td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><div class="circular2 col-12"><img src="storage/{{ Auth()->user()->profile_image }}" style="width:100%;height:auto"></div></td>
      <td><a href='#'>Sheik</a></td>
      <td></td>
      <td><a href="#" class="btn btn-success-rgba">#1585</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Gopalapuram</small>
      </td>
      <td><a href="#" class="btn btn-success-rgba">#1583</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Royapettah</small>
      </td>
      <td><a href="#" class="btn btn-success-rgba">#1586</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Royapettah</small>
      </td>
      <td><a href="#" class="btn btn-success-rgba">#1598</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Alandur</small>
      </td>
      <td></td>
      <td><a href="#" class="btn btn-success-rgba">#1600</a><br>
        <small class="badge badge-warning"><i class="feather icon-map-pin"></i> Alandur</small>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
</div>

<div class="card m-b-30">
<div class="card-header"><h6>Step 4: Consult more about customers phone</h6></div>
<div class="card-body">
<div class="row">
<div class='col-md-4'>
<label>Is the phone in Working Condition?</label>
<select class='form-control' name='q1' required>
<option value=''>Select</option>
<option value='Yes'>Yes</option>
<option value='No'>No</option></select><br>
</div>
<div class="col-md-4">
<label>What kind of damage has happened?</label>
<select class='form-control' name='q2' required>
<option value=''>Select</option>
<option value='Screen Damaged'>Screen Damaged</option>
<option value='Frame Damaged'>Frame Damaged</option>
<option value='Screen Bend'>Screen Bend</option>
</select><br>
</div>
<div class="col-md-4">
<label>How did the phone fall down?</label>
<input type='text' class='form-control' name='q3' required placeholder='How did the phone fall down?'><br>
</div>
<div class="col-md-4">
<label>Is there any water drop?</label>
<select class='form-control' name='q4' required>
<option value=''>Select</option>
<option value='Yes'>Yes</option>
<option value='No'>No</option>
</select><br>
</div>
<div class="col-md-4">
<label>How old is the phone?</label>
<input type='text' class='form-control' name='q5' required placeholder='How old is the phone?'><br>
</div>
<div class="col-md-4">
<label>Has the screen been changed before?</label>
<select class='form-control' name='q6' required>
<option value=''>Select</option>
<option value='Yes'>Yes</option>
<option value='No'>No</option>
</select><br>
</div>
<div class="col-md-4">
<label>Any other issue with the phone?</label>
<input type='text' class='form-control' name='q7' required placeholder='Any other issue with the phone?'><br>
</div>
<div class="col-md-4"></div>
<div class="col-md-4">
<label>Clicking this button will create a new order</label><br>
<input type="submit" class="btn btn-primary" value="Confirm Order">
</div>
</div>
</div>
</div>-->
</form>
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

<script src="{{ asset('assets\plugins\jquery-step\jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets\js\custom\custom-form-wizard.js') }}"></script>

<script src="{{ asset('assets\plugins\pnotify\js\pnotify.custom.min.js') }}"></script>
<script src="{{ asset('assets\plugins\sweet-alert2\sweetalert2.min.js') }}"></script>
<!-- Core js -->
<script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
