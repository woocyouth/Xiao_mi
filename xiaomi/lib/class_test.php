<?php
require "image.class.php";
$src = "../camera/pro_details_xm10_3_video.jpg";
$thumb = new image($src);
//$thumb = new testImg($src);
//$content = 'woocyouth';
//$font_url = "../fontFrame/msyh.ttc";
//$size = 20;
//$color = array(
//    0 => '100',
//    1 => '255',
//    2 => '255',
//    3 => '20'
//);
//$locate = array(
//    'x' => '20',
//    'y' => '40'
//);
//$angle = 0;
//
//$locateW = array(
//    'x' => '60',
//    'y' => '40'
//);
//$source = "../image/pro_details_xm10_3_video.jpg";
//$alpha = 10;

$thumb->thumb(100,100);
//$thumb->fontMark($content,$size,$angle,$locate,$color,$font_url);
//$thumb->imgMark($source,$locateW,$alpha,100,100);
$thumb->show();
//$thumb->save("test");
$thumb->destroyImg();
