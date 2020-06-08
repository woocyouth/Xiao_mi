<?php
require "../../include.php";
$where = isset($_GET['p_name']) ? " where p_name like '%{$_GET["search"]}%' " : null;
//$_GET['order'] = isset($_GET['order']) ? $_GET['order'] : "order by p_price ";
@$order = isset($_GET['order']) ? $_GET['order'] : null;
$pageSize = 12;
$data = UserPageAll($pageSize,'products',$where,$order);
$sql_where = "select * from  products {$where}";
$data_where = getResultNum($sql_where);
$data_where = ceil($data_where / $pageSize);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>search_list</title>
    <link type="text/css" rel="stylesheet" href="../../CSS/shop_list_look/search_list.css">
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
                        <div class="header-download">
                            <img class="child_1" src="../../image/download_str.png" width="14" height="9">
                            <img class="child_2" src="../../image/download.png" width="85" height="85">
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
                            <a href="../login.php">登录</a>
                        </li>
                        <span>|</span>
                        <li><a href="../register.php">注册</a></li>
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
                            <li><a href="#" onclick="this.href='../user/person.php?person_show.php'" target="_blank">个人中心</a></li>
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
                        <img src="../../icon_image/shopping_1.png" width="20" height="20">
                        <img src="../../icon_image/shopping.png" width="20" height="20">
                    </div>
                    <a href="#">
                        购物车&nbsp;&nbsp;(0)
                    </a>
                    <div class="cart-list">
                        <p>购物车中还没有商品，赶紧选购吧！</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--顶部商品导航栏-->
<div class="top-nav">
    <div class="logo">
        <img src="../../image/milogo.png">
    </div>
    <div class="title">
        <div class="txt">
            <div class="all-shop">
                <a href="#" class="as">全部商品分类</a>
                <div class="side-list">
                    <div class="list-ul">
                        <ul class="side-list-ul">
                            <li>
                                <a href="#" class="txt">手机&nbsp;&nbsp;&nbsp;&nbsp;电话卡<span>></span></a>
                                <div class="in-list">
                                    <ul class="list-in-ul_1">
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_3">
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_4">
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/RedMi_side_in_ul.webp"><span>Redmi&nbsp;K30&nbsp;Pro&nbsp;变焦版</span></a>
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
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_3">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_4">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/telivetion_side_in_ul.webp"><span>小米电视5&nbsp;Pro&nbsp;75英寸</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--                333-->
                            <li>
                                <a href="#"
                                   class="txt">笔记本&nbsp;&nbsp;&nbsp;&nbsp;显示器&nbsp;&nbsp;&nbsp;&nbsp;平板<span>></span></a>
                                <div class="in-list" style="width: 532px;">
                                    <ul class="list-in-ul_1">
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/noteBook_side_in_ul.webp"><span>小米笔记本&nbsp;15.6"</span></a>
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
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_3">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_4">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/bxiang_side_in_ul.webp"><span>冰箱</span></a>
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
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_3">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/watch_side_in_ul.webp"><span>小米手表</span></a>
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
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_3">
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_4">
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/dyin_side_in_ul.webp"><span>打印机</span></a>
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
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_3">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/dyuan_side_in_ul.webp"><span>小米电源</span></a>
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
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_3">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_4">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/xshou_side_in_ul.webp"><span>小米自动洗手机</span></a>
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
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_3">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_4">
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                        src="../../image/erji_side_in_ul.webp"><span>小米耳机</span></a>
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
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_2">
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                    </ul>
                                    <ul class="list-in-ul_3">
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../../image/mitu_side_in_ul.webp"><span>米兔</span></a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="xp">
                <a href="#" class="xm-phone">小米手机</a>
                <div class="list">
                    <ul class="top-nav-ul">
                        <li>
                            <a href="#">
                                <img src="../../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/xm10pro.webp">
                                <span>小米10Pro</span>
                                <p>4999元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/xm10pro.webp">
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
                                <img src="../../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/RedMi.webp">
                                <span>Redmi K30 Pro 变焦版</span>
                                <p>3799元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/RedMi.webp">
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
                                <img src="../../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/telivetion.webp">
                                <span>Redmi 智能电视 MAX 98''</span>
                                <p>19999元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/telivetion.webp">
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
                                <img src="../../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/notebookGame.webp">
                                <span>游戏本2019款</span>
                                <p>7499元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/notebookGame.webp">
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
                                <img src="../../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/bxiang.webp">
                                <span>米家风冷对开门冰箱 483L</span>
                                <p>2249元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/bxiang.webp">
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
                                <img src="../../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/shop-list.webp">
                                <span>小米AIoT路由器AX3600</span>
                                <p>599元</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/shop-list.webp">
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
                                <img src="../../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/ZNLock.jpg">
                                <span>小米米家智能门锁</span>
                                <p>1299元起</p>
                            </a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../../image/ZNLock.jpg">
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
            <input type="text" class="text" id="sear" value="" autocomplete="off">
            <div class="img" id="s-btn">
                <!--                question:submit icon-->
                <input type="submit" class="btn" id="sear_btn" value="">
                <img src="../../icon_image/search1.png" width="25" height="25" class="img1">
                <img src="../../icon_image/search1_1.png" width="25" height="25" class="img2">
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

