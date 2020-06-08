<?php
//require "../include.php";
require "../configs/database.php";
$link = mysqli_connect(db_host,db_admin,db_password) or die("mysql connect error : ".mysqli_error());
mysqli_set_charset($link,db_charset);
mysqli_select_db($link,db_database);
$sql = "select * from user";
$res = mysqli_query($link,$sql);
$result = mysqli_fetch_array($res);
print_r($result);