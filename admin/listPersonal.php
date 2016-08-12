<?php 
require_once '../include.php';
//获取求职者信息
$sql="select * from zp_personal";
$rows=fetchAll($sql,$tp);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
                   <!--  <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
                        </div>
                            
                    </div> -->
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">求职者编号</th>
                                <th width="10%">姓名</th>
                                <th width="10%">年龄</th>
                                <th width="10%">性别</th>
                                <th width="10%">学历</th>
                                <th width="10%">联系方式</th>
                                <th width="10%">专业</th>
                                <th width="10%">注册时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['age'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td><?php echo $row['edu'];?></td>
                                <td><?php echo $row['tell'];?></td>
                                <td><?php echo $row['major'];?></td>
                                <td><?php echo $row['regtime'];?></td>
                                <td align="center">
                                    <input type="button" value="修改" class="btn"  onclick="editPersonal(<?php echo $row['id'];?>)">
                                    <input type="button" value="密码重置" class="btn"  onclick="resetPersonalPWD(<?php echo $row['id'];?>)">
                                    <input type="button" value="删除" class="btn"  onclick="delPersonal(<?php echo $row['id'];?>)">
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function editPersonal(id){
			window.location="editPersonal.php?id="+id;
	}
    function resetPersonalPWD(id){
            window.location="doAdminAction.php?act=resetPersonalPWD&id="+id;
    }
	function delPersonal(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				// window.location="doAdminAction.php?act=delAdmin&id="+id;
                alert("当前不提供删除功能！From-zpc");
			}
	}
</script>
</html>