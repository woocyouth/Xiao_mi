<?php
require "../include.php";

$adminName = $_POST['adminname'];
$adminName = mysqli_escape_string(connect(),$adminName);
$password = $_POST['password'];

$sql = "select * from admin where adminname='{$adminName}';";
$res = checkAdmin($sql);
if($res){
    if (checkAdminPwd($adminName,$password) == false){
        echo '{"success":false,"mes":"密码错误，请重试"}';
        return;
    }
    echo '{"success":true,"mes":"index.php"}';
    $_SESSION['adminname'] = $res['adminname'];
}else{
    echo '{"success":false,"mes":"管理员账号不存在！"}';
    return;
}


