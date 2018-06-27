<template>
<div class="box">
  <div class="content">
      <!-- header -->
    <div class="headers">
      <div class="logo">
        <figure>
          <img src="./image/logo.png" alt="An awesome picture">	
          <figcaption>the best book on the web</figcaption>
        </figure>
      </div>
      <div class="login">
        <el-menu mode="horizontal">
          <el-menu-item index="1">register</el-menu-item>
          <el-menu-item index="2">login</el-menu-item>
          <el-menu-item index="3">account</el-menu-item>
        </el-menu>
      </div>
    </div>
    <!-- main -->
    <div class="main">
      <!-- 导航栏 -->
      <div class="nav">
        <div class="left">
          <el-menu mode="horizontal">
            <el-menu-item index="2-1">HOME</el-menu-item>
            <el-menu-item index="2-2">ABOUT</el-menu-item>
            <el-menu-item index="2-3">BONTACTS</el-menu-item>
            <el-menu-item index="2-4">BLOG</el-menu-item>
          </el-menu>
        </div>
        <div class="search">
          <i class="el-icon-search" right></i>
        </div>
      </div>
      <!-- 广告栏 -->
      <div class="ad">
        <div class="ad-book">
          <img src="./image/test.jpg" alt="">
          <div class="decription">
            <div class="title">情书</div>
              <div class="author">岩井俊二 </div>
              <div class="isbn10">ISBN:9787544292870</div>
              <div class="format"> FORMAT:精装</div>
              <div class="price">$20.00</div>
              <div class="read-more">readmore
              </div>
            </div>
        </div>
        <div class="enter">
          <!-- <el-progress type="circle" :percentage="90" ></el-progress> -->
          <img src="./image/ enter.jpg" alt="">
        </div>
      </div>
      <!-- 网红图书 -->
      <div class="hot-books">
         <el-carousel :interval="5000" arrow="always" height="300px">
          <el-carousel-item v-for="(item, index) in slideimgs" :key="index">
            <img class="image" :src="item" alt="">
          </el-carousel-item>
        </el-carousel>
      </div>

      <!-- 特色书籍 -->
      <div class="title">
          Feature Books
      </div>
      <div class="feature-books">
        <div class="feature-book">
          <figure>
            <img src="https://img3.doubanio.com/view/ark_article_cover/retina/public/52889083.jpg?v=1528358688.0" alt="An awesome picture">	
            <figcaption class="feature">the best book</figcaption>
          </figure>
          <div class="detail">
            <span>约翰·赫斯特</span>
            <p>$29.99</p>
            <p><el-button type="danger">details</el-button></p>
          </div>
        </div>
        <div class="feature-book">
          <figure>
            <img src="https://img1.doubanio.com/view/ark_article_cover/retina/public/45211019.jpg?v=1516072034.0" alt="An awesome picture">	
            <figcaption class="feature">the best book</figcaption>
          </figure>
          <div class="detail">
            <span>约翰·赫斯特</span>
            <p>$29.99</p>
            <p><el-button type="danger">details</el-button></p>
          </div>
        </div>
        <div class="feature-book">
          <figure>
            <img src="https://img1.doubanio.com/view/ark_article_cover/retina/public/53620018.jpg?v=1529975808.0" alt="An awesome picture">	
            <figcaption class="feature">the best book</figcaption>
          </figure>
          <div class="detail">
            <span>约翰·赫斯特</span>
            <p>$29.99</p>
            <p><el-button type="danger">details</el-button></p>
          </div>
        </div>
      </div>
      <!-- 热榜图书 -->
      <div class="top-book-title">Top Rated Books</div>
      <div class="top-books">
        <div class="top-book">
          <figure>
            <img src="https://img3.doubanio.com/view/ark_article_cover/retina/public/37231371.jpg?v=1501843433.0" alt="An awesome picture">	
            <figcaption class="top">the best book</figcaption>
          </figure>
          <div class="detail">
            <span>约翰·赫斯特</span>
            <p>$29.99</p>
            <p><el-button type="danger">details</el-button></p>
          </div>
        </div>
        <div class="top-book">
          <figure>
            <img src="https://img3.doubanio.com/view/ark_article_cover/retina/public/53664513.jpg?v=1530006193.0" alt="An awesome picture">	
            <figcaption class="top">the best book</figcaption>
          </figure>
          <div class="detail">
            <span>约翰·赫斯特</span>
            <p>$29.99</p>
            <p><el-button type="danger">details</el-button></p>
          </div>
        </div>
        <div class="top-book">
          <figure>
            <img src="https://img3.doubanio.com/view/ark_article_cover/retina/public/33087371.jpg?v=1492416460.0" alt="An awesome picture">	
            <figcaption class="top">the best book</figcaption>
          </figure>
          <div class="detail">
            <span>约翰·赫斯特</span>
            <p>$29.99</p>
            <p><el-button type="danger">details</el-button></p>
          </div>
        </div>
      </div>
    </div>
    <!-- footer -->
    <div class="footers">
        <el-menu mode="horizontal" class="foot">
          <el-menu-item index="3-1">home</el-menu-item>
          <el-menu-item index="3-2">about</el-menu-item>
          <el-menu-item index="3-3">bolg</el-menu-item>
          <el-menu-item index="3-4">contacts</el-menu-item>
        </el-menu>
        <div class="rights"> book king web by summertzz</div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      slideimgs: [
        "https://img1.doubanio.com/view/ark_campaign_pic/large/public/6138.jpg",
        "https://img1.doubanio.com/view/ark_campaign_pic/large/public/6137.jpg",
        "https://img3.doubanio.com/view/ark_campaign_pic/large/public/6133.jpg",
        "https://img3.doubanio.com/view/ark_campaign_pic/large/public/6134.jpg",
        "https://img1.doubanio.com/view/ark_campaign_pic/large/public/6129.jpg",
        "https://img1.doubanio.com/view/ark_campaign_pic/large/public/6138.jpg"
      ]
    };
  },
  components: {}
};
</script>

