<?php
require "../include.php";
checkLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link type="text/css" rel="stylesheet" href="../CSS/admin/admin_index.css">
</head>
<body>
<!--顶部用户登录栏-->
<header>
    <div class="logo">
        <a href="../user/index.php" target="_blank" style="text-decoration: none;cursor: pointer">
            <img src="../image/milogo.png" width="49" height="49" style="float: left;">
        </a>
    </div>
    <div class="admin_login">
        <a href="doAdminAction.php?act=">管理员&nbsp;&nbsp;&nbsp;<?php echo($_SESSION['adminname']); ?></a>
        <a href="doAdminAction.php?act=logOut">退出</a>
    </div>
</header>
<!--内容管理-->
<article>
    <!--         侧边功能栏-->
    <div class="side" id="side">
        <div class="side-manage">
            <a href="user_manage.php" target="Frame">用户管理</a>
        </div>
        <div class="side-manage">
            <a href="addAdmin.php" target="Frame">添加用户</a>
        </div>
        <div class="side-manage">
            <a href="products_list.php" target="Frame">商品管理</a>
        </div>
    </div>
    <!--         嵌套网页-->
    <div class="contain">
        <iframe name="Frame" src="user_manage.php"></iframe>
    </div>
</article>
</body>
</html>
