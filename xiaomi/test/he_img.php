<?php
$mysqli = new mysqli('localhost', 'root', '123456', 'xmshop');
if ($mysqli->connect_error) {
    exit("Connect Error : " . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$s = "select u_add_id from address where u_id=3 and u_addressee='zaqxsw' and u_province='天河区燕岭路'";
$data = $mysqli->query($s);
$data = $data->fetch_all();
var_dump($data);

