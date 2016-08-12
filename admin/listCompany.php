<?php 
require_once '../include.php';
//获取企业信息
$sql="select * from zp_company";
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
                                <th width="10%">企业编号</th>
                                <th width="10%">企业名称</th>
                                <th width="10%">地址</th>
                                <th width="10%">规模</th>
                                <th width="10%">官网</th>
                                <th width="10%">联系方式</th>
                                <th width="10%">所在行业</th>
                                <th width="10%">成立时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['scale'];?></td>
                                <td><?php echo $row['url'];?></td>
                                <td><?php echo $row['tell'];?></td>
                                <td><?php echo $row['industry'];?></td>
                                <td><?php echo $row['estabtime'];?></td>
                                <td align="center">
                                    <input type="button" value="修改" class="btn"  onclick="editCompany(<?php echo $row['id'];?>)">
                                    <input type="button" value="密码重置" class="btn"  onclick="resetCompanyPWD(<?php echo $row['id'];?>)">
                                    <input type="button" value="删除" class="btn"  onclick="delCompany(<?php echo $row['id'];?>)">
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

    function editCompany(id){
            window.location="editCompany.php?id="+id;
    }
    function resetCompanyPWD(id){
            window.location="doAdminAction.php?act=resetCompanyPWD&id="+id;
    }
    function delCompany(id){
            if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
                // window.location="doAdminAction.php?act=delAdmin&id="+id;
                alert("当前不提供删除功能！From-zpc");
            }
    }
</script>
</html>