<template>
  <div class="contentbar mt-100">
  <!-- Start row -->
  <div class="row">
  <!-- Start col -->
  <div class="col-lg-12">
  <div class="card m-b-30">
  <div class="card-header">
  <h5 class="card-title">Customers</h5>
  </div>
  <div class="col-12">
  <div class="card m-b-30">
      <div class="card-body">
          <div class="table">
              <table class="table table-bordered" style='width:100%'>
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="customer in customers">
                          <td><img src="assets\images\users\men.svg" class="img-fluid" width="35" alt="customer">
                          &nbsp;&nbsp;{{ customer.name }}</td>
                          <td>{{ customer.email }}</td>
                          <td>{{ customer.phone_number }}</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
  <nav aria-label="Page navigation">
  <ul class="pagination">
  <li v-bind:class="[{disabled: !pagination.prev_page_url}]">
  <a class="btn btn-sm" href="#" aria-label="Previous" @click="fetchCustomers(pagination.prev_page_url)">
  <span aria-hidden="true">&laquo;</span>
  </a>
  </li>
  <li class="disabled"><a href="#" class="page-link text-dark">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
  <li v-bind:class="[{disabled: !pagination.next_page_url}]">
  <a class="btn btn-sm" href="#" aria-label="Next" @click="fetchCustomers(pagination.next_page_url)">
  <span aria-hidden="true">&raquo;</span>
  </a>
  </li>
  <li class="page-link text-dark">{{ customers.length }} records total</li>
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
  customers:[],
  customer:{
    id:'',
    name:'',
    phone_number:'',
    email:''
  },
  moment: moment,
  customer_id:'',
  pagination:{},
  edit: false
}
},
created(){
  this.fetchCustomers();
},
methods:{
fetchCustomers(page_url){
  let vm = this;
  page_url = page_url || '/api/customers'
  fetch(page_url)
  .then(res => res.json())
  .then(res => {
  this.customers = res.data;
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
updateCustomer(){
  var id = this.customer.id;
  fetch(`api/customers/${id}` ,{
    method: 'put',
    body: JSON.stringify(this.customer),
    headers:{
      'content-type': 'application/json'
    }
  })
  .then(res=>res.json())
  .then(data=>{
    alert('Customer Updated!');
    this.fetchCustomers();
    this.clearForm();
  })
  .catch(err => console.log(err));
},
editCustomer(customer){
  this.edit = true;
  this.customer.id            = customer.id;
  this.customer.customer_id   = customer.id;
  this.customer.name          = customer.name;
  this.customer.phone_number  = customer.phone_number;
  this.customer.email         = customer.email;
},
clearForm(){
  this.edit = false;
  this.customer.id            = '';
  this.customer.customer_id   = '';
  this.customer.name          = '';
  this.customer.phone_number  = '';
  this.customer.email         = '';
},
closeModal(){
  this.edit = false;
}
}
}
</script>
