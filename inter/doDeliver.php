<?php 
require_once '../include.php';


	if(isset($_SESSION['memberid'])&&$_SESSION['membertype']==1){
		//简历投递操作（投递到企业简历收取表）
		//当前登录用户的id
		$memberid = $_SESSION['memberid'];
		$jobid = intval($_POST['jobid']);
		$jobsubid = intval($_POST['jobsubid']);


		// //向zp_cresumes添加一条数据

		//查询是否已经投递
		$sql="select * from zp_cresumes where pid={$memberid} and cid={$jobsubid} and jobid={$jobid}";
		$data=mysqli_query($tp,$sql);
		if($data->num_rows){
			$response=array(
				'data'=>false
				);
		}
		else{
			$sql="insert into zp_cresumes(pid,cid,jobid) values({$memberid},{$jobsubid},{$jobid});";
			mysqli_query($tp,$sql);
			$row = mysqli_insert_id($tp);
			if($row){
				$response=array(
					'data'=>true
					);
			}
			//向求职者投递箱插入记录
			$sql_deliver="insert into zp_deliver(pid,jobid) values({$memberid},{$jobid})";
			mysqli_query($tp,$sql_deliver);
		}

		echo json_encode($response);
		}
	else{
		echo json_encode("shibai");
	}
?>