<!--侧边导航栏-->
<aside>
    <div class="side-list">
        <ul class="side-list-ul">
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../../icon_image/cell-phonenumber_75.png" width="30" height="30">
                        <img src="../../icon_image/cell-phonenumber1.png" width="30" height="30">
                        <span>手机APP</span>
                    </div>
                </a>
                <div class="side-code">
                    <img src="../../image/download.png" width="100" height="100">
                    <p>手机扫一扫</p>
                    <p>一分赢好礼</p>
                </div>
            </li>
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../../icon_image/Userselect_75.png" width="30" height="30">
                        <img src="../../icon_image/Userselect1.png" width="30" height="30">
                        <span>个人中心</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../../icon_image/repair_75.png" width="30" height="30">
                        <img src="../../icon_image/repair1.png" width="30" height="30">
                        <span>售后服务</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../../icon_image/service_75.png" width="30" height="30">
                        <img src="../../icon_image/service1.png" width="30" height="30">
                        <span>人工客服</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="App">
                        <img src="../../icon_image/shopping_75.png" width="30" height="30">
                        <img src="../../icon_image/shopping.png" width="30" height="30">
                        <span>购物车</span>
                    </div>
                </a>
            </li>
            <li class="back" id="Top" onclick="goToTop();return false;">
                <a id="toTop" href="javascript:void(0);">
                    <div class="App">
                        <img src="../../icon_image/top_75.png" width="30" height="30">
                        <img src="../../icon_image/top2.png" width="30" height="30">
                        <span>返回顶部</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</aside>

