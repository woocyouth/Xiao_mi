<?php
require "../include.php";
@$id = $_REQUEST['id'];

$sql = "select * from user";
$res = fetchOne($sql);
$res['password'] = trim(encryptDecrypt('password',$res['password'],1));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/admin/adminAdd.css">
</head>
<body>
<article>
    <div class="box">
        <img src="../image/milogo.png">
        <div class="title">
            <h1>编辑用户资料</h1>
        </div>
        <form action="doAdminAction.php?act=update&id=<?php echo $res['id'];?>" method="post">
            <div class="inp">
                <input type="text" name="username" placeholder="用户名" value="<?php echo $res['username'];?>"><br>
                <input type="text" name="password" placeholder="密码" value="<?php echo $res['password'];?>"><br>
                <input type="text" name="phone" placeholder="手机号码" value="<?php echo $res['phone'];?>"><br>
                <input type="text" name="email" placeholder="邮箱" value="<?php echo $res['email'];?>"><br>
                <input type="submit" value="编辑" class="submit"><br>
            </div>
        </form>

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
</body>
</html>
