<?php
require "../include.php";
@$u_id = $_SESSION['id'];
@$s_name = $_GET['s_name'];
@$s_version = $_GET['s_version'];
@$s_price = $_GET['s_price'];
@$s_add = 1;
@$s_count = $_GET['s_count'];
@$s_service = $_GET['s_service'];
@$s_service_spent = $_GET['s_service_spent'];
@$s_img = $_GET['s_img'];

$arr = [
    'u_id' => $u_id,
    's_name' => $s_name,
    's_version' => $s_version,
    's_price' => $s_price,
    's_add' => $s_add,
    's_count' => $s_count,
    's_service' => $s_service,
    's_service_spent' => $s_service_spent,
    's_img' => $s_img,
];

$sql = "select * from shoppingCart where u_id={$u_id} and s_name='{$s_name}' and s_version='{$s_version}'";
$count = "select s_count from shoppingCart where u_id={$u_id} and s_name='{$s_name}' and s_version='{$s_version}'";//当前总计
$add = "select s_add from shoppingCart where u_id={$u_id} and s_name='{$s_name}' and s_version='{$s_version}'";//当前数量
$service = "select s_service from shoppingCart where u_id={$u_id} and s_name='{$s_name}' and s_version='{$s_version}'";//当前服务
$service_spent = "select s_service_spent from shoppingCart where u_id={$u_id} and s_name='{$s_name}' and s_version='{$s_version}'";//当前服务费总计

$up_count = fetchOne($count); //当前总计
$up_add = fetchOne($add); //当前数量
if (fetchOne($service_spent) != $s_service_spent && !empty($s_service_spent)){
    $up_service_spent = $s_service_spent;//更新服务费总计
}else{
    $up_service_spent = fetchOne($service_spent);//更新服务费总计
    $up_service_spent = (int)$up_service_spent['s_service_spent'];
}
$up_add = (int)$up_add['s_add'] + 1;
$s_count = $up_service_spent+($s_price*$up_add);//更新总计

if (fetchOne($sql) == true){
    //如果添加相同版本的商品，服务不变，数量，总计更新
    if (fetchOne($service) != $s_service && !empty($s_service)){
        $up_arr = [
            "s_count" => $s_count,//更新总计
            "s_add" => $up_add,//更新数量
            "s_service" => $s_service,//更新服务
        ];
    }else{
        $up_arr = [
            "s_count" => $s_count,//更新总计
            "s_add" => $up_add,//更新数量
        ];
    }
    if(fetchOne($service_spent) != $s_service_spent && !empty($s_service_spent)){
        $up_arr = [
            "s_count" => $s_count,//更新总计
            "s_add" => $up_add,//更新数量
            "s_service" => $s_service,//更新服务
            "s_service_spent" => $s_service_spent,//更新服务费总计
        ];
    }
    $where = " s_version='{$s_version}' ";

    if (update('shoppingCart',$up_arr,$where) == true){
        jump("./add_shoppingCart.php?name={$s_name}&version={$s_version}");
    }
}elseif (insert('shoppingCart',$arr,null) == true){
        jump("./add_shoppingCart.php?name={$s_name}&version={$s_version}");
}else{
    jump( "../user/login.php");
}


//var_dump($u_id);
//var_dump($s_name);
//var_dump($s_version);
//var_dump($s_price);
//var_dump($s_count);
//var_dump($s_service);
//var_dump($s_img);
////print_r($arr);

