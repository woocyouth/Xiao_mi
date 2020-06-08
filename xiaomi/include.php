<?php
header("content-type:text/html;charset=utf-8");
//header("Access-Control-Allow-Origin:*");
//header("Access-Control-Allow-Methods:POST,GET");
date_default_timezone_set("PRC");
if(!session_id()){
    session_start();
}
define("ROOT",dirname(__FILE__));
/*
 * PATH_SEPARATOR:是分隔符 windows是(;)/Linux是(:)
 * set_include_path():设置路径
 * get_include_path():获取当前路径
 * DIRECTORY_SEPARATOR：目录分隔符 windowss是( \ or / ) Linux是( / )
 */
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
//set_include_path(PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."lib".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."core".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."configs".get_include_path());
//require 'mysql.func.php';
require 'common.func.php';
require "database.php";
require "user.inc.php";
require "mysql.func.php";
require "Mcrypt.php";
require "admin.inc.php";
require "page.func.php";
require "headPic.class.php";
require "update_user_info.php";
require "string.func.php";
require "Verify.class.php";
require "image.class.php";
require "regexTool.class.php";
require "page_user.func.php";

connect();
