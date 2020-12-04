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
      <input type='hidden' value="{{ date('Y-m-d H:i:s') }}" name="start_timestamp">
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
      <input type="file" name="post-image" class="form-control" required><br>
      IMEI Number:
      <input type="text" name="imei" class="form-control" placeholder="IMEI Number" required><br>
      Payment Type:
      <select class="form-control" name="payment_type" required>
        <option value="">Select</option>
        <option value="Cash">Cash</option>
        <option value="Card">Card</option>
        <option value="UPI">UPI</option>
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
<form action="/cancelmyorder/{{ $order->id }}" method="post" class="col-md-12">
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
