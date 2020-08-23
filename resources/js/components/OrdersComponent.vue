<template>
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
          <!-- Start col -->
          <div class="col-lg-12">
              <div class="card m-b-30">
                  <div class="card-header">
                      <div class="widgetbar pull-right">
                          <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button>
                      </div>
                      <h5 class="card-title">Data Export Table</h5>
                  </div>
                  <div class="card-body">
                      <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                      <div class="table-responsive">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Position</th>
                                  <th>Office</th>
                                  <th>Age</th>
                                  <th>Start date</th>
                                  <th>Salary</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>Tiger Nixon</td>
                                  <td>System Architect</td>
                                  <td>Edinburgh</td>
                                  <td>61</td>
                                  <td>2011/04/25</td>
                                  <td>$320,800</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <!-- End col -->
      </div>
      <!-- End row -->
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
