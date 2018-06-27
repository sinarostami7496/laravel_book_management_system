import Vue from "vue";
import Router from "vue-router";
// 用户界面组件
import UserHome from "@/pages/home/index";
import UserSignin from "@/pages/home/signin";
import UserSignup from "@/pages/home/signup";
import Book from "@/pages/home/book";

// 管理界面组件
import AdminHome from "@/pages/admin/index";
import AdminSignin from "@/pages/admin/signin";
import AdminBook from "@/pages/admin/book";
import AdminBorrow from "@/pages/admin/borrow";
import AdminUser from "@/pages/admin/user/index";
import AdminCommonUser from "@/pages/admin/user/commonUser";
import AdminAdminUser from "@/pages/admin/user/adminUser";

import AdminComment from "@/pages/admin/comment";

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: "/",
      name: "UserHome",
      component: UserHome
    },
    {
      path: "/signin",
      name: "/UserSignin",
      component: UserSignin
    },
    {
      path: "/signup",
      name: "/UserSignup",
      component: UserSignup
    },
    {
      path: "/book",
      name: "/Book",
      component: Book
    },
    {
      path: "/admin",
      component: AdminHome,
      children: [
        {
          path: "",
          name: "AdminHome",
          component: AdminAdminUser
        },
        {
          path: "user",
          name: "AdminUser",
          component: AdminUser,
          children: [
            {
              path: "common",
              name: "AdminCommonUser",
              component: AdminCommonUser
            },
            {
              path: "admin",
              name: "AdminAdminUser",
              component: AdminAdminUser
            }
          ]
        },
        {
          path: "book",
          name: "AdminBook",
          component: AdminBook
        },
        {
          path: "borrow",
          name: "AdminBorrow",
          component: AdminBorrow
        },
        {
          path: "comment",
          name: "AdminComment",
          component: AdminComment
        }
      ]
    },
    {
      path: "/admin/signin",
      name: "AdminSignin",
      component: AdminSignin
    }
  ]
});
