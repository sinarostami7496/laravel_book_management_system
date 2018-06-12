<template>
  <el-row :span="24" class="container">
    <!-- 导航栏 -->
    <el-col :span="24" class="header">
      <el-header>
        <el-tooltip content="管理控制台" placement="bottom">
          <div class="nav-left">管理控制台</div>
        </el-tooltip>
        <div class="nav-right">
            <div class="notify">
            <el-tooltip content="私信" placement="bottom">
              <i class="el-icon-bell" @click="handleMessage()"></i>
            </el-tooltip>
          </div>
          <el-dropdown trigger="click">
            <span class="el-dropdown-link">
              <el-tooltip content="用户资料" placement="bottom">
                <img src="" alt="">
              </el-tooltip>
            </span>
            <el-dropdown-menu slot="dropdown">
              <el-dropdown-item>首页</el-dropdown-item>
              <el-dropdown-item>个人资料</el-dropdown-item>
              <el-dropdown-item>设置</el-dropdown-item>
              <el-dropdown-item>
                <el-button type="text" @click="logOut()">
                  退出登录
                </el-button>
             </el-dropdown-item>
           </el-dropdown-menu>
          </el-dropdown>
          
        </div>
      </el-header>
    </el-col>
    <!-- 主体 -->
    <el-col :span="24" class="content">
      <!-- 侧边栏 -->
      <el-aside :span="6" class="aside">
        <el-menu default-active="1" @open="handleOpen()" @close="handleClose()" background-color="#4e464b" text-color="#fff" active-text-color="#dd21a5">
          <el-submenu index="1">
            <template slot="title">
              <i class="el-icon-location"></i>
              <span>用户管理</span>
            </template>
            <el-menu-item-group>
              <template slot="title">超级用户</template>
              <el-menu-item index="1-1">选项1</el-menu-item>
              <el-menu-item index="1-2">选项2</el-menu-item>
            </el-menu-item-group>
            <el-menu-item-group title="分组2">
              <el-menu-item index="1-3">选项3</el-menu-item>
            </el-menu-item-group>
            <el-submenu index="1-4">
               <template slot="title">选项4</template>
               <el-menu-item index="1-4-1">选项1</el-menu-item>
            </el-submenu>
          </el-submenu>
          <el-menu-item index="2">
            <i class="el-icon-menu"></i>
            <template slot="title">图书管理</template>
          </el-menu-item>
          <el-menu-item index="3">
            <i class="el-icon-setting"></i>
            <template slot="title">借阅管理</template>
          </el-menu-item>
        </el-menu>
      </el-aside>
      <!-- 内容 -->
      <el-main :span="18" class="main">
        <router-view>
          
        </router-view>
      </el-main>
    </el-col>
  </el-row>
</template>

<script>
export default {
  data () {
    return {

    }
  },

  methods: {
    logOut() {
      this.$confirm('确认登出系统吗?', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning',
        center: true
    }).then(() => {
      this.$message({
        type: 'success',
        message: '登出成功!'
        });
      }).catch(() => {
        this.$message({
          type: 'info',
          message: '已取消登出'
          }); 
      });
    },

    handleMessage () {
        this.$notify({
          title: '私信',
          message: '这是一条私信',
          offset: 100
        });
    },

    handleOpen() {

    },

    handleClose () {

    }
  }
}
</script>

<style lang="scss" scoped>
.container {
  position: absolute;

  width: 100vw;
  height: 100vh;

  .header {
    height: 60px;
    line-height: 60px;
    background-color: #dd21a5;
    // background-color: #4e464b;

    .el-header {
      display: flex;
      justify-content: space-between;

      .nav-left {
        color: #545c64;
        font-weight: 600;
      }

      .nav-right {
        display: flex;
        justify-content: flex-end;
        align-items: center;

        .notify {
          margin-right: 50px;
          font-size: 32px;
          font-weight: 700;
          color:#fff;
        }
        img {
          display: block;
          width: 50px;
          height: 50px;
          border-radius: 25px;
          background-color: #eee;
        }
      }
    }
  }

  .content {
    position: absolute;
    display: flex;
    top: 60px;
    left: 0;
    bottom: 0;
    width: 100vw; 

    background-color: #fff;

    .aside {
      width: 200px;
      height: 100%;
      background-color: #4e464b;
    }

    .main {
      flex-grow: 1;
      height: 100%;
    }
  }
}

</style>
