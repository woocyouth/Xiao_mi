<?php
require "../include.php";

@$u_id = $_SESSION['id'];
@$u_addressee = $_GET['u_addressee'];
@$u_add_phone = $_GET['u_add_phone'];
@$u_add_details = $_GET['u_add_details'];
@$s_name = $_GET['s_name'];
@$s_single_price = $_GET['s_single_price'];
@$s_service = $_GET['s_service'];
@$count_money = $_GET['count_money'];
@$s_add = $_GET['s_add'];
@$s_img = $_GET['s_img'];

$s_name = rtrim($s_name,",");
$s_single_price = rtrim($s_single_price,",");
$s_add = rtrim($s_add,",");
$s_img = rtrim($s_img,",");

//订单表存入数据
$insert_arr = [
    'u_id' => $u_id,
    's_name' => $s_name,
    's_img' => $s_img,
    's_add' => $s_add,
    's_single_price' => $s_single_price,
    's_service' => $s_service,
    'count_money' => $count_money,
    'u_add_details' => $u_add_details,
    'u_addressee' => $u_addressee,
    'u_add_phone' => $u_add_phone,
];

if (insert('orderList',$insert_arr,null) == true){
    jump("./success_order.php");
}else{
    exit('no');
}



