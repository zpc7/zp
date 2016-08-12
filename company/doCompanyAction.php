<?php 
require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];


if($act=="editBasic"){
	$mes=editBasic($tp,$id);
}
elseif($act=="addJob") {
	$mes=addJob($tp,$id);
}
elseif($act=="editJob"){
	$mes=editJob($tp,$id);
}
elseif($act=="delJob"){
	$mes=delJob($tp,$id);
}
elseif($act=="uploadLogo"){
	$mes=uploadLogo($tp,$id);
}
elseif($act=="editPWD"){
	$mes=editComPWD($tp,$id);
}elseif($act=="resumeDownload") {
	header('content-disposition:attachment;filename='.basename($id));
	header('content-length:'.filesize($id));
	readfile($id);
	$mes="";
}


?>

<?php 
	if($mes){
		echo $mes;
	}
?>
