<template>
  <el-container>
    <el-header>
      <div class="nav-left">
        <el-tooltip content="logo" placement="bottom">
            <i class="el-icon-setting"></i>
        </el-tooltip>
        <el-tooltip content="XX图书管理控制台" placement="bottom">
           <span>XX管理控制台</span>
        </el-tooltip>
      </div>
      <div class="nav-right">
        <el-tooltip content="通知" placement="left">
          <div class="notify">
            <i class="el-icon-bell"></i>
          </div>
        </el-tooltip>
       
        <el-dropdown trigger="click">
          <span class="el-dropdown-link">
            <!-- <div class="avatar"> -->
              <img src="" alt="">
            <!-- </div> -->
          </span>
        <el-dropdown-menu slot="dropdown">
            <el-dropdown-item>首页</el-dropdown-item>
            <el-dropdown-item>个人资料</el-dropdown-item>
            <el-dropdown-item>设置</el-dropdown-item>
            <el-dropdown-item>退出登录</el-dropdown-item>
        </el-dropdown-menu>
        </el-dropdown>
      </div>
    </el-header>
    <el-container>
     <el-card shadow="hover">
        <el-aside>
        <el-radio-group v-model="isCollapse">
          <el-radio-button :label="false">展开</el-radio-button>
          <el-radio-button :label="true">收起</el-radio-button>
        </el-radio-group>
        <el-menu default-active="1-4-1" @open="handleOpen()" @close="handleClose()" :collapse="isCollapse" style="margin-bottom: 20px;">
          <el-submenu index="1">
            <template slot="title">
              <i class="el-icon-location"></i>
              <span slot="title">用户管理</span>
            </template>
            <el-menu-item-group>
              <span slot="title">超级用户</span>
              <el-menu-item index="1-1">选项1</el-menu-item>
            </el-menu-item-group>
            <el-menu-item-group title="普通用户">
              <el-menu-item index="1-3">选项3</el-menu-item>
            </el-menu-item-group>
            <el-submenu index="1-4">
              <span slot="title">选项四</span>
              <el-menu-item index="1-4-1">选型1</el-menu-item>
            </el-submenu>
          </el-submenu>
           <el-submenu index="2">
            <template slot="title">
              <i class="el-icon-setting"></i>
              <span slot="title">图书管理</span>
            </template>
            <el-menu-item-group>
              <span slot="title">分组一</span>
              <el-menu-item index="2-1">选项1</el-menu-item>
            </el-menu-item-group>
            <el-menu-item-group title="分组2">
              <el-menu-item index="2-3">选项3</el-menu-item>
            </el-menu-item-group>
            <el-submenu index="2-4">
              <span slot="title">选项四</span>
              <el-menu-item index="2-4-1">选型1</el-menu-item>
            </el-submenu>
          </el-submenu>
            <el-submenu index="3">
            <template slot="title">
              <i class="el-icon-menu"></i>
              <span slot="title">借阅管理</span>
            </template>
            <el-menu-item-group>
              <span slot="title">借阅图书</span>
              <el-menu-item index="3-1">选项1</el-menu-item>
            </el-menu-item-group>
            <el-menu-item-group title="归还图书">
              <el-menu-item index="3-3">选项3</el-menu-item>
            </el-menu-item-group>
            <el-submenu index="3-4">
              <span slot="title">选项四</span>
              <el-menu-item index="3-4-1">选型1</el-menu-item>
            </el-submenu>
          </el-submenu>
        </el-menu>
      </el-aside>
     </el-card>
      <el-main>
        main</el-main>
    </el-container>
  </el-container>

</template>

<script>
 export default {
   data () {
     return {
       isCollapse: true
     }
   },

   methods: {
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      }
   }
 }
</script>

<style lang="scss" scoped>
.el-header {
  display: flex;
  justify-content: space-between;
  color: #fff;
  align-items: center;
  background-color: #38f;

  .nav-left {
    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 25px;

    i {
      font-weight: bold;      
    }

    span {
      display: block;

      padding-left: 40px;
      font-size: 20px;
      font-weight: normal;
    }
  }

  .nav-right {
    display: flex;
    // justify-content: flex-end;
    align-items: center;

    .notify {
      display: flex;
      justify-content: center;
      padding-right: 50px;

      font-size: 25px;
      font-weight: 700;
    }

    img {
      display: block;

      width: 46px;
      height: 46px;
      border-radius: 23px;

      background-color: #eee;
    }
  }
}

.el-aside {
  margin-top: 20px;
}

</style>
