<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select * from zp_admin where id='{$id}'";
$row=fetchOne($sql,$tp);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>编辑管理员</h3>
<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">管理员用户名</td>
		<td><input type="text" name="username" placeholder="<?php echo $row['username'];?>"/></td>
	</tr>
	<tr>
		<td align="right">管理员密码</td>
		<td><input type="password" name="password"  value="<?php echo $row['password'];?>"/></td>
	</tr>
	<tr>
		<td align="right">管理员昵称</td>
		<td><input type="text" name="nickname" placeholder="<?php echo $row['nickname'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑管理员"/></td>
	</tr>

</table>
</form>
</body>
</html>