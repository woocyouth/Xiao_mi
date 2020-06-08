<?php
require "../include.php";

$username = $_POST['username'];
$username = mysqli_escape_string(connect(),$username);
$sql = "select * from user where username='{$username}'";
$res = fetchOne($sql);
if($res != null){
    $_SESSION['username'] = $res['username'];
    $pwd_origin = encryptDecrypt('password',$res['password'],1);
    alertJumpMes("用户: ".$_SESSION['username']."密码是  ".trim($pwd_origin),"login.php");
}else{
    alertJumpMes("用户不存在","forget_password.php");
}