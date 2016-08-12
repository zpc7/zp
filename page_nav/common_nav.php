<!-- 没有登录用户的导航 -->
<!-- 导航 -->
<div id="header">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/djfh/1/index.php">Logo</a>
            </div>
            <div>
               <ul class="nav navbar-nav">
                  <li class="active"><a href="/djfh/1/index.php">首页</a></li>
                  <li><a href="javascript:login();">个人中心</a></li>
                  <li><a href="javascript:login();">职位发布</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                   <li><a href="/djfh/1/login.php" target="_blank">登录</a></li>
                   <li data-toggle="modal" data-target="#myModal"><a href="/djfh/1/register.php">注册</a></li>
               </ul>
            </div>
         </div>
    </nav>

</div>
<script type="text/javascript">
  function login(){
    alert("请先登录！");
    window.location="/djfh/1/login.php";
  }
</script>

<!-- 导航结束 -->
