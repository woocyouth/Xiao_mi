<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/user/register.css">
    <script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
</head>
<body>
<article>
    <div class="box">
        <img src="../image/milogo.png">
        <div class="title">
            <h1>欢迎注册</h1>
        </div>
<!--        <form action="doRegister.php" method="post">-->
            <div class="inp">
                <div class="hidden_info" id="hidden_info">
                    <p class="warning" id="warning"></p>
                </div>
                <input type="text" name="username" placeholder="用户名" id="username" autocomplete="off"><p id="user_err"></p><br>

                <input type="password" name="password" placeholder="密码" id="password" autocomplete="off"><p id="pwd_err"></p><br>

                <input type="password" name="pwd" placeholder="确认密码" id="pwd" autocomplete="off"><p id="RePwd_err"></p><br>

                <input type="text" name="phone" placeholder="手机号" id="phone" autocomplete="off"><p id="phone_err"></p><br>

                <input type="text" name="email" placeholder="邮箱" id="email" autocomplete="off"><p id="email_err"></p>

                <input type="submit" value="注册/登录" class="submit" id="submit"><br>
            </div>
<!--        </form>-->
    </div>
</article>

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

<script type="text/javascript">
    $(document).ready(function () {
        $("#autoLogin").click(function () {
            $("#autoLogin").val(1)
        });
        $("#submit").click(function () {
            $.ajax({
                type: "POST",
                url: "doRegister.php",
                dataType: "json",
                data: {
                    username: $("#username").val(),
                    password: $("#password").val(),
                    pwd:$("#pwd").val(),
                    phone: $("#phone").val(),
                    email: $("#email").val(),
                },
                success: function (data) {
                    if (data.success) {
                        $(window).attr('location',data.mes);
                    } else {
                        $("#warning").html(data.mes);
                    }
                },
                error: function (jqHXR) {
                    alert("Post Status Error : " + jqHXR.status);
                }
            })
        })
    });
</script>
</body>
</html>
