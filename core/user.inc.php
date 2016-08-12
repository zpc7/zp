<?php
	//注册
	function reg($conn,$type){
		// $arr=$_POST;
		$arr['password']=$_POST['password'];
		$arr['username']=$_POST['username'];
		$arr['name']=$_POST['name'];
		// $arr['regtime']=time();
		$mes="";
		$verify=$_POST['verify'];
		//采用COOKIE来保存验证码信息
		//采用SESSION保存验证码信息失败
		$sverify=$_COOKIE['verify'];
		if($verify==$sverify){
			// 注册类型判断
			if($type=="per"){
				if(insert("zp_personal", $arr,$conn))
				$mes="个人用户注册成功!<br/>3秒钟后跳转到登陆页面!<meta http-equiv='refresh' content='3;url=./login.php'/>";
			}
			elseif ($type=="com") {
				if(insert("zp_company", $arr,$conn))
				$mes="企业用户注册成功!<br/>3秒钟后跳转到登陆页面!<meta http-equiv='refresh' content='3;url=./login.php'/>";
			}
		}
		else{
			alertMes("验证码错误","../zp/register.php");
		}	
		return $mes;
	}
	// 注销
	function logout(){
		$_SESSION=array();
		// if(isset($_COOKIE[session_name()])){
		// 	setcookie(session_name(),"",time()-1);
		// }
		// if(isset($_COOKIE['cid'])){
		// 	setcookie("cid","",time()-1);
		// }
		session_destroy();
		header("location:./index.php");
	}
	// 登录
	function login($conn){
		$name=$_POST['username'];
		$pw=$_POST['password'];
		$identify=$_POST['identify'];
		$verify=$_POST['verify'];
		//采用COOKIE来保存验证码信息
		//采用SESSION保存验证码信息失败
		$sverify=$_COOKIE['verify'];
		if($verify==$sverify){
			//企业用户处理
			if($identify=="company"){
				$sql="select * from zp_company where username='{$name}' and password='{$pw}'";
				//根据登录名和密码查询数据表（容易被sql攻击）
				$result=mysqli_query($conn,$sql);
				if($result->num_rows == 1){
					$row = $result->fetch_assoc();
					//$_SESSION['cid']用于存放当前登录用户的id
					$_SESSION['memberid']=$row['id'];
					$_SESSION['membertype']=0;
					$_SESSION['membername']=$row['name'];
					header('Location:./company/company.php');

				}
				else{
					alertMes("用户名或者密码错误","../1/login.php");
				}

			}
			//个人用户处理
			elseif($identify=="personal"){
				$sql="select id,name from zp_personal where username='{$name}' and password='{$pw}'";
				$result=mysqli_query($conn,$sql);
				if($result->num_rows == 1){
					$row = $result->fetch_assoc();
					$_SESSION['memberid']=$row['id'];
					$_SESSION['membertype']=1;
					$_SESSION['membername']=$row['name'];
					header('Location:./index.php');
				}
				else{
					alertMes("用户名或者密码错误","../zp/login.php");
				}

			}
		}
		else{
			alertMes("验证码错误","../zp/login.php");
		}
	}
		/**
		 * 检测是否有登陆
		 */
		function checkLogined(){
			if($_SESSION['memberid']==""&&$_COOKIE['memberid']==""){
				alertMes("请先登陆","../login.php");
			}
		}
