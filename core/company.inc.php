<?php


//修改主页信息
function editBasic($tp,$id){
	$arr=$_POST;
	print_r($arr);
	$res=update("zp_company",$arr,$tp,"id={$id}");
	return $res;
}
//发布新的职位信息
function addJob($tp,$id){
	$arr=$_POST;
	$arr['jobsubid']=$id;
	$arr['jobtime']=date("Y-m-d h:i:s");
	print_r($arr);
	$res=insert("zp_jobs",$arr,$tp);
	return $res;
}
//修改职位信息
function editJob($tp,$id){
	$arr=$_POST;
	print_r($arr);
	$res=update("zp_jobs",$arr,$tp,"jobid={$id}");
	return $res;
}
//删除职位信息
function delJob($tp,$id){
	$arr=$_POST;
	print_r($arr);
	$res=delete("zp_jobs",$tp,"jobid={$id}");
	return $res;
}
//上传公司logo
function uploadLogo($tp,$id){
	$fileInfo=$_FILES['logoFile'];
	$mes=uploadFile($fileInfo);
	// print_r($mes);
	$sql="update zp_company set logopath='{$mes}' where id='{$id}'";
	print_r($sql);
	mysqli_query($tp,$sql);
	return mysqli_insert_id($tp);

}


//修改密码
function editComPWD($tp,$id){
	$arr=$_POST;
	$sql="select password from zp_company where id='{$id}'";
	$row=fetchOne($sql,$tp);
	if($row['password']==$arr['pw_old']){
			//修改密码的操作 
		$sqlpwd="update zp_company set password={$arr['pw_now']} where id='{$id}'";
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

?>