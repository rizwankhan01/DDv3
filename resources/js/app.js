//require('./bootstrap');

//window.Vue = require('vue');

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('orders', require('./components/OrdersComponent.vue').default);
//Vue.component('coupons', require('./components/CouponsComponent.vue').default);
//Vue.component('customers', require('./components/CustomersComponent.vue').default);
//Vue.component('dealers', require('./components/DealersComponent.vue').default);

//const app = new Vue({
//    el: '#app',
//});
require('./bootstrap');

import Vue from 'vue'

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import routes from './routes'

import App from './components/App.vue'

const app = new Vue({
    el: '#app',
    components: { App },
    router: new VueRouter(routes)
})
