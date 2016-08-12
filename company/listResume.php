<?php
    include "../include.php";
    $cid=$_SESSION['memberid'];
    $sql="select * from zp_cresumes where cid='{$cid}'";
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
    <div class="wrapper">
    	<table class="table table-hover">
           <caption>求职者投递的简历</caption>
           <thead>
              <tr>
                 <th>姓名</th>
                 <th>投递岗位</th>
                 <th>投递时间</th>
                 <th>简历操作</th>
              </tr>
           </thead>
           <tbody>
            <?php  foreach($row as $row):?>
              <tr>
                 <td><?php 
                    // echo $row['pid'];
                    $Rpid=$row['pid'];
                    $sql_personal="select name from zp_personal where id={$Rpid}";
                    $row_personal=fetchOne($sql_personal,$tp);
                    echo $row_personal['name'];
                 ?></td>
                 <td><?php
                    // echo $row['jobid'];
                    $Rjobpid=$row['jobid'];
                    $sql_job="select jobname from zp_jobs where jobid={$Rjobpid}";
                    $row_job=fetchOne($sql_job,$tp);
                    echo $row_job['jobname'];
                 ?></td>
                 <td style="max-width:240px;"><?php echo $row['receivedtime'];?></td>
                 <td>
                 <button type="button" class="btn btn-success btn-sm"><a href="
                    <?php
                        $Rpid=$row['pid'];
                        $sql_resume="select resumepath from zp_resumes where pid={$Rpid}";
                        $row_resume=fetchOne($sql_resume,$tp);
                        echo $row_resume['resumepath'];
                    ?>
                 ">预览</a>
                 </button>
                 <button type="button" class="btn btn-danger btn-sm"">
                    <a href="doCompanyAction.php?act=resumeDownload&id=<?php echo $row_resume['resumepath'];?>">下载</a>
                 </button>
                 </td>
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
