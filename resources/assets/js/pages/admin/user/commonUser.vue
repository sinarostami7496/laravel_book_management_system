<template>

<div class="container">
    <el-dialog title="编辑用户" :visible.sync="centerDialogVisible"  width="1000px">
    <el-form label-position="top">
      <el-row :gutter="30">
        <el-col :span="12">
          <el-row :gutter="20">
            <el-col :span="12">
              <el-form-item label="ID" >
                <el-input placeholder="请输入ID"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="uid" >
                <el-input  placeholder="请输入用户编号"></el-input>
              </el-form-item>
            </el-col>
            
            <el-col :span="12">
              <el-form-item label="用户名" >
                <el-input   placeholder="请输入用户名"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="邮箱" >
                <el-input   placeholder="请输入邮箱"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="注册时间" >
                <el-input   placeholder="请输入注册时间"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="居住城市编号" >
                <el-input   placeholder="请输入居住城市编号"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="头像" >
                <el-input   placeholder="请输入头像"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="居住地" >
                <el-input  placeholder="请输入居住地" type="number"></el-input>
              </el-form-item>
            </el-col>
          </el-row>
        </el-col>
      </el-row>
    </el-form>
    <span slot="footer" class="dialog-footer">
      <el-button @click="centerDialogVisible = false">取 消</el-button>
      <el-button type="primary" @click="centerDialogVisible = false">确 定</el-button>
    </span>
  </el-dialog>
    <span>普通用户管理</span>
     <el-col :span="24" class="ecol">
     <el-form :inline="true" class="eform">
       <el-input placeholder="请输入用户ID" class="einput"></el-input>
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
      @sort-change="handleSortChange"
      highlight-current-row
      ref="mutipleTable"
      tooltip-effect="dark"
      style="width:100%"
      fit
   >
     <el-table-column type="selection"  width="55"></el-table-column>
     <el-table-column type="index" width="60"></el-table-column>
     <el-table-column prop="id" label="ID"  sortable width="120"></el-table-column>
     <el-table-column prop="uid" label="用户编号" sortable width="100"></el-table-column>
     <el-table-column prop="name" label="用户名" sortable width="180"></el-table-column>
     <el-table-column prop="email" label="邮箱"  sortable width="180"></el-table-column>
     <!-- <el-table-column prop="password" label="密码"  sortable width="180"></el-table-column> -->
     <el-table-column prop="created_at" label="注册时间"  sortable width="200"> </el-table-column>
     <el-table-column prop="loc_name" label="居住城市名"  sortable width="180"></el-table-column>
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
        @size-change="e => { per_page = e; getData() }"
        @current-change="e => { page = e; getData() }"
        :current-page="page"
        :page-sizes="[15, 20, 30, 50]"
        :page-size="per_page"
        layout="total, sizes, prev, pager, next, jumper"
        :total="total">
      </el-pagination>
  </el-footer>
</div>
</template>

<script>
import Mock from "mockjs";
import userMockData from "@/data/user";
import Axios from "axios";

export default {
  data() {
    return {
      userData: [],
      page: 1,
      per_page: 15,
      sort_by: "id",
      order: "desc",
      total: 0,
      centerDialogVisible: false
    };
  },
  methods: {
    // API
    async store(user) {
      try {
        await Axios.post("/api/user", user);
      } catch (error) {
        this.$message.error(`服务端错误 ${error.response.status}`);
      }
    },
    async index(page, per_page, sort_by, order) {
      try {
        let data = await Axios.get("/api/user", {
          params: {
            page,
            per_page,
            sort_by,
            order
          }
        }).then(res => res.data);

        return data;
      } catch (error) {
        this.$message.error(`服务端错误 ${error.response.status}`);
      }
    },
    update() {},
    destroy() {},

    // 获取数据
    async getData() {
      let data = await this.index(
        this.page,
        this.per_page,
        this.sort_by,
        this.order
      );

      this.total = data.count;
      this.userData = data.users;
    },
    // 分页器
    handleSizeChange() {},
    handleCurrentChange() {},
    handleMassDelete() {},
    handleSortChange(e) {},
    handleEdit() {
      this.centerDialogVisible = !this.centerDialogVisible;
    },

    async insertMockData() {
      for (let item of userMockData) {
        item.password = "123tzz";
        item.created_at = item.created;
        item.email = Mock.mock({
          email: /\d{5,10}@(gmail\.com|qq\.com|163\.com)/
        }).email;

        await this.store(item);
      }
    },
    handleDel(id) {
      this.$confirm("确认删除选中的记录吗?", "温馨提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning"
      })
        .then(async () => {
          try {
            await axios.delete(`/api/user/${id}`);

            this.$message({
              type: "success",
              message: "删除成功!"
            });

            this.getData();
          } catch (error) {
            console.log(error.response);
          }
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "已取消删除"
          });
        });
    }
  },

  created() {
    this.getData();
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