<!--contain-->
<article>
    <!--    path-->
    <div class="path">
        <a href="../../user/index_1.html" class="path-f">首页></a>
        <a href="javascript:void(0);" class="path-f">全部结果></a>
        <span class="path-i"><?php echo $_GET['search'];?></span>
    </div>
    <!--    筛选列表-->
    <div class="screen">
        <div class="screen-list" id="screen-list">
            <ul class="screen-list-ul">
                <li>
                    <span class="list-title">分类：</span>
                </li>
                <li>
                    <a href="javascript: void (0);" id="all">全部</a>
                </li>
                <li>
                    <a href="javascript: void (0);" id="phone">手机</a>
                </li>
            </ul>
            <ul class="screen-list-ul active-show">
                <li>
                    <span class="list-title">拍照像素：</span>
                </li>
                <li>
                    <a href="javascript: void (0);">四摄像头</a>
                </li>
            </ul>
            <ul class="screen-list-ul active-show">
                <li>
                    <span class="list-title">屏幕大小：</span>
                </li>
                <li>
                    <a href="javascript: void (0);">超大屏</a>
                </li>
            </ul>
            <ul class="screen-list-ul active-show">
                <li>
                    <span class="list-title">运行内存：</span>
                </li>
                <li>
                    <a href="javascript: void (0);">极速畅玩</a>
                </li>
            </ul>
            <ul class="screen-list-ul active-show">
                <li>
                    <span class="list-title">电池续航：</span>
                </li>
                <li>
                    <a href="javascript: void (0);">超长待机</a>
                </li>
            </ul>
            <ul class="screen-list-ul active-show">
                <li>
                    <span class="list-title">高级选项：</span>
                </li>
                <li>
                    <a href="javascript: void (0);">CPU型号</a>
                </li>
                <li>
                    <a href="javascript: void (0);">CPU主频</a>
                </li>
                <li>
                    <a href="javascript: void (0);">前置摄像头</a>
                </li>
                <li>
                    <a href="javascript: void (0);">屏幕分辨率</a>
                </li>
                <li>
                    <a href="javascript: void (0);">存储容量</a>
                </li>
                <li>
                    <a href="javascript: void (0);">机身厚度</a>
                </li>
                <li>
                    <a href="javascript: void (0);">网络类型</a>
                </li>
                <span class="list-more" id="list-more">更多</span>
                <li style="display: none;" class="list-hidden">
                    <a href="javascript: void (0);">网络模式</a>
                </li>
            </ul>
            <div class="list-show">
                <span class="list-s">骁龙865</span>
            </div>
            <div class="list-show">
                <span class="list-s">最高2.84GHz</span>
            </div>
            <div class="list-show">
                <span class="list-s">2000万像素</span>
            </div>
            <div class="list-show">
                <span class="list-s">2340×1080</span>
            </div>
            <div class="list-show">
                <span class="list-s">128GB</span>
                <span class="list-s">256GB</span>
            </div>
            <div class="list-show">
                <span class="list-s">普通厚度</span>
            </div>
            <div class="list-show">
                <span class="list-s">双模5G全网通</span>
            </div>
            <div class="list-show-active-last">
                <span class="list-s">双卡双待</span>
            </div>
        </div>
    </div>
    <!--    搜索结果-->
    <div class="search-result">
        <div class="search-title">
            <ul class="search-title-ul">
                <li>
                    <a href="javascript:void(0);">综合</a>
                </li>
                <li>
                    <a href="javascript:void(0);">新品</a>
                </li>
                <li>
                    <a href="javascript:void(0);">销量</a>
                </li>
                <li>
                    <a href="search_list.php?p_name=<?php echo $_GET['search'];?>&search=<?php echo $_GET['search'];?>&order=<?php echo (@$_GET['order'] == "p_price asc") ? "p_price desc" : "p_price asc";?>"  >价格</a>
                </li>
            </ul>
        </div>
        <div class="search-result-list">
            <ul class="search-result-list-ul">
                <?php foreach ($data as $res): ?>
                    <li>
                        <a href="../../web_shop_list/index_list.php?product/xm10_list.php">
                            <div class="shop">
                                <img src="<?php echo $res['p_img'];?>" width="200" height="200">
                                <p class="name"><?php echo $res['p_name'];?></p>
                                <p class="price"><?php echo $res['p_price'];?>元 起</p>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <!--    分页-->
    <div class="page">
        <div class="list">
            <?php if($where == null) {
                $to = $u_totalPage;
            }else{
                $to = $data_where;
                ?>
                <?php echo showUserPage(@$u_page,  $to ,"p_name={$_GET['search']}",$order,"",$_GET['search']);?>
            <?php }?>
        </div>
    </div>
    <!--    相关商品分类-->
    <div class="recommend">
        <ul class="recommend-list-ul">
            <li>
                <span class="list-title">手机的相关商品分类</span>
            </li>
            <li>
                <a href="javascript: void (0);">手机</a>
            </li>
            <li>
                <a href="javascript: void (0);">汽车用品</a>
            </li>
            <li>
                <a href="javascript: void (0);">配件</a>
            </li>
            <li>
                <a href="javascript: void (0);">手机配件</a>
            </li>
            <li>
                <a href="javascript: void (0);">手机贴膜</a>
            </li>
            <li>
                <a href="javascript: void (0);">手机保护壳</a>
            </li>
            <li>
                <a href="javascript: void (0);">数据线</a>
            </li>
            <li>
                <a href="javascript: void (0);">服务</a>
            </li>
        </ul>
    </div>
    <!--    猜你喜欢-->
    <div class="xm-recommend-Wrap">
        <div class="re-wrap">
            <div class="title">
                <span class="txt">猜你喜欢</span>
            </div>
            <div class="recommend-Wrap">
                <ul class="recommend-Wrap-ul">
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_redmi.jpg" width="140" height="140">
                                <p class="name">Redmi Note 8 6GB+128GB</p>
                                <p class="price">1299元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_dfs.jpg" width="140" height="140">
                                <p class="name">米家直流变频落地扇1X</p>
                                <p class="price">289元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_lxx.jpg" width="140" height="140">
                                <p class="name">90分框体旅行箱 24英寸</p>
                                <p class="price">599元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_redmi.jpg" width="140" height="140">
                                <p class="name">Redmi Note 8 6GB+128GB</p>
                                <p class="price">1299元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_dfs.jpg" width="140" height="140">
                                <p class="name">米家直流变频落地扇1X</p>
                                <p class="price">289元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_lxx.jpg" width="140" height="140">
                                <p class="name">90分框体旅行箱 24英寸</p>
                                <p class="price">599元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_redmi.jpg" width="140" height="140">
                                <p class="name">Redmi Note 8 6GB+128GB</p>
                                <p class="price">1299元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_dfs.jpg" width="140" height="140">
                                <p class="name">米家直流变频落地扇1X</p>
                                <p class="price">289元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_lxx.jpg" width="140" height="140">
                                <p class="name">90分框体旅行箱 24英寸</p>
                                <p class="price">599元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="cont">
                                <img src="../../image/xm_recommend_redmi.jpg" width="140" height="140">
                                <p class="name">Redmi Note 8 6GB+128GB</p>
                                <p class="price">1299元</p>
                            </div>
                            <div class="go-cart">
                                <span class="go">加入购物车</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="toggle-btn">
                <div class="wrap">
                    <div class="one" id="one-list">
                        <span class="one-li" id="one-li"></span>
                    </div>
                    <div class="two" id="two-list">
                        <span class="two-li" id="two-li"></span>
                    </div>
                </div>
            </div>
        </div>
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
                            <img src="../../icon_image/repair_75.png" width="25" height="25">
                            <img src="../../icon_image/repair1.png" width="25" height="25">
                        </div>
                        <span>预约维修服务</span>
                    </a>
                    <span class="line"></span>
                </li>
                <li>
                    <a href="#">
                        <div class="img">
                            <img src="../../icon_image/repair_75.png" width="25" height="25">
                            <img src="../../icon_image/repair1.png" width="25" height="25">
                        </div>
                        <span>7天无理由退货</span>
                    </a>
                    <span class="line"></span>
                </li>
                <li>
                    <a href="#">
                        <div class="img">
                            <img src="../../icon_image/repair_75.png" width="25" height="25">
                            <img src="../../icon_image/repair1.png" width="25" height="25">
                        </div>
                        <span>15天免费换货满</span>
                    </a>
                    <span class="line"></span>
                </li>
                <li>
                    <a href="#">
                        <div class="img">
                            <img src="../../icon_image/repair_75.png" width="25" height="25">
                            <img src="../../icon_image/repair1.png" width="25" height="25">
                        </div>
                        <span>99元包邮</span>
                    </a>
                    <span class="line"></span>
                </li>
                <li>
                    <a href="#">
                        <div class="img">
                            <img src="../../icon_image/repair_75.png" width="25" height="25">
                            <img src="../../icon_image/repair1.png" width="25" height="25">
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
                            <img src="../../icon_image/Message.png" width="12" height="12">
                            <img src="../../icon_image/Message_1.png" width="12" height="12">
                        </div>
                        人工客服
                    </a>
                </div>

                <div class="follow">
                    <span>
                        关注小米：
                        <div class="img">
                            <img class="fol_img_1" src="../../icon_image/wei_xing.png" width="24" height="24">
                            <img src="../../icon_image/wei_xing_1.png" width="24" height="24">
                            <div class="focus">
                        <img src="../../image/download.png" width="126" height="126">
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

<script type="text/javascript" src="../../js/search_list.js"></script>
<script>
    var search_value = document.getElementById("sear");
    var search_btn= document.getElementById("sear_btn");
    var btn_img = document.querySelectorAll("#s-btn>img");

    //搜索按钮
    sear_btn.addEventListener('click',function () {
        window.location = "search_list.php?p_name="+search_value.value+"&search="+search_value.value;
    });

    //搜索按钮顶部icon点击效果
    btn_img[1].onclick = function () {console.log('test');
        sear_btn.click();
    }
</script>
</body>
</html>
