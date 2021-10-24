import Vue from 'vue'
import Router from 'vue-router'
// import Home from './views/Home.vue'
// import Results from './views/Results.vue'
import Main from './views/mainContent.vue'
import Admin from './views/admin/login.vue'
import Products from './views/admin/products.vue'
import Motocycles from './views/products/motocycles.vue'
import Spareparts from './views/products/spareparts.vue'
import Cart from './views/cart/cart.vue'
import Contact from './views/contact/contact_us.vue'
import Services from './views/services/services.vue'
import Motocycles1 from './views/admin/motocycles.vue'

Vue.use(Router)

export default new Router({
  routes: [
    
    {
      path: '/',
      name: 'Main',
      component: Main
    },
    {
      path: '/admin',
      name: 'Admin',
      component: Admin
    },
    {
      path: '/products',
      name: 'Products',
      component: Products
    },
    {
      path: '/cart',
      name: 'Cart',
      component: Cart
    },
    {
      path: '/motocycles',
      name: 'Motocycles',
      component: Motocycles
    },
    {
      path: '/spareparts',
      name: 'Spareparts',
      component: Spareparts
    },
    {
      path: '/delete',
      name: 'Motocycles',
      component: Motocycles1
    },
    {
      path:  '/post/:name/Motocycle',
      name: 'Motocycles',
      component: Motocycles,
      props: true
    },
    {
      path:  '/post/:name/Spareparts',
      name: 'spareparts',
      component: Spareparts,
      props: true
    },
    {
      path:  '/md/:cid/cart',
      name: 'Cart',
      component: Cart,
      props: true
    },
    {
      path:  '/contact',
      name: 'Contact',
      component: Contact,
      props: true
    },
    {
      path:  '/services',
      name: 'Services',
      component: Services,
      props: true
    }
    // {
    //   path:  '/post/:postId/:postName/:postOccupation/:postEmail/:postBio/edit',
    //   component: Patch,
    //   props: true
    // }
  ]
})
