<?php
require "../../include.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../../CSS/product/xm10Pro_list.css">
    <link rel="stylesheet" href="../../CSS/product/common_list.css">
    <link rel="stylesheet" href="../../fontFrame/iconfont.css">
</head>
<body>
<div class="contain">
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
    <!--    商品详细信息-->
    <div class="pro-info">
        <span class="name">小米10&nbsp;&nbsp;Pro</span>
        <p class="info">
            <span class="info">「火爆热卖中，信用卡分期享24期免息，低至209元起/期，购机赠1TB小米云空间等好礼，加价购买小米圈铁四单元耳机优惠150元，加99元得20W高速无线充套装」</span>
            骁龙865处理器 / 1亿像素8K电影相机，50倍数字变焦，10倍混合光学变焦 / 双模5G / 新一代LPDDR5内存 / 50W极速闪充+30W无线闪充+10W无线反充 / 对称式立体声 /
            90Hz刷新率+180Hz采样率 / UFS 3.0高速存储 / 全面适配WiFi 6 / 超强VC液冷散热 / 4500mAh大电量 / 多功能NFC
        </p>
        <span class="txt-info">小米自营</span>
        <div class="price">
            <span class="now_price">4999元</span>
        </div>

        <!--  user address-->
        <div class="address">
            <i class="iconfont icon-position"></i>
            <div class="address-info">
                <span class="items">天津</span>
                <span class="items">天津市</span>
                <span class="items">河东区</span>
                <span class="items">唐家口街道</span>
                <span class="address_choose">修改</span>
            </div>
            <div class="product-status active" id="J_productStatus">
                <!--                <span class="init">正在加载...</span>-->
                <span class="sale">有现货</span>
                <!--                <span class="over">该地区暂时缺货</span>-->
                <!--                <span class="no">暂时无法送达</span> -->
                <!--                <span class="pre">预售商品</span> -->
                <!--                <span class="book">预售商品</span> -->
                <!--                <span class="nohasAddress"></span>-->
                <!--                <span class="time"></span> -->
            </div>
        </div>

        <!--        product-choose-version-color -->
        <div class="list-wrap">
            <!--            choose-version-->
            <div class="choose-version">
                <div class="title">选择版本</div>
                <ul class="choose-ver-ul">
                    <li class="n-active">
                        <span class="choose-name ">8GB+256GB</span>
                        <span class="choose-price "> 4999 元</span>
                    </li>
                    <li>
                        <span class="choose-name">16GB+256GB</span>
                        <span class="choose-price"> 6999 元</span>
                    </li>
                    <li>
                        <span class="choose-name">8GB+128GB</span>
                        <span class="choose-price"> 3999 元</span>
                    </li>
                </ul>
            </div>
            <!--choose-color-->
            <div class="choose-color">
                <div class="title">选择颜色</div>
                <ul class="choose-col-ul">
                    <li class="c-active">
                        <img class="c-img" src="../../image/xm10Pro_change_1.jpg" width="16" height="16">
                        <span class="col-name ">星空蓝</span>
                    </li>
                    <li>
                        <img class="c-img" src="../../image/xm10Pro_change_1_zzb.jpg" width="16" height="16">
                        <span class="col-name ">珍珠白</span>
                    </li>
                </ul>
            </div>
            <!--        insurance-->
            <div class="insurance">
                <div class="title">
                    <span class="choose-txt-title">选择小米提供的意外保护</span>
                    <p class="choose-txt-title-details">了解意外保护&nbsp;></p>
                </div>
                <ul class="insurance-ul">
                    <li>
                        <div class="check">
                            <input type="checkbox" class="service" id="service" name="insurance-checkbox">
                            <label for="service"></label>
                        </div>
                        <img src="../../image/insurance.png" width="50" height="50">
                        <div class="text">
                            <span class="insurance-text">意外保障服务   </span>
                            <p class="insurance-text">手机意外碎屏/进水/碾压等损坏</p>
                            <p class="done">
                                <i class="check-agree">
                                    <input type="checkbox" id="agree" class="agree" name="insurance-details-checkbox">
                                    <label for="agree"></label>
                                </i>

                                我已阅读
                                <a href="#">服务条款<span>|</span></a>
                                <a href="#">常见问题</a>
                            </p>
                        </div>
                        <div class="check-price">349 元</div>
                    </li>
                    <li>
                        <div class="check">
                            <input type="checkbox" class="service" id="service-2" name="insurance-checkbox">
                            <label for="service-2"></label>
                        </div>
                        <img src="../../image/insurance.png" width="50" height="50">
                        <div class="text">
                            <span class="insurance-text">碎屏保障服务   </span>
                            <p class="insurance-text">手机意外碎屏</p>
                            <p class="done">
                                <i class="check-agree">
                                    <input type="checkbox" class="agree" id="agree-2" name="insurance-details-checkbox">
                                    <label for="agree-2"></label>
                                </i>

                                我已阅读
                                <a href="#">服务条款<span>|</span></a>
                                <a href="#">常见问题</a>
                            </p>
                        </div>
                        <div class="check-price">249 元</div>
                    </li>
                </ul>
            </div>
            <div class="insurance-product">
                <div class="title">
                    <span class="choose-txt-title">选择小米提供的延长保修</span>
                    <p class="choose-txt-title-details">了解延长保修&nbsp;></p>
                </div>
                <ul class="insurance-ul">
                    <li>
                        <div class="check">
                            <input type="checkbox" class="service" id="service-3" name="insurance-checkbox">
                            <label for="service-3"></label>
                        </div>
                        <img src="../../image/insurance.png" width="50" height="50">
                        <div class="text">
                            <span class="insurance-text">延长保修服务   </span>
                            <p class="insurance-text">厂保延一年，性能故障免费维修</p>
                            <p class="done">
                                <i class="check-agree">
                                    <input type="checkbox" id="agree-3" class="agree" name="insurance-details-checkbox">
                                    <label for="agree-3"></label>
                                </i>

                                我已阅读
                                <a href="#">服务条款<span>|</span></a>
                                <a href="#">常见问题</a>
                            </p>
                        </div>
                        <div class="check-price">159 元</div>
                    </li>
                </ul>
            </div>
        </div>
        <!--已选购商品服务-->
        <div class="pro-list">
            <ul class="pro-list-ul">
                <li>
                    <span id="good-name">小米10 Pro</span>
                    <span class="version">8GB+256GB</span>
                    <span class="color">星空蓝</span>
                    <span class="money">4999 元</span>
                </li>
                <li style="display: none">
                    <span class="ser">意外保障服务   手机意外碎屏/进水/碾压等损坏</span>
                    <span class="money">349 元</span>
                </li>
                <li style="display: none">
                    <span class="ser">碎屏保障服务   手机意外碎屏</span>
                    <span class="money">249 元</span>
                </li>
                <li style="display: none">
                    <span class="ser">延长保修服务   厂保延一年，性能故障免费维修</span>
                    <span class="money">159 元</span>
                </li>
                <li class="totalPrice">总计 ：4999 元</li>
            </ul>
        </div>
        <!--        加入购物车-->
        <div class="insertCart">
            <div class="cart" id="go-buy-cart">
                <a href="javascript:void(0);" class="cart-a">加入购物车</a>
            </div>
            <div class="favor">
                <a href="#" class="favor-a">
                    <div class="icon-favor">
                        <img src="../../icon_image/favorite%20border.png" width="22" height="23">
                        <img src="../../icon_image/favorite%20border_1.png" width="22" height="23">
                    </div>
                    <span>喜欢</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="../../js/xm10_list.js"></script>
<script>

</script>
</body>
</html>
