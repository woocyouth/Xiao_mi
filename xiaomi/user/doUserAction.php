<?php
require "../include.php";
@$act = $_REQUEST['act'];
@$id = $_REQUEST['id'];
@$verify = $_SESSION['verify'];
@$verify_POST = $_POST['verify'];

if($act == "logout"){
    logOut();
}elseif($act == 'uploadsHeader'){
    uploadsHeader($id);
}elseif($act == 'update_name'){
    updateName($id);
}elseif($act == 'updatePwd'){
    updatePwd($id,$verify,$verify_POST);
}