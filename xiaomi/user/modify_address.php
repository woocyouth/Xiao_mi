<?php
require "../include.php";

@$u_id = $_SESSION['id'];
@$u_add_id = $_POST['u_add_id'];
@$u_addressee = $_POST['u_addressee'];
@$u_add_phone = $_POST['u_add_phone'];
@$u_province = $_POST['u_province'];
@$u_add_details = $_POST['u_add_details'];
@$s_name = $_GET['s_name'];
@$s_version = $_GET['s_version'];


//修改地址
$update_arr = [
    'u_addressee' => $u_addressee,
    'u_add_phone' => $u_add_phone,
    'u_province' => $u_province,
    'u_add_details' => $u_add_details,
];

//更新表单
if (update('address',$update_arr," u_id='{$u_id}' and u_add_id='{$u_add_id}'") == true){
    jump("order.php?s_name={$s_name}&s_version={$s_version}");
}else{
    alertMes('更新地址失败！','order.php');
}