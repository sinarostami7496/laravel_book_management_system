<template>
  <!-- layout-->
<div class="container">
  <el-container>
  <!-- header -->
  <el-header>
    <el-menu 
      class="nav"
      mode="horizontal" 
      @select="handleSelect()"
      active-text-color="#f30eae"
    >
      <el-menu-item index="1">图书</el-menu-item>
      <el-menu-item index="2">图书</el-menu-item>
      <el-menu-item index="3">图书</el-menu-item>
      <el-menu-item index="4">图书</el-menu-item>
      <el-menu-item index="5">图书</el-menu-item>
      <el-menu-item index="6">图书</el-menu-item>
      <el-menu-item index="111">图书</el-menu-item>
      <el-menu-item index="61">图书</el-menu-item>
      <el-menu-item index="71">图书</el-menu-item>
      <el-menu-item index="8"></el-menu-item>
      <el-menu-item index="9"></el-menu-item>
      <el-menu-item index="10"></el-menu-item>
      <el-menu-item index="11"></el-menu-item>
      <el-menu-item index="12"></el-menu-item>
      <el-menu-item index="13"></el-menu-item>
      <el-menu-item index="14"></el-menu-item>
      <el-menu-item index="15"></el-menu-item>
      <el-menu-item index="16"></el-menu-item>
      <el-menu-item index="17"></el-menu-item>
      <el-menu-item  class="login" index="18">登录</el-menu-item>
      <el-menu-item  class="login" index="19">注册</el-menu-item>
    
    </el-menu>
  </el-header>
  <!-- main -->
  <div class="main">
    <el-main>
    <div class="book-recomend">
      <!-- <el-button type="danger" class="recomend">通知公告</el-button> -->
      <el-carousel
       :interval="5000"
       arrow="always"
      >
        <el-carousel-item v-for="item in 6" :key="item">
          <h1>{{item}}</h1>
        </el-carousel-item>
      </el-carousel>
    </div>

   <div class="books-cards">
     <div class="title">
       <el-button type="primary">新书速推</el-button>
       <el-button type="info" round icon="el-icon-star-off" >果然接地气的才是王道。By《傻帽儿图书》</el-button>
     </div>
    <div class="content">
      <el-card shadow="hover" class="ecard" :body-style="{padding: '0px'}">
        <div class="card">
          <img src="./image/test.jpg" alt="">
          <div class="book-title">情书</div>
          <div class="author">岩井俊二</div>
          <div class="more">查看详情</div>
      </div>
      </el-card>

       <el-card shadow="hover" class="ecard" :body-style="{padding: '0px'}">
        <div class="card">
          <img src="./image/test.jpg" alt="">
          <div class="book-title">情书</div>
          <div class="author">岩井俊二</div>
          <div class="more">查看详情</div>
      </div>
      </el-card>

       <el-card shadow="hover" class="ecard" :body-style="{padding: '0px'}">
        <div class="card">
          <img src="./image/test.jpg" alt="">
          <div class="book-title">情书</div>
          <div class="author">岩井俊二</div>
          <div class="more">查看详情</div>
      </div>
      </el-card>

       <el-card shadow="hover" class="ecard" :body-style="{padding: '0px'}">
        <div class="card">
          <img src="./image/test.jpg" alt="">
          <div class="book-title">情书</div>
          <div class="author">岩井俊二</div>
          <div class="more">查看详情</div>
      </div>
      </el-card>

       <el-card shadow="hover" class="ecard" :body-style="{padding: '0px'}">
        <div class="card">
          <img src="./image/test.jpg" alt="">
          <div class="book-title">情书</div>
          <div class="author">岩井俊二</div>
          <div class="more">查看详情</div>
      </div>
      </el-card>

       <el-card shadow="hover" class="ecard" :body-style="{padding: '0px'}">
        <div class="card">
          <img src="./image/test.jpg" alt="">
          <div class="book-title">情书</div>
          <div class="author">岩井俊二</div>
          <div class="more">查看详情</div>
      </div>
      </el-card>

       <el-card shadow="hover" class="ecard" :body-style="{padding: '0px'}">
        <div class="card">
          <img src="./image/test.jpg" alt="">
          <div class="book-title">情书</div>
          <div class="author">岩井俊二</div>
          <div class="more">查看详情</div>
      </div>
      </el-card>

    </div>
    <!-- 分页器 -->
    <div class="page">
        <el-pagination
        @size-change="handleSizeChange"
        @current-change="handleCurrentChange"
        :current-page="currentPage1"
        :page-sizes="[100, 200, 300, 400]"
        :page-size="100"
        layout="total, sizes, prev, pager, next, jumper"
        :total="400">
      </el-pagination>
    </div>
   </div> 
  </el-main>
  </div>
  <div class="footer">
      <el-footer>
        <el-button type="success" >网红图书</el-button>
        <div class="hot-books">
          <div class="hot-item">
            <img src="./image/test1.jpg" alt="">
            <div class="right">
              <div class="title">特工训练手册</div>
              <div class="author">[美] 克林特·埃默森</div>
              <div class="summary">危机时刻绝处逢生，前海豹队员教你简单易行的方法 (惟乔评论)</div>
            </div>
          </div>

          <div class="hot-item">
            <img src="./image/test1.jpg" alt="">
            <div class="right">
              <div class="title">特工训练手册</div>
              <div class="author">[美] 克林特·埃默森</div>
              <div class="summary">危机时刻绝处逢生，前海豹队员教你简单易行的方法 (惟乔评论)</div>
            </div>
          </div>
        </div>
      </el-footer>
      <el-col>
        <div class="aboutme">傻帽儿图书</div>
      </el-col>
  </div>
