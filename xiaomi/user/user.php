<?php
require "../include.php";
$password = 'zaq';
echo $password;
echo "<hr>";
echo $pwd = encryptDecrypt('password',$password,0);
echo "<hr>";
//$sql = "insert into user(id,username,password,email) values(1,'test','{$pwd}','zaqxsw@1312.com')";
echo $sql;