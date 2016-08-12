<?php
  $values=$_REQUEST['val']&&$_REQUEST['val']!=""?$_REQUEST['val']:"";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/search.css">
  </head>
  <body>
  <!-- 判断当前登录用户，加载不同的导航栏 -->
  <?php
      include "include.php";
      if(isset($_SESSION['memberid'])){
          if($_SESSION['membertype']==0){
              include "page_nav/company_nav.php";
          }
          elseif($_SESSION['membertype']==1){
              include "page_nav/personal_nav.php";
          }

      }else{
          include "page_nav/common_nav.php";
      }
  ?>
  <!-- 导航结束 -->
    <div class="wrapper">
      <!-- 搜索框 -->
      <div class="search-input-box clearfix">
        <input type="text" name="search" id="search" value="<?php echo $values;?>" placeholder="请输入期望的职位">
        <a id="js-btnsearch" href="#">搜索职位</a>
      </div>
      <!-- 搜索框  end -->
      <!-- 搜索结果列表  -->
      <div class="search-list">
        <div class="list-title clearfix">
          <h2>排序方式</h2>
          <ul id="js-order-ul" class="clearfix">
          	<li class="active" data-order="jobtime desc">最近更新</li>
          	<li class="" data-order="jobscan desc">最具人气</li>
          </ul>
        </div>
        <!-- list-item-box -->
        <div id="list-item-box" class="list-item-box">
          <!-- list-item -->
          <div class="list-item clearfix">
            <dl class="list-item-title">
            	<dt><a href="">编辑实习生</a></dt>
            	<dd>京东</dd>
            </dl>
            <dl class="list-item-detail">
            	<dt>&nbsp;</dt>
            	<dd><span class="glyphicon glyphicon-time"></span>06-09 更新</dd>
            </dl>
            <img src="images/img01.png">
          </div>
          <!-- list-item end -->
          <!-- list-item -->
          <div class="list-item clearfix">
            <dl class="list-item-title">
              <dt><a href="">编辑实习生</a></dt>
              <dd>京东</dd>
            </dl>
            <dl class="list-item-detail">
              <dt>&nbsp;</dt>
              <dd><span class="glyphicon glyphicon-time"></span>06-09 更新</dd>
            </dl>
            <img src="images/img01.png">
          </div>
          <!-- list-item end -->
          <!-- list-item -->
          <div class="list-item clearfix">
            <dl class="list-item-title">
              <dt><a href="">编辑实习生</a></dt>
              <dd>京东</dd>
            </dl>
            <dl class="list-item-detail">
              <dt>&nbsp;</dt>
              <dd><span class="glyphicon glyphicon-time"></span>06-09 更新</dd>
            </dl>
            <img src="images/img01.png">
          </div>
          <!-- list-item end --><!-- list-item -->
          <div class="list-item clearfix">
            <dl class="list-item-title">
              <dt><a href="">编辑实习生</a></dt>
              <dd>京东</dd>
            </dl>
            <dl class="list-item-detail">
              <dt>&nbsp;</dt>
              <dd><span class="glyphicon glyphicon-time"></span>06-09 更新</dd>
            </dl>
            <img src="images/img01.png">
          </div>
          <!-- list-item end -->
        </div>
        <!-- list-item-box end -->
        <!-- paging -->
        <div id="js-paging" class="paging">
          <ul class="clearfix">
          	<li class="disabled">首页</li>
          	<li class="">上一页</li>
          	<li class="">1</li>
          	<li class="active">2</li>
          	<li class="">3</li>
            <li class="">4</li>
            <li class="">5</li>
            <li class="">6</li>
            <li class="">7</li>
            <li class="">8</li>
            <li class="">9</li>
            <li class="">10</li>
          	<li class="">下一页</li>
          	<li class="">尾页</li>
          </ul>
        </div>
        <!-- paging end -->
      </div>
      <!-- 搜索结果列表  end  -->
      <!--当前页-->
      <input type="hidden" name="js-page" id="js-page" value="1">
      <!-- 每页大小 -->
      <input type="hidden" name="js-pagesize" id="js-pagesize" value="">
      <!--总页数-->
      <input type="hidden" name="js-totalpage" id="js-totalpage" value="">
      <!--关键词-->
      <input type="hidden" name="js-keywords" id="js-keywords" value="<?php echo $values;?>">
      <!--排序依据-->
      <input type="hidden" name="js-order" id="js-order" value="">
    </div>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/search.js" type="text/javascript"></script>

  </body>
</html>