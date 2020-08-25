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
<h5 class="modal-title" id="EditModalLabel">Edit Dealer</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal()">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="" @submit.prevent="updateDealer()">
<div class="modal-body">
<div class="form-group">
<label>Dealer Name</label>
<input type="text" class="form-control" name="dealer_name" placeholder="Dealer Name" v-model="dealer.dealer_name" required>
</div>
<div class="form-group">
<label>Phone Number</label>
<input type="number" class="form-control" name="phone_number" placeholder="Phone Number" v-model="dealer.phone_number" required>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email" placeholder="Email address" v-model="dealer.email" required>
</div>
<div class="form-group">
<label>Address</label>
<input type="text" class="form-control" name="address" placeholder="Address" v-model="dealer.address" required>
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
<h5 class="modal-title" id="CreateModalLabel">Create New Dealer</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal()">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="" @submit.prevent="addDealer">
<div class="modal-body">
<div class="form-group">
<label>Dealer Name</label>
<input type="text" class="form-control" name="dealer_name" placeholder="Dealer Name" v-model="dealer.dealer_name" required>
</div>
<div class="form-group">
<label>Phone Number</label>
<input type="number" class="form-control" name="phone_number" placeholder="Phone Number" v-model="dealer.phone_number" required>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email" placeholder="Email address" v-model="dealer.email" required>
</div>
<div class="form-group">
<label>Address</label>
<input type="text" class="form-control" name="address" placeholder="Address" v-model="dealer.address" required>
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
<h5 class="card-title">Dealers</h5>
</div>
<div class="card-body row">
<div class="card m-b-30 col-6" v-for="dealer in dealers" v-bind:key="dealer.id">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-7">
                <h4 class="card-title font-16">Name: {{ dealer.dealer_name }}</h4>
                <h5 class="mb-0 font-12">{{ dealer.phone_number }} | {{ dealer.email }} | {{ dealer.address }}</h5>
            </div>
            <div class="col-5">
                <button class="btn btn-round btn-danger-rgba pull-right" @click="deleteDealer(dealer.id)"><i class="feather icon-trash-2"></i></button>
                <button class="btn btn-round btn-warning-rgba pull-right" @click="editDealer(dealer)"><i class="feather icon-edit"></i></button>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row align-items-center">
            <div class="col-12">
                <span class="font-13">{{ moment(dealer.updated_at).fromNow() }}</span>
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
<li class="page-link text-dark">{{ dealers.length }} records total</li>
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
  dealers:[],
  dealer:{
    id:'',
    dealer_name:'',
    phone_number:'',
    address:'',
    email:''
  },
  moment: moment,
  dealer_id:'',
  pagination:{},
  edit: false,
  modalShow: false
}
},
created(){
  //this.interval = setInterval(() => this.fetchCoupons(), 1000);
  this.fetchDealers();
},
methods:{
fetchDealers(page_url){
  let vm = this;
  page_url = page_url || '/api/dealers'
  fetch(page_url)
  .then(res => res.json())
  .then(res => {
  this.dealers = res.data;
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
deleteDealer(id){
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
    fetch(`api/dealers/${id}`, {
      method: 'delete'
    })
    .then(res=>res.json())
    .then(data=>{
      this.fetchDealers();
      this.clearForm();
      new PNotify( {
            title: 'Dealer Deleted!', text: 'Dealer was removed successfully!', type: 'danger'
        });
    })
    .catch(err => console.log(err));
  } else {
    swal("Your dealer info is safe!");
  }
});
},
updateDealer(){
  var id = this.dealer.id;
  fetch(`api/dealers/${id}` ,{
    method: 'put',
    body: JSON.stringify(this.dealer),
    headers:{
      'content-type': 'application/json'
    }
  })
  .then(res=>res.json())
  .then(data=>{
    new PNotify( {
          title: 'Dealer Updated!', text: 'Dealer updated successfully!.', type: 'primary'
      });
    this.fetchDealers();
    this.clearForm();
  })
  .catch(err => console.log(err));
},
addDealer(){
    //alert(this.dealer.dealer_name);
    fetch('api/dealers',{
    method: 'post',
    body: JSON.stringify(this.dealer),
    headers:{
      'content-type': 'application/json'
    }
    })
    .then(res=>res.json())
    .then(data=>{
      new PNotify( {
            title: 'Dealer Inserted!', text: 'Dealer added successfully!.', type: 'success'
        });
      this.fetchDealers();
      this.clearForm();
      this.modalShow = false;
    })
    .catch(err => console.log(err));
},
editDealer(dealer){
  this.edit = true;
  this.dealer.id               = dealer.id;
  this.dealer.dealer_id        = dealer.id;
  this.dealer.dealer_name      = dealer.dealer_name;
  this.dealer.phone_number     = dealer.phone_number;
  this.dealer.email            = dealer.email;
  this.dealer.address          = dealer.address;
},
clearForm(){
  this.edit = false;
  this.dealer.id               = '';
  this.dealer.dealer_id        = '';
  this.dealer.dealer_name      = '';
  this.dealer.phone_number     = '';
  this.dealer.email            = '';
  this.dealer.address          = '';
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
