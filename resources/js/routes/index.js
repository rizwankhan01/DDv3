import Homepage from '../pages/Homepage.vue'
import Coupons from '../pages/Coupons.vue'
import Customers from '../pages/Customers.vue'
import Dealers from '../pages/Dealers.vue'
import Models from '../pages/Models.vue'
import Brands from '../pages/Brands.vue'
import Settings from '../pages/Settings.vue'

export default{
  mode: 'history',
  routes: [
    {
      path:'/home',
      name: 'home',
      component: Homepage
    },
    {
      path:'/coupons',
      name: 'coupons',
      component: Coupons
    },
    {
      path: '/customers',
      name: 'customers',
      component: Customers
    },
    {
      path: '/dealers',
      name: 'dealers',
      component: Dealers
    },
    {
      path: '/models',
      name: 'models',
      component: Models
    },
    {
      path: '/brands',
      name: 'brands',
      component: Brands
    },
    {
      path: '/settings',
      name: 'settings',
      component: Settings
    }
  ]
}
