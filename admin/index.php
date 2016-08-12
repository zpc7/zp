<?php 
require_once '../include.php';
checkAdminLogined();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>企业招聘网站后台管理</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
    <div class="head">
            <!-- <div class="logo fl"><a href="#"></a></div> -->
            <h3 class="head_text fr">企业招聘网站后台管理</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fr">
            <b>欢迎您
            <?php 
				if(isset($_SESSION['adminNickName'])){
					echo $_SESSION['adminNickName'];
				}
            ?>
            
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" class="icon icon_i" target="_blank">首页</a><span></span><a href="#" class="icon icon_j" onclick="window.history.go(1)">前进</a><span></span><a href="#" class="icon icon_t" onclick="window.history.go(-1)">后退</a><span></span><a href="#" class="icon icon_n" onclick="window.location.reload()">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span onclick="show('menu2','change2')" id="change2">+</span>管理员管理</h3>
                        <dl id="menu2" style="display:none;">
                            <dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu1','change1')" id="change1">+</span>用户管理</h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="listPersonal.php" target="mainFrame">求职者用户管理</a></dd>
                            <dd><a href="listCompany.php" target="mainFrame">企业用户管理</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu3','change3')" id="change3">+</span>职位管理</h3>
                        <dl id="menu3">
                        	<dd><a href="listJob.php" target="mainFrame">职位列表</a></dd>
                            <dd><a href="" target="mainFrame"></a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>