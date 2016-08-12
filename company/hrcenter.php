<?php
    include "../include.php";
    $cid=$_SESSION['memberid'];
    $sql="select * from zp_company where id='{$cid}'";
    $row=fetchOne($sql,$tp);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<title>HR中心</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/animate.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="./css/hrcenter.css">
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
    <div class="wrapper">
        <div class="sider">
        <!-- 面板 -->
            <div class="panel-group" id="accordion">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">主页管理</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in ">
                        <div class="panel-body">
                            <a href="editBasic.php" target="mainFrame">基本信息修改</a>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="uploadLogo.php" target="mainFrame">企业Logo上传</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">职位管理</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a href="listJob.php" target="mainFrame">职位列表</a>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="addJob.php" target="mainFrame">发布职位</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">简历管理</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a href="listResume.php" target="mainFrame">收取到的简历</a>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="addJob.php" target="mainFrame"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <!-- 嵌套网页开始 -->
            <iframe src="editBasic.php" frameborder="0" name="mainFrame" width="98%" height="700"></iframe>
            <!-- 嵌套网页结束 -->
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
</body>

</html>
