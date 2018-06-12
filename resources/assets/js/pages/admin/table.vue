<template>
<section>
  <span>用户管理</span>
   <el-col :span="24">
     <el-form :inline="true">
       <el-input placeholder="学号"></el-input>
       <el-button> <i class="el-icon-search">查询</i></el-button>
       <el-button>新增</el-button>
     </el-form>
   </el-col>
</section>
</template>

<script>
 export default {
   data () {
     return {

     }
   }
 }
</script>

<style lang="scss" scoped>
.el-col {
  margin-top: 10px;
  height: 60px;
  background-color: #eee;

  .el-form {
  display: flex;
  align-items: center;

  margin-top: 10px;

  .el-input {
    margin-left: 10px;
    width: 20%;
  }

  .el-button {
    margin-left: 10px;
    background-color: #dd21a5;
    color: #fff;
  }
  
}
}


</style>
