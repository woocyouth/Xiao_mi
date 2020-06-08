<?php
header('content-type:text/html;charset=utf-8');

//通过GD库做验证码
function verifyImage($type = 1, $length = 4, $pixel = 50, $line = 6, $sess_name = "verify") {

    //创建画布
    $width = 180;
    $height = 130;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    //用填充矩形填充画布
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);

    $chars = buildRandomString($type, $length);

    $_SESSION[$sess_name] = $chars;
    $fontfiles = array("msyh.ttc", "msyhbd.ttc", "msyhl.ttc", "SIMLI.TTF", "simsun.ttc", "STXIHEI.TTF", "STXINWEI.TTF");

    for ($i = 0; $i < $length; $i++) {
        $size = mt_rand(34, 48);
        $angle = mt_rand(-15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(60, 76);
        $fontfile = "../fontFrame/" . $fontfiles [mt_rand(0, count($fontfiles) - 1)];
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }

    if ($pixel) {
        for ($i = 0; $i < $pixel; $i++) {
            imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }

    if ($line) {
        for ($i = 0; $i < $line; $i++) {
            $color = imagecolorallocate($image, mt_rand(40, 100), mt_rand(10, 100), mt_rand(100, 200));
            imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $color);
        }
    }

    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}
//verifyImage();