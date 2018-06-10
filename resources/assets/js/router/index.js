import Vue from 'vue'
import Router from 'vue-router'
import Home from '../pages/home'
import Admin from '../pages/admin/admin'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: Home
    },
    {
      path: '/admin/admin',
      component: Admin
    }
  ]
})