<?php
require "../include.php";

$username = $_POST['username'];
$username = mysqli_escape_string(connect(),$username);
$password = encryptDecrypt('password', $_POST['password'], 0);
@$autoLogin = $_POST['autoLogin'];

$sql = "select * from user where username='{$username}'";
$res = @checkUser($sql);
if ($res) {
    if (checkUserLogin($username, $password) == false) {
        echo '{"success":false,"mes":"用户密码不正确，请重新输入密码"}';
        return;
//        alertMes("用户密码不正确，请重新输入密码", "login.php");
    }
    $_SESSION['id'] = $res['id'];
    $_SESSION['username'] = $res['username'];
    $_SESSION['password'] = $res['password'];
    $_SESSION['phone'] = $res['phone'];
    $_SESSION['email'] = $res['email'];
    $_SESSION['headpic'] = $res['headpic'];
    $_SESSION['sex'] = $res['sex'];
    echo '{"success":true,"mes":"index.php"}';
    if ($autoLogin == 1){
        $salt = 'zaq';
        $auth = ($username.$password.$salt).':'.$res['id'];
        setcookie('auth',$auth,time() + 7*24*3600);
        setcookie('username',$username,time() + 7*24*3600);
        setcookie('id',$res['id'],time() + 7*24*3600);
    }
//    echo $jsonp.'{"success":false,"mes":"登陆成功"}';<script>location.href="index.php";</script>

} else {
    echo '{"success":false,"mes":"用户不存在，请注册后再登录"}';
    return;
//    return;
//    alertMes("用户不存在，请注册后再登录", "login.php");
}
