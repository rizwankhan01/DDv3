@if(!empty($order) AND !empty($screen))
<!-- Consultation Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Consultation for Order ID: #{{ $order->id }}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/ordercontrols/{{ $order->id }}" method="post">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
  <div class='row'>
  <div class='col-md-6'>
  Screen Type:<br>
  <select class='form-control' name='screen_type'>
      <option value=''>Select Screen Type</option>
      <option value='BASIC' @if($screen->prod_type=='BASIC') {{ 'selected' }} @endif>Basic</option>
      <option value='PREMIUM' @if($screen->prod_type=='PREMIUM') {{ 'selected' }} @endif>Premium</option>
  </select><br>
  <input type='hidden' value='{{ $screen->id }}' name='ol_id' hidden>
  Phone Color:<br>
  <select class="form-control" name="pcolor">
    <option value="">Select</option>
    @foreach($allcolors as $colors)
      <option value="{{ $colors->id }}" @if($screen->color_id==$colors->id){{ 'selected' }} @endif>{{ $colors->name }}</option>
    @endforeach
  </select><Br>
  Address:<BR>
  <input type='text' class='form-control' name='address' placeholder="Address" value="{{ $address->address }}"><br>
  <input type='text' class='form-control' name='area' placeholder="Area" value="{{ $address->area }}"><br>
  <input type='text' class='form-control' name='city' placeholder="City" value="{{ $address->city }}"><br>
  <input type='text' class='form-control' name='pincode' placeholder="Pincode" value="{{ $address->pincode }}"><br>
  Address Type:<br>
  <select class='form-control' name='address_type'>
  <option value=''>Select Address Type</option>
  <option value='Office' value='Office'>Office</option>
  <option value='Home' value='Home'>Home</option>
  </select><br>
  <input type='hidden' class='form-control' name='address_id' value="{{ $address->id }}" hidden>
  Appointment Date: <input type='date' class='form-control' name='date' min="{{ date('Y-m-d') }}" value="{{ $order->slot_date }}"><br>
  </div>
  <div class='col-md-6'>
  Is the phone in Working Condition?
  <select class='form-control' name='q1' required>
  <option value=''>Select</option>
  <option value='Yes'>Yes</option>
  <option value='No'>No</option></select><br>
  What kind of damage has happened?
  <select class='form-control' name='q2' required>
  <option value=''>Select</option>
  <option value='Screen Damaged'>Screen Damaged</option>
  <option value='Frame Damaged'>Frame Damaged</option>
  <option value='Screen Bend'>Screen Bend</option>
  </select><br>
  <input type='text' class='form-control' name='q3' required placeholder='How did the phone fall down?'><br>
  Is there any water drop?
  <select class='form-control' name='q4' required>
  <option value=''>Select</option>
  <option value='Yes'>Yes</option>
  <option value='No'>No</option>
  </select><br>
  <input type='text' class='form-control' name='q5' required placeholder='How old is the phone?'><br>
  Has the screen been changed before?
  <select class='form-control' name='q6' required>
  <option value=''>Select</option>
  <option value='Yes'>Yes</option>
  <option value='No'>No</option>
  </select><br>
  <input type='text' class='form-control' name='q7' required placeholder='Any other issue with the phone?'><br>
  Appointment Time:
  <select class='form-control' name='time_slot'>
  <option value=''>Select Time Slot</option>
  <option value='10:00AM to 11:30AM' @if($order->slot_time=='10:00AM to 11:30AM'){{ 'selected' }} @endif>10:00AM to 11:30AM</option>
  <option value='11:30AM to 01:00PM' @if($order->slot_time=='11:30AM to 01:00PM'){{ 'selected' }} @endif>11:30AM to 01:00PM</option>
  <option value='02:00PM to 03:30PM' @if($order->slot_time=='02:00PM to 03:30PM'){{ 'selected' }} @endif>02:00PM to 03:30PM</option>
  <option value='03:30PM to 05:00PM' @if($order->slot_time=='03:30PM to 05:00PM'){{ 'selected' }} @endif>03:30PM to 05:00PM</option>
  <option value='05:00PM to 06:30PM' @if($order->slot_time=='05:00PM to 06:30PM'){{ 'selected' }} @endif>05:00PM to 06:30PM</option>
  <option value='06:30PM to 08:00PM' @if($order->slot_time=='06:30PM to 08:00PM'){{ 'selected' }} @endif>06:30PM to 08:00PM</option>
  <option value='08:30PM to 10:00PM' @if($order->slot_time=='08:30PM to 10:00PM'){{ 'selected' }} @endif>08:30PM to 10:00PM</option>
  </select><Br>
  </div>
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
<!-- Assign Modal -->
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Assign Stock and Serviceman</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/assign/{{ $order->id }}" method="post" class="col-md-12">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
  <div class='row'>
    Service Man:
    <select class="form-control" name="serviceman" required>
      <option value="">Select</option>
      @foreach($smen as $sman)
        <option value="{{ $sman->id }}">{{ $sman->name }}</option>
      @endforeach
    </select><br>
    Dealer Name:
    <select class="form-control" name="dealer" required>
      <option value="">Select</option>
      @foreach($dealers as $dealer)
        <option value="{{ $dealer->id }}">{{ $dealer->dealer_name }}</option>
      @endforeach
    </select><br>
    Stock Price:
    <input type="number" class="form-control" name="stock_price" placeholder="Stock Price" max="{{ $screen->price }}" required>
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
<!-- Reschedule Modal -->
<div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Reschedule this Order?</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/reschedule/{{ $order->id }}" method="post" class="col-md-12">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
    <div class='row'>
      Date of Appointment:
      <input type='date' name='slot_date' class='form-control' min='{{ date('Y-m-d') }}' value="{{ $order->slot_date }}" required><br><br>
      Time Slot:
      <select class='form-control' name='slot_time' required>
        <option value=''>Select Time Slot</option>
        <option value='08:00AM to 09:30AM'>08:00AM to 09:30AM</option>
        <option value='10:00AM to 11:30AM'>10:00AM to 11:30AM</option>
        <option value='11:30AM to 01:00PM'>11:30AM to 01:00PM</option>
        <option value='02:00PM to 03:30PM'>02:00PM to 03:30PM</option>
        <option value='03:30PM to 05:00PM'>03:30PM to 05:00PM</option>
        <option value='05:00PM to 06:30PM'>05:00PM to 06:30PM</option>
        <option value='06:30PM to 08:00PM'>06:30PM to 08:00PM</option>
        <option value='08:30PM to 10:00PM'>08:30PM to 10:00PM</option>
      </select><br><br><br>
      <input type='text' class='form-control' name='reschedule_reason' placeholder='Reason for Rescheduling' required>
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
<!-- Apply Coupon Modal -->
<div class="modal fade bd-example-modal-lg4" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Apply Coupon</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/applycoupon/{{ $order->id }}" method="post" class="col-md-12">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
    <div class='row'>
      <input type="text" class="form-control" placeholder="Enter Coupon Code" name="coupon_code">
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
<!-- Cancel Order Modal -->
<div class="modal fade bd-example-modal-lg5" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Cancel this Order</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/cancelorder/{{ $order->id }}" method="post" class="col-md-12">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
    <div class='row'>
      <input type="text" class="form-control" placeholder="Enter Reason for Cancellation" name="cancel_reason">
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
@endif
