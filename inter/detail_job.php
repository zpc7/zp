<?php
    include "../include.php";
    $job_id=$_REQUEST['id'];
    $sql="select * from zp_jobs where jobid={$job_id}";
    //职位信息
    $job=fetchOne($sql,$tp);

    $tmp=$job['jobsubid'];
    $sql_com="select * from zp_company where id={$tmp}";
    //职位对应公司信息
    $com=fetchOne($sql_com,$tp);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>职位详情</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" href="css/detail_job.css">
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
            // 判断当前职位信息+登录的求职者是否已经收藏
            $login=$_SESSION['memberid'];
            $sql_collect="select * from zp_collect where pid={$login} and jobid={$job_id}";
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
    <!-- 导航结束 -->
    <!-- 详情页 -->
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="job-name"><?php echo $job['jobname'];?></div>
                            <div class="update-time"><?php echo $job['jobtime'];?>更新</div>
                            <a class="collection" href="javascript:collect(<?php echo $job_id;?>,<?php echo $tmp;?>);" value="<?php 
                            if(isset($_SESSION['memberid'])&&$_SESSION['membertype']==1)
                                {echo $flag;}
                            else{
                                echo "777";
                            }
                            ?>"></a>
                        </div>
                        <div class="panel-body">
                            <div class="job-description">
                                职位描述
                            </div>
                            <div class="content">
                                <?php echo $job['jobdesc'];?>
                            </div>
                            <!-- 投递简历 -->
                            <div class="deliver">
                                <a href="javascript:deliver(<?php echo $job_id;?>,<?php echo $tmp;?>);">投递简历</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="com">所属公司</div>
                        </div>
                        <div class="panel-body">
                            <div class="com-logo">
                                <a href="../inter/detail_com.php?id=<?php echo $tmp;?>"><img src="<?php echo $com['logopath'];?>"></a>
                            </div>
                            <div class="text-center">
                                <span class="com-name"><?php echo $com['name'];?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="box"></div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        if($(".collection").attr("value")=='111'){
            $(".collection").addClass("collect_active");
        }
    </script>
    <script type="text/javascript">
        function collect(jobid,jobsubid){
            // alert(jobid);
            // alert(jobsubid);
            //已经收藏->取消收藏
            if($(".collection").attr("value")==111){
                $.ajax({
                    type:"POST",
                    url:"doJobCancelCollect.php",
                    data:{
                            jobid:jobid,
                            jobsubid:jobsubid
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
                    url:"doJobCollect.php",
                    data:{
                            jobid:jobid,
                            jobsubid:jobsubid
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
    <!-- 简历投递 -->
    <script type="text/javascript">
        function deliver(jobid,jobsubid){
            //判断当前是否有登录或者登陆身份是否为求职者
            $.ajax({
                'url':'doDeliver.php',
                'type':'post',
                'data':{
                    'jobid':jobid,
                    'jobsubid':jobsubid
                },
                'success':function(response){
                        if (response.data==true) {
                            alert("投递成功！");
                        }
                        else if(response.data==false){
                            alert("您已投递成功，请不要重复投递！");
                        }else{
                            alert("请先用求职者身份登录！");
                        }
                },
                'dataType':'json',
            });
        }
    </script>
</body>

</html>
