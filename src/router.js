import Vue from 'vue'
import Router from 'vue-router'
// import Home from './views/Home.vue'
// import Results from './views/Results.vue'
import Main from './views/mainContent.vue'
import Admin from './views/admin/login.vue'
import Products from './views/admin/products.vue'
import Motocycles from './views/products/motocycles.vue'
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
      path: '/motocycles',
      name: 'Motocycles',
      component: Motocycles
    },
    {
      path: '/delete',
      name: 'Motocycles',
      component: Motocycles1
    },
    // {
    //   path:  '/post/:postId/:postName/:postOccupation/:postEmail/:postBio/edit',
    //   component: Patch,
    //   props: true
    // }
  ]
})
