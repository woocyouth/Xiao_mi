
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/user/forget_password.css">
</head>
<body>
<form action="forget_pwd.php" method="post" autocomplete="off">
    <div class="body">
        <img src="../image/milogo.png">
        <div class="txt">
            <h1>找回密码</h1>
            <p>请输入注册的邮箱地址、手机号码或小米帐号：</p>
        </div>
        <div class="inp">
            <input type="text" name="username" placeholder="邮箱/手机号/小米ID"><br>
            <input type="submit" value="确认" class="submit"><br>
            <input type="button" value="立即注册" class="button" onclick="location.href='../user/register.php'"><br>
        </div>

    </div>
</form>
<!--底部信息-->
<footer>
    <div class="container">
        <div class="language">
            <a href="#">简体</a>
            <span>|</span>
            <a href="#">繁体</a>
            <span>|</span>
            <a href="#">English</a>
            <span>|</span>
            <a href="#">常见问题</a>
            <span>|</span>
            <a href="#">隐私政策</a>
            <span>|</span>
        </div>
        <div class="copyRight">
            <span>小米公司版权所有-京ICP备10046444-<img src="../image/gonhan.png"></span>
            <a href="#">xxxxxxxxx号-阿里云</a>
        </div>
    </div>

</footer>

</body>
</html>