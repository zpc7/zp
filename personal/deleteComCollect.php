<?php


include "../include.php";
//1、接收参数
$comCollectId=intval($_GET['comCollectId']);
$memberid=$_SESSION['memberid'];
//2、删除数据表
$sql_deleteComCollect="delete from zp_collect where cid={$comCollectId} and pid={$memberid} and jobid=0";
$reult=mysqli_query($tp,$sql_deleteComCollect);
$rows=mysqli_affected_rows($tp);

//3、返回处理结果
if($rows){
	$response=array(
	'errno'		=>0,
	'errmsg'	=>'success',
	'data'		=>true	
	);
}
else{
	$response=array(
	'errno'		=>-1,
	'errmsg'	=>'failed',
	'data'		=>false	
	);
}

echo json_encode($response);



?>