<?php 
require_once '../include.php';


	if(isset($_SESSION['memberid'])&&$_SESSION['membertype']==1){
			//职位收藏操作
			//当前登录用户的id
			$memberid = $_SESSION['memberid'];
			$jobid = intval($_POST['jobid']);
			$jobsubid = intval($_POST['jobsubid']);

			//向求职者收藏表插入记录
			$sql_jobcollect="insert into zp_collect(pid,cid,jobid) values({$memberid},{$jobsubid},{$jobid})";
			$result=mysqli_query($tp,$sql_jobcollect);

				$response=array(
					'data'=>true
					);
			echo json_encode($response);

		
		}
	else{
		echo json_encode("shibai");
	}
?>

