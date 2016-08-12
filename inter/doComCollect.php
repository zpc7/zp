<?php 
require_once '../include.php';


	if(isset($_SESSION['memberid'])&&$_SESSION['membertype']==1){
			//企业收藏操作
			//当前登录用户的id
			$memberid = $_SESSION['memberid'];
			$comid = intval($_POST['comid']);

			//向求职者收藏表插入记录
			$sql_comcollect="insert into zp_collect(pid,cid,jobid) values({$memberid},{$comid},0)";
			$result=mysqli_query($tp,$sql_comcollect);

				$response=array(
					'data'=>true
					);
			echo json_encode($response);

		
		}
	else{
		echo json_encode("shibai");
	}
?>

