<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/admin/admin_login.css">
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
</head>
<body>
<article>
    <!--    <form action="doAdminLogin.php" method="post">-->
    <div class="box">
        <img src="../image/milogo.png">
        <div class="title">
            <h1>欢迎管理员登录</h1>
        </div>
        <div class="inp">
            <input type="text" name="adminname" placeholder="用户名" id="adminname"><br>
            <input type="password" name="password" placeholder="密码" id="pwd"><br>
            <div class="hidden_info" id="hidden_info">
                <p class="warning" id="warning"></p>
            </div>
            <input type="submit" value="登录" class="submit" id="submit"><br>
        </div>
    </div>
    <!--    </form>-->

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
                url: "doAdminLogin.php",
                dataType: "json",
                data: {
                    adminname: $("#adminname").val(),
                    password: $("#pwd").val()
                },
                success:function (data) {
                   if (data.success){
                       $(window).attr('location',data.mes);
                   }else{
                       $("#warning").html(data.mes);
                   }
                },
                error:function (jqHXR) {
                    alert("Post Status Error : " + jqHXR.status);
                },
            })
        })
    });
</script>
</body>
</html>