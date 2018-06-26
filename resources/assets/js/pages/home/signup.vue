<template>
  <div class="container">
    <div class="main">
      <div class="logo">
        <img src="" alt="">
      </div>
      <div class="content">
        <div class="title">注册傻帽儿图书</div>
        <div class="form">
          <div class="username">
            <input type="text" placeholder="用户名/邮箱注册">
          </div>
          <div class="pwd">
            <input type="text" placeholder="密码">
          </div>
          <div class="login">注册</div>

          <div class="hasAccount">
            已有账号? <span>登录</span>
          </div>
         
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  }
};
</script>

<style lang="scss" scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;

  width: 100vw;
  height: 100vh;
  background-color: #222;

  .main {
    width: 360px;
    height: 526px;
    border-radius: 8px;
    background-color: #fff;

    .logo {
      display: flex;
      justify-content: center;
      align-items: center;

      img {
        width: 70px;
        height: 70px;
        border-radius: 35px;
        margin-top: 40px;
        background-color: #ce329f;
      }
    }

    .content {
      margin: 17px 17px;

      width: 320px;
      height: 262px;

      .title {
        display: flex;
        justify-content: center;
        align-items: center;

        font-size: 20px;
        color: #ce329f;
      }

      .form {
        width: 100%;
        margin-top: 26px;

        .username {
          width: 100%;
          input {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 9px 20px 9px; // width: 100%;
            width: 280px;
            height: 30px;
            outline: 0;
            border: 0;
            background-color: #eee;
          }
        }

        .pwd {
          width: 100%;
          margin-top: 10px;
          input {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 9px 20px 9px;
            width: 280px;
            height: 30px;

            outline: 0;
            border: 0;
            background-color: #eee;
          }
        }
        .login {
          display: flex;
          justify-content: center;
          align-items: center;
          padding: 9px 20px 9px;
          margin-top: 20px;
          height: 30px;
          border-radius: 3px;
          background-color: #ce329f;
          color: #fff;
        }

        .hasAccount {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 35px;
          height: 20px;
          span {
            display: block;
            margin-left: 20px;
            color: #ce329f;
          }
        }
      }
    }
  }
}
</style>
