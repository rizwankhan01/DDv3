<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Orders</div>
                  <div class="card-body">
                      <table class='table table-bordered'>
                        <thead>
                          <th>Order ID</th>
                          <th>Customer</th>
                          <th>Slot Date</th>
                          <th>Slot Time</th>
                          <th>Actions</th>
                        </thead>
                        <tbody>
                          <tr v-for="order in orders" v-bind:key="order.id">
                            <td>OID: {{ order.id }}</td>
                            <td>{{ order.customer.name }}</td>
                            <td>{{ order.slot_date }}</td>
                            <td>{{ order.slot_time }}</td>
                            <td><button @click="fetchSingleOrder(order.id)" class='btn btn-sm btn-primary'>Expand</button></td>
                          </tr>
                        </tbody>
                      </table>
<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true"
 v-bind:style="[ showlist ? {'display':'block'} : {'display':'hidden'} ]">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <a @click="closeModal()">&times;</a>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
        <thead>
          <th>Item</th>
          <th>Type</th>
          <th>Price</th>
        </thead>
        <tbody>
        <tr v-for="olist in olists" v-bind:key="olist.id">
          <td>{{ olist.color_id }}</td>
          <td>{{ olist.prod_type }}</td>
          <td>{{ olist.price }}</td>
        </tr>
        </tbody>
        </table>
        <p>{{ customer.name }}<br>
        {{ customer.phone_number }}<br>
        {{ customer.email }}</p>
      </div>
    </div>
  </div>
</div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>
<script>
export default{
  data(){
    return{
      orders: [],
      olists: [],
      showlist: false,
      customer:[]
    }
  },
  created(){
    this.fetchOrders();
  },
  methods:{
    fetchOrders(){
      fetch('/api/orders')
      .then(res => res.json())
      .then(res => {
        this.orders = res.data;
      })
      .catch(err => console.log(err));
    },
    fetchSingleOrder(order_id){
      fetch('/api/orders/'+order_id)
      .then(res => res.json())
      .then(res => {
        this.olists  = res.data.olists;
        this.customer = res.data.order.customer;
        this.showlist = true;
      })
      .catch(err => console.log(err));
    },
    closeModal(){
      this.showlist = false;
      console.log(this.showlist);
    }
  }
}
</script>