<style lang="scss" scoped>
.box {
  width: 1905px;
  height: 2367px;
  background: url(./image/bg.gif) 0 0 repeat;

  .content {
    width: 1302px;
    // height: 2367px;
    margin: 0 auto;
    background-color: #fff;

    .headers {
      display: flex;
      justify-content: space-between;
      // width: 0%;
      height: 116px;
      background-color: #fff;
      border-bottom: 3px solid orange;
      // padding: 30px 30px;

      .logo {
        display: flex;
        justify-content: space-between;
        align-items: center;

        figcaption {
          text-align: center;
        }
      }
      .login {
        display: flex;
        justify-content: space-between;
        align-items: center;
        // padding: 30px 30px;
        color: rgb(137, 137, 137);
      }
    }

    .main {
      .nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        .left {
          padding-left: 30px;
        }
        // padding: 30px 30px;
        .search {
          width: 370px;
          margin-right: 30px;
          // height: 116px;
          color: #ffdbdb;
          font-size: 25px;
          font-weight: bolder;
          border-bottom: 1px solid #eee;
        }
      }

      //  广告栏
      .ad {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
        .ad-book {
          display: flex;
          // justify-content: space-between;
          align-items: center;

          width: 768px;
          height: 460px;
          margin-left: 30px;
          border: 1px solid #eee;
          border-radius: 1px;

          img {
            display: block;
            width: 244px;
            height: 352px;
            padding: 50px 50px;
          }
          .decription {
            width: 333px;
            height: 286px;
            // margin-right: 60px;
            margin-left: 10px;
            padding-top: 1px;

            .title {
              font-size: 60px;
              margin-left: 5px;
              font-weight: 500;
              border: none;
            }
            .author {
              // text-align: center;
              padding-top: 20px;
              font-size: 18px;
              color: #9b9b9b;
              padding-left: 20px;
            }

            .isbn10 {
              font-size: 12px;
              color: #9b9b9b;
              padding-left: 20px;
              padding-top: 10px;
            }

            .format {
              font-size: 12px;
              color: #9b9b9b;
              padding-left: 20px;
              padding-top: 5px;
            }

            .price {
              font-size: 30px;
              color: #fe5252;
              padding-left: 20px;
              padding-top: 10px;
              margin-top: 15px;
            }
            .read-more {
              display: flex;
              justify-content: center;
              align-items: center;
              font-size: 15px;
              color: #fff;
              text-align: center;
              border-radius: 3px;
              background-color: #fe5252;
              width: 85px;
              height: 25px;
              padding: 5px 5px;
              margin-left: 20px;
              margin-top: 26px;
            }
          }
        }
        .enter {
          display: flex;
          justify-content: center;
          align-items: center;
          width: 370px;
          height: 460px;
          margin-right: 30px;
          background-color: #ffdbdb;
        }
      }
      // 网红图书
      .hot-books {
        // display: flex;
        // justify-content: space-between;
        // align-items: center;
        margin-left: 30px;
        margin-right: 30px;
        margin-top: 40px;

        img {
          width: 100%;
          height: 100%;
          object-fit: cover;
          object-position: center center;
        }

        .el-carousel__item h3 {
          color: #475669;
          font-size: 14px;
          opacity: 0.75;
          line-height: 200px;
          margin: 0;
        }

        .el-carousel__item:nth-child(2n) {
          background-color: #99a9bf;
        }

        .el-carousel__item:nth-child(2n + 1) {
          background-color: #d3dce6;
        }
        .hot-book-one {
          img {
            display: block;
            // width: 265px;
            height: 200px;
            margin-left: 30px;
          }
          // background-color: #4ffbe5;
        }
      }

      // 特色书籍
      .title {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #eee;
        margin-left: 30px;
        margin-top: 20px;

        height: 60px;
        font-size: 20px;
      }
      .feature-books {
        display: flex;
        justify-content: space-between;
        align-items: center;

        // margin-left: 30px;
        margin-right: 30px;
        // width: 1200px;

        // background-color: #eee;
        .feature-book {
          display: flex;
          // justify-content: space-between;
          align-items: center;
          width: 370px;
          height: 230px;
          margin-top: 10px;
          img {
            display: block;
            width: 140px;
            height: 209px;
          }

          .feature {
            margin-top: 10px;
            color: #fe5252;
          }

          .detail {
            margin-top: 5px;
            margin-left: 20px;
            span {
              display: block;
            }
            p {
              color: #fe5252;
              font-size: 20px;
            }
          }
        }
      }

      // 热榜图书
      .top-book-title {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #eee;
        margin-left: 30px;
        margin-top: 20px;

        height: 60px;
        font-size: 20px;
      }
      .top-books {
        display: flex;
        justify-content: space-between;
        align-items: center;

        // margin-left: 30px;
        margin-right: 30px;
        // width: 1200px;

        // background-color: #eee;
        .top-book {
          display: flex;
          // justify-content: space-between;
          align-items: center;
          width: 370px;
          height: 230px;
          margin-top: 20px;
          img {
            display: block;
            width: 140px;
            height: 209px;
          }

          .top {
            margin-top: 10px;
            color: #fe5252;
          }

          .detail {
            margin-top: 5px;
            margin-left: 20px;
            span {
              display: block;
            }
            p {
              color: #fe5252;
              font-size: 20px;
            }
          }
        }
      }
    }
    // 页脚
    .footers {
      // display: flex;
      // justify-content: center;
      // align-items: center;
      margin-top: 20px;

      .foot {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100px;
        border-top: 1px solid #eee;
      }
      .rights {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 80px;
        color: #ffdbdb;
      }
    }
  }
}
</style>
