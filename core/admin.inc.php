<?php

	//管理员登录
	function adminLogin($conn){
		$name=$_POST['username'];
		$pw=$_POST['password'];
		$verify=$_POST['verify'];
		//采用COOKIE来保存验证码信息
		//采用SESSION保存验证码信息失败
		$sverify=$_COOKIE['verify'];
		if($verify==$sverify){
				$sql="select * from zp_admin where username='{$name}' and password='{$pw}'";
				//根据登录名和密码查询数据表
				$result=mysqli_query($conn,$sql);
				if($result->num_rows == 1){
					$row = $result->fetch_assoc();
					//$_SESSION['cid']用于存放当前登录用户的id
					$_SESSION['adminNickName']=$row['nickname'];
					$_SESSION['adminId']=$row['id'];
					header("location:index.php");
					
				}
				else{
					alertMes("用户名或者密码错误","login.php");
				}

		}
		else{
			alertMes("验证码错误","login.php");
		}
	}

	/**
	 * 检测是否有管理员登陆.
	 */
	function checkAdminLogined(){
		if(@$_SESSION['adminId']==""){
			alertMes("请先登陆","login.php");
		}
	}

	/**
	 * 注销管理员
	 */
	function adminlogout(){
		$_SESSION=array();
		session_destroy();
		header("location:login.php");
	}


	/**
	 * 添加管理员
	 * @return string
	 */
	function addAdmin($tp){
		$arr=$_POST;
		$arr['password']=$_POST['password'];
		if(insert("zp_admin",$arr,$tp)){
			$mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
		}else{
			$mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
		}
		return $mes;
	}

	/**
	 * 得到所有的管理员
	 * @return array
	 */
	function getAllAdmin($tp){
		
		$sql="select * from zp_admin ";
		$rows=fetchAll($sql,$tp);
		return $rows;
	}


	/**
	 * 编辑管理员
	 * @param int $id
	 * @return string
	 */
	function editAdmin($id,$tp){
		$arr=$_POST;
		$arr['password']=$_POST['password'];
		if(update("zp_admin", $arr,$tp,"id={$id}")){
			$mes="编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
		}else{
			$mes="编辑失败!<br/><a href='listAdmin.php'>请重新修改</a>";
		}
		return $mes;
	}

	/**
	 * 删除管理员的操作
	 * @param int $id
	 * @return string
	 */
	function delAdmin($id,$tp){
		if(delete("zp_admin",$tp,"id={$id}")){
			$mes="删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
		}else{
			$mes="删除失败!<br/><a href='listAdmin.php'>请重新删除</a>";
		}
		return $mes;
	}


	/**
	 * 编辑求职者信息
	 * @param int $id
	 * @return string
	 */
	function editPersonal($id,$tp){
		$arr=$_POST;
		if(update("zp_personal", $arr,$tp,"id={$id}")){
			$mes="编辑成功!<br/><a href='listPersonal.php'>查看求职者用户列表</a>";
		}else{
			$mes="编辑失败!<br/><a href='editPersonal.php'>请重新修改</a>";
		}
		return $mes;
	}

	/**
	 * 重置求职者密码
	 * @param int $id
	 * @return string
	 */
	function resetPersonalPWD($id,$tp){
		$arr['password']="777";
		if(update("zp_personal", $arr,$tp,"id={$id}")){
			$mes="密码重置成功!<br/><a href='listPersonal.php'>查看求职者用户列表</a>";
		}else{
			$mes="密码重置失败!<br/><a href='editPersonal.php'>请重新修改</a>";
		}
		return $mes;
	}

	/**
	 * 编辑企业信息
	 * @param int $id
	 * @return string
	 */
	function editCompany($id,$tp){
		$arr=$_POST;
		if(update("zp_company", $arr,$tp,"id={$id}")){
			$mes="编辑成功!<br/><a href='listCompany.php'>查看企业用户列表</a>";
		}else{
			$mes="编辑失败!<br/><a href='editCompany.php'>请重新修改</a>";
		}
		return $mes;
	}

	/**
	 * 重置企业密码
	 * @param int $id
	 * @return string
	 */
	function resetCompanyPWD($id,$tp){
		$arr['password']="888";
		if(update("zp_company", $arr,$tp,"id={$id}")){
			$mes="密码重置成功!<br/><a href='listCompany.php'>查看企业用户列表</a>";
		}else{
			$mes="密码重置失败!<br/><a href='editCompany.php'>请重新修改</a>";
		}
		return $mes;
	}


	/**
	 * 编辑职位信息
	 * @param int $id
	 * @return string
	 */
	function adminEditJob($id,$tp){
		$arr=$_POST;
		if(update("zp_jobs", $arr,$tp,"jobid={$id}")){
			$mes="编辑成功!<br/><a href='listJob.php'>查看职位信息列表</a>";
		}else{
			$mes="编辑失败!<br/><a href='editJob.php'>请重新修改</a>";
		}
		return $mes;
	}

	/**
	 * 删除职位信息
	 * @param int $id
	 * @return string
	 */
	function adminDelJob($id,$tp){
		if(delete("zp_jobs",$tp,"jobid={$id}")){
			$mes="删除成功!<br/><a href='listJob.php'>查看职位信息列表</a>";
		}else{
			$mes="删除失败!<br/><a href='listJob.php'>请重新删除</a>";
		}
		return $mes;
	}

?>