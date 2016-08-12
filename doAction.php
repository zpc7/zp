<?php 
	include 'include.php';
	$act=$_REQUEST['act'];
	if($act==="reg"){
		$type=$_REQUEST['type'];
		$mes=reg($tp,$type);
	}elseif($act==="login"){
		$mes=login($tp);
	}elseif($act==="logout"){
		logout();
	}
?>
<?php 
	if($mes){
		echo $mes;
	}
?>
