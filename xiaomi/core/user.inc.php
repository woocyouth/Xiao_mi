<?php
/*
 * 检测用户是否存在
 */
function checkUser($sql)
{
    return fetchOne($sql);
}

/*
 * check user password
 */
function checkUserLogin($name, $pwd)
{
    $sql = "select * from user where username='{$name}' and password='{$pwd}';";
    if (fetchOne($sql) == null) {
        return false;
    }
    return true;
}

/*
 * 注销用户
 */
function logOut()
{
    $_SESSION = array();
    if (isset($_COOKIE['username'])) {
        setcookie('username', "", time() - 1);
    }
    if (isset($_COOKIE['auth'])) {
        setcookie('auth', "", time() - 1);
    }
    if (isset($_COOKIE['id'])) {
        setcookie('id', "", time() - 1);
    }
    session_destroy();
    header('location:index.php');
}

/*
 * 检测用户注册是否符合规制
 */

function checkUserRes($username)
{
        $pattern = "/^[\d\w]{6,35}$/i";
        if (preg_match($pattern, $username)) {
            return true;
        }else{
            return false;
        }
}

function checkPwdRes($password)
{
        $pattern = "/^[\d\w=\?\*]{5,35}$/i";
        if (preg_match($pattern, $password)) {
            return true;
        }else{
            return false;
        }
}

function checkPhoneRes($phone)
{
        $pattern = "/^[1(3|5|8)\d]{10,}$/i";
        if (preg_match($pattern, $phone)) {
            return true;
        }else {
            return false;
        }
}

function checkEmailRes($email)
{
        $pattern = "/^[a-zA-Z0-9]+@([0-9a-zA-z]+\.)+[A-Za-z]{2,5}$/i";
        if (preg_match($pattern, $email)) {
            return true;
        }else{
            return false;
        }
}