<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>首页</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <!-- banner -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide blue-slide"></div>
            <div class="swiper-slide red-slide"></div>
            <div class="swiper-slide orange-slide"><a href="inter/detail_com.php?id=12"></a></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- banner结束 -->
    <!-- 放在最上面会影响swiper的兼容性 -->

    <?php
        $sql_com="select id,logopath from zp_company limit 6";
        $coms=fetchAll($sql_com,$tp);
        // 热门职位信息展示
        $sql_hot="select * from zp_jobs ORDER BY jobscan DESC limit 6";
        $job_hot=fetchAll($sql_hot,$tp);
        // //得到结果集中的行数
        // $num=getResultNum($sql,$tp);
        // echo $num;
        // 最新职位信息展示
        $sql_new="select * from zp_jobs ORDER BY jobtime DESC limit 6";
        $job_new=fetchAll($sql_new,$tp);
    ?>
    <!-- 搜索框 -->
    <div class="container" id="index-search">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" id="index-search-input" val="" placeholder="输入你想输入的东西">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" id="index-search-btn">
                 Search
              </button>
           </span>
        </div>
        <!-- /input-group -->
    </div>
    <!-- 搜索框结束 -->
    <!-- 公司列表 -->
    <div class="company">
        <div class="container">
            <div class="row">
            <?php foreach($coms as $com):?>
                <div class="col-md-2">
                   <a href="inter/detail_com.php?id=<?php echo $com['id'];?>">
                       <img src="<?php echo substr($com['logopath'], 3);?>">
                   </a>
                </div>
            <?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- 公司列表结束 -->
    <!-- 职位分类 -->
   
    <!-- 职位分类结束 -->
    <!-- 热门职位 -->
    <div class="rmzw">
        <div class="container">
            <h2 class="h2-center">热门职位</h2>
            <div class="job-info">
            <?php foreach($job_hot as $job):?>
                <div class="job-info-module">
                    <div class="overshadow">
                        <p><a href="inter/detail_job.php?id=<?php echo $job['jobid'];?>"><?php echo $job['jobname']?></a></p>
                        <p><?php echo $job['jobcate']?></p>
                        <p><span class="glyphicon glyphicon-map-marker"><?php echo $job['jobaddress']?></span>&nbsp;&nbsp;<span class="glyphicon glyphicon-usd"><?php echo $job['jobpay']?></span> </p>
                        <?php $jobsubid=$job['jobsubid'];
                            $sql_forcom="select logopath,id from zp_company where id={$jobsubid}";
                            $result=mysqli_query($tp,$sql_forcom);
                            $com=mysqli_fetch_assoc($result);
                        ?>
                        <div class="company-brand">
                            <a href="inter/detail_com.php?id=<?php echo $com['id'];?>">
                                <img src="<?php echo substr($com['logopath'], 3);?>">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- 热门职位结束 -->
    <!-- 最新职位 -->
    <div class="zxzw">
        <div class="container">
            <h2 class="h2-center">最新职位</h2>
            <div class="job-info">
            <?php foreach($job_new as $job):?>
                <div class="job-info-module">
                    <div class="overshadow">
                        <p><a href="inter/detail_job.php?id=<?php echo $job['jobid'];?>"><?php echo $job['jobname']?></a></p>
                        <p><?php echo $job['jobcate']?></p>
                        <p><span class="glyphicon glyphicon-map-marker"><?php echo $job['jobaddress']?></span>&nbsp;&nbsp;<span class="glyphicon glyphicon-usd"><?php echo $job['jobpay']?></span> </p>
                        <?php $jobsubid=$job['jobsubid'];
                            $sql_forcom="select logopath,id from zp_company where id={$jobsubid}";
                            $result=mysqli_query($tp,$sql_forcom);
                            $com=mysqli_fetch_assoc($result);
                        ?>
                        <div class="company-brand">
                            <a href="inter/detail_com.php?id=<?php echo $com['id'];?>">
                                <img src="<?php echo substr($com['logopath'], 3);?>">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
                <div class="clear"></div>
            </div>
             <a href="search.php?val=" class="more">
              <span class="glyphicon glyphicon-circle-arrow-right" style="font-size: 18px"></span> 更多
            </a>

        </div>
    </div>
    <!-- 最新职位结束 -->
    <!-- 底部 -->
    <div class="footer">
    </div>
    <!-- 底部结束 -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <input type="text">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/index.js"></script>
    <script>
        // //给搜索按钮注册事件
        $(document).on("click", "#index-search-btn", function(e) {
            var keywords=$("#index-search-input").val();
            window.location.href="search.php?val="+keywords; 
        });

    </script>
</body>

</html>
