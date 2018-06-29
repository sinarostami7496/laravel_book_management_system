<template>
<div class="box">
  <div class="containers">
    <div class="headers">
      Register
    </div>
    <div class="forms">
      <el-form>
        <input class="username" placeholder="用户名"></input>
        <input class="pwd" placeholder=" 密码"></input>
         <div class="login">注册</div>
      </el-form>
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
.box {
  width: 100vw;
  height: 100vh;
  padding-top: 180px;

  background-color: #f0f0f0;

  .containers {
    margin: 0 auto;
    width: 500px;
    height: 470px;

    background-color: #fff;
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
    border-radius: 3px;

    .headers {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 60px;

      color: #b4b4b4;
      font-size: 20px;
      background-color: rgb(244, 244, 244);
    }

    .forms {
      display: flex;
      // justify-content: center;
      align-items: center;

      width: 300px;
      // height: 50px;
      // padding-top: 20px;

      .username {
        width: 430px;
        height: 65px;
        background-color: rgb(240, 240, 240);
        margin: 30px 30px;

        border: none;
      }
      .pwd {
        width: 430px;
        height: 65px;
        background-color: rgb(240, 240, 240);
        margin: 15px 30px;

        border: none;
      }

      .login {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px 30px;
        // border: none;

        width: 430px;
        height: 65px;

        background-color: rgb(33, 150, 243);
        color: #fff;
      }
    }
  }
}
</style>
