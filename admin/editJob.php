<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select * from zp_jobs where jobid='{$id}'";
$row=fetchOne($sql,$tp);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>编辑职位信息</h3>
<form action="doAdminAction.php?act=adminEditJob&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">职位名称</td>
		<td><input type="text" name="jobname" placeholder="<?php echo $row['jobname'];?>"/></td>
	</tr>
	<tr>
		<td align="right">工作地点</td>
		<td><input type="text" name="jobaddress"  value="<?php echo $row['jobaddress'];?>"/></td>
	</tr>
	<tr>
		<td align="right">职位类别</td>
		<td><input type="text" name="jobcate"  value="<?php echo $row['jobcate'];?>"/></td>
	</tr>
	<tr>
		<td align="right">薪酬待遇</td>
		<td><input type="text" name="jobpay"  value="<?php echo $row['jobpay'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑职位信息"/></td>
	</tr>

</table>
</form>
</body>
</html>