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
<h5 class="modal-title" id="EditModalLabel">Edit Brand</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal()">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="" @submit.prevent="updateBrand()">
<div class="modal-body">
<div class="form-group">
<label>Brand Name</label>
<input type="text" class="form-control" name="name" placeholder="Brand Name" v-model="brand.name" required>
</div>
<div class="form-group">
<label>Description</label>
<input type="text" class="form-control" name="description" placeholder="Description" v-model="brand.description" required>
</div>
<div class="form-group">
<label>Meta Title</label>
<input type="text" class="form-control" name="meta_title" placeholder="Meta Title" v-model="brand.meta_title" required>
</div>
<div class="form-group">
<label>Meta Description</label>
<input type="text" class="form-control" name="meta_description" placeholder="Meta Description" v-model="brand.description" required>
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
<h5 class="modal-title" id="CreateModalLabel">Create New Brand</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal()">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="" @submit.prevent="addBrand" enctype="multipart/form-data">
<div class="modal-body">
<div class="form-group">
<label>Brand Name</label>
<input type="text" class="form-control" name="name" placeholder="Brand Name" v-model="brand.name" required>
</div>
<div class="form-group">
<label>Description</label>
<input type="text" class="form-control" name="description" placeholder="Description" v-model="brand.description" required>
</div>
<div class="form-group">
<label>Meta Title</label>
<input type="text" class="form-control" name="meta_title" placeholder="Meta Title" v-model="brand.meta_title" required>
</div>
<div class="form-group">
<label>Meta Description</label>
<input type="text" class="form-control" name="meta_description" placeholder="Meta Description" v-model="brand.description" required>
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
<h5 class="card-title">Brands</h5>
</div>
<div class="card-body row">
<div class="card m-b-30 col-6" v-for="brand in brands" v-bind:key="brand.id">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-3">
              <img v-bind:src="brand.brand_logo" class="img img-responsive" style="width:100px;height:auto;">
            </div>
            <div class="col-7">
                <h4 class="card-title font-16">Name: {{ brand.name }}</h4>
                <h5 class="mb-0 font-12">{{ brand.description }}<br>{{ brand.meta_title }} | {{ brand.description }}</h5>
            </div>
            <div class="col-2">
                <button class="btn btn-round btn-danger-rgba pull-right" @click="deleteBrand(brand.id)"><i class="feather icon-trash-2"></i></button>
                <button class="btn btn-round btn-warning-rgba pull-right" @click="editBrand(brand)"><i class="feather icon-edit"></i></button>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row align-items-center">
            <div class="col-12">
                <span class="font-13">{{ moment(brand.updated_at).fromNow() }}</span>
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
<li class="page-link text-dark">{{ brands.length }} records total</li>
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
  brands:[],
  brand:{
    id:'',
    name:'',
    brand_logo:'',
    description:'',
    meta_title:'',
    meta_description:''
  },
  moment: moment,
  brand_id:'',
  pagination:{},
  edit: false,
  modalShow: false
}
},
created(){
  //this.interval = setInterval(() => this.fetchCoupons(), 1000);
  this.fetchBrands();
},
methods:{
fetchBrands(page_url){
  let vm = this;
  page_url = page_url || '/api/brands'
  fetch(page_url)
  .then(res => res.json())
  .then(res => {
  this.brands = res.data;
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
deleteBrand(id){
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
    fetch(`api/brands/${id}`, {
      method: 'delete'
    })
    .then(res=>res.json())
    .then(data=>{
      this.fetchBrands();
      this.clearForm();
      new PNotify( {
            title: 'Brand Deleted!', text: 'Brand was removed successfully!', type: 'danger'
        });
    })
    .catch(err => console.log(err));
  } else {
    swal("Your Brand info is safe!");
  }
});
},
updateBrand(){
  var id = this.brand.id;
  fetch(`api/brands/${id}` ,{
    method: 'put',
    body: JSON.stringify(this.brand),
    headers:{
      'content-type': 'application/json'
    }
  })
  .then(res=>res.json())
  .then(data=>{
    new PNotify( {
          title: 'Brand Updated!', text: 'Brand updated successfully!.', type: 'primary'
      });
    this.fetchBrands();
    this.clearForm();
  })
  .catch(err => console.log(err));
},
addBrand(){
    //alert(this.dealer.dealer_name);
    fetch('api/brands',{
    method: 'post',
    body: JSON.stringify(this.brand),
    headers:{
      'content-type': 'application/json'
    }
    })
    .then(res=>res.json())
    .then(data=>{
      new PNotify( {
            title: 'Brand Inserted!', text: 'Brand added successfully!.', type: 'success'
        });
      this.fetchBrands();
      this.clearForm();
      this.modalShow = false;
    })
    .catch(err => console.log(err));
},
editBrand(brand){
  this.edit = true;
  this.brand.id               = brand.id;
  this.brand.brand_id         = brand.id;
  this.brand.name             = brand.name;
  this.brand.brand_logo       = brand.brand_logo;
  this.brand.phone_number     = brand.description;
  this.brand.meta_title       = brand.meta_title;
  this.brand.meta_description = brand.meta_description;
},
clearForm(){
  this.edit = false;
  this.brand.id               = '';
  this.brand.brand_id         = '';
  this.brand.name             = '';
  this.brand.brand_logo       = '';
  this.brand.phone_number     = '';
  this.brand.meta_title       = '';
  this.brand.meta_description = '';
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
