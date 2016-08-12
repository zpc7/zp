    <!-- 导航 -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/djfh/1/index.php">Logo</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/djfh/1/index.php">首页 <span class="sr-only">(current)</span></a></li>
                    <li><a href="/djfh/1/company/hrcenter.php">发布职位</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?php
                            echo $_SESSION['membername'];
                            ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="/djfh/1/company/company.php">公司主页</a></li>
                            <li><a href="/djfh/1/company/hrcenter.php">HR中心</a></li>
                            <li><a href="/djfh/1/company/hrcenter.php">发布职位</a></li>
                            <li><a href="/djfh/1/comoany/setting.php">账户设置</a></li>
                            <li><a href="/djfh/1/doAction.php?act=logout">退出</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <!-- 导航结束 -->