<?php
    include "../include.php";
    $pid=$_SESSION['memberid'];
    $sql="select * from zp_company where id='{$pid}'";
    $row=fetchOne($sql,$tp);
    // $oldPWD=$row['password'];
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>个人设置</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="./css/setting.css">
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
        <div class="box container">
            <div class="sider">
                <ul>
                    <li class="sider-item">修改密码</li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div class="panel">
                <div class="wrapper">
                    <form  action="doCompanyAction.php?act=editPWD&id=<?php echo $row['id'];?>" method="post" id="form">
                        <ul class="pw-box">
                            <li>
                                <span class="name">登陆账号:</span>
                                <span><?php echo $row['username'];?></span>
                            </li>
                            <li>
                                <span class="name">当前密码</span>
                                <input type="password" name="pw_old" id="oldPWD"/>
                            </li>
                            <li>
                                <span class="name">新的密码</span>
                                <input type="password" name="pw_now" id="password" />
                            </li>
                            <li>
                                <span class="name">确认密码</span>
                                <input type="password" name="pw_repeat" />
                            </li>
                            <li>
                                <button type="submit" class="btn btn-info btn-lg">保存</button>
                            </li>
                        </ul>
                    </form>
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
