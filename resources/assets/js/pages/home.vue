<template>
<el-container>
  <el-header>
    <el-menu mode="horizontal" :default-active="activeIndex">
      <el-menu-item index=“1”>处理中心</el-menu-item>
      <el-submenu index="2">
        <template slot="title">我的工作台</template>
        <el-menu-item index=“2-1”>选项1</el-menu-item>
        <el-menu-item index=“2-2”>选项2</el-menu-item>
        <el-menu-item index=“2-3”>选项3</el-menu-item>
        <el-submenu index=”2-4“>
          <template slot="title">选项4</template>
          <el-menu-item index=“2-4-1”>选项1</el-menu-item>
          <el-menu-item index=“2-4-2”>选项2</el-menu-item>
          <el-menu-item index=“2-4-3”>选项3</el-menu-item>
        </el-submenu>
      </el-submenu>
      <el-menu-item index=“3”>消息中心</el-menu-item>
      <el-menu-item index=“4”>订单管理</el-menu-item>
      <el-menu-item index=“5”>消息中心</el-menu-item>
      <el-menu-item index=“6”>消息中心</el-menu-item>
      <el-menu-item index=“7”>消息中心</el-menu-item>
      <el-menu-item index=“8”>订单管理</el-menu-item>
    </el-menu>
  </el-header>
  <el-container>
    <el-aside width="200px">
      <el-menu default-active="2" @open="handleOpen()" @close="handleClose()">
        <el-submenu index="1">
          <template slot="title">
            <i class="el-icon-location"></i>
            <span>导航一</span>
          </template>
          <el-menu-item-group>
            <template slot="title">分组一</template>
            <el-menu-item index="1-1">选项1</el-menu-item>
            <el-menu-item index="1-2">选项2</el-menu-item>
          </el-menu-item-group>
          <el-menu-item-group>
            <template slot="title">分组二</template>
            <el-menu-item index="1-3">选项3</el-menu-item>
          </el-menu-item-group>
          <el-submenu index="1-4">
            <template slot="title">选项4</template>
            <el-menu-item index="1-4">选项1</el-menu-item>
          </el-submenu>
        </el-submenu>
        <el-menu-item index="2">
          <i class="el-icon-menu"></i>
          <span slot="title">导航二</span>
        </el-menu-item>
        <el-menu-item index="3" disabled>
          <i class="el-icon-document"></i>
          <span slot="title">导航三</span>
        </el-menu-item>
        <el-menu-item index="4">
          <i class="el-icon-setting"></i>
          <span slot="title">导航四</span>
        </el-menu-item>
      </el-menu>

    </el-aside>
    <el-container>
      <el-main>
         <el-input placeholder="请输入内容" v-model="input5">
           <el-select v-model="select" slot="prepend" placeholder="请选择">
             <el-option label="姓名" value="1"></el-option>
             <el-option label="学号" value="2"></el-option>
             <el-option label="邮箱" value="3"></el-option>
             <el-option label="性别" value="4"></el-option>
           </el-select>
           <el-button slot="append" class="el-icon-search" :plain="true" @click="open"></el-button>
         </el-input>
         <el-table :data="tableData"  :default-sort="{prop: 'sno', order: 'descending'}" v-loading="loading2" element-loading-text="玩命加载中" element-loading-spinner="el-icon-loading" element-loading-background="rgba(0,0,0,0.8)">
           <el-table-column prop="sno" label="学号" sortable width=“180”></el-table-column>
           <el-table-column prop="username" label="姓名" sortable width=“180”></el-table-column>
           <el-table-column prop="gender" label="性别" sortable width=“180”></el-table-column>
           <el-table-column prop="email" label="邮箱" sortable width=“180”></el-table-column>
           <el-table-column label="操作">
             <template slot-scope="scope">
               <el-button size="mini" @click="handleEdit(scope.$index,scope.row)">编辑</el-button>
               <el-button size="mini" type="danger" @click="handleEdit(scope.$index,scope.row)">删除</el-button>
             </template>
           </el-table-column>
         </el-table>
      </el-main>
      <el-footer height="100px">
        <el-pagination background layout="prev, pager, next" :total="5000"></el-pagination>
      </el-footer>
    </el-container>
  </el-container>
</el-container>

</template>

<script>
 export default {
   data () {
     return {
       activeIndex: '',
       input3: '',
       input4: '',
       input5: '',
       input6: '',
       select: '',
       loading2: false,
       tableData: [
         {
           sno: '201540292',
           username: 'summertzz',
           email: '1234354@qq.com',
           gender: '女'
         },
          {
           sno: '201540332',
           username: 'lsbbd',
           email: '1234354@qq.com',
           gender: '女'
         },
          {
           sno: '2015401112',
           username: 'tzz',
           email: '1234354@qq.com',
           gender: '女'
         },
          {
           sno: '201540222',
           username: 'summertzz',
           email: '1234354@qq.com',
           gender: '女'
         }
       ]
     }
   },

   methods: {
     handleOpen (key, keyPath) {
       console.log(key, keyPath)
     },

     handleClose (key, keyPath) {
       console.log(key, keyPath)
     },

      handleEdit(index, row) {
        console.log(index, row);
      },

      handleDelete(index, row) {
        console.log(index, row);
      },

      open (){
        this.$message('按照关键字段进行搜索')
      }
   }
 }
</script>

<style lang="scss" scoped>

</style>
