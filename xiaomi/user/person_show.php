<?php
require "../include.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/user/person_show.css">
</head>
<body>
<form action="personAction.php" method="post">
    <div class="person_show">
        <div class="up">
            <!--           头像-->
            <div class="camera">

                <img src="<?php echo empty($_SESSION['headpic']) ? '../camera/wooc.jpg': $_SESSION['headpic'];?>" width="160" height="160">
                <div class="details">
                    <h2><?php echo ($_SESSION['username']);?></h2>
                    <p id="time_hello">您好～</p>
                    <a href="update_info/user_update.php" target="_blank">修改个人信息 ></a>
                </div>
            </div>

            <!--           身份信息-->
            <div class="per_info">
                <ul class="per_info-ul">
                    <li>账户安全:&nbsp;&nbsp;<span class="grade">普通</span></li>
                    <li>绑定手机:&nbsp;&nbsp;<span><?php echo empty($_SESSION['phone']) ? '未绑定' : substr_replace($_SESSION['phone'],'*****',3,5);?></span></li>
                    <li>绑定邮箱:&nbsp;&nbsp;<span><?php echo empty($_SESSION['email']) ? '未绑定' : $_SESSION['email'];?></span></li>
                </ul>
            </div>
        </div>

        <div class="down">
            <div class="down-details">
                <img src="../image/wallet.png" width="100" height="100">
                <div class="wait">
                    <h2>待支付的订单：<span>0</span></h2>
                    <a href="#">查看待支付订单&nbsp;&nbsp;></a>
                </div>
            </div>
            <div class="down-details">
                <img src="../image/shopCart.png" width="100" height="100">
                <div class="wait">
                    <h2>待收货的订单：<span>0</span></h2>
                    <a href="#">查看待收货订单&nbsp;&nbsp;></a>
                </div>
            </div>
            <div class="down-details">
                <img src="../image/pl.png" width="100" height="100">
                <div class="wait">
                    <h2>待评价商品数：<span>1</span></h2>
                    <a href="#">查看待评价商品&nbsp;&nbsp;></a>
                </div>
            </div>
            <div class="down-details">
                <img src="../image/favour.png" width="100" height="100">
                <div class="wait">
                    <h2>喜欢的商品：<span>2</span></h2>
                    <a href="#">查看喜欢的商品&nbsp;&nbsp;></a>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    var th = document.getElementById('time_hello');
    var nowTime = new Date();
    var hour = nowTime.getHours();

    if (hour >= 5 && hour < 7){
        th.textContent = '清晨好~';
    }else if (hour >= 7 && hour < 9){
        th.textContent = '早上好~';
    }else if (hour >= 9 && hour < 12){
        th.textContent = '上午好~';
    }else if (hour >= 12 && hour < 14){
        th.textContent = '中午好~';
    }else if (hour >= 15 && hour < 18){
        th.textContent = '下午好~';
    }else if (hour >= 18 && hour < 19){
        th.textContent = '傍晚好~';
    }else if (hour >= 19 && hour < 24){
        th.textContent = '晚上好~';
    }else if (hour < 5){
        th.textContent = '凌晨好~';
    }else{
        th.textContent = '您好~';
    }


</script>
</body>
</html>