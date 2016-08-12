<?php 
require_once '../include.php';
//获取求职者信息
$sql="select * from zp_jobs";
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
                                <th width="12%">职位编号</th>
                                <th width="12%">职位名称</th>
                                <th width="12%">所属企业</th>
                                <th width="12%">工作地点</th>
                                <th width="12%">职位类别</th>
                                <th width="12%">薪酬待遇</th>
                                <th width="12%">更新时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <?php
                                $tmp=$row['jobsubid'];
                                $sql="select name from zp_company where id={$tmp}";
                                $result=fetchOne($sql,$tp);
                            ?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><?php echo $row['jobid'];?></label></td>
                                <td><?php echo $row['jobname'];?></td>
                                <td><?php echo $result['name'];?></td>
                                <td><?php echo $row['jobaddress'];?></td>
                                <td><?php echo $row['jobcate'];?></td>
                                <td><?php echo $row['jobpay'];?></td>
                                <td><?php echo $row['jobtime'];?></td>
                                <td align="center">
                                    <input type="button" value="修改" class="btn"  onclick="adminEditJob(<?php echo $row['jobid'];?>)">
                                    <input type="button" value="删除" class="btn"  onclick="adminDelJob(<?php echo $row['jobid'];?>)">
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function adminEditJob(id){
			window.location="editJob.php?id="+id;
	}
	function adminDelJob(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAdminAction.php?act=adminDelJob&id="+id;
                // alert("当前不提供删除功能！From-zpc");
			}
	}
</script>
</html>