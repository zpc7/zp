<?php
    include "../include.php";
    $cid=$_SESSION['memberid'];
    $sql="select * from zp_jobs where jobsubid='{$cid}'";
    $row=fetchAll($sql,$tp);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>发布职位</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .job-desc{
            max-width: 240px;
        }
    </style>
</head>

<body>
<script type="text/javascript">
    function editJob(id){
        window.location="editJob.php?id="+id;
    }
    function delJob(id){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
            window.location="doCompanyAction.php?act=delJob&id="+id;
        }
    }
</script>
    <div class="wrapper">
    	<table class="table table-hover">
           <caption>职位列表</caption>
           <thead>
              <tr>
                 <th>职位名称</th>
                 <th>工作地点</th>
                 <th>岗位描述</th>
                 <th>分类</th>
                 <th>薪酬</th>
                 <th>操作</th>
              </tr>
           </thead>
           <tbody>
            <?php  foreach($row as $row):?>
              <tr>
                 <td><?php echo $row['jobname'];?></td>
                 <td><?php echo $row['jobaddress'];?></td>
                 <td style="max-width:240px;"><?php echo $row['jobdesc'];?></td>
                 <td><?php echo $row['jobcate'];?></td>
                 <td><?php echo $row['jobpay'];?></td>
                 <td>
                 <button type="button" class="btn btn-success btn-sm" onclick="editJob(<?php echo $row['jobid'];?>)">修改</button>
                 <button type="button" class="btn btn-danger btn-sm" onclick="delJob(<?php echo $row['jobid'];?>)">删除</button></td>
              </tr>
              <?php endforeach;?>
           </tbody>
        </table>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/swiper.min.js"></script>
</body>


</html>
