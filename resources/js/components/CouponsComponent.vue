<template>
<div class="contentbar mt-100">
<!-- Start row -->
<div class="row">
<!-- Start col -->
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-header">
<div class="widgetbar pull-right">
<button class="btn btn-primary-rgba" @click="showModal()"><i class="feather icon-plus mr-2"></i>New</button>
<div class="modal fade show" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true"
v-bind:style="[ edit ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="EditModalLabel">Edit Coupon</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal()">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="" @submit.prevent="updateCoupon()">
<div class="modal-body">
<div class="form-group">
<label>Coupon Name</label>
<input type="text" class="form-control" name="coupon" placeholder="Coupon Name" v-model="coupon.name" required>
</div>
<div class="form-group">
<label>Amount</label>
<input type="number" class="form-control" name="amount" placeholder="Amount" v-model="coupon.amount" required>
</div>
<div class="form-group">
<label>Validity Till</label>
<input type="date" class="form-control" name="validity" v-model="coupon.validity" required>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary"  @click="closeModal()" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>
</div>
<div class="modal fade show" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true"
v-bind:style="[ modalShow ? {'display':'block'} : {'display':'none'} ]">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="CreateModalLabel">Create New Coupon</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal()">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="" @submit.prevent="addCoupon">
<div class="modal-body">
<div class="form-group">
<label>Coupon Name</label>
<input type="text" class="form-control" name="coupon" placeholder="Coupon Name" v-model="coupon.name" required>
</div>
<div class="form-group">
<label>Amount</label>
<input type="number" class="form-control" name="amount" placeholder="Amount" v-model="coupon.amount" required>
</div>
<div class="form-group">
<label>Validity Till</label>
<input type="date" class="form-control" name="validity" v-model="coupon.validity" required>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal()">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>
</div>
</div>
<h5 class="card-title">Coupons</h5>
</div>
<div class="card-body row">
<div class="card m-b-30 col-6" v-for="coupon in coupons" v-bind:key="coupon.id">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-7">
                <h4 class="card-title font-14">Coupon Code: {{ coupon.name }}</h4>
                <h5 class="mb-0">{{ coupon.amount }} <i class='fa fa-rupee'></i> | <small>Valid Till:</small> {{ coupon.validity }}</h5>
            </div>
            <div class="col-5">
                <button class="btn btn-round btn-danger-rgba pull-right" @click="deleteCoupon(coupon.id)"><i class="feather icon-trash-2"></i></button>
                <button class="btn btn-round btn-warning-rgba pull-right" @click="editCoupon(coupon)"><i class="feather icon-edit"></i></button>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row align-items-center">
            <div class="col-12">
                <span class="font-13">{{ moment(coupon.updated_at).fromNow() }}</span>
            </div>
        </div>
    </div>
</div>
</div>
<nav aria-label="Page navigation">
<ul class="pagination">
<li v-bind:class="[{disabled: !pagination.prev_page_url}]">
<a class="btn btn-sm" href="#" aria-label="Previous" @click="fetchCoupons(pagination.prev_page_url)">
<span aria-hidden="true">&laquo;</span>
</a>
</li>
<li class="disabled"><a href="#" class="page-link text-dark">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
<li v-bind:class="[{disabled: !pagination.next_page_url}]">
<a class="btn btn-sm" href="#" aria-label="Next" @click="fetchCoupons(pagination.next_page_url)">
<span aria-hidden="true">&raquo;</span>
</a>
</li>
<li class="page-link text-dark">{{ coupons.length }} records total</li>
</ul>
</nav>
</div>
</div>
<!-- End col -->
</div>
<!-- End row -->
</div>
</template>
<script>
var moment = require('moment');
export default{
data(){
return{
  coupons:[],
  coupon:{
    id:'',
    name:'',
    amount:'',
    validity:'',
  },
  moment: moment,
  coupon_id:'',
  pagination:{},
  edit: false,
  modalShow: false
}
},
created(){
  this.interval = setInterval(()=> this.fetchCoupons(), 10000);
},
methods:{
fetchCoupons(page_url){
  let vm = this;
  page_url = page_url || '/api/coupons'
  fetch(page_url)
  .then(res => res.json())
  .then(res => {
  this.coupons = res.data;
  vm.makePagination(res.meta, res.links);
  })
  .catch(err => console.log(err));
},
makePagination(meta, links){
  let pagination = {
  current_page: meta.current_page,
  last_page: meta.last_page,
  next_page_url: links.next,
  prev_page_url: links.prev
  }
  this.pagination = pagination;
},
deleteCoupon(id){
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger m-l-10',
    buttonsStyling: false
})
.then((willDelete) => {
  if (willDelete) {
    fetch(`api/coupons/${id}`, {
      method: 'delete'
    })
    .then(res=>res.json())
    .then(data=>{
      this.fetchCoupons();
      this.clearForm();
      new PNotify( {
            title: 'Coupon Deleted!', text: 'Coupon was removed successfully!', type: 'danger'
        });
    })
    .catch(err => console.log(err));
  } else {
    swal("Your imaginary file is safe!");
  }
});
},
updateCoupon(){
  var id = this.coupon.id;
  fetch(`api/coupons/${id}` ,{
    method: 'put',
    body: JSON.stringify(this.coupon),
    headers:{
      'content-type': 'application/json'
    }
  })
  .then(res=>res.json())
  .then(data=>{
    new PNotify( {
          title: 'Coupon Updated!', text: 'Coupon updated successfully!.', type: 'primary'
      });
    this.fetchCoupons();
    this.clearForm();
  })
  .catch(err => console.log(err));
},
addCoupon(){
    fetch('api/coupons',{
    method: 'post',
    body: JSON.stringify(this.coupon),
    headers:{
      'content-type': 'application/json'
    }
    })
    .then(res=>res.json())
    .then(data=>{
      new PNotify( {
            title: 'Coupon Inserted!', text: 'Coupon added successfully!.', type: 'success'
        });
      this.fetchCoupons();
      this.clearForm();
      this.modalShow = false;
    })
    .catch(err => console.log(err));
},
editCoupon(coupon){
  this.edit = true;
  this.coupon.id        = coupon.id;
  this.coupon.coupon_id = coupon.id;
  this.coupon.name      = coupon.name;
  this.coupon.amount    = coupon.amount;
  this.coupon.validity  = coupon.validity;
},
clearForm(){
  this.edit = false;
  this.coupon.id        = '';
  this.coupon.coupon_id = '';
  this.coupon.name      = '';
  this.coupon.amount    = '';
  this.coupon.validity  = '';
},
closeModal(){
  this.edit = false;
  this.modalShow = false;
},
showModal(){
  this.modalShow = true;
}
}
}
</script>
