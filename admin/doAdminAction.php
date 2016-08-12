<?php
	include "../include.php";
	$act=$_REQUEST['act'];


	if($act==="adminLogin"){
		$mes=adminLogin($tp);
	}elseif($act=="logout"){
		$mes=adminlogout();
	}elseif($act=="addAdmin"){
		$mes=addAdmin($tp);
	}elseif($act=="editAdmin"){
		$id=$_REQUEST['id'];
		$mes=editAdmin($id,$tp);
	}elseif($act=="delAdmin"){
		$id=$_REQUEST['id'];
		$mes=delAdmin($id,$tp);
	}elseif($act=="editPersonal"){
		$id=$_REQUEST['id'];
		$mes=editPersonal($id,$tp);
	}elseif($act=="resetPersonalPWD"){
		$id=$_REQUEST['id'];
		$mes=resetPersonalPWD($id,$tp);
	}elseif($act=="editCompany"){
		$id=$_REQUEST['id'];
		$mes=editCompany($id,$tp);
	}elseif($act=="resetCompanyPWD"){
		$id=$_REQUEST['id'];
		$mes=resetCompanyPWD($id,$tp);
	}elseif($act=="adminEditJob"){
		$id=$_REQUEST['id'];
		$mes=adminEditJob($id,$tp);
	}elseif($act=="adminDelJob"){
		$id=$_REQUEST['id'];
		$mes=adminDelJob($id,$tp);
	}
?>
<?php

	echo $mes;


?>