<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/admin/adminAdd.css">
    <script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
</head>
<body>
<article>
    <div class="box">
        <img src="../image/milogo.png">
        <div class="title">
            <h1>添加用户</h1>
        </div>
        <!--        <form action="doAdminAction.php?act=insert" method="post">-->
        <div class="hidden_info" id="hidden_info">
            <p class="warning" id="warning"></p>
        </div>
        <div class="inp">
            <input type="text" name="username" placeholder="用户名" id="username"><br>
            <input type="password" name="password" placeholder="密码" id="password"><br>
            <input type="text" name="phone" placeholder="手机号码" id="phone"><br>
            <input type="text" name="email" placeholder="邮箱" id="email"><br>
            <input type="submit" value="添加" class="submit" id="submit"><br>
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
        $("#submit").click(function () {
            $.ajax({
                type: "POST",
                url: "doAdminAction.php?act=insert",
                dataType: "json",
                data: {
                    username: $("#username").val(),
                    password: $("#password").val(),
                    phone: $("#phone").val(),
                    email: $("#email").val(),
                },
                success: function (data) {
                    if (data.success){
                        alert("添加用户成功")
                        $(window).attr('location',data.mes);
                    }else{
                        $("#warning").html(data.mes);
                    }
                },
                error: function (jqHXR) {
                   alert("Post Status Error : " + jqHXR.status);
                },
            })
        })
    });
</script>
</body>
</html>
