@if(!empty($order))
<!-- Pick up Phone -->
<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Upload Phone image before servicing</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/upload-pre-image/{{ $order->id }}" method="post" class="col-md-12" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
    <div class='row'>
      <input type="file" class="form-control" name="pre-image" accept=".jpg, jpeg, png" required>
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
<!-- Addon Products -->
<div class="modal fade addonproduct" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Include Addon Products</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/addonproduct/{{ $order->id }}" method="post" class="col-md-12">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
    <div class='row'>
      <select class="form-control" name="addonproduct" required>
          <option value="">Select Addon Products</option>
        @foreach($addons as $addon)
          <option value="{{ $addon->id }}">{{ $addon->name }} - &#8377; {{ $addon->price }}</option>
        @endforeach
      </select>
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
<!-- Start Tracking -->
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Start Tracking</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/start_tracking/{{ $order->id }}" method="post" class="col-md-12">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
    <div class='row'>
      Would you like to start tracking now?
    </div>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary" name="start_track">Yes</button>
  </div>
</form>
</div>
</div>
</div>
<!-- Complete Order -->
<div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Complete this Order</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/complete-order/{{ $order->id }}" method="post" class="col-md-12" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
    <div class='row'>
      Upload Phone image after servicing:
      <input type="file" name="post-image" class="form-control" accept=".jpg, jpeg, png" required><br>
      IMEI Number:
      <input type="text" name="imei" class="form-control" placeholder="IMEI Number" onkeypress="return isNumberKey(event)"
      minlength="16" maxlength="16" required><br>
      Payment Type:
      <select class="form-control" name="payment_type" required>
        <option value="">Select</option>
        <option value="Cash">Cash</option>
        <option value="Card">Card</option>
        <option value="UPI">UPI</option>
      </select><br>
      Include Tempered glass:
      <select class="form-control" name="tg" required>
        <option value="">Select</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select><br>
      If Applicable, Company Name:
      <input type="text" class="form-control" name="company_name" placeholder="Company Name"><br>
      Company GST:
      <input type="text" class="form-control" name="company_gst" placeholder="Company GST"><Br>
      Company Address:
      <input type="text" class="form-control" name="company_address" placeholder="Company Address"><br>
      Notes:
      <input type="text" class="form-control" name="notes" placeholder="Notes"><br>
    </div>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary" name="start_track">Yes</button>
  </div>
</form>
</div>
</div>
</div>
<!-- Pick Up Phone Modal -->
<div class="modal fade bd-example-modal-lg4" tabindex="-1" role="dialog" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Pickup this device</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="/pickup/{{ $order->id }}" method="post" class="col-md-12">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
    <div class='row'>
      Enter Pickup Reason:
      <input type="text" class="form-control" placeholder="Pickup Reason" name="pickup_reason">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<form action="/cancelmyorder/{{ $order->id }}" method="post" class="col-md-12">
  {{ csrf_field() }}
  {{ method_field('put')}}
  <div class="modal-body">
    <div class='row'>
      <select class="form-control" name="main_reason" id="type" required>
        <option value="">Select Options</option>
        <option value="Cant Do order from Our side">Cant Do order from Our side</option>
        <option value="Customer Information Wrong">Customer Information Wrong</option>
        <option value="Customer Wants to cancel">Customer Wants to cancel</option>
        <option value="Mother board issues">Mother board issues</option>
        <option value="Other City">Other City</option>
        <option value="Other Reason">Other Reason</option>
        <option value="Test Order">Test Order</option>
      </select><br><br><br>
      <select class='form-control' name='sub_reason' id='subtype'>
        <option value=''>Select Options</option>
      </select><br><br><br>
      <input type="text" class="form-control" placeholder="Enter Reason for Cancellation" name="cancel_reason" required>
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
<script>
$(document).ready(function () {
$("#type").change(function () {
var val = $(this).val();
if (val == "Other City") {
$("#subtype").html("<option value='Madurai'>Madurai</option><option value='Coimbatore'>Coimbatore</option><option value='Bangalore'>Bangalore</option><option value='Delhi'>Delhi</option><option value='Others'>Others</option>");
} else if (val == "Cant Do order from Our side") {
$("#subtype").html("<option value='Price too low mistake in pricing'>Price too low mistake in pricing</option><option value='Stock not available'>Stock not available</option><option value='Distance too Long'>Distance too Long</option>");
} else if (val == "Customer Information Wrong") {
$("#subtype").html("<option value='Customer booked wrong model'>Customer booked wrong model</option><option value='Double order or duplicate order'>Double order or duplicate order</option><option value='Wrong number'>Wrong number</option><option value='Fake Order'>Fake Order</option>");
} else if (val == "Customer Wants to cancel") {
$("#subtype").html("<option value='Customer not interested'>Customer not interested</option><option value='Sent a mail for cancellation'>Sent a mail for cancellation</option><option value='Price issue. Stock price is too high'>Price issue. Stock price is too high</option><option value='Customer want original screen'>Customer want original screen</option><option value='Customer not picking up calls / Customer not available'>Customer not picking up calls / Customer not available</option><option value='Customer got better deal'>Customer got better deal</option><option value='Our Team did not respond'>Our Team did not respond</option><option value='Urgent for Customer'>Urgent for Customer</option>");
} else if (val == "Mother board issues") {
$("#subtype").html("<option value='Phone Dead Condition'>Phone Dead Condition</option><option value='Mother board bend'>Mother board bend</option><option value='Mother board Fault'>Mother board Fault</option>");
}
});
});
</script>
@endif
