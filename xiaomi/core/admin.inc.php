<?php

/*
 * 检测管理员是否已登录
 */
function checkLogin(){
    if (@$_SESSION['adminname'] == null){
        AdminAlertMes("请管理员先登陆，再对后台进行操作","login.php");
    }
}


/*
 * 获取对应管理员数据
 */
function checkAdmin($sql){
   return fetchOne($sql);
}

function checkAdminPwd($name,$pwd){
    $pwd = encryptDecrypt('password',$pwd,0);
    $sql = "select * from admin where adminname='{$name}' and password='{$pwd}';";
    $res = fetchOne($sql);
    if($res){
        return true;
    }else{
        return false;
    }
}

/*
 * 管理员退出
 */
function AdminLoginOut(){
    if (isset($_COOKIE['adminname'])){
        setcookie('adminname',"",time() - 1);
    }
    session_destroy();
    header("location:login.php");
}

/*
 * 删除用户
 */
function AdminDelete($id){
    $arr = $_POST;
   if (delete('user','id='.$id)) {
       alertMes("删除用户数据成功！","user_manage.php");
   }else{
       alertMes("删除用户数据失败！","user_mange.php");
   }
}

/*
 * 添加用户
 */
function addUser(){
    $arr = $_POST;
//    $arr['password'] = encryptDecrypt('password',$arr['password'],0);
    $sql = "select * from user where username='{$arr["username"]}'";
    if (fetchOne($sql)){
        echo '{"success":false,"mes":"用户已存在，请另取用户名"}';
        return;
    }
    if($arr['username'] == null){
        echo '{"success":false,"mes":"用户名不能为空"}';
        return;
    }else{
        if (checkUserRes($arr['username']) == false){
            echo '{"success":false,"mes":"用户名仅支持 数字/英文大小写,最少6位,最多35位"}';
            return;
        }
    }

    if($arr['password'] == null){
        echo '{"success":false,"mes":"密码不能为空"}';
        return;
    }else{
        if (checkPwdRes($arr['password']) == false){
            echo '{"success":false,"mes":"密码支持 数字/英文大小写/=/？/*,最少6位,最多35位"}';
            return;
        }
    }


    if($arr['phone'] == null){
        echo '{"success":false,"mes":"手机号码不能为空"}';
        return;
    }else{
        if (checkPhoneRes($arr['phone']) == false){
            echo '{"success":false,"mes":"手机号码仅支持13**,15**,18**,最少11位"}';
            return;
        }
    }

    if($arr['email'] == null){
        echo '{"success":false,"mes":"邮箱不能为空"}';
        return;
    }else{
        if (checkEmailRes($arr['email']) == false){
            echo '{"success":false,"mes":"邮箱命名不规范,例子: XXXX@XXX.com,最多40位"}';
            return;
        }
    }

    if (checkUserRes($arr['username']) && checkPwdRes($arr['password']) && checkPhoneRes($arr['phone']) && checkEmailRes($arr['email'])){
        $arr['password'] = encryptDecrypt('password',$arr['password'],0);
        if (insert('user',$arr,null)){
            echo '{"success":true,"mes":"addAdmin.php"}';
            return;
        }else{
            echo '{"success":true,"mes":"添加用户失败"}';
            return;
        }
    }

}

/*
 * 添加用户
 */
function updateUser($id){
    $arr = $_POST;
    $arr['password'] = encryptDecrypt('password',$arr['password'],0);
    if (update('user',$arr,"id=".$id)){
        alertMes("成功修改用户资料","user_manage.php");
    }else{
        alertMes("修改用户资料失败，请重新修改","user_manage.php");
    }
}






//function pageAll($pageSize = 2,$where = null,$order = null){
//    global $page,$totalPage;
//    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
//    $sql = "select * from user";
//    $total = getResultNum($sql);
//    $totalPage = ceil($total / $pageSize);
//    $offset = ($page - 1) * $pageSize;
//    if ($page < 1 || $page == null || !is_numeric($page)){
//        $page = 1;
//    }
//    if ($page >= $totalPage){
//        $page = $totalPage;
//    }
//    $sql_limit = "select * from user {$where} {$order} limit {$offset},{$pageSize}";
//    $rows = fetchAll($sql_limit);
//    return $rows;
//}
