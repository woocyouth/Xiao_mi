<?php
require "../include.php";
$password = "zaqxsw";
$password = encryptDecrypt('password',$password,0);
echo $password;
echo "<hr>";
$sql = "insert into admin(username,passowrd) values ('testad','{$password}');";
echo $sql;