<?php
//header('content-type:text/html;charset=utf-8');

//上传用户头像
function uploadsHeader($id){
    $arr = $_POST;
    $uploadH = new headPic();
    $path = $uploadH->updateHeader();
    $arr['headPic'] = $path;
    if (update('user',$arr,'id='.$id)){
        $_SESSION['headpic'] = $path;
        alertMes('上传图片成功',"../user/update_info/update/person_up.php");
    }else{
        alertMes('上传图片失败，请重新上传','../user/update_info/update/person_up.php');
    }
}

//修改用户名
function updateName($id){
    $arr = $_POST;
    if (update('user',$arr,'id='.$id)){
        $_SESSION['username'] = $arr['username'];
        alertMes('修改用户名成功',"../user/update_info/update/person_up.php");
//        echo "<script>window.location.reload();</script>";
    }else{
        alertMes('修改用户名失败，请重新修改',"../user/update_info/update/person_up.php");
    }
}

//修改用户密码
function updatePwd($id,$verify,$verify_POST){
    $arr = $_POST;
    unset($arr['verify']);
    var_dump($arr);
    $arr['password'] = encryptDecrypt('password',$arr['password'],0);
    if ($verify_POST == $verify){
        if (update('user',$arr,'id='.$id)){
            $_SESSION['password'] = $arr['password'];
            alertMes('修改密码成功','../user/update_info/update/person_up.php');
        }else{

            alertMes('修改密码失败，请重新修改','../user/update_info/update/person_up.php');
        }
    }else{
        alertMes('验证码不一致，请重新填写验证码','../user/update_info/update/person_up.php');
    }

}



