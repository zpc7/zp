<?php



	//修改密码
	function editPWD($tp,$id){
		$arr=$_POST;
		$sql="select password from zp_personal where id='{$id}'";
		$row=fetchOne($sql,$tp);
		if($row['password']==$arr['pw_old']){
				//修改密码的操作 
			$sqlpwd="update zp_personal set password={$arr['pw_now']} where id='{$id}'";
			$result=mysqli_query($tp,$sqlpwd);
			if(!$result)
			{
			  die('Could not update data: ' . mysql_error());
			}
			else{
				echo "<script>alert('密码更新成功！请重新登录');</script>";
				echo "<br/>3秒钟后跳转到登陆页面!<meta http-equiv='refresh' content='3;url=../login.php'/>";
			}
			print_r($result);
		}
		else{
			echo "<script>alert('旧密码填写错误！');</script>";
			echo "<br/>3秒钟后跳转到登陆页面!<meta http-equiv='refresh' content='3;url=../login.php'/>";
		}
	}
	//修改基本信息
	function editBaseinfo($tp,$id){
		$arr=$_POST;
		// print_r($arr);
		$res=update("zp_personal",$arr,$tp,"id={$id}");
		echo "<br/>基本信息修改成功，1秒钟后跳转到个人中心!<meta http-equiv='refresh' content='1;url=../personal/personal.php'/>";
		return $res;
	}


	//上传附件简历
	function uploadAttachmentResume($tp,$id){
		$fileInfo=$_FILES['uploadAttachmentResume'];
		$allowExt=array("docx","pdf","text","ppt");
		$maxSize=10485760;
		$mes=uploadFile($fileInfo,$allowExt,$maxSize);
		//先判断当前数据表中是否有数据，有就更新，没有就新增
		$sql="select * from zp_resumes where pid='{$id}'";
		$data=mysqli_query($tp,$sql);
		if($data->num_rows){
			$sql="update zp_resumes set resumepath='{$mes}' where pid='{$id}'";
			mysqli_query($tp,$sql);
			// return mysqli_insert_id($tp);
		}
		else{
			$sql="insert into zp_resumes(pid,resumepath) values({$id},'{$mes}')";

			// $sql_deliver="insert into zp_deliver(pid,jobid) values({$memberid},{$jobid})";
			mysqli_query($tp,$sql);
			// var_dump($sql);
		}
		return $mes;
	}
?>