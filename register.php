<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>注册</title>
</head>

<body>
    <div class="bg-box"></div>
    <div class="module">
        <div class="wrapper">
            <div class="register">
                <form action="doAction.php?act=reg&type=per" method="post">
                    <ul class="reg-info">
                        <li>
                            <input type="text" name="username" id="username" tabindex="1" placeholder="请填写你的登陆名">
                            <span class="error">请输入登录名</span>
                        </li>
                        <li>
                            <input type="password" name="password" id="password" tabindex="2" placeholder="请输入密码">
                            <span class="error">请输入密码</span>
                        </li>
<!--                         <li>
                            <input type="password" name="password" id="password" tabindex="2" placeholder="请再次输入密码">
                            <span class="error">请输入密码</span>
                        </li> -->
                        <li>
                            <input type="text" name="name" id="name" tabindex="3" placeholder="请输入姓名/公司名称">
                            <span class="error">请输入姓名/公司名称</span>
                        </li>
                        <li>
                            <input type="text" name="verify" id="verify" placeholder="请输入验证码">
                            <img src="getVerify.php" alt="验证码">
                        </li>
                    </ul>
                    <div class="reg-type">
                        <div class="per active" name="per"><span class="glyphicon glyphicon-user"></span> 个人</div>
                        <div class="com" name="com"><span class="glyphicon glyphicon-briefcase"></span> 企业</div>
                    </div>
                    <div class="checkbox">
                       <input type="checkbox" class="protocol"> 我已阅读并同意<a href="">用户协议</a>
                    </div>
                    <input type="submit" id="submit" value="注&nbsp;&nbsp;册">
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
    // 注册类型切换JQ
    $(".reg-type div").click(function() {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
        var type = $(".reg-type .active").attr("name");
        var string = "doAction.php?act=reg&type=" + type;
        $("form").attr("action", string);
    });
    </script>
    <script type="text/javascript">
    // 表单验证（未能使用ajax）
    $("form").submit(function(event) {
        if (!$("#username").val()) {
            alert("请填写你的登陆名!");
            return false; // 返回值为false，将阻止表单提交
        } else if (!$("#password").val()) {
            alert("请输入密码!");
            return false; // 返回值为false，将阻止表单提交
        } else if (!$("#name").val()) {
            alert("请输入姓名/公司名称");
            return false; // 返回值为false，将阻止表单提交
        }else if (!$("#verify").val()) {
            alert("请输入验证码");
            return false; // 返回值为false，将阻止表单提交
        }else if (!$(".protocol").is(":checked")){
            alert("请同意用户协议！");
            return false;
        }
    });
    </script>
</body>

</html>
