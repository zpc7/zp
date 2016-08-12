<?php
    include "../include.php";
    $jobid=$_REQUEST['id'];
    $sql_jobs="select * from zp_jobs where jobid='{$jobid}'";
    $jobs=fetchOne($sql_jobs,$tp);
    print_r($jobs);
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
        <link rel="stylesheet" href="../css/company/jobs.css">
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
                    <a class="navbar-brand" href="index.html">Logo</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">首页 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">发布职位</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php
                            echo $row['comname'];
                            ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="">公司主页</a></li>
                                <li><a href="hrcenter.php">HR中心</a></li>
                                <li><a href="">发布职位</a></li>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="job-title"><?php echo $jobs['jobname'];?></div>
                        <div class="panel panel-info">
                            <div class="panel-heading">职位描述</div>
                            <div class="panel-body">
                                <p><?php echo $jobs['jobdesc'];?>
                                </p>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">为软件厂商提供SaaS化的服务，快速构建起一个可以在云端自动交付、在线交易的SaaS服务，并提供持续的运营支撑</li>
                                <li class="list-group-item">为企业用户提供以应用为中心的云资源管理、自动化部署和自动化运维的平台，并支持软件厂商实现SaaS化。</li>
                                <li class="list-group-item">图像的数量</li>
                                <li class="list-group-item">24*7 支持</li>
                                <li class="list-group-item">每年更新成本</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="com-sub">
                            所属公司
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
    </body>

    </html>
