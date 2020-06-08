<?php
require "../include.php";
@$or_id = $_GET['or_id'];
$sql = "select * from orderList where or_id='{$or_id}'";
$data = fetchAll($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/user/order_list.css">
</head>
<body>
<div class="contain">
    <div class="title">
        <div class="head">
            <span class="tit">订单详情</span>
            <a href="javascript:void(0);" class="tit-more">请谨防钓鱼链接或诈骗电话,了解更多></a>
        </div>
<?php foreach ($data as $or_list){?>
        <div class="num">
            <span class="order-num">订单号：<?php echo $or_list['or_id'];?></span>
        </div>
        <div class="contact">
            <a href="javascript:void(0);" class="contact-service">联系客服</a>
            <a href="javascript:void(0);" class="back-service">申请售后</a>
        </div>
    </div>

    <div class="buy-goods">
        <?php
        $or_list['s_img'] = rtrim($or_list['s_img']);
        $or_list_img_arr = explode(",",$or_list['s_img']);//图片路径
        $or_list['s_name'] = rtrim($or_list['s_name']);
        $or_list_name_arr = explode(",",$or_list['s_name']);//购买的商品名称
        $or_list['s_single_price'] = rtrim($or_list['s_single_price']);
        $or_list_single_price_arr = explode(",",$or_list['s_single_price']);//商品单价
        $or_list['s_add'] = rtrim($or_list['s_add']);
        $or_list_add_arr = explode(",",$or_list['s_add']);//商品数量

        for($i = 0;$i<count($or_list_img_arr);$i++){
            ?>
        <div class="buy-goods-list">
            <div class="g-img">
                <img src="..<?php echo $or_list_img_arr[$i];?>" width="80" height="80">
            </div>
            <span class="g-name"><?php echo $or_list_name_arr[$i];?></span>
            <span class="g-price"><?php echo $or_list_single_price_arr[$i];?>元 × <?php echo $or_list_add_arr[$i];?></span>
        </div>
        <?php }?>
    </div>

    <div class="order-details">
        <h2 class="u-details-head">收货信息</h2>
        姓       名：	<span class="u-name"><?php echo $or_list['u_addressee'];?></span><br>
        联系电话：	<span class="u-phone"><?php echo $or_list['u_add_phone'];?></span><br>
        收货地址：	<span class="u-address"><?php echo $or_list['u_add_details'];?></span>
    </div>
    <div class="count-price">
        商品总价：	<span class="s-price"><?php echo $or_list['count_money'];?> 元</span><br>
        运费：	<span class="post-price">0 元</span><br>
        实付金额：	<span class="final-money"><?php echo $or_list['count_money'];?> 元</span>
    </div>
    <?php }?>
</div>
</body>
</html>
