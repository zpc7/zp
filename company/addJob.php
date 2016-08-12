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
</head>

<body>
    <div class="wrapper">
    	<form role="form" action="doCompanyAction.php?act=addJob&id=<?php echo $row['id'];?>" method="post">
    	    <p class="text-center">发布新职位</p>
    	  <div class="form-group">
    	    <label for="name">职位名称</label>
    	    <input type="text" class="form-control" name="jobname">
    	  </div>
    	  <div class="form-group">
    	    <label for="name">职位描述</label>
            <textarea class="form-control job-desc" rows="8" name="jobdesc"></textarea>
    	  </div>
    	  <div class="form-group">
    	    <label for="name">职位类别</label>
    	    <input type="text" class="form-control" name="jobcate">
    	  </div>
          <div class="form-group">
            <label for="name">工作地点</label>
            <input type="text" class="form-control" name="jobaddress">
          </div>
          <div class="form-group">
            <label for="name">薪资待遇</label>
            <input type="text" class="form-control" name="jobpay">
          </div>
          <button type="submit" class="btn btn-success">确认发布</button>
    	 </form>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/swiper.min.js"></script>
</body>

</html>
