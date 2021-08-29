import Vue from 'vue'
import Router from 'vue-router'
// import Home from './views/Home.vue'
// import Results from './views/Results.vue'
import Main from './views/mainContent.vue'
import Admin from './views/admin/login.vue'
// import Patch from './views/patch.vue'
// import Home1 from '../demo/docs/HomePage'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/admin',
      name: 'Admin',
      component: Admin
    },
    {
      path: '/',
      name: 'Main',
      component: Main
    },
    // {
    //   path:  '/post/:postId/:postName/:postOccupation/:postEmail/:postBio/edit',
    //   component: Patch,
    //   props: true
    // }
  ]
})
