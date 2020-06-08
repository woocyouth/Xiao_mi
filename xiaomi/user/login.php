<?php
require "../include.php";
checkAutoLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link type="text/css" rel="stylesheet" href="../CSS/user/login.css">
    <link type="text/css" rel="stylesheet" href="../fontFrame/iconfont.css">
    <script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
</head>
<body>
<!--登录页面顶部栏-->
<header>
    <div class="top">
        <div class="logo">
            <a href="#">
                <div class="logo-bg">
                    <img src="../image/login_xm.png" width="202" height="52">
                </div>
            </a>
        </div>
    </div>
</header>
<!--    登录-->
<article>
<!--        <form action="doUserLogin.php" method="post" autocomplete="off">-->
    <div class="login">
        <div class="login_lo">
            <div class="login-number">
                <div class="login-number-container">
                    <a href="#" class="a1">账号登录</a><span class="line"></span><a href="#" class="a2">扫码登陆</a>
                </div>
            </div>
            <div class="login_inp">
                <input id="text" type="text" name="username" placeholder="邮箱/手机号/小米ID" autocomplete="off"><br>
                <input id="pwd" type="password" name="password" placeholder="密码" autocomplete="off"><br>
                <div class="auth">
                    <input type="checkbox" name="autoLogin" value="0" class="auth" id="autoLogin">
                    <label for="autoLogin"></label>
                    <span class="autoLogin">7天内自动登录</span>
                </div>
                <div class="hidden_info" id="hidden_info">
                    <p class="warning" id="warning"></p>
                </div>
                <input type="submit" value="登录" class="submit" id="submit"><br>
                <!--                    注册/忘记密码-->
                <div class="tap">
                    <a href="#" class="phone">手机短信登录/注册</a>
                    <a href="register.php" class="register-pwd">立即注册</a>
                    <span>|</span>
                    <a href="forget_password.php" class="register-pwd">忘记密码？</a>
                </div>

            </div>
            <!--其他登录方式-->
            <div class="other">
                <fieldset class="txt">
                    <legend class="txt-title">其他登陆方式</legend>
                </fieldset>
                <div class="icon">
                    <a href="#" class="iconfont icon-qq"></a>
                    <a href="#" class="iconfont icon-weixin"></a>
                    <a href="#" class="iconfont icon-zhifubao"></a>
                </div>
            </div>
        </div>
    </div>
<!--        </form>-->
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

<script>
    var label = document.getElementsByTagName("label")[0];
    label.onclick = function () {
        if (label.style.border === "none") {
            label.style.border = "1px solid #a4a4a4";
        } else {
            label.style.border = "none";
        }

    };

    $(document).ready(function () {
        $("#autoLogin").click(function () {
            $("#autoLogin").val(1)
        });
        $("#submit").click(function () {
            $.ajax({
                type: "POST",
                url: "doUserLogin.php",
                dataType: "json",
                data: {
                    username: $("#text").val(),
                    password: $("#pwd").val(),
                    autoLogin:$("#autoLogin").val()
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
