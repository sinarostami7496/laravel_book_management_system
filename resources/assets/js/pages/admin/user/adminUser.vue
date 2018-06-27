<template>
<div class="container">
    <span>管理员管理</span>
     <el-col :span="24" class="ecol">
     <el-form :inline="true" class="eform">
       <el-input placeholder="请输入管理员ID" class="einput"></el-input>
       <el-button class="ebutton"> <i class="el-icon-search">查询</i></el-button>
       <el-button class="ebutton" @click="handleAdd()">新增</el-button>
       <el-button class="ebutton" @click="insertMockData()">插入随机数据</el-button>
     </el-form>
   </el-col>
   <!-- 列表 -->
     <el-table
      :data="userData"
      :default-sort="{prop: 'id',order: 'ascending'}"
      @select-change="handleSelectChange()"
      highlight-current-row
      ref="mutipleTable"
      tooltip-effect="dark"
      style="width:100%"
      fit
   >
     <el-table-column type="selection"  width="55"></el-table-column>
     <el-table-column type="index" width="60"></el-table-column>
     <el-table-column prop="id" label="ID"  sortable width="120"></el-table-column>
     <el-table-column prop="aid" label="编号" sortable width="180"></el-table-column>
     <el-table-column prop="name" label="姓名" sortable width="180"></el-table-column>
     <el-table-column prop="password" label="密码"  sortable width="180"></el-table-column>
     <el-table-column prop="email" label="邮箱"  sortable width="150"> </el-table-column>
     <el-table-column prop="authority" label="权限"  sortable width="180"></el-table-column>
     <el-table-column label="操作" class="operation" align="right">
       <template slot-scope="scope">
         <el-button size="small"  @click="showDetail()">详情</el-button>
         <el-button size="small"  @click="handleEdit(scope.row)">编辑 </el-button>
         <el-button size="small"  type="danger" class="deleteButton" @click="handleDel(scope.row.id)">删除</el-button>
       </template>
     </el-table-column>
   </el-table>

  <!-- footer -->
  <el-footer class="toolbar">
      <el-button type="danger" @click="handleMassDelete()">批量删除</el-button>
      <el-pagination
        @size-change="handleSizeChange"
        @current-change="handleCurrentChange"
        :current-page="currentPage"
        :page-sizes="[100, 200, 300, 400]"
        :page-size="100"
        layout="total, sizes, prev, pager, next, jumper"
        :total="400">
      </el-pagination>
  </el-footer>
</div>
</template>

<script>
import userMockData from "@/data/user";

export default {
  data() {
    return {
      userData: [],
      currentPage: 1
    };
  },
  methods: {
    // 分页器
    handleSizeChange() {},
    handleCurrentChange() {},
    handleMassDelete() {},
    insertMockData() {
      console.log(userMockData);
    }
  }
};
</script>

<style lang="scss" scoped>
.container {
  span {
    display: block;
    font-weight: bold;
  }
  .ecol {
    margin-top: 10px;
    // background-clip: content-box;

    .eform {
      height: 50px;
      padding-top: 10px;
      background-color: #eee;

      .einput {
        margin-left: 10px;
        width: 20%;
      }

      .ebutton {
        margin-left: 10px;
        background-color: #2994f8;
        color: #fff;
      }
    }

    .operation {
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }
  }

  .toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;

    background-color: #eee;
  }
}
</style>
