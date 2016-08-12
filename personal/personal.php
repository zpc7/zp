<?php
    include "../include.php";
    $pid=$_SESSION['memberid'];//当前登录用户的id
    $sql="select * from zp_personal where id='{$pid}'";
    $row=fetchOne($sql,$tp);

    $sql_resume="select * from zp_resumes where pid='{$pid}'";
    $resume=fetchOne($sql_resume,$tp);
?>
<!-- 求职者收藏信息展示 -->
<?php
// 收藏信息展示
    $sql_collect_job="select * from zp_collect where pid={$pid} and jobid!=0";
    $row_collect_job=fetchAll($sql_collect_job,$tp);
    // var_dump($row_collect_job);


    $sql_collect_com="select * from zp_collect where pid={$pid} and jobid=0";
    $row_collect_com=fetchAll($sql_collect_com,$tp);
    // var_dump($row_collect_com);




?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>个人中心</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="./css/personal.css">
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
                           echo $row['name'];
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
    <div class="wrapper">
        <div class="main">
            <div class="baseinfo">
                <div class="head-img">
                    <img src="../images/head-img.png" alt="">
                </div>
                <div class="name">
                    <?php echo $row['name'];?>
                </div>
                <p class="text-center"><?php echo $row['gender'];?> | <?php echo $row['age'];?> | <?php echo $row['major'];?> | <?php echo $row['edu'];?></p>
                <p class="text-center"><?php echo $row['tell'];?></p>
                <!-- 修改图标 -->
                <div class="baseinfoEdit" data-toggle="tooltip" data-placement="left" title="点击修改基本信息">
                    <p><a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" ></span></a class="btn btn-primary btn-lg"></p>   
                </div>
            </div>
            <div class="resume-list">
                <h3 class="h3-center">我的简历</h3>     
                <div class="list">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="resume-name" data-toggle="tooltip" data-placement="top" title="当前仅支持附件简历"><?php echo $row['name'];?>的个人简历</p>
                            <p>最近更新 <?php echo $resume['updatetime']?></p>
                         </div>
                         <div class="col-md-3 col-md-offset-3">
                            <a href="<?php echo $resume['resumepath'];?>" class="btn btn-info btn-lg" target="_blank">
                            预览我的简历
                            </a>
                         </div>
                         <div class="col-md-3" data-toggle="tooltip" data-placement="top" title="操作将会覆盖以前的简历">
                             <a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#uploadAttachmentResume">
                               <span class="glyphicon glyphicon-plus"></span> 上传新的附件简历
                             </a>
                         </div>
                    </div>
                </div>
            </div>
            <div class="collect" id="collection">
                <h3 class="h3-center">我的收藏</h3>
                <div class="panel">
                    <ul id="myCollect" class="nav nav-tabs">
                        <li class="active"><a href="#job" data-toggle="tab">
                      收藏的职位</a>
                        </li>
                        <li><a href="#company" data-toggle="tab">收藏的企业</a></li>
                    </ul>
                    <div id="myCollectContent" class="tab-content">
                    <!-- 职位收藏 -->
                        <div class="tab-pane fade in active" id="job">
                        <?php foreach($row_collect_job as $rowJ):?>
                            <?php 
                                $sql_job="select * from zp_jobs where jobid={$rowJ['jobid']}";
                                $row_job=fetchOne($sql_job,$tp);

                                $sql_com="select * from zp_company where id={$rowJ['cid']}";
                                $row_com=fetchOne($sql_com,$tp);

                            ?>
                            <div class="item" id="job_<?php echo $rowJ['jobid'];?>">
                              <div>
                                <p>
                                  <strong><a href="../inter/detail_job.php?id=<?php echo $row_job['jobid'];?>" style="color:black"><?php echo $row_job['jobname'];?></a></strong>
                                </p>
                                <a href="../inter/detail_com.php?id=<?php echo $row_com['id'];?>"><img src="<?php echo $row_com['logopath'];?>"></a>
                              </div>
                              <ul>
                                <li class="close">
                                <a href="javascript:deleteJobCollect(<?php echo $rowJ['jobid'];?>);">取消收藏</a>
                                </li>
                                <li class="deliver">
                                <a href="../inter/detail_job.php?id=<?php echo $row_job['jobid'];?>">投个简历</a>
                                </li>
                              </ul>
                            </div>
                           <?php endforeach;?> 
                        </div>
                        <!-- 企业收藏 -->
                        <div class="tab-pane fade" id="company">
                        <?php foreach($row_collect_com as $rowC):?>
                          <?php 
                              $sql_com="select * from zp_company where id={$rowC['cid']}";
                              $row_coms=fetchOne($sql_com,$tp);

                          ?>
                            <div class="item" id="com_<?php echo $row_coms['id'];?>">
                              <div>
                                <p>
                                  <strong><a href="../inter/detail_com.php?id=<?php echo $row_coms['id'];?>" style="color:black"><?php echo $row_coms['name'];?></a></strong>
                                </p>
                                <p class="com_descip" title="<?php echo $row_coms['tag'];?>"><?php echo $row_coms['tag'];?></p>
                                <img src="<?php echo $row_coms['logopath'];?>">
                              </div>
                              <ul>
                                <li class="close" id="com_delete">
                                <a href="javascript:deleteComCollect(<?php echo $row_coms['id'];?>);">取消收藏</a>
                                </li>
                              </ul>
                            </div>
                            <?php endforeach;?> 
                        </div>
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
    <!-- 模态框（myModal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form role="form" action="doPersonalAction.php?act=editBaseinfo&id=<?php echo $row['id'];?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">修改基本信息</h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center" >姓名:
                        <span data-toggle="tooltip" data-placement="right" title="修改请联系管理员"><?php echo $row['name'];?></span>
                    </h3>
                    <div class="form-group">
                       <label for="name">性别</label>
                       <select class="form-control" name="gender">
                          <option value="男">男</option>
                          <option value="女">女</option>
                          <option value="保密">保密</option>
                       </select>
                    </div>
                  <div class="form-group">
                    <label for="name">年龄</label>
                    <input class="form-control" rows="8" name="age" placeholder="<?php echo $row['age'];?>"></input>
                  </div>
                  <div class="form-group">
                    <label for="name">专业</label>
                    <input type="text" class="form-control" name="major" placeholder="<?php echo $row['major'];?>">
                  </div>
                  <div class="form-group">
                    <label for="name">学历</label>
                    <input type="text" class="form-control" name="edu" placeholder="<?php echo $row['edu'];?>">
                  </div>
                  <div class="form-group">
                    <label for="name">联系方式</label>
                    <input type="text" class="form-control" name="tell" placeholder="<?php echo $row['tell'];?>">
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        提交更改
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal -->
    </div>
    <!-- 模态框（uploadAttachmentResume） -->
    <div class="modal fade" id="uploadAttachmentResume" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <form role="form" action="doPersonalAction.php?act=uploadAttachmentResume&id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel1">上传新的附件简历</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                           <label for="inputfile">选择上传文件</label>
                           <input type="file" name="uploadAttachmentResume" title="支持word、pdf、ppt、txt格式文件，大小不超过10M">
                           <p class="help-block">支持word、pdf、ppt、txt格式文件，文件大小需小于10M</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            确认上传
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal -->
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function () { $("[data-toggle='tooltip']").tooltip(); });
    </script>
    <script type="text/javascript">
      function deleteJobCollect(jobCollectId){
            //通过ajax将收藏表的id传递给PHP脚本进行数据表的删除
            var url="deleteJobCollect.php";
            var data={"jobCollectId":jobCollectId};
            var success=function(response){
              if(response.errno==0){
                  $("#job_"+jobCollectId).fadeOut();
              }

            };
            $.get(url,data,success,"json");

      }
    </script>
    <script type="text/javascript">
      function deleteComCollect(comCollectId){
            //通过ajax将收藏表的id传递给PHP脚本进行数据表的删除
            var url="deleteComCollect.php";
            var data={"comCollectId":comCollectId};
            var success=function(response){
              if(response.errno==0){
                  $("#com_"+comCollectId).fadeOut();
              }

            };
            $.get(url,data,success,"json");

      }
    </script>
</body>

</html>
