<?php 
	require_once '../include.php';
	$act=$_REQUEST['act'];
	$id=$_REQUEST['id'];


	if($act=="editPWD"){
		$mes=editPWD($tp,$id);
	}elseif($act=="editBaseinfo"){
		$mes=editBaseinfo($tp,$id);
	}elseif ($act=="uploadAttachmentResume") {
		$mes=uploadAttachmentResume($tp,$id);
		//如果$mes有值，则如下处理
		if($mes){
			echo "<script src='../js/jquery.min.js'></script> <script src='../js/bootstrap.min.js'></script>";
			echo '<link rel="stylesheet" href="../css/bootstrap.css">';
			$html = <<<HTML
				<div class="container">
			    	<div id="myAlert" class="alert alert-success">
	      				<a href="#" class="close" data-dismiss="alert">&times;</a>
	      				<strong>附件简历上传成功！点击 × 返回个人中心！</strong>
	  				</div>
				</div>
				<script type="text/javascript">
				    $(function(){
				       $("#myAlert").bind('closed.bs.alert', function () {
				       	window.location.href="personal.php";
				       });
				    });
				</script> 
HTML;
			echo $html;
		}
	}
?>

