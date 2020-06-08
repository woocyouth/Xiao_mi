<?php
require "../include.php";
@$u_id = $_SESSION['id'];
$sql = "select * from shoppingCart where u_id={$u_id}";
$shop_list = fetchAll($sql);
$sql_ser = "select s_service,s_name,s_service_spent from shoppingCart where u_id={$u_id}";
$ser_list = fetchAll($sql_ser);

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/user/shoppingCart.css">
</head>
<body>
<!--购物车顶部-->
<header>
    <div class="head">
        <!--        小米logo-->
        <div class="logo">
            <img src="../icon_image/login_xm_icon_1.png" width="48" height="48">
        </div>
        <!--        我的购物车-->
        <div class="myCart">
            <h2>我的购物车</h2>
            <p>温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</p>
        </div>
        <!--        用户-->
        <div class="user-info">
            <div class="user">
                <?php echo ($_SESSION['username']);?>
                <span class="list">></span>
                <!--        用户功能列表-->
                <div class="user-list">
                    <ul class="user-list-ul">
                        <li>
                            <a href="#">个人中心</a>
                        </li>
                        <li>
                            <a href="#">评价晒单</a>
                        </li>
                        <li>
                            <a href="#">我的喜欢</a>
                        </li>
                        <li>
                            <a href="#">小米帐号</a>
                        </li>
                        <li>
                            <a href="#">退出登录</a>
                        </li>
                    </ul>
                </div>
            </div>
            <span class="sep">|</span>
            <!--            我的订单-->
            <div class="myOrder">
                我的订单
            </div>
        </div>
    </div>
</header>

<!--购物车内容-->
<article>
    <!--购物车列表-->
    <div class="Cart-all-list">
        <table cellpadding="0" cellspacing="0" border="0" id="cartTable">
            <thead>
            <tr>
                <td>
                    <div class="checkAll">
                        <span class="check-span">√</span>
                    </div>
                    全选
                </td>
                <td>商品名称</td>
                <td>单价</td>
                <td>数量</td>
                <td>小计</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($shop_list as $s_list){?>
            <tr>
                <td>
                    <div class="check-one">
                        <span class="check-one-span">√</span>
                    </div>
                </td>
                <td>
                    <a href="#">
                        <img src="..<?php echo $s_list['s_img'];?>" width="80" height="80" style="float:left;">
                        <h3 class="name" style="padding: 30px;float: left">
                            <span class="g-name"><?php echo $s_list['s_name'];?></span><span class="g-version"><?php echo $s_list['s_version'];?></span>
                        </h3>
                    </a>
                </td>
                <td>
                <span class="price"><?php echo $s_list['s_price'];?> 元</span>
                </td>
                <td>
                    <div class="count-input">
                        <span class="reduce">-</span>
                        <input type="text" class="text-input" value="<?php echo $s_list['s_add'];?>">
                        <span class="add">+</span>
                    </div>
                </td>
                <td>
                <span class="Small-count" style="color: #ff6700;"><?php echo $small_count = (int)$s_list['s_price']*(int)$s_list['s_add'];?> 元</span>
                </td>
                <td>
                    <div class="delete">
                        <span class="delete-x">X</span>
                    </div>
                </td>
            </tr>
            <?php }?>
            </tbody>
        </table>
        <table>
            <tbody>
            <?php foreach ($shop_list as $ser_list){?>
                <?php if (!empty($ser_list['s_service'])){?>
                    <tr class="chooses-ser">
                        <td colspan="1"><img src="../image/service_insurance.png" width="40" height="40" style="float:right;"></td>
                        <td colspan="1" class="choose-service"><span class="s-name-ser"><?php echo $ser_list['s_name'];?> <?php echo $ser_list['s_version'];?></span></td>
                        <td colspan="2" class="choose-service"><?php echo str_replace(","," ", $ser_list['s_service']);?></td>
                        <td colspan="1" class="choose-service" ><span class="choose-ser-money"><?php echo $ser_list['s_service_spent'];?></span> 元</td>
                        <td colspan="1">
                            <div class="delete" style="height: 24px;padding: 0;float: right;">
                                <span class="delete-x">X</span>
                            </div>
                        </td>
                    </tr>
                <?php }?>
            <?php }?>
            </tbody>
        </table>

        <!--        购物车结算-->
        <div class="cart-bar">
            <div class="bar-left">
                <a href="#">继续购物</a>
                <span class="cart-total">
                    共<i id="shop-total"><?php echo $add_sum;?></i>件商品，已选择<i id="selected">0</i>件
                </span>
            </div>
            <div class="total-price">
                合计：<span class="t-price">0.00</span>元
            </div>
            <div class="bar-right">
                <a href="javascript:void(0);">去结算</a>
            </div>
        </div>
        <!--        买购物车中商品的人还买了-->
        <div class="recommend-buy">
            <h2 class="recommend-title">
                <span class="txt">买购物车中商品的人还买了</span>
            </h2>
            <div class="recommend-list">
                <ul class="recommend-list-ul">
                    <li>
                        <a href="#">
                            <img src="../image/redmi_recommend_cart.jpg" width="140" height="140">
                            <p>Redmi&nbsp;Note&nbsp;8&nbsp;6GB+128GB</p>
                        </a>
                        <p class="price">1299元</p>
                        <p class="good-news">11.1万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/dyj_recommend_cart.jpg" width="140" height="140">
                            <p>小米米家照片打印机彩色相纸套装</p>
                        </a>
                        <p class="price">59元</p>
                        <p class="good-news">8.8万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/rainbowdc_recommend_cart.jpg" width="140" height="140">
                            <p>彩虹7号电池（10粒装）</p>
                        </a>
                        <p class="price">9.9元</p>
                        <p class="good-news">13.8万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/redmi_recommend_cart.jpg" width="140" height="140">
                            <p>Redmi&nbsp;Note&nbsp;8&nbsp;6GB+128GB</p>
                        </a>
                        <p class="price">1299元</p>
                        <p class="good-news">11.1万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/dyj_recommend_cart.jpg" width="140" height="140">
                            <p>小米米家照片打印机彩色相纸套装</p>
                        </a>
                        <p class="price">59元</p>
                        <p class="good-news">8.8万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/rainbowdc_recommend_cart.jpg" width="140" height="140">
                            <p>彩虹7号电池（10粒装）</p>
                        </a>
                        <p class="price">9.9元</p>
                        <p class="good-news">13.8万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/redmi_recommend_cart.jpg" width="140" height="140">
                            <p>Redmi&nbsp;Note&nbsp;8&nbsp;6GB+128GB</p>
                        </a>
                        <p class="price">1299元</p>
                        <p class="good-news">11.1万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/dyj_recommend_cart.jpg" width="140" height="140">
                            <p>小米米家照片打印机彩色相纸套装</p>
                        </a>
                        <p class="price">59元</p>
                        <p class="good-news">8.8万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/rainbowdc_recommend_cart.jpg" width="140" height="140">
                            <p>彩虹7号电池（10粒装）</p>
                        </a>
                        <p class="price">9.9元</p>
                        <p class="good-news">13.8万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="../image/redmi_recommend_cart.jpg" width="140" height="140">
                            <p>Redmi&nbsp;Note&nbsp;8&nbsp;6GB+128GB</p>
                        </a>
                        <p class="price">1299元</p>
                        <p class="good-news">11.1万人好评</p>
                        <div class="inert-cart">加入购物车</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</article>

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
                            <img  src="../icon_image/Message.png" width="12" height="12">
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

<script src="../js/shoppingCart.js"></script>
</body>
</html>
