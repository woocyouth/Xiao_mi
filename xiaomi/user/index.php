<?php
require "../include.php";
checkAutoLoginIndex();
@$u_id = $_SESSION['id'];
$sql = "select * from shoppingCart where u_id={$u_id}";
$shop_list = fetchAll($sql);
$sql_ser = "select s_service,s_name,s_service_spent from shoppingCart where u_id={$u_id}";
$ser_list = fetchAll($sql_ser);
//var_dump($ser_list);
$add_sum = 0; //用户已加入购物车的商品数量
for ($i = 0; $i < count($shop_list); $i++){
    $add_sum += $shop_list[$i]['s_add'];
}
$count_sum = 0; //用户已加入购物车的商品总计
for ($i = 0; $i < count($shop_list); $i++){
    $count_sum += $shop_list[$i]['s_count'];
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="">
<head>
    <meta charset="UTF-8">
    <title>test</title>
    <link rel="stylesheet" href="../CSS/user/index_css.css">
    <link rel="stylesheet" href="../fontFrame/iconfont.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
</head>
<body>
<!--       顶部登录栏-->
<header>
    <div class="header">
        <div class="header-list">
            <ul class="header-list-li header-list-ul">
                <li><a href="#">小米商城</a></li>
                <span>|</span>
                <li><a href="#">MIUI</a></li>
                <span>|</span>
                <li><a href="#">IoT</a></li>
                <span>|</span>
                <li><a href="#">云服务</a></li>
                <span>|</span>
                <li><a href="#">金融</a></li>
                <span>|</span>
                <li><a href="#">有品</a></li>
                <span>|</span>
                <li><a href="#">小爱开放平台</a></li>
                <span>|</span>
                <li><a href="#">企业团购</a></li>
                <span>|</span>
                <li><a href="#">资质证照</a></li>
                <span>|</span>
                <li><a href="#">协议规则</a></li>
                <span>|</span>
                <li><a href="#" class="down">下载app
                        <div class="triangle"></div>
                        <div class="header-download">
                            <img class="child_1" src="../image/download_str.png" width="14" height="9">
                            <img class="child_2" src="../image/download.png" width="85" height="85">
                            <span>小米商城APP</span>
                        </div>
                    </a></li>
                <span>|</span>
                <li><a href="#">Select Location</a></li>
            </ul>

            <!--    用户登录/购物车功能栏-->
            <div class="header-user">

                <div class="user" style="display: <?php echo isset($_SESSION['username']) ? 'none' : 'block'; ?>">
                    <ul class="header-user-li">
                        <li>
                            <a href="login.php">登录</a>
                        </li>
                        <span>|</span>
                        <li><a href="register.php">注册</a></li>
                        <span>|</span>
                        <li><a href="#">消息通知</a></li>
                        <span>|</span>
                    </ul>
                </div>
                <!--                小米用户管理功能栏-->
                <div class="user-details"
                     style=" display: <?php echo isset($_SESSION['username']) ? 'block' : 'none'; ?>">
                    <div class="details">
                        <a href="#" class="tit"><?php echo($_SESSION['username']); ?></a>
                        <ul class="details-ul">
                            <li><a href="#" onclick="this.href='person.php?person_show.php'" target="_blank">个人中心</a>
                            </li>
                            <li><a href="#">评价晒单</a></li>
                            <li><a href="#">我都喜欢</a></li>
                            <li><a href="#">小米账户</a></li>
                            <li><a href="doUserAction.php?act=logout">退出登录</a></li>
                        </ul>
                    </div>
                    <span>|</span>
                    <a href="#">消息通知</a>
                    <span>|</span>
                    <a href="#">我的订单</a>
                </div>

                <!--                购物车功能栏-->
                <div class="shopping-cart">
                    <div class="shopping">
                        <img src="../icon_image/shopping_1.png" width="20" height="20">
                        <img src="../icon_image/shopping.png" width="20" height="20">
                    </div>
                    <a href="#">
                        购物车&nbsp;&nbsp;(<?php echo $add_sum;?>)
                    </a>
                    <div class="cart-list">
                        <p style="display: <?php echo isset($_SESSION['username']) ? 'none' : 'block'; ?>">
                            购物车中还没有商品，赶紧选购吧！</p>
                        <?php foreach ($shop_list as $s_list) { ?>
                            <div class="cart-shop-list"
                                 style=" display: <?php echo isset($_SESSION['username']) ? 'block' : 'none'; ?>">
                                <div class="shop-pic"><img src="..<?php echo $s_list['s_img'] ;?>" class="show-img">
                                </div>
                                <span class="shop-name"> <?php echo $s_list['s_name'] ;?><?php echo $s_list['s_version'] ?></span>
                                <span class="shop-price"><?php echo $s_list['s_price'] ;?> 元 <i>X</i> <?php echo $s_list['s_add']; ?></span>
                            </div>
                        <?php } ?>
                        <?php foreach ($ser_list as $s_ser_list){
                            if (!empty($s_ser_list['s_service'])){
                            ?>
                        <div class="service-chooses">
                            <span class="choose-ser-name"><?php echo $s_ser_list['s_name'];?></span>
                            <span class="ser-price"><?php echo $s_ser_list['s_service_spent'];?> 元</span>
                            <span class="ser-name"><?php echo str_replace(",","",$s_ser_list['s_service']) ;?></span>
                        </div>
                        <?php }}?>
                        <!--                        总计-->
                        <div class="shop-count"
                             style=" display: <?php echo isset($_SESSION['username']) ? 'block' : 'none'; ?>">
                            <span class="count-num">已选购数量：<?php echo $add_sum;?></span>
                            <span class="count-add">总计：<?php echo $count_sum;?>元</span>
                            <div class="goToCart" id="go-To-Cart">
                                去购物车结算
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--顶部商品导航栏-->
<div class="top-nav">
    <div class="logo">
        <img src="../image/milogo.png">
    </div>
    <div class="title">
        <div class="txt">
            <div class="xp">
                <a href="#" class="xm-phone">小米手机</a>
                <div class="list">
                    <ul class="top-nav-ul">
                        <li>
                            <a href="#" onclick="this.href='../web_shop_list/index_list.php?product/xm10Pro_list.php'"
                               target="_blank">
                                <img src="../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="rp">
                <a href="#" class="rp-phone">Redmi 红米</a>
                <div class="list">
                    <ul class="top-nav-ul">
                        <li>
                            <a href="#">
                                <img src="../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tv">
                <a href="#" class="tv-l">电视</a>
                <div class="list">
                    <ul class="top-nav-ul">
                        <li>
                            <a href="#">
                                <img src="../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nb">
                <a href="#" class="nb-l">笔记本</a>
                <div class="list">
                    <ul class="top-nav-ul">
                        <li>
                            <a href="#">
                                <img src="../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="he">
                <a href="#" class="he-l">家电</a>
                <div class="list">
                    <ul class="top-nav-ul">
                        <li>
                            <a href="#">
                                <img src="../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ly">
                <a href="#" class="ly-l">路由器</a>
                <div class="list">
                    <ul class="top-nav-ul">
                        <li>
                            <a href="#">
                                <img src="../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="zn">
                <a href="#" class="zn-l">智能硬件</a>
                <div class="list">
                    <ul class="top-nav-ul">
                        <li>
                            <a href="#">
                                <img src="../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="fw">
                <a href="#">服务</a>
            </div>
            <div class="so">
                <a href="#">社区</a>
            </div>
        </div>
        <div class="search" id="search">
            <input type="text" class="text" id="sear" autocomplete="off">
            <div class="img" id="s-btn">
                <!--                question:submit icon-->
                <input type="submit" class="btn" id="sear_btn" value="">
                <img src="../icon_image/search1.png" width="25" height="25" class="img1">
                <img src="../icon_image/search1_1.png" width="25" height="25" class="img2">
            </div>
            <div class="search-a" id="sear_a">
                <a href="#">小米10Pro</a>
                <a href="#">小米游戏笔记本</a>
            </div>
            <div class="search_form" id="sear_for">
                <ul class="search_form_ul">
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                    <li>
                        <a href="#">Redmi&nbsp;&nbsp;K30</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--轮播导航图-->
<div class="lunbo-nav">
    <div class="side-list">
        <div class="list-ul">
            <ul class="side-list-ul">
                <li>
                    <a href="#" class="txt">手机&nbsp;&nbsp;&nbsp;&nbsp;电话卡<span>></span></a>
                    <div class="in-list">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_3">
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_4">
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--                222-->
                <li>
                    <a href="#" class="txt">电视&nbsp;&nbsp;&nbsp;&nbsp;盒子<span>></span></a>
                    <div class="in-list">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_3">
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_4">
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--                333-->
                <li>
                    <a href="#" class="txt">笔记本&nbsp;&nbsp;&nbsp;&nbsp;显示器&nbsp;&nbsp;&nbsp;&nbsp;平板<span>></span></a>
                    <div class="in-list" style="width: 532px;">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                            <li>
                                <a href="#"><img
                                            src="../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                            </li>
                        </ul>

                    </div>
                </li>
                <!--                444-->
                <li>
                    <a href="#" class="txt">家电&nbsp;&nbsp;&nbsp;&nbsp;插线板<span>></span></a>
                    <div class="in-list">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_3">
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_4">
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--                555-->
                <li>
                    <a href="#" class="txt">出行&nbsp;&nbsp;&nbsp;&nbsp;穿戴<span>></span></a>
                    <div class="in-list" style="width: 750px;">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_3">
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                            </li>
                        </ul>

                    </div>
                </li>
                <!--                666-->
                <li>
                    <a href="#" class="txt">智能&nbsp;&nbsp;&nbsp;&nbsp;路由器<span>></span></a>
                    <div class="in-list">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_3">
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_4">
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--                777-->
                <li>
                    <a href="#" class="txt">电源&nbsp;&nbsp;&nbsp;&nbsp;配件<span>></span></a>
                    <div class="in-list" style="width: 750px;">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_3">
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                            </li>
                        </ul>

                    </div>
                </li>
                <!--                888-->
                <li>
                    <a href="#" class="txt">健康&nbsp;&nbsp;&nbsp;&nbsp;儿童<span>></span></a>
                    <div class="in-list">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_3">
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_4">
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--                999-->
                <li>
                    <a href="#" class="txt">耳机&nbsp;&nbsp;&nbsp;&nbsp;音箱<span>></span></a>
                    <div class="in-list">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_3">
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_4">
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--                101010-->
                <li>
                    <a href="#" class="txt">生活&nbsp;&nbsp;&nbsp;&nbsp;箱包<span>></span></a>
                    <div class="in-list" style="width: 750px;">
                        <ul class="list-in-ul_1">
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_2">
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                        </ul>
                        <ul class="list-in-ul_3">
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                            </li>
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--    商品轮播图-->
    <div class="wrap">
        <ul class="list">
            <li class="item active"></li>
            <li class="item"></li>
            <li class="item"></li>
            <li class="item"></li>
            <li class="item"></li>
        </ul>
        <ul class="pointList">
            <li class="point active" date-index="0"></li>
            <li class="point" date-index="1"></li>
            <li class="point" date-index="2"></li>
            <li class="point" date-index="3"></li>
            <li class="point" date-index="4"></li>
        </ul>
        <button class="btn" type="button" id="goPre"><</button>
        <button class="btn" type="button" id="goNext">></button>
    </div>
</div>

<!--顶部导航底部banner-->
<div class="top-nav-banner">
    <div class="side-nav">
        <ul class="top-nav-side-nav-ul">
            <li>
                <a href="#">
                    <div class="img">
                        <img src="../icon_image/repair_75.png" width="24" height="24">
                        <img src="../icon_image/repair.png" width="24" height="24">
                    </div>
                    <span>售后服务</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img">
                        <img src="../icon_image/repair_75.png" width="24" height="24">
                        <img src="../icon_image/repair.png" width="24" height="24">
                    </div>
                    <span>售后服务</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img">
                        <img src="../icon_image/repair_75.png" width="24" height="24">
                        <img src="../icon_image/repair.png" width="24" height="24">
                    </div>
                    <span>售后服务</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img">
                        <img src="../icon_image/repair_75.png" width="24" height="24">
                        <img src="../icon_image/repair.png" width="24" height="24">
                    </div>
                    <span>售后服务</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img">
                        <img src="../icon_image/repair_75.png" width="24" height="24">
                        <img src="../icon_image/repair.png" width="24" height="24">
                    </div>
                    <span>售后服务</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img">
                        <img src="../icon_image/repair_75.png" width="24" height="24">
                        <img src="../icon_image/repair.png" width="24" height="24">
                    </div>
                    <span>售后服务</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="banner">
        <ul class="top-nav-banner-ul">
            <li>
                <a href="#">
                    <img src="../image/rmi_top_banner.webp" width="316" height="170">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../image/rmi2_top_banner.webp" width="316" height="170">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../image/xmi_Watch_top_banner.webp" width="316" height="170">
                </a>
            </li>
        </ul>
    </div>
</div>
<!---->

<!--侧边导航栏-->
<aside>
    <div class="side-list">
        <ul class="side-list-ul">
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../icon_image/cell-phonenumber_75.png" width="30" height="30">
                        <img src="../icon_image/cell-phonenumber1.png" width="30" height="30">
                        <span>手机APP</span>
                    </div>
                </a>
                <div class="side-code">
                    <img src="../image/download.png" width="100" height="100">
                    <p>手机扫一扫</p>
                    <p>一分赢好礼</p>
                </div>
            </li>
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../icon_image/Userselect_75.png" width="30" height="30">
                        <img src="../icon_image/Userselect1.png" width="30" height="30">
                        <span>个人中心</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../icon_image/repair_75.png" width="30" height="30">
                        <img src="../icon_image/repair1.png" width="30" height="30">
                        <span>售后服务</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../icon_image/service_75.png" width="30" height="30">
                        <img src="../icon_image/service1.png" width="30" height="30">
                        <span>人工客服</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../icon_image/shopping_75.png" width="30" height="30">
                        <img src="../icon_image/shopping.png" width="30" height="30">
                        <span>购物车</span>
                    </div>
                </a>
            </li>
            <li class="back" id="Top" onclick="goToTop();return false;">
                <a id="toTop" href="javascript:void(0);">
                    <div class="App">
                        <img src="../icon_image/top_75.png" width="30" height="30">
                        <img src="../icon_image/top2.png" width="30" height="30">
                        <span>返回顶部</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</aside>

<!--中心内容-->
<article>
    <!--        小米闪购-->
    <div class="flash_shop">
        <div class="title">
            <span>小米闪购</span>
            <div class="btn">
                <div class="pre" id="pre" onclick="flash_pre()"><</div>
                <div class="next" id="next" onclick="flash_next()">></div>
            </div>
        </div>
        <div class="time">
            <p>00:00&nbsp;&nbsp;场</p>
            <img src="../image/shangou.jpg" width="34" height="53">
            <br>
            <span class="the_end">距离结束还有</span>
        </div>
        <div class="continue_time">
            <span id="h_time">00</span>:<span id="m_time">00</span>:<span id="s_time">00</span>
        </div>

        <div class="con_shop">
            <ul class="flash-shop-ul">
                <li>

                    <a href="javascript:void(0);" onclick="this.href='flashBuy.php?flashBuy/00_list.php';"
                       target="_blank">
                        <img src="../image/flash_shop_yashua.jpg" width="160" height="160">
                        <p class="t1"> 米家声波电动牙刷T500</p>
                        <p class="t2">刷的干净、智能护齿</p>
                        <p class="t3">169元</p>
                        <p class="t4">199元</p>
                    </a>
                </li>
                <li style="border-top: 1px solid #83c44e;">
                    <a href="#">
                        <img src="../image/flash_shop_erji.jpg" width="160" height="160">
                        <p class="t1"> 高品质多功能头戴耳机</p>
                        <p class="t2">高清晰CD音质</p>
                        <p class="t3">169元</p>
                        <p class="t4">249元</p>
                    </a>
                </li>
                <li style="border-left: 14px;">
                    <a href="#">
                        <img src="../image/flash_shop_yashua.jpg" width="160" height="160">
                        <p class="t1"> 米家声波电动牙刷T500</p>
                        <p class="t2">刷的干净、智能护齿</p>
                        <p class="t3">169元</p>
                        <p class="t4">199元</p>
                    </a>
                </li>
                <li style="border-top: 1px solid #83c44e;">
                    <a href="#">
                        <img src="../image/flash_shop_erji.jpg" width="160" height="160">
                        <p class="t1"> 高品质多功能头戴耳机</p>
                        <p class="t2">高清晰CD音质</p>
                        <p class="t3">169元</p>
                        <p class="t4">249元</p>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <img src="../image/flash_shop_yashua.jpg" width="160" height="160">
                        <p class="t1"> 米家声波电动牙刷T500</p>
                        <p class="t2">刷的干净、智能护齿</p>
                        <p class="t3">169元</p>
                        <p class="t4">199元</p>
                    </a>
                </li>
                <li style="border-top: 1px solid #83c44e;">
                    <a href="#">
                        <img src="../image/flash_shop_erji.jpg" width="160" height="160">
                        <p class="t1"> 高品质多功能头戴耳机</p>
                        <p class="t2">高清晰CD音质</p>
                        <p class="t3">169元</p>
                        <p class="t4">249元</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="../image/flash_shop_yashua.jpg" width="160" height="160">
                        <p class="t1"> 米家声波电动牙刷T500</p>
                        <p class="t2">刷的干净、智能护齿</p>
                        <p class="t3">169元</p>
                        <p class="t4">199元</p>
                    </a>
                </li>
                <li style="border-top: 1px solid #83c44e;">
                    <a href="#">
                        <img src="../image/flash_shop_erji.jpg" width="160" height="160">
                        <p class="t1"> 高品质多功能头戴耳机</p>
                        <p class="t2">高清晰CD音质</p>
                        <p class="t3">169元</p>
                        <p class="t4">249元</p>
                    </a>
                </li>

                <li>

                    <a href="javascript:void(0);" onclick="this.href='flashBuy.php?flashBuy/00_list.php';"
                       target="_blank">
                        <img src="../image/flash_shop_yashua.jpg" width="160" height="160">
                        <p class="t1"> 米家声波电动牙刷T500</p>
                        <p class="t2">刷的干净、智能护齿</p>
                        <p class="t3">169元</p>
                        <p class="t4">199元</p>
                    </a>
                </li>
                <li style="border-top: 1px solid #83c44e;">
                    <a href="#">
                        <img src="../image/flash_shop_erji.jpg" width="160" height="160">
                        <p class="t1"> 高品质多功能头戴耳机</p>
                        <p class="t2">高清晰CD音质</p>
                        <p class="t3">169元</p>
                        <p class="t4">249元</p>
                    </a>
                </li>
                <li style="border-left: 14px;">
                    <a href="#">
                        <img src="../image/flash_shop_yashua.jpg" width="160" height="160">
                        <p class="t1"> 米家声波电动牙刷T500</p>
                        <p class="t2">刷的干净、智能护齿</p>
                        <p class="t3">169元</p>
                        <p class="t4">199元</p>
                    </a>
                </li>
                <li style="border-top: 1px solid #83c44e;">
                    <a href="#">
                        <img src="../image/flash_shop_erji.jpg" width="160" height="160">
                        <p class="t1"> 高品质多功能头戴耳机</p>
                        <p class="t2">高清晰CD音质</p>
                        <p class="t3">169元</p>
                        <p class="t4">249元</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!--    广告栏-->
    <div class="banner-mid">
        <a href="#">
            <img src="../image/xm10_mid_banner.webp" width="1230" height="120">
        </a>
    </div>

    <!--商品内容栏-->

    <!--    手机-->
    <div class="container-body">
        <div class="title">
            <a href="#" class="ph">手机</a>
            <a href="#" class="see">查看全部<span>></span></a>
        </div>
        <div class="contain">
            <div class="side-banner">
                <img src="../image/alpha_banner.webp" width="234" height="614" style="float: left">
            </div>
            <div class="right-contain">
                <ul class="right-contain-ul">
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--    广告栏-->
    <div class="banner-mid">
        <a href="#">
            <img src="../image/tv_mid_banner.webp" width="1230" height="120">
        </a>
    </div>

    <!--家电-->
    <div class="container-body">
        <div class="title">
            <a href="#" class="ph">家电</a>
            <ul class="container-title-ul">
                <li onmouseover="hot_1()" id="li_1">热门</li>
                <li onmouseover="other_1()" id="li_2">家电影音</li>
            </ul>
        </div>
        <div class="contain">
            <div class="side-banner">
                <img src="../image/cleanWater_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="side-banner-se">
                <img src="../image/cleanWater_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="right-contain">
                <!--                hot-->
                <ul class="right-contain-ul" id="ul_1">
                    <li>
                        <a href="#">
                            <img src="../image/kt_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家互联网空调C1（一级能效）</h3>
                            <p class="mid">变频节能省电，自清洁</p>
                            <p>3999元起</p><span>2699元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/kt_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家互联网空调C1（一级能效）</h3>
                            <p class="mid">变频节能省电，自清洁</p>
                            <p>3999元起</p><span>2699元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/kt_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家互联网空调C1（一级能效）</h3>
                            <p class="mid">变频节能省电，自清洁</p>
                            <p>3999元起</p><span>2699元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/kt_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家互联网空调C1（一级能效）</h3>
                            <p class="mid">变频节能省电，自清洁</p>
                            <p>3999元起</p><span>2699元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/kt_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家互联网空调C1（一级能效）</h3>
                            <p class="mid">变频节能省电，自清洁</p>
                            <p>3999元起</p><span>2699元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/kt_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家互联网空调C1（一级能效）</h3>
                            <p class="mid">变频节能省电，自清洁</p>
                            <p>3999元起</p><span>2699元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/kt_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家互联网空调C1（一级能效）</h3>
                            <p class="mid">变频节能省电，自清洁</p>
                            <p>3999元起</p><span>2699元</span>
                        </a>
                    </li>
                    <li class="distribute_box">
                        <div class="wrap">
                            <div class="up">
                                <a href="#">
                                    <img src="../image/nbook_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>Air&nbsp;&nbsp;13.3"&nbsp;&nbsp;2019款</h3>
                                    <p>4999元起</p>
                                </a>
                            </div>
                            <div class="down">
                                <a href="#">
                                    <img src="../image/nbook_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>浏览更多</h3>
                                    <small>热门</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--                other-->
                <ul class="right-contain-ul-other" id="ul_2" style="display: none;">
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--    广告栏-->
    <div class="banner-mid">
        <a href="#">
            <img src="../image/zn_mid_banner.webp" width="1230" height="120">
        </a>
    </div>

    <!--智能-->
    <div class="container-body">
        <div class="title">
            <a href="#" class="ph">智能</a>
            <ul class="container-title-ul-2">
                <li onmouseover="hot_2()" id="li_3">热门</li>
                <li onmouseover="other_2()" id="li_4">安防</li>
                <li onmouseover="other_3()" id="li_5">出行</li>
            </ul>
        </div>
        <div class="contain">
            <div class="side-banner">
                <img src="../image/zn_cm_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="side-banner-se">
                <img src="../image/zn_slip_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="right-contain">
                <!--                hot-->
                <ul class="right-contain-ul" id="ul_3">
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li class="distribute_box">
                        <div class="wrap">
                            <div class="up">
                                <a href="#">
                                    <img src="../image/dj_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>小米米家对讲机2</h3>
                                    <p>449元</p>
                                </a>
                            </div>
                            <div class="down">
                                <a href="#">
                                    <img src="../image/dj_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>浏览更多</h3>
                                    <small>热门</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--                other-->
                <ul class="right-contain-ul-other" id="ul_4">
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                </ul>
                <!--                other_3-->
                <ul class="right-contain-ul-other" id="ul_5">
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/slide_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米米家电动滑板车</h3>
                            <p class="mid">便携折叠，自由穿行</p>
                            <p>1999元</p><span>9999元</span>
                        </a>
                    </li>
                    <li class="distribute_box">
                        <div class="wrap">
                            <div class="up">
                                <a href="#">
                                    <img src="../image/dj_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>小米米家对讲机2</h3>
                                    <p>449元</p>
                                </a>
                            </div>
                            <div class="down">
                                <a href="#">
                                    <img src="../image/dj_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>浏览更多</h3>
                                    <small>热门</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--    广告栏-->
    <div class="banner-mid">
        <a href="#">
            <img src="../image/rm_mid_banner.webp" width="1230" height="120">
        </a>
    </div>

    <!--搭配-->
    <div class="container-body">
        <div class="title">
            <a href="#" class="ph">搭配</a>
            <ul class="container-title-ul">
                <li onmouseover="hot_1_2()" id="li_1_1">热门</li>
                <li onmouseover="other_1_2()" id="li_1_2">耳机音箱</li>
            </ul>
        </div>
        <div class="contain">
            <div class="side-banner">
                <img src="../image/dp_par_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="side-banner-se">
                <img src="../image/hx_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="right-contain">
                <!--                hot-->
                <ul class="right-contain-ul" id="ul_1_1">
                    <li>
                        <a href="#">
                            <img src="../image/air_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米真无线蓝牙耳机&nbsp;&nbsp;Air&nbsp;&nbsp;2</h3>
                            <p class="mid">智能真无线，轻松舒适戴</p>
                            <p>369元</p><span>399元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/air_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米真无线蓝牙耳机&nbsp;&nbsp;Air&nbsp;&nbsp;2</h3>
                            <p class="mid">智能真无线，轻松舒适戴</p>
                            <p>369元</p><span>399元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/air_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米真无线蓝牙耳机&nbsp;&nbsp;Air&nbsp;&nbsp;2</h3>
                            <p class="mid">智能真无线，轻松舒适戴</p>
                            <p>369元</p><span>399元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/air_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米真无线蓝牙耳机&nbsp;&nbsp;Air&nbsp;&nbsp;2</h3>
                            <p class="mid">智能真无线，轻松舒适戴</p>
                            <p>369元</p><span>399元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/air_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米真无线蓝牙耳机&nbsp;&nbsp;Air&nbsp;&nbsp;2</h3>
                            <p class="mid">智能真无线，轻松舒适戴</p>
                            <p>369元</p><span>399元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/air_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米真无线蓝牙耳机&nbsp;&nbsp;Air&nbsp;&nbsp;2</h3>
                            <p class="mid">智能真无线，轻松舒适戴</p>
                            <p>369元</p><span>399元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/air_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>小米真无线蓝牙耳机&nbsp;&nbsp;Air&nbsp;&nbsp;2</h3>
                            <p class="mid">智能真无线，轻松舒适戴</p>
                            <p>369元</p><span>399元</span>
                        </a>
                    </li>
                    <li class="distribute_box">
                        <div class="wrap">
                            <div class="up">
                                <a href="#">
                                    <img src="../image/nz_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>小米小爱触屏音箱</h3>
                                    <p>199元</p>
                                </a>
                            </div>
                            <div class="down">
                                <a href="#">
                                    <img src="../image/nz_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>浏览更多</h3>
                                    <small>热门</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--                other-->
                <ul class="right-contain-ul-other" id="ul_1_2">
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--    广告栏-->
    <div class="banner-mid">
        <a href="#">
            <img src="../image/kt_mid_banner.webp" width="1230" height="120">
        </a>
    </div>

    <!--配件-->
    <div class="container-body">
        <div class="title">
            <a href="#" class="ph">配件</a>
            <ul class="container-title-ul-3">
                <li onmouseover="hot_2_3()" id="li_2_3">热门</li>
                <li onmouseover="other_2_4()" id="li_2_4">保护套</li>
                <li onmouseover="other_3_5()" id="li_2_5">充电器</li>
            </ul>
        </div>
        <div class="contain">
            <div class="side-banner">
                <img src="../image/ly_Air_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="side-banner-se">
                <img src="../image/xshouji_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="right-contain">
                <!--                hot-->
                <ul class="right-contain-ul" id="ul_2_3">
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li class="distribute_box">
                        <div class="wrap">
                            <div class="up">
                                <a href="#">
                                    <img src="../image/sjk_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>小米CC9e&nbsp;&nbsp;高透果冻保护壳</h3>
                                    <p>49元</p>
                                </a>
                            </div>
                            <div class="down">
                                <a href="#">
                                    <img src="../image/sjk_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>浏览更多</h3>
                                    <small>热门</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--                other-->
                <ul class="right-contain-ul-other" id="ul_2_4">
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                </ul>
                <!--                other_3-->
                <ul class="right-contain-ul-other" id="ul_2_5">
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/wxian_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>高速无线充套装</h3>
                            <p class="mid">快速无线闪充，Qi充电标准</p>
                            <p>149元</p><span>1999元</span>
                        </a>
                    </li>
                    <li class="distribute_box">
                        <div class="wrap">
                            <div class="up">
                                <a href="#">
                                    <img src="../image/sjk_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>小米CC9e&nbsp;&nbsp;高透果冻保护壳</h3>
                                    <p>49元</p>
                                </a>
                            </div>
                            <div class="down">
                                <a href="#">
                                    <img src="../image/sjk_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>浏览更多</h3>
                                    <small>热门</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--    广告栏-->
    <div class="banner-mid">
        <a href="#">
            <img src="../image/mitu_mid_banner.webp" width="1230" height="120">
        </a>
    </div>

    <!--周边-->
    <div class="container-body">
        <div class="title">
            <a href="#" class="ph">周边</a>
            <ul class="container-title-ul-4">
                <li onmouseover="hot_1_3()" id="li_1_3">热门</li>
                <li onmouseover="other_1_3()" id="li_1_4">出行</li>
            </ul>
        </div>
        <div class="contain">
            <div class="side-banner">
                <img src="../image/bwb_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="side-banner-se">
                <img src="../image/bbao_banner.webp" width="234" height="300" style="float: left">
            </div>
            <div class="right-contain">
                <!--                hot-->
                <ul class="right-contain-ul" id="ul_1_3">
                    <li>
                        <a href="#">
                            <img src="../image/tyyj_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家飞行员太阳镜&nbsp;&nbsp;Pro</h3>
                            <p class="mid">尼龙偏光，轻巧佩戴</p>
                            <p>199元</p><span>13999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/tyyj_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家飞行员太阳镜&nbsp;&nbsp;Pro</h3>
                            <p class="mid">尼龙偏光，轻巧佩戴</p>
                            <p>199元</p><span>13999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/tyyj_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家飞行员太阳镜&nbsp;&nbsp;Pro</h3>
                            <p class="mid">尼龙偏光，轻巧佩戴</p>
                            <p>199元</p><span>13999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/tyyj_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家飞行员太阳镜&nbsp;&nbsp;Pro</h3>
                            <p class="mid">尼龙偏光，轻巧佩戴</p>
                            <p>199元</p><span>13999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/tyyj_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家飞行员太阳镜&nbsp;&nbsp;Pro</h3>
                            <p class="mid">尼龙偏光，轻巧佩戴</p>
                            <p>199元</p><span>13999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/tyyj_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家飞行员太阳镜&nbsp;&nbsp;Pro</h3>
                            <p class="mid">尼龙偏光，轻巧佩戴</p>
                            <p>199元</p><span>13999元</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/tyyj_banner.webp" width="160" height="160" style="margin-bottom: 30px;">
                            <h3>米家飞行员太阳镜&nbsp;&nbsp;Pro</h3>
                            <p class="mid">尼龙偏光，轻巧佩戴</p>
                            <p>199元</p><span>13999元</span>
                        </a>
                    </li>
                    <li class="distribute_box">
                        <div class="wrap">
                            <div class="up">
                                <a href="#">
                                    <img src="../image/cdian_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>8H&nbsp;&nbsp;乳胶弹簧静音床垫&nbsp;&nbsp;M3</h3>
                                    <p>1599元起</p>
                                </a>
                            </div>
                            <div class="down">
                                <a href="#">
                                    <img src="../image/cdian_banner.webp" width="80" height="80"
                                         style="margin-bottom: 30px;margin-top:31px;margin-right: 20px;float: right">
                                    <h3>浏览更多</h3>
                                    <small>热门</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--                other-->
                <ul class="right-contain-ul-other" id="ul_1_4">
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/xm10_banner_ph.webp" width="160" height="160"
                                 style="margin-bottom: 30px;">
                            <h3>小米10</h3>
                            <p class="mid">骁龙865/1亿像素相机</p>
                            <p>3999元起</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--    广告栏-->
    <div class="banner-mid">
        <a href="#">
            <img src="../image/midpen_mid_banner.webp" width="1230" height="120">
        </a>
    </div>

    <!--    video_show-->
    <div class="show">
        <div class="title">
            <a href="#" class="ph">视频</a>
            <a href="#" class="see">查看全部<span>></span></a>
        </div>
        <ul class="show_ul">
            <!--        <button >show</button>-->
            <li>
                <div class="v_show" onclick="dia_show()">
                    <img src="../image/video_1.webp" width="296" height="180">
                </div>
                <span class="v_title">小米10 8K手机拍大片</span>
                <dialog id="dia">
                    <div class="box">
                        <div class="title">
                            <span>小米10 8K手机拍大片</span>
                            <button onclick="close_d()" id="shut_video">X</button>
                        </div>
                        <div class="big_play_btn"></div>
                        <video width="881" height="366" src="../video/xm_index.mp4" id="video" oncanplay="init()"
                               onclick="video_play_pause()">

                        </video>
                        <div class="ability">

                            <div class="progress_list">
                                <input type="range" value="0" width="880" id="progress" onchange="change()">
                                <div id="bar" onchange="play()"></div>
                            </div>
                            <div class="progress_time">
                                <span id="current">00:00</span>&nbsp;/&nbsp;<span id="duration"></span>
                            </div>

                            <div class="volume">
                                <input type="range" width="100" value="50" id="volume" onchange="vo_change()">
                                <div id="volume_bar" onchange="vo_change()"></div>
                            </div>

                            <div class="play_and_pause">
                                <button onclick="play()">
                                    <div class="star" id="star" onclick="star_click()">
                                        <img src="../icon_image/Start_1.png" width="20" height="20">
                                        <img src="../icon_image/Start_2.png" width="20" height="20">
                                    </div>
                                    <div class="pau" id="pau" onclick="pau_click()">
                                        <img src="../icon_image/pause_1.png" width="20" height="20">
                                        <img src="../icon_image/pause_2.png" width="20" height="20">
                                    </div>
                                </button>
                            </div>

                            <div class="fullScr">
                                <button onclick="fullScreen()">
                                    <div class="full">
                                        <img src="../icon_image/full-screen_1.png" width="20" height="20">
                                        <img src="../icon_image/full-screen_2.png" width="20" height="20">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </dialog>
            </li>

            <li>
                <div class="v_show" onclick="dia_show()">
                    <img src="../image/video_1.webp" width="296" height="180">
                </div>
                <span class="v_title">小米10 8K手机拍大片</span>
                <dialog id="dia">
                    <div class="box">
                        <div class="title">
                            <span>小米10 8K手机拍大片</span>
                            <button onclick="close_d()" id="shut_video">X</button>
                        </div>
                        <div class="big_play_btn"></div>
                        <video width="881" height="366" src="../video/xm_index.mp4" id="video" oncanplay="init()"
                               onclick="video_play_pause()">

                        </video>
                        <div class="ability">

                            <div class="progress_list">
                                <input type="range" value="0" width="880" id="progress" onchange="change()">
                                <div id="bar" onchange="play()"></div>
                            </div>
                            <div class="progress_time">
                                <span id="current">00:00</span>&nbsp;/&nbsp;<span id="duration"></span>
                            </div>

                            <div class="volume">
                                <input type="range" width="100" value="50" id="volume" onchange="vo_change()">
                                <div id="volume_bar" onchange="vo_change()"></div>
                            </div>

                            <div class="play_and_pause">
                                <button onclick="play()">
                                    <div class="star" id="star" onclick="star_click()">
                                        <img src="../icon_image/Start_1.png" width="20" height="20">
                                        <img src="../icon_image/Start_2.png" width="20" height="20">
                                    </div>
                                    <div class="pau" id="pau" onclick="pau_click()">
                                        <img src="../icon_image/pause_1.png" width="20" height="20">
                                        <img src="../icon_image/pause_2.png" width="20" height="20">
                                    </div>
                                </button>
                            </div>

                            <div class="fullScr">
                                <button onclick="fullScreen()">
                                    <div class="full">
                                        <img src="../icon_image/full-screen_1.png" width="20" height="20">
                                        <img src="../icon_image/full-screen_2.png" width="20" height="20">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </dialog>
            </li>

            <li>
                <div class="v_show" onclick="dia_show()">
                    <img src="../image/video_1.webp" width="296" height="180">
                </div>
                <span class="v_title">小米10 8K手机拍大片</span>
                <dialog id="dia">
                    <div class="box">
                        <div class="title">
                            <span>小米10 8K手机拍大片</span>
                            <button onclick="close_d()" id="shut_video">X</button>
                        </div>
                        <div class="big_play_btn"></div>
                        <video width="881" height="366" src="../video/xm_index.mp4" id="video" oncanplay="init()"
                               onclick="video_play_pause()">

                        </video>
                        <div class="ability">

                            <div class="progress_list">
                                <input type="range" value="0" width="880" id="progress" onchange="change()">
                                <div id="bar" onchange="play()"></div>
                            </div>
                            <div class="progress_time">
                                <span id="current">00:00</span>&nbsp;/&nbsp;<span id="duration"></span>
                            </div>

                            <div class="volume">
                                <input type="range" width="100" value="50" id="volume" onchange="vo_change()">
                                <div id="volume_bar" onchange="vo_change()"></div>
                            </div>

                            <div class="play_and_pause">
                                <button onclick="play()">
                                    <div class="star" id="star" onclick="star_click()">
                                        <img src="../icon_image/Start_1.png" width="20" height="20">
                                        <img src="../icon_image/Start_2.png" width="20" height="20">
                                    </div>
                                    <div class="pau" id="pau" onclick="pau_click()">
                                        <img src="../icon_image/pause_1.png" width="20" height="20">
                                        <img src="../icon_image/pause_2.png" width="20" height="20">
                                    </div>
                                </button>
                            </div>

                            <div class="fullScr">
                                <button onclick="fullScreen()">
                                    <div class="full">
                                        <img src="../icon_image/full-screen_1.png" width="20" height="20">
                                        <img src="../icon_image/full-screen_2.png" width="20" height="20">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </dialog>
            </li>

            <li>
                <div class="v_show" onclick="dia_show()">
                    <img src="../image/video_1.webp" width="296" height="180">
                </div>
                <span class="v_title">小米10 8K手机拍大片</span>
                <dialog id="dia">
                    <div class="box">
                        <div class="title">
                            <span>小米10 8K手机拍大片</span>
                            <button onclick="close_d()" id="shut_video">X</button>
                        </div>
                        <div class="big_play_btn"></div>
                        <video width="881" height="366" src="../video/xm_index.mp4" id="video" oncanplay="init()"
                               onclick="video_play_pause()">

                        </video>
                        <div class="ability">

                            <div class="progress_list">
                                <input type="range" value="0" width="880" id="progress" onchange="change()">
                                <div id="bar" onchange="play()"></div>
                            </div>
                            <div class="progress_time">
                                <span id="current">00:00</span>&nbsp;/&nbsp;<span id="duration"></span>
                            </div>

                            <div class="volume">
                                <input type="range" width="100" value="50" id="volume" onchange="vo_change()">
                                <div id="volume_bar" onchange="vo_change()"></div>
                            </div>

                            <div class="play_and_pause">
                                <button onclick="play()">
                                    <div class="star" id="star" onclick="star_click()">
                                        <img src="../icon_image/Start_1.png" width="20" height="20">
                                        <img src="../icon_image/Start_2.png" width="20" height="20">
                                    </div>
                                    <div class="pau" id="pau" onclick="pau_click()">
                                        <img src="../icon_image/pause_1.png" width="20" height="20">
                                        <img src="../icon_image/pause_2.png" width="20" height="20">
                                    </div>
                                </button>
                            </div>

                            <div class="fullScr">
                                <button onclick="fullScreen()">
                                    <div class="full">
                                        <img src="../icon_image/full-screen_1.png" width="20" height="20">
                                        <img src="../icon_image/full-screen_2.png" width="20" height="20">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </dialog>
            </li>

        </ul>
    </div>
</article>

<!--    footer-->
<footer>
    <div class="contain">
        <div class="foot-service">
            <ul class="foot-service-ul">
                <li>
                    <a href="#">
                        <div class="img">
                            <img src="../icon_image/repair_75.png" width="25" height="25">
                            <img src="../icon_image/repair1.png" width="25" height="25">
                        </div>
                        <span>预约维修服务</span>
                    </a>
                    <span class="line"></span>
                </li>
                <li>
                    <a href="#">
                        <div class="img">
                            <img src="../icon_image/repair_75.png" width="25" height="25">
                            <img src="../icon_image/repair1.png" width="25" height="25">
                        </div>
                        <span>7天无理由退货</span>
                    </a>
                    <span class="line"></span>
                </li>
                <li>
                    <a href="#">
                        <div class="img">
                            <img src="../icon_image/repair_75.png" width="25" height="25">
                            <img src="../icon_image/repair1.png" width="25" height="25">
                        </div>
                        <span>15天免费换货满</span>
                    </a>
                    <span class="line"></span>
                </li>
                <li>
                    <a href="#">
                        <div class="img">
                            <img src="../icon_image/repair_75.png" width="25" height="25">
                            <img src="../icon_image/repair1.png" width="25" height="25">
                        </div>
                        <span>99元包邮</span>
                    </a>
                    <span class="line"></span>
                </li>
                <li>
                    <a href="#">
                        <div class="img">
                            <img src="../icon_image/repair_75.png" width="25" height="25">
                            <img src="../icon_image/repair1.png" width="25" height="25">
                        </div>
                        <span>520余家售后网点</span>
                    </a>
                    <span class="line"></span>
                </li>
            </ul>
        </div>

        <div class="foot-link">
            <ul class="foot-link-ul">
                <li>
                    <h3>帮助中心</h3>
                </li>
                <li>
                    <a href="#">账户管理</a>
                </li>
                <li>
                    <a href="#">购物指南</a>
                </li>
                <li>
                    <a href="#">订单操作</a>
                </li>
            </ul>

            <ul class="foot-link-ul">
                <li>
                    <h3>服务支持</h3>
                </li>
                <li>
                    <a href="#">售后政策</a>
                </li>
                <li>
                    <a href="#">自助服务</a>
                </li>
                <li>
                    <a href="#">相关下载</a>
                </li>
            </ul>

            <ul class="foot-link-ul">
                <li>
                    <h3>线下门店</h3>
                </li>
                <li>
                    <a href="#">小米之家</a>
                </li>
                <li>
                    <a href="#">服务网点</a>
                </li>
                <li>
                    <a href="#">授权体验店</a>
                </li>
            </ul>

            <ul class="foot-link-ul">
                <li>
                    <h3>关于小米</h3>
                </li>
                <li>
                    <a href="#">了解小米</a>
                </li>
                <li>
                    <a href="#">加入小米</a>
                </li>
                <li>
                    <a href="#">投资者关系</a>
                </li>
                <li>
                    <a href="#">廉洁举报</a>
                </li>
            </ul>

            <ul class="foot-link-ul">
                <li>
                    <h3>关注我们</h3>
                </li>
                <li>
                    <a href="#">新浪微博</a>
                </li>
                <li>
                    <a href="#">官方微信</a>
                </li>
                <li>
                    <a href="#">联系我们</a>
                </li>
                <li>
                    <a href="#">公益基金会</a>
                </li>
            </ul>

            <ul class="foot-link-ul">
                <li>
                    <h3>特色服务</h3>
                </li>
                <li>
                    <a href="#">F 码通道</a>
                </li>
                <li>
                    <a href="#">礼物码</a>
                </li>
                <li>
                    <a href="#">防伪查询</a>
                </li>
            </ul>

            <div class="contact">
                <p class="phone">400-100-5678</p>
                <p>8:00-18:00（仅收市话费）</p>
                <div class="peo_service">
                    <a href="#">
                        <div class="img_mes">
                            <img src="../icon_image/Message.png" width="12" height="12">
                            <img src="../icon_image/Message_1.png" width="12" height="12">
                        </div>
                        人工客服
                    </a>
                </div>

                <div class="follow">
                    <span>
                        关注小米：
                        <div class="img">
                            <img class="fol_img_1" src="../icon_image/wei_xing.png" width="24" height="24">
                            <img src="../icon_image/wei_xing_1.png" width="24" height="24">
                            <div class="focus">
                                <img src="../image/download.png" width="126" height="126">
                           </div>
                        </div>
                    </span>

                </div>
            </div>
        </div>
    </div>

    <!--    <div class="side-link">-->

    <!--    </div>-->
</footer>

<!--</div>-->
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript" src="../js/lunbo.js"></script>
<script>
    var ors = window.location.search.match(/(?:\?|&)iframe=([^&]+)/);
    if (ors) {
        document.getElementById("external-frame").src = ors[1];
    }

    var search_value = document.getElementById("sear");
    var search_btn = document.getElementById("sear_btn");
    var btn_img = document.querySelectorAll("#s-btn>img");
    //搜索按钮
    sear_btn.addEventListener('click', function () {
        window.open("shop_list_look/search_list.php?p_name=" + search_value.value + "&search=" + search_value.value);
    });

    //搜索按钮顶部icon点击效果
    btn_img[1].onclick = function () {
        console.log('test');
        sear_btn.click();
    }
</script>
</body>
</html>
