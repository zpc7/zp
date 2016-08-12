<?php
    include "../include.php";
    $com_id=$_REQUEST['id'];
    // echo $com_id;
    $sql="select * from zp_company where id={$com_id}";
    $row=fetchOne($sql,$tp);
    $sql_jobs="select * from zp_jobs where jobsubid={$com_id}";
    $jobs=fetchAll($sql_jobs,$tp);
    // print_r($row);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>企业详情页</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" href="css/detail_com.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- 导航 -->
    <?php
        if(isset($_SESSION['memberid'])){
            if($_SESSION['membertype']==0){
                include "../page_nav/company_nav.php";
            }
            else{
                include "../page_nav/personal_nav.php";
                // 判断当前公司信息+登录的求职者是否已经收藏
                $login=$_SESSION['memberid'];
                $sql_collect="select * from zp_collect where pid={$login} and cid={$com_id}";
                $collect=fetchOne($sql_collect,$tp);
                // var_dump($collect);
                // 已经收藏 刷新图标
                //设置flag 111表示已经收藏000表示没收藏 777表示当前登录不是求职者身份
                if($collect){
                    $flag="111";
                }
                //没有收藏 不更新图标
                else{
                       $flag="000";
                    }
            }

        }else{
            include "../page_nav/common_nav.php";
        }
    ?>
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
                </p>
            </div>
            <a class="collection" href="javascript:collect(<?php echo $com_id;?>);" value="<?php 
            if(isset($_SESSION['memberid'])&&$_SESSION['membertype']==1)
                {echo $flag;}
            else{
                echo "777";
            }
            ?>"></a>
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

                   </div>
                   <ul class="list-group">
                   <?php  foreach($jobs as $job):?>
                      <li class="list-group-item">
                        <div class="container job">
                             <p><a href="detail_job.php?id=<?php echo $job['jobid'];?>"><?php echo $job['jobname'];?></a></p>
                            <div class="row">
                                <div class="col-md-3">
                                    <p><span><?php echo $job['jobaddress'];?></span></p>
                                </div>
                                <div class="col-md-2">
                                    <p><span><?php echo $job['jobpay'];?></span></p>
                                </div>
                                <div class="col-md-4">
                                    <p><span><?php echo $job['jobtime'];?>刷新</span></p>
                                </div>
                            </div>
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
    if($(".collection").attr("value")=='111'){
        $(".collection").addClass("collect_active");
    }
</script>
    <script type="text/javascript">
        function collect(comid){
            //已经收藏->取消收藏
            if($(".collection").attr("value")==111){
                $.ajax({
                    type:"POST",
                    url:"doComCancelCollect.php",
                    data:{
                            comid:comid
                    },
                    dataType:"json",
                    success:function(response){
                        $(".collection").removeClass("collect_active");
                        $(".collection").attr("value",000);
                        alert("已经取消收藏！");
                    },
                    error:function(){
                        alert("错误");
                    }
                });
            }
            //没有收藏->添加收藏
            else if($(".collection").attr("value")==000){
                $.ajax({
                    type:"POST",
                    url:"doComCollect.php",
                    data:{
                            comid:comid
                    },
                    dataType:"json",
                    success:function(response){
                        $(".collection").addClass("collect_active");
                        $(".collection").attr("value",111);
                        alert("收藏成功！");
                    },
                    error:function(){
                        alert("失败！");
                    }
                });
            }
            else if($(".collection").attr("value")==777){
                alert("请先登录！");
            }
        }
    </script>
</body>

</html>