</el-container>
</div>
 
 
</template>

<script>
export default {
  data() {
    return {
      currentPage1: 1
    };
  },
  methods: {
    handleSelect() {},
    handleSizeChange(val) {
      console.log(`每页 ${val} 条`);
    },
    handleCurrentChange(val) {
      console.log(`当前页: ${val}`);
    }
  },

  components: {}
};
</script>

<style  lang="scss" scoped>
.container {
  width: 1180px;

  margin: 0 auto;

  .nav {
    display: flex;
    justify-content: center;
    align-items: center;

    .login {
      color: #38f;
    }
  }

  .main {
    .book-recomend {
      // .recomend {
      //   margin-top: 5px;
      //   margin-bottom: 10px;
      // }
      .el-carousel__item h3 {
        color: #475669;
        font-size: 18px;
        opacity: 0.75;
        line-height: 300px;
        margin: 0;
      }

      .el-carousel__item:nth-child(2n) {
        background-color: #99a9bf;
      }

      .el-carousel__item:nth-child(2n + 1) {
        background-color: #d3dce6;
      }
    }

    .books-cards {
      .title {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-top: 10px;
      }

      .content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-grow: 1;
        margin-top: 20px;

        .ecard {
          margin-left: 0px;
          width: 135px;
          height: 280px;

          .card {
            width: 135px;
            height: 277px;

            color: #666;
            font-size: 12px;

            img {
              display: block;
              width: 135px;
              height: 190px;
            }
            .book-title {
              margin-top: 8px;
              padding-left: 5px;
            }

            .author {
              margin-top: 8px;
              padding-left: 5px;
            }

            .more {
              display: flex;
              justify-content: flex-end;
              align-items: center;
              margin-top: 10px;
              padding-right: 10px;
              color: #7b7d7e;
            }
          }
        }
      }

      .page {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        height: 50px;
        background-color: #eee;
      }
    }
  }

  .footer {
    .hot-books {
      display: flex;
      justify-content: space-between;
      align-items: center;
      // flex-grow: 1;
      .hot-item {
        display: flex;
        // justify-content: space-between;
        align-items: center;
        flex-grow: 1;
        margin-top: 10px;
        img {
          width: 90px;
          height: 140px;
        }
        .right {
          margin-left: 20px;
          font-size: 14px;

          .title {
            margin-top: 10px;
          }
          .author {
          }
          .summary {
          }
        }
      }
    }
    .aboutme {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 150px;
      height: 50px;
      background-color: #eee;
    }
  }
}
</style>
