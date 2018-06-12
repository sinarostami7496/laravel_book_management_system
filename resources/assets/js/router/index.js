import Vue from 'vue'
import Router from 'vue-router'
// 管理页面布局
import Admin from '../pages/admin'
// 管理界面子路由
import AdminHome from '../pages/admin/home'
import AdminUser from '../pages/admin/user'
import AdminTable from '../pages/admin/table'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/admin/admin',
      component: Admin
    },
    {
      path: '/admin',
      component: Admin,
      children: [
        {
          path: '',
          name: 'Home',
          component: AdminHome
        },

        {
          path: 'user',
          name: 'User',
          component: AdminUser
        },

        {
          path: 'table',
          name: 'Table',
          component: AdminTable
        }
      ]
    }
  ]
})