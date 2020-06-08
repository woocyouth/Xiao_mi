<?php
function testVerify($type = 1,$length = 4,$pixel = 50,$line = 6,$sess_name = 'verify'){
    $width = 180;
    $height = 120;

    $image = imagecreatetruecolor($width,$height);
    $white = imagecolorallocate($image,255,255,255);
    $black = imagecolorallocate($image,0,0,0);

    imagefilledrectangle($image,1,1,$width - 2,$height - 2,$white);

    $chars = buildString($type,$length);

    $_SESSION[$sess_name] = $chars;

    $fonts = array("msyh.ttc", "msyhbd.ttc", "msyhl.ttc", "SIMLI.TTF", "simsun.ttc", "STXIHEI.TTF", "STXINWEI.TTF");



}