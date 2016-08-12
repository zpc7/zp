<?php
    include "../include.php";
    checkLogined();
    $cid=$_SESSION['memberid'];
    $sql="select * from zp_company where id='{$cid}'";
    $row=fetchOne($sql,$tp);
    $sql_jobs="select * from zp_jobs where jobsubid='{$cid}'";
    $rows=fetchAll($sql_jobs,$tp);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>企业主页</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" href="css/company.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- 导航 -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Logo</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../index.php">首页 <span class="sr-only">(current)</span></a></li>
                    <li><a href="javascript:addjob();">发布职位</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?php
                            echo $row['name'];
                            ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="../company/company.php">公司主页</a></li>
                            <li><a href="hrcenter.php">HR中心</a></li>
                            <li><a href="javascript:addjob();">发布职位</a></li>
                            <li><a href="setting.php">账户设置</a></li>
                            <li><a href="../doAction.php?act=logout">退出</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <!-- 导航结束 -->
    <!-- 页面主体 -->
    <div class="main">
        <div class="top">
            <div class="top-brand">
                <img src="  <?php echo $row['logopath'];?>">
            </div>
            <div class="top-name">
                <h2 class="text-center">
                <?php
                echo $row['name'];
                ?>
                </h2>
            </div>
            <div class="top-sig">
                <p class="text-center">
                <?php
                echo $row['tag'];
                ?>
                <span class="glyphicon glyphicon-star-empty"></span></p>
            </div>
        </div>
        <ul class="tab">
            <li class="active">公司主页</li>
            <li>在招职位</li>
        </ul>
        <div class="content">
            <div class="content-left">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">公司简介</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo $row['description'];
                        ?>
                    </div>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">公司位置</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                         echo $row['address'];
                         ?>
                    </div>
                </div>
            </div>
            <div class="content-left">
                <div class="panel panel-info">
                   <div class="panel-heading">
                      <h3 class="panel-title">在招职位</h3>
                   </div>
                   <div class="panel-body">
     <!--                  <ul class="nav nav-pills">
                         <li class="active"><a href="#">Home</a></li>
                         <li><a href="#">SVN</a></li>
                         <li><a href="#">iOS</a></li>
                         <li><a href="#">VB.Net</a></li>
                         <li><a href="#">Java</a></li>
                         <li><a href="#">PHP</a></li>
                      </ul> -->
                   </div>
                   <ul class="list-group">
                   <?php  foreach($rows as $rows):?>
                      <li class="list-group-item">
                          <div class="job">
                              <p><a href="../inter/detail_job.php?id=<?php echo $rows['jobid'];?>"><?php echo $rows['jobname'];?></a></p>
                              <p><span><?php echo $rows['jobaddress'];?></span><span><?php echo $rows['jobpay'];?></span></p>
                          </div>
                      </li>
                    <?php endforeach;?>
                   </ul>
                </div>
            </div>
            <div class="content-right">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">公司基本信息</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $row['industry'];?>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><?php echo $row['scale'];?>人</li>
                        <li class="list-group-item"><?php echo $row['url'];?></li>
                        <li class="list-group-item"><?php echo $row['estabtime'];?></li>
                    </ul>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">公司标签</h3>
                    </div>
                    <div class="panel-body">
                    <span class="badge"><?php echo $row['tag'];?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 页面主体结束 -->
    <!-- 底部 -->
    <div class="footer">
    </div>
    <!-- 底部结束 -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/swiper.min.js"></script>
    <script src="js/company.js"></script>
    <script type="text/javascript">
        function addjob(){
            // $("iframe").attr("src","addJob.php");
            window.location="hrcenter.php";
            // alert("6");
        }
    </script>

</body>

</html>
