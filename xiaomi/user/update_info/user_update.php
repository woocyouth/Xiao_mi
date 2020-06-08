<?php
require "../../include.php";
empty($_SESSION['username']) ? alertMes('请登录','../login.php') : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="css/user_update.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="../../icon_image/login_xm_icon_1.png">
        <span class="logo-txt">小米帐号</span>
    </div>
    <a href="../doUserAction.php?act=logout" class="login-out">退出</a>
</header>
<article>
    <div class="main-nav">
        <ul class="main-nav-ul">
            <li>
                <a href="#">帐号安全</a>
            </li>
            <li>
                <a href="#">个人信息</a>
            </li>
            <li>
                <a href="#">绑定授权</a>
            </li>
            <li>
                <a href="#">小米服务</a>
            </li>
            <li>
                <a href="#">设备管理</a>
            </li>
        </ul>
    </div>
    <!--    头像-->
    <div class="header-pic">
        <div class="h-info">
            <p class="h-name"><?php echo $_SESSION['username'];?></p>
            <p class="n-num"><?php echo $_SESSION['id'];?></p>
        </div>
        <div class="h-pic">
            <img src="<?php echo empty($_SESSION['headpic']) ? '../../camera/wooc.jpg': '.'.$_SESSION['headpic'];?>" width="74" height="74">
        </div>
    </div>
    <div class="info-frame">
        <iframe src="update/person_up.php" frameborder="0" name="myIframe" width="890" height="310"></iframe>
    </div>

</article>

</body>
</html>
