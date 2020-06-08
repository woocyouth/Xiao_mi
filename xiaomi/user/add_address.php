<?php
require "../include.php";

@$u_id = $_SESSION['id'];
@$u_addressee = $_POST['u_addressee'];
@$u_add_phone = $_POST['u_add_phone'];
@$u_province = $_POST['u_province'];
@$u_add_details = $_POST['u_add_details'];
@$s_name = $_GET['s_name'];
@$s_version = $_GET['s_version'];
//var_dump($s_name.$s_version);
//exit();
//添加地址
$insert_arr = [
    'u_id' => $u_id,
    'u_addressee' => $u_addressee,
    'u_add_phone' => $u_add_phone,
    'u_province' => $u_province,
    'u_add_details' => $u_add_details,
];

//插入表单
if (insert('address',$insert_arr,null) == true){
    jump("order.php?s_name={$s_name}&s_version={$s_version}");
}else{
    alertMes('添加地址失败！','order.php');
}