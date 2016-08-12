<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>登录</title>
</head>

<body>
    <div class="module">
        <div class="wrapper">
            <div class="login">
                <form action="doAction.php?act=login" method="post">
                    <input type="text" name="username" tabindex="1" placeholder="请输入用户名">
                    <input type="password" name="password" tabindex="2" placeholder="请输入密码">
                    <input type="text" name="verify" tabindex="3" placeholder="请输入验证码">
                    <img src="getVerify.php" alt="验证码">
                    <div class="identify">
                        <label class="checkbox-inline">
                            <input type="radio" name="identify" value="personal" tabindex="4" checked> 个人
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="identify" value="company" tabindex="5"> 企业
                        </label>
                    </div>
                    <input type="submit" class="btn btn-success" value="登&nbsp;&nbsp;录">
                </form>
            </div>
            <div class="tips">
                <p>没有账户？立即<a href="register.php">注册</a></p>
            </div>
        </div>
    </div>
</body>

</html>
