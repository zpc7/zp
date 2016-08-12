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
    <title>基本信息修改</title>
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
    	<form role="form" action="doCompanyAction.php?act=editBasic&id=<?php echo $row['id'];?>" method="post">
            <h3 class="text-center" >公司名称:
                <span href="#" data-toggle="tooltip" data-placement="right" title="修改请联系管理员"><?php echo $row['name'];?></span>
            </h3>
    	  <div class="form-group">
    	    <label for="name">公司详细地址</label>
    	    <input type="text" class="form-control" name="address" placeholder="<?php echo $row['address'];?>">
    	  </div>
    	  <div class="form-group">
    	    <label for="name">公司简介</label>
            <textarea class="form-control" rows="5" name="description" placeholder="<?php echo $row['description'];?>"></textarea>
    	  </div>
    	  <div class="form-group">
    	    <label for="name">联系方式</label>
    	    <input type="text" class="form-control" name="tell" placeholder="<?php echo $row['tell'];?>">
    	  </div>
          <div class="form-group">
            <label for="name">所属行业</label>
            <input type="text" class="form-control" name="industry" placeholder="<?php echo $row['industry'];?>">
          </div>
          <div class="form-group">
            <label for="name">公司规模</label>
            <input type="text" class="form-control" name="scale" placeholder="<?php echo $row['scale'];?>">
          </div>
          <div class="form-group">
            <label for="name">公司标签</label>
            <input type="text" class="form-control" name="tag" placeholder="<?php echo $row['tag'];?>">
          </div>
          <div class="form-group">
            <label for="name">成立日期</label>
            <input type="date" class="form-control" name="estabtime" placeholder="<?php echo $row['estabtime'];?>">
          </div>
          <div class="form-group">
            <label for="name">官方网址</label>
            <input type="text" class="form-control" name="url" placeholder="<?php echo $row['url'];?>">
          </div>
          <button type="submit" class="btn btn-success">确认修改</button>
    	 </form>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/swiper.min.js"></script>
    <script>
        $(function () { $("[data-toggle='tooltip']").tooltip(); });
    </script>
</body>

</html>
