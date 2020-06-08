<?php
require "../include.php";
$arr = $_POST;
$username = $_POST['username'];
$username = mysqli_escape_string(connect(),$username);
$password = $_POST['password'];
$pwd = $_POST['pwd'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$sql = "select * from user where username='{$username}'";
if (fetchOne($sql)){
    echo '{"success":false,"mes":"用户已存在，请另取用户名"}';
    return;
//    alertMes('用户已存在，请另取用户名',"register.php");
}

if($username == null){
    echo '{"success":false,"mes":"用户名不能为空"}';
    return;
//    alertMes("用户名不能为空","register.php");
}else{
    if (checkUserRes($username) == false){
        echo '{"success":false,"mes":"用户名仅支持 数字/英文大小写,最少6位,最多35位"}';
        return;
//        alertMes("用户名支持 数字/英文大小写,最少6位,最多35位","register.php");
    }
}

if($password == null){
    echo '{"success":false,"mes":"密码不能为空"}';
    return;
//    alertMes("密码不能为空","register.php");
}else{
    if (checkPwdRes($password) == false){
        echo '{"success":false,"mes":"密码支持 数字/英文大小写/=/？/*,最少6位,最多35位"}';
        return;
//        alertMes("密码支持 数字/英文大小写/=/？/*,最少6位,最多35位","register.php");
    }
}

if($pwd == null){
    echo '{"success":false,"mes":"确认密码不能为空"}';
    return;
//    alertMes("确认密码不能为空","register.php");
}else{
    if ($password !== $pwd){
        echo '{"success":false,"mes":"两次密码不一致,请重新输入"}';
        return;
//        alertMes("两次密码不一致,请重新输入","register.php");
    }
}

if($phone == null){
    echo '{"success":false,"mes":"手机号码不能为空"}';
    return;
//    alertMes("手机号码不能为空","register.php");
}else{
    if (checkPhoneRes($phone) == false){
        echo '{"success":false,"mes":"手机号码仅支持13**,15**,18**,最少11位"}';
        return;
//        alertMes("手机号码支持13**,15**,18**,最少11位","register.php");
    }
}

if($email == null){
    echo '{"success":false,"mes":"邮箱不能为空"}';
    return;
//    alertMes("邮箱不能为空","register.php");
}else{
    if (checkEmailRes($email) == false){
        echo '{"success":false,"mes":"邮箱命名不规范,例子: XXXX@XXX.com,最多40位"}';
        return;
//        alertMes("邮箱命名不规范,例子: XXXX@XXX.com,最多40位","register.php");
    }
}

if (checkUserRes($username) && checkPwdRes($password) && checkPhoneRes($phone) && checkEmailRes($email)){
    $arr['password'] = encryptDecrypt('password',$password,0);
  if (insert('user',$arr,'pwd')){
      echo '{"success":true,"mes":"login.php"}';
      return;
//      alertMes("注册成功","login.php");
  }else{
      echo '{"success":false,"mes":"用户名重复，请重新输入用户名"}';
      return;
//      alertMes("用户名重复，请重新输入用户名","register.php");
  }

}




