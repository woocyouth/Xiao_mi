<?php
require "../../include.php";

$sql = "select * from products";

$data = fetchAll($sql);

//return $data;
require "./search_list.php";
