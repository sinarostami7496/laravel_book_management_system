<template>
<section>
  <!-- 编辑图书 -->
  <el-dialog title="编辑图书" :visible.sync="centerDialogVisible"  width="40%">
    <el-form>
      <el-form-item label="isbn10">
        <el-input placeholder="请输入isbn10" style="width:300px;"></el-input>
      </el-form-item>

      <el-form-item label="isbn13" >
        <el-input placeholder="请输入isbn13" style="width:300px;"></el-input>
      </el-form-item>
      
      <el-form-item label="图书名" >
        <el-input placeholder="请输入书名" style="width:300px;"></el-input>
      </el-form-item>

     <el-form-item label="图书状态">
      <el-radio-group >
        <el-radio label="已借出"></el-radio>
        <el-radio label="未借出"></el-radio>
      </el-radio-group>
    </el-form-item>

     <el-form-item label="出版商" >
        <el-input placeholder="请输入出版商" style="width:300px;"></el-input>
      </el-form-item>
    </el-form>
    <span slot="footer" class="dialog-footer">
    <el-button @click="centerDialogVisible = false">取 消</el-button>
    <el-button type="primary" @click="centerDialogVisible = false">确 定</el-button>
  </span>
  </el-dialog>
<!-- 新增图书 -->
   <el-dialog title="新增图书" :visible.sync="centerDialogVisible"  width="40%">
    <el-form>
      <el-form-item label="isbn10">
        <el-input placeholder="请输入isbn10" style="width:300px;"></el-input>
      </el-form-item>

      <el-form-item label="isbn13" >
        <el-input placeholder="请输入isbn13" style="width:300px;"></el-input>
      </el-form-item>
      
      <el-form-item label="图书名" >
        <el-input placeholder="请输入书名" style="width:300px;"></el-input>
      </el-form-item>

     <el-form-item label="图书状态">
      <el-radio-group >
        <el-radio label="已借出"></el-radio>
        <el-radio label="未借出"></el-radio>
      </el-radio-group>
    </el-form-item>

     <el-form-item label="出版商" >
        <el-input placeholder="请输入出版商" style="width:300px;"></el-input>
      </el-form-item>
    </el-form>
    <span slot="footer" class="dialog-footer">
    <el-button @click="centerDialogVisible = false">取 消</el-button>
    <el-button type="primary" @click="centerDialogVisible = false">确 定</el-button>
  </span>
  </el-dialog>

  <span> 图书管理</span>
   <el-col :span="24">
     <el-form :inline="true" class="eform">
       <el-input placeholder="请输入图书ID" class="einput"></el-input>
       <el-button class="ebutton"> <i class="el-icon-search">查询</i></el-button>
       <el-button class="ebutton" @click="handleAdd()">新增</el-button>
     </el-form>
   </el-col>
   <!-- 列表 -->
   <el-table highlight-current-row ref="mutipleTable" :data="bookData" tooltip-effect="dark" style="width:100%" @select-change="handleSelectChange()" :default-sort="{prop: 'sno',order: 'descending'}" fit>
     <el-table-column type="selection"  width="55"></el-table-column>
     <el-table-column type="index" width="60"></el-table-column>
     <el-table-column prop="id" label="ID"  sortable width="120"></el-table-column>
     <el-table-column prop="isbn10" label="ISBN 10" sortable width="180"></el-table-column>
     <el-table-column prop="isbn13" label="ISBN 13" sortable width="180"></el-table-column>
     <el-table-column prop="title" label="书名"  sortable width="180"></el-table-column>
     <el-table-column prop="is_store" label="图书状态"  sortable width="150"></el-table-column>
     <el-table-column prop="publisher" label="出版商"  sortable width="180"></el-table-column>
     <el-table-column   label="详情" type="expand"></el-table-column>
     <el-table-column label="操作" class="operation" align="right">
       <template slot-scope="scope">
         <el-button size="small"  @click="handleEdit(scope.$index, scope.row)">编辑 </el-button>
         <el-button size="small"  type="danger" class="deleteButton" @click="handleDel(scope.$index, scope.row)">删除</el-button>
       </template>
     </el-table-column>
   </el-table>

  <!-- footer -->
  <el-col :sapn="24" class="toolbar">
    <el-button type="danger" @click="handleMassDelete()">批量删除</el-button>
    <el-pagination @size-change="handleSizeChange()" @current-change="handleCurrentChange()" :current-page="currentPage1" :page-sizes="[10, 20, 30, 40]" :page-size="10"  layout="total, sizes, prev, pager, next, jumper" :total="40" style="float: right; "></el-pagination>
  </el-col>

</section>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      input1: "",
      centerDialogVisible: false,
      currentPage1: 4,
      bookData: [],
      sizeForm: {
        name: "",
        region: "",
        date1: "",
        date2: "",
        delivery: false,
        type: [],
        resource: "",
        desc: ""
      }
    };
  },

  methods: {
    onSubmit() {},

    handleEdit() {
      this.centerDialogVisible = !this.centerDialogVisible;
    },

    handleAdd() {
      this.centerDialogVisible = !this.centerDialogVisible;
    },

    handleDel() {
      this.$confirm("确认删除选中的记录吗?", "温馨提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
        center: true
      })
        .then(() => {
          this.$message({
            type: "success",
            message: "删除成功!"
          });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "已取消删除"
          });
        });
    },

    handleCurrentChange() {},

    handleSizeChange() {},

    handleMassDelete() {
      this.$confirm("确认删除选中的记录吗?", "温馨提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
        center: true
      })
        .then(() => {
          this.$message({
            type: "success",
            message: "删除成功!"
          });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "已取消删除"
          });
        });
    }
  },

  async created() {
    //  axios.get('/api/book')
    //    .then((response) => {
    //    console.log(response)
    //    }

    let data = await axios.get("/api/book").then(res => res.data);

    this.bookData = data.books;
  }
};
</script>

<style lang="scss" scoped>
.el-col {
  margin-top: 10px;
  height: 60px;
  background-color: #eee;

  .eform {
    // display: flex;
    // align-items: center;

    margin-top: 10px;

    .einput {
      margin-left: 10px;
      width: 20%;
    }

    .ebutton {
      margin-left: 10px;
      background-color: #388ab7;
      color: #fff;
    }
  }

  // .deleteButton {
  //   background-color: #388ab7;
  // }

  .operation {
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }

  .toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding-left: 10px;

    // .el-button {
    //    background-color: #388ab7;
    // }
  }
}
</style>
