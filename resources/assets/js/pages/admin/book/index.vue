<template>
<section>
  <!-- 编辑图书 -->
  <el-dialog title="编辑图书" :visible.sync="centerDialogVisible"  width="1000px">
    <el-form label-position="top">
      <el-row :gutter="30">
        <el-col :span="12">
          <el-row :gutter="20">
            <el-col :span="12">
              <el-form-item label="isbn10" >
                <el-input v-model="newBookData.isbn10" placeholder="请输入isbn10"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="isbn13" >
                <el-input v-model="newBookData.isbn13" placeholder="请输入isbn13"></el-input>
              </el-form-item>
            </el-col>
            
            <el-col :span="12">
              <el-form-item label="图书名" >
                <el-input v-model="newBookData.title" placeholder="请输入书名"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="子书名" >
                <el-input v-model="newBookData.subtitle" placeholder="请输入子书名"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="原书名" >
                <el-input v-model="newBookData.origin_title" placeholder="请输入原书名"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="别名" >
                <el-input v-model="newBookData.alt_title" placeholder="请输入别名"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="出版日期" >
                  <el-date-picker
                    v-model="newBookData.pubdate"
                    type="date"
                    placeholder="选择日期">
                 </el-date-picker>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="封装类型" >
                <el-input v-model="newBookData.binding" placeholder="请输入封装类型"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="图书价格" >
                <el-input v-model="newBookData.price" placeholder="请输入价格" type="number"></el-input>
              </el-form-item>
            </el-col>

            <el-col :span="12">
              <el-form-item label="页数" >
                <el-input v-model="newBookData.pages" placeholder="请输入页数" type="number"></el-input>
              </el-form-item>
            </el-col>

            <!-- <el-col>
              <el-form-item label="作者">
                <el-tag 
                  :key="tag"
                  v-for="tag in authorNames"
                  closable
                  :disable-transitions="false"
                  @close="handleClose(tag)"
                  > {{tag}}
                </el-tag>
                <el-input
                  class="input-new-tag"
                  v-if="inputVisible"
                  v-model="inputValue"
                  ref="saveTagInput"
                  size="small"
                  @keyup.enter.native="handleInputConfirm()"
                  @blur="handleInputConfirm()"
                ></el-input>
              <el-button
                v-else
                class="button-new-tag" 
                size="small"
                @click="showInput()"
              >+</el-button>
              </el-form-item>
            </el-col> -->



            <el-col>
              <el-form-item label="出版商" >
                <el-input v-model="newBookData.publisher" placeholder="请输入出版商"></el-input>
              </el-form-item>
            </el-col>
          </el-row>
        </el-col>

        <el-col :span="12">
          <el-row>
             <el-col>
              <el-form-item label="图书封面" >
                <el-input placeholder="" type="textarea"></el-input>
              </el-form-item>
            </el-col>

            <el-col>
              <el-form-item label="序言" >
                <el-input v-model="newBookData.catalog" placeholder="" type="textarea"></el-input>
              </el-form-item>
            </el-col>

            <el-col>
              <el-form-item label="作者简介" >
                <el-input v-model="newBookData.author_intro" placeholder="" type="textarea"></el-input>
              </el-form-item>
            </el-col>

            <el-col>
              <el-form-item label="图书简介" >
                <el-input v-model="newBookData.summary" placeholder="" type="textarea"></el-input>
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

  <span> 图书管理</span>
   <el-col :span="24">
     <el-form :inline="true" class="eform">
       <el-input placeholder="请输入图书ID" class="einput"></el-input>
       <el-button class="ebutton"> <i class="el-icon-search">查询</i></el-button>
       <el-button class="ebutton" @click="handleAdd()">新增</el-button>
       <el-button class="ebutton" @click="insertMockData()">插入随机数据</el-button>
     </el-form>
   </el-col>
   <!-- 列表 -->
   <el-table
      :data="bookData"
      :default-sort="{prop: 'id',order: 'ascending'}"
      @select-change="handleSelectChange()"
      @sort-change="e => { sort = e; getData() }"
      highlight-current-row
      ref="mutipleTable"
      tooltip-effect="dark"
      style="width:100%"
      fit
   >
     <el-table-column type="selection"  width="55"></el-table-column>
     <el-table-column type="index" width="60"></el-table-column>
     <el-table-column prop="id" label="ID"  sortable width="120"></el-table-column>
     <el-table-column prop="isbn10" label="ISBN 10" sortable width="180"></el-table-column>
     <el-table-column prop="isbn13" label="ISBN 13" sortable width="180"></el-table-column>
     <el-table-column prop="title" label="书名"  sortable width="180"></el-table-column>
     <el-table-column prop="is_store" label="借阅状态"  sortable width="150">
       <template slot-scope="scope">
         {{ !scope.row.is_store ? '已借出' : '未借出' }}
       </template>
     </el-table-column>
     <el-table-column prop="publisher" label="出版商"  sortable width="180"></el-table-column>
     <el-table-column label="操作" class="operation" align="right">
       <template slot-scope="scope">
         <el-button size="small"  @click="showDetail()">详情</el-button>
         <el-button size="small"  @click="handleEdit(scope.row)">编辑 </el-button>
         <el-button size="small"  type="danger" class="deleteButton" @click="handleDel(scope.row.id)">删除</el-button>
       </template>
     </el-table-column>
   </el-table>

  <!-- footer -->
  <el-col :sapn="24" class="toolbar">
    <el-button type="danger" @click="handleMassDelete()">批量删除</el-button>
    <el-pagination
      :current-page.sync="pagination.page"
      :page-sizes="[10, 15,20, 30]"
      :page-size="pagination.per_page" 
      :total="pagination.total"
      @size-change="size => {pagination.per_page = size; getData()}"
      @current-change="getData()"
      layout="total, sizes, prev, pager, next, jumper"
      style="float: right;"
    ></el-pagination>
  </el-col>
