<?php
require "../include.php";
@$u_id = $_SESSION['id'];

$where = isset($_GET['or_id']) ? " where or_id like '%{$_GET["or_id"]}%' " : null;
$pageSize = 2;
$data = UserPageAll($pageSize,'orderList',$where);

$sql_where = "select * from  orderList {$where}";
$data_where = getResultNum($sql_where);
$data_where = ceil($data_where / $pageSize);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/user/myOrderList.css">
</head>
<body>
<div class="contain">
    <div class="title">
        <div class="head">
            <span class="tit">我的订单</span>
            <a href="javascript:void(0);" class="tit-more">请谨防钓鱼链接或诈骗电话,了解更多></a>
        </div>
    </div>
    <div class="search" id="search">
        <input type="text" class="text" id="sear" value="" autocomplete="off" placeholder="输入商品名称、订单号">
        <div class="img" id="s-btn">
            <input type="submit" class="btn" id="sear_btn" value="">
            <img src="../icon_image/search1.png" width="25" height="25" class="img1">
            <img src="../icon_image/search1_1.png" width="25" height="25" class="img2">
        </div>
    </div>
    <?php foreach ($data as $or_list) { ?>
        <div class="buy-goods">
            <div class="num">
                <span class="order-num">订单号：<?php echo $or_list['or_id']; ?></span>
            </div>
            <div class="order-details">
                <h2 class="u-details-head">收货信息</h2>
                下单时间：<span class="or-time"><?php echo $or_list['pay_date']; ?></span>|
                <span class="u-name"><?php echo $or_list['u_addressee']; ?></span>
                |<span class="u-phone"><?php echo $or_list['u_add_phone']; ?></span>
                |<span class="u-address"><?php echo $or_list['u_add_details']; ?></span>
                <div class="count-price">
                    实付金额： <span class="final-money"><?php echo $or_list['count_money']; ?> 元</span>
                </div>
            </div>
            <?php
            $or_list['s_img'] = rtrim($or_list['s_img']);
            $or_list_img_arr = explode(",", $or_list['s_img']);//图片路劲
            $or_list['s_name'] = rtrim($or_list['s_name']);
            $or_list_name_arr = explode(",", $or_list['s_name']);//商品名称
            $or_list['s_single_price'] = rtrim($or_list['s_single_price']);
            $or_list_single_price_arr = explode(",", $or_list['s_single_price']);//商品单价
            $or_list['s_add'] = rtrim($or_list['s_add']);
            $or_list_add_arr = explode(",", $or_list['s_add']);//商品数量
            for ($p = 0; $p < count($or_list_img_arr); $p++) {
                ?>
                <div class="buy-goods-list">
                    <div class="g-img">
                        <img src="..<?php echo $or_list_img_arr[$p]; ?>" width="80" height="80">
                    </div>
                    <span class="g-name"><?php echo $or_list_name_arr[$p]; ?></span>
                    <span class="g-price"><?php echo $or_list_single_price_arr[$p]; ?>元 × <?php echo $or_list_add_arr[$p]; ?></span>
                </div>
            <?php } ?>
            <div class="contact">
                <a href="javascript:void(0);" class="order-service">订单详情</a>
                <a href="javascript:void(0);" class="contact-service">联系客服</a>
                <a href="javascript:void(0);" class="back-service">申请售后</a>
            </div>
        </div>
    <?php } ?>
    <!--    分页-->
    <div class="page">
        <div class="list">
<?php if(empty($_GET['or_id'])) {
$to = $u_totalPage;

}else{
    $to = $data_where;
}?>
                <?php echo showOrderPage(@$u_page, $to,@"or_id={$_GET['or_id']}");?>

        </div>
    </div>
</div>
<script>
    var search_value = document.getElementById("sear");
    var search_btn= document.getElementById("sear_btn");
    var btn_img = document.querySelectorAll("#s-btn>img");

    //搜索按钮
    sear_btn.addEventListener('click',function () {
        window.location = "myOrderList.php?or_id="+search_value.value;
    });

    //搜索按钮顶部icon点击效果
    btn_img[1].onclick = function () {
        // console.log('test');
        sear_btn.click();
    }

    var order_num = document.querySelectorAll(".order-num");
    var order_service = document.querySelectorAll(".order-service");

    //选择需要查看的订单
    for (var i = 0; i < order_service.length;i++){
        order_service[i].onclick = function () {
            clear_service_active();
            this.className = "order-service active";
            var or_id = check_order_service();
            or_id = parseInt(or_id.substring(4,or_id.length));
            window.location.href = "order_list.php?or_id="+or_id;
        }
    }

    //清除选择查看过的订单
    function clear_service_active() {
        for (var i = 0; i < order_service.length;i++){
            order_service[i].className = "order-service";
        }
    }

    //获取对应订单号
    function check_order_service() {
         for (var i = 0; i<order_service.length;i++){
             if (order_service[i].className === "order-service active"){
                 var or_id = order_num[i].innerHTML;
             }
         }
         // console.log(or_id);
         return or_id;
    }

</script>
</body>
</html>
