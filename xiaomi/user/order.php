<?php
require "../include.php";
$sql = "select * from address where u_id={$_SESSION['id']}";
$data = fetchAll($sql);

@$goods_name = $_GET['s_name'];//选购的商品名称
@$goods_version = $_GET['s_version'];//选购的商品版本
$goods_name = rtrim($goods_name, ',');
$goods_name_arr = explode(',', $goods_name);//数组存储商品名称
$goods_version = rtrim($goods_version, ',');
$goods_version_arr = explode(',', $goods_version);//数组存储商品版本
//var_dump($goods_name_arr);
//echo "<hr>";
//var_dump($goods_version_arr);
$goods_data = array();
for ($i = 0; $i < count($goods_name_arr); $i++) {
    $goods_sql = "select * from shoppingCart where s_name='{$goods_name_arr[$i]}' and s_version='{$goods_version_arr[$i]}'";
    $goods_data[] = fetchOne($goods_sql);
}
//var_dump($goods_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>order</title>
    <link rel="stylesheet" href="../CSS/user/order.css">
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
            <h2>确认订单</h2>
        </div>
        <!--        用户-->
        <div class="user-info">
            <div class="user">
                <?php echo($_SESSION['username']); ?>
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

<!--订单内容-->
<article>
    <div class="contain">
        <!--    收货地址-->
        <div class="address">
            <span class="head-title">
                收货地址
            </span>
            <?php foreach ($data as $address) { ?>
                <ul class="address-ul">
                    <span class="u_add_id" style="display: none;"><?php echo $address['u_add_id']; ?></span>
                    <li class="user-name"><?php echo $address['u_addressee']; ?></li>
                    <li class="user-phone"><?php echo $address['u_add_phone']; ?></li>
                    <li class="user-address-part-1"><?php echo $address['u_province']; ?></li>
                    <li class="user-address-part-2"><?php echo $address['u_add_details']; ?></li>
                    <span class="u-modify">修改</span>
                </ul>
            <?php } ?>
            <!--            添加地址-->
            <div class="add-address">
                <img class="img1" src="../icon_image/add%20options_1.png" width="30" height="30">
                <img class="img2" src="../icon_image/add%20options_2.png" width="30" height="30">
                <span class="new-address">添加新地址</span>
            </div>
        </div>
        <!--    选购商品-->
        <div class="choose-good">
        <span class="goods-cart">
            商品及优惠券
        </span>
            <?php foreach ($goods_data as $s_g_data) { ?>
                <div class="show-choose-goods">
                    <div class="good-img">
                        <img src="..<?php echo $s_g_data['s_img']; ?>" width="30" height="30">
                    </div>
                    <div class="good-name"><?php echo $s_g_data['s_name']; ?><?php echo $s_g_data['s_version']; ?></div>
                    <div class="money">
                        <div class="good-choose">
                            <span class="good-choose-money"><?php echo $s_g_data['s_price']; ?></span>元 x <span class="good-choose-count"><?php echo $s_g_data['s_add']; ?></span>
                        </div>
                        <div class="good-pride">
                            <span class="add-money"><?php echo $s_g_data['s_count']; ?></span>元
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php foreach ($goods_data as $s_g_data) { ?>
                <?php if (!empty($s_g_data['s_service'])){?>
                <div class="show-choose-service">
                    <div class="service-img">
                        <img src="../image/insurance.png" width="30" height="30">
                    </div>
                    <div class="service-name"><?php echo str_replace(","," ",$s_g_data['s_service']); ?></div>
                    <div class="money">
                        <div class="service-choose">
<!--                            <span class="good-choose-money">--><?php //echo $s_g_data['s_price']; ?><!--</span>元 x <span-->
<!--                                    class="count">--><?php //echo $s_g_data['s_add']; ?><!--</span>-->
                        </div>
                        <div class="service-pride">
                            <span class="s-ser-money"><?php echo $s_g_data['s_service_spent']; ?></span>元
                        </div>
                    </div>
                </div>
            <?php } } ?>
        </div>
        <!--        配送方式-->
        <div class="post-way">
            <span class="title">配送方式</span>
            <span class="way">包邮</span>
            <!--商品结算账单-->
            <div class="section-bill">
                <div class="count">
                    商品件数：
                    <span class="s-count" id="s-add">4</span>
                </div>
                <div class="count">
                    商品总价：
                    <span class="s-count" id="s-count">9996元</span>
                </div>
                <div class="count">
                    活动优惠：
                    <span class="s-count">-0元</span>
                </div>
                <div class="count">
                    优惠券抵扣：
                    <span class="s-count">-0元</span>
                </div>
                <div class="count">
                    运费：
                    <span class="s-count">0元</span>
                </div>
            </div>
        </div>
        <!--        结算-->
        <div class="pay">
            <?php foreach ($data as $address) { ?>
                <div class="user-address" style="display: none;">
                    <span class="name"><?php echo $address['u_addressee']; ?></span>
                    <span class="phone"><?php echo $address['u_add_phone']; ?></span>
                    <span class="u-address"><?php echo $address['u_province']; ?><?php echo $address['u_add_details']; ?></span>
                    <span class="pay-modify">修改</span>
                </div>
            <?php } ?>

            <div class="bsm">
                <div class="payed">
                    立即下单
                </div>
                <div class="back-cart">
                    返回购物车
                </div>

            </div>
        </div>
    </div>

</article>

<!--    修改用户地址-->
<dialog class="u-modify-details">
    <div class="title">修改收货地址</div>
    <div class="u-modify-close">X</div>

    <form action="modify_address.php?s_name=<?php echo $goods_name;?>&s_version=<?php echo $goods_version;?>" method="post">
        <div class="u-mod-contain">
            <input type="text" name="u_addressee" class="d-in" placeholder="姓名" autocomplete="off">
            <input type="text" name="u_add_phone" class="d-in" placeholder="手机号" autocomplete="off">
            <input type="text" name="u_province" class="d-in" placeholder="收货地址" autocomplete="off">
            <input type="text" name="u_add_details" class="d-in" placeholder="详细地址" autocomplete="off">
            <input type="text" name="u_add_id" class="d-in" style="font-size: 24px;">
        </div>

        <div class="d-foot">
            <input type="submit" value="确定" class="d-submit">
            <input type="button" value="取消" class="d-cancel">
        </div>
    </form>
</dialog>

<!--    添加用户地址-->
<dialog class="u-add-details">
    <div class="add-title">添加收货地址</div>
    <div class="u-add-close">X</div>

    <form action="add_address.php?s_name=<?php echo $goods_name;?>&s_version=<?php echo $goods_version;?>" method="post">
        <div class="u-add-contain">
            <input type="text" name="u_addressee" class="d-add-in" placeholder="姓名" autocomplete="off">
            <input type="text" name="u_add_phone" class="d-add-in" placeholder="手机号" autocomplete="off">
            <input type="text" name="u_province" class="d-add-in" placeholder="收货地址" autocomplete="off">
            <input type="text" name="u_add_details" class="d-add-in" placeholder="详细地址" autocomplete="off">
        </div>

        <div class="d-add-foot">
            <input type="submit" value="确定" class="d-add-submit">
            <input type="button" value="取消" class="d-add-cancel">
        </div>
    </form>
</dialog>

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

<script type="text/javascript" src="../js/order.js"></script>
</body>
</html>