</section>
</template>
<script>
import MockData from "@/data";
import axios from "axios";
export default {
  data() {
    return {
      newBookData: {
        isbn10: "",
        isbn13: "",
        title: "",
        origin_title: "",
        alt_title: "",
        subtitle: "",
        // image: '',
        // images: '',
        author: [],
        translator: [],
        publisher: "",
        pubdate: "",
        rating: "",
        tags: "",
        binding: "",
        price: "",
        pages: "",
        author_intro: "",
        summary: "",
        catalog: "",
        is_store: ""
      },
      authorNames: ["tzz", "summer", "abc"],
      inputValue: "",
      inputVisible: false,

      sort: {},
      pagination: {
        per_page: 10,
        total: 0,
        page: 1
      },
      bookData: [],
      bookValue: [],
      input1: "",
      centerDialogVisible: false,
      currentPage1: 1,
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
    // 动态添加作者标签
    handleClose(tag) {
      this.authorNames.splice(this.authorNames.indexOf(tag), 1);
    },

    showInput() {
      this.inputValue = true;
      this.$nextTick(_ => {
        this.$refs.saveTagInput.$refs.input.focus();
      });
    },

    handleInputConfirm() {
      let inputValue = this.inputValue;
      if (inputValue) {
        this.authorNames.push(inputValue);
      }
      this.inputValue = false;
      this.inputValue = "";
    },

    async getData() {
      // 提取分页参数
      let { per_page, page } = this.pagination;
      // 提取排序参数
      let { prop: sort_by, order } = this.sort;

      let params = { per_page, page };

      if (order && order[0] == "a") order = order.slice(0, 3);
      if (order && order[0] == "d") order = order.slice(0, 4);

      let data = await axios
        .get("/api/book", {
          params: {
            per_page,
            page,
            order,
            sort_by
          }
        })
        .then(res => res.data);

      this.bookData = data.books;
      this.pagination.total = data.count;
    },
    // 插入模拟数据
    async insertMockData() {
      for (let book of MockData.books) {
        try {
          await axios.post("/api/book", book);
        } catch (error) {
          console.error.response;
          this.$message(`${error.response.status}`);
        }
      }
    },

    // 根据 id 获取某一个数据
    // async getSpecData() {
    // 提取图书字段
    // let {
    //   id,
    //   isbn10,
    //   isbn13
    //   // title,
    //   // origin_title,
    //   // alt_title,
    //   // image,
    //   // images,
    //   // author,
    //   // translator,
    //   // publisher,
    //   // pubdate,
    //   // rating,
    //   // tags,
    //   // bing,
    //   // price,
    //   // pages,
    //   // author_intro,
    //   // summary,
    //   // catalog,
    //   // is_store
    // } = this.booksData;

    //   let bookParams = { id, isbn10, isbn13 };
    //   let bookdata = await axios
    //     .get("/api/book/?id=1230448", {
    //       bookParams: {
    //         id,
    //         isbn10,
    //         isbn13
    //       }
    //     })
    //     .then(res => res.bookdata);
    // },

    onSubmit() {},

    handleEdit(book) {
      this.centerDialogVisible = !this.centerDialogVisible;
      this.newBookData = Object.assign({}, book);
    },

    showDetail() {},

    handleAdd() {
      this.centerDialogVisible = !this.centerDialogVisible;
    },

    handleDel(id) {
      this.$confirm("确认删除选中的记录吗?", "温馨提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning"
      })
        .then(async () => {
          try {
            await axios.delete(`/api/book/${id}`);

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
    },

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
    this.getData();
  }
};
</script>

<style lang="scss" scoped>
// 创建 作者动态标签
.el-tag + .el-tag {
  margin-left: 10px;
}
.button-new-tag {
  margin-left: 10px;
  height: 32px;
  line-height: 30px;
  padding-top: 0;
  padding-bottom: 0;
}
.input-new-tag {
  width: 90px;
  margin-left: 10px;
  vertical-align: bottom;
}

.el-col {
  margin-top: 10px;
  background-clip: content-box;

  .eform {
    margin-top: 10px;

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

  .toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding-left: 10px;
  }
}
</style>
