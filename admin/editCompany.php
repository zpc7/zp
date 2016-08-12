<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select * from zp_company where id='{$id}'";
$row=fetchOne($sql,$tp);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>编辑求职者信息</h3>
<form action="doAdminAction.php?act=editCompany&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">企业名称</td>
		<td><input type="text" name="name" placeholder="<?php echo $row['name'];?>"/></td>
	</tr>
	<tr>
		<td align="right">地址</td>
		<td><input type="text" name="address"  value="<?php echo $row['address'];?>"/></td>
	</tr>
	<tr>
		<td align="right">联系方式</td>
		<td><input type="text" name="tell"  value="<?php echo $row['tell'];?>"/></td>
	</tr>
	<tr>
		<td align="right">所在行业</td>
		<td><input type="text" name="industry"  value="<?php echo $row['industry'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑求职者信息"/></td>
	</tr>

</table>
</form>
</body>
</html>