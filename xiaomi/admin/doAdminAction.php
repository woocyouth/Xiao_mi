<?php
require "../include.php";
checkLogin();
@$act = $_REQUEST['act'];
@$id = $_REQUEST['id'];

if($act == "logOut"){
    AdminLoginOut();
}elseif($act == "del"){
    AdminDelete($id);
}elseif ($act == "insert"){
    addUser();
}elseif ($act == "update"){
    updateUser($id);
}