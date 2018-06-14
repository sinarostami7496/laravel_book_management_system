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
   <!-- 列表 -->
   <el-table highlight-current-row ref="mutipleTable" :data="userData" tooltip-effect="dark" style="width:100%" @select-change="handleSelectChange()" :default-sort="{prop: 'sno',order: 'descending'}">
     <el-table-column type="selection"  width="55"></el-table-column>
     <el-table-column type="index" width="60"></el-table-column>
     <el-table-column prop="sno" label="学号"  sortable width="120"></el-table-column>
     <el-table-column prop="username" label="姓名" sortable width="120"></el-table-column>
     <el-table-column prop="sex" label="性别" width="100"></el-table-column>
     <el-table-column prop="age" label="年龄"  sortable width="100"></el-table-column>
     <el-table-column prop="birth" label="生日"  sortable width="120"></el-table-column>
     <el-table-column prop="email" label="邮箱" width="180"></el-table-column>
     <el-table-column label="操作" width="180" class="operation">
       <template slot-scope="scope">
         <el-button size="small"  @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
         <el-button size="small"  type="danger" class="deleteButton" @click="handleDel(scope.$index, scope.row)">删除</el-button>
       </template>
     </el-table-column>
   </el-table>

  <!-- footer -->
  <el-col :sapn="24" class="toolbar">
    <el-button type="danger">批量删除</el-button>
    <el-pagination @size-change="handleSizeChange()" @current-change="handleCurrentChange()" :current-page="currentPage1" :page-sizes="[10, 20, 30, 40]" :page-size="10"  layout="total, sizes, prev, pager, next, jumper" :total="40" style="float: right; "></el-pagination>
  </el-col>

</section>
</template>

<script>
 export default {
   data () {
     return {
       currentPage1: 4,
       userData: [
         {
           sno: '201540292',
           username: 'summertzz',
           sex: '女',
           age: '18',
           birth: '2000-8-3',
           email: '1242355@qq.com'
         },
        {
          sno: '201540292',
          username: 'summertzz',
          sex: '女',
          age: '18',
          birth: '2000-8-3',
          email: '1242355@qq.com'
        },
        {
          sno: '201540292',
          username: 'summertzz',
          sex: '女',
          age: '18',
          birth: '2000-8-3',
          email: '1242355@qq.com'
        },
        {
          sno: '201540292',
          username: 'lsbbd',
          sex: '女',
          age: '18',
          birth: '2000-8-3',
          email: '1242355@qq.com'
        },
        {
          sno: '201540292',
          username: 'lsbbd',
          sex: '女',
          age: '18',
          birth: '2000-8-3',
          email: '1242355@qq.com'
        },
        {
          sno: '201540292',
          username: 'summertzz',
          sex: '女',
          age: '18',
          birth: '2000-8-3',
          email: '1242355@qq.com'
        }]
     }
   },

   methods: {
     handleEdit() {

     },

    handleDel() {
      
    },

    handleCurrentChange() {

    },

    handleSizeChange () {

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

  .deleteButton {
    background-color: #dd21a5;
  }

  .operation {
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }

  .toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;

    .el-button {
       background-color: #dd21a5;
    }

  }
}


</style>
