<?php 
require_once '../include.php';


	if(isset($_SESSION['memberid'])&&$_SESSION['membertype']==1){
			//企业取消收藏操作
			//当前登录用户的id
			$memberid = $_SESSION['memberid'];
			$comid = intval($_POST['comid']);

			//向求职者收藏表删除记录
			$sql_comcollect="delete from zp_collect where pid={$memberid} and cid={$comid}";
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

