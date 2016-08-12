<?php
    include "../include.php";
    $pid=$_SESSION['memberid'];
    $sql="select * from zp_deliver where pid='{$pid}'";
    $row=fetchAll($sql,$tp);
    // var_dump($row);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>我的投递记录</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="./css/deliver.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
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
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">Logo</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../index.php">首页</a></li>
                    <li><a href="personal.php">个人中心</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                   <div class="dropdown">
                       <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                       <?php
                           echo $_SESSION['membername'];
                           ?>
                       </button>
                       <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                           <li><a href="personal.php">个人中心</a></li>
                           <li><a href="deliver.php">投递箱</a></li>
                           <li><a href="setting.php">修改密码</a></li>
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
        <div class="box container">
            <div class="sider clearfix">
                <ul>
                    <li class="sider-item">我的投递记录</li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div class="content">
              <div class="wrapper">
            <?php  foreach($row as $row):?>
                <div class="item">
                  <div class="jobinfo">
                    <h3>
                      <a href="../inter/detail_job.php?id=<?php echo $row['jobid'];?>">
                        <?php
                          $Rpid=$row['jobid'];
                          $sql_job="select * from zp_jobs where jobid={$Rpid}";
                          $row_job=fetchOne($sql_job,$tp);
                          echo $row_job['jobname'];
                          ?>
                        </h3>
                      </a>
                  </div>
                  <div class="info">
                  <?php
                    $cominfo=$row_job['jobsubid'];
                    $sql_cominfo="select id,name from zp_company where id={$cominfo}";
                    $row_cominfo=fetchOne($sql_cominfo,$tp);
                  ?>
                    <p class="delivertime"><?php echo $row['delivertime'];?> 投递</p>
                    <p class="cominfo">
                        <a href="../inter/detail_com.php?id=<?php echo $row_cominfo['id'];?>">
                            <span class="glyphicon glyphicon-bookmark"><?php echo $row_cominfo['name'];?>
                            </span">
                        </a>
                      <span  class="glyphicon glyphicon-map-marker"><?php echo $row_job['jobaddress'];?></span> 
                      <span>￥<?php echo $row_job['jobpay'];?></span>
                    </p>
                  </div>
                </div>
                <?php endforeach;?>
              </div>
            </div>
        </div>
    </div>
    <!-- 页面主体结束 -->
    <!-- 底部 -->
    <div class="footer clearfix">
    </div>
    <!-- 底部结束 -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script>
    // jquery validate插件
        $("#form").validate({
            rules:{
                pw_old:{
                    required:true
                },
                pw_now:{
                    required:true,
                    rangelength:[6,16]
                },
                pw_repeat:{
                    required:true,
                    rangelength:[6,16],
                    equalTo:"#password"
                }
            },
            messages:{
               pw_old:{
                   required:"请填写旧密码"
               },
               pw_now:{
                   required:"请填写新密码",
                   rangelength:"密码长度在6-16字符范围"
               },
               pw_repeat:{
                   required:"请再次填写密码",
                   rangelength:"密码长度在6-16字符范围",
                   equalTo:"两次输入的密码不一致"
               }
            }
        });
    </script>
</body>

</html>
