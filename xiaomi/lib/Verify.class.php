<?php

class Verify
{
    private $type; //验证码字符串类型
    private $length; //验证码字符串长度
    private $pixel; //干扰点数量
    private $line; //干扰线数量
    private $width; //画布宽
    private $height; //画布长
    private $sess_name; //接受验证码的name值

    //初始化
    public function __construct($type = 1,$length = 4,$pixel = 50,$line = 6,$width = 130,$height = 70,$sess_name = 'verify')
    {
        $this->type = $type;
        $this->length = $length;
        $this->pixel = $pixel;
        $this->line = $line;
        $this->width = $width;
        $this->height = $height;
        $this->sess_name = $sess_name;
    }

    //生成随机字符串
    public function buildRandomString($type = 1,$length = 4){
        $chars = "";
        if ($type == 1){
            $chars = join("",range('0','9'));
        }elseif ($type == 2){
            $chars = join("",array_merge(range('a','z'),range('A','Z')));
        }elseif ($type == 3){
            $chars = join("",array_merge(range('0','9'),range('a','z'),range('A','Z')));
        }

        if ($length > strlen($chars)){
            exit('字符串长度不足');
        }

        $chars = str_shuffle($chars);
        return substr($chars,0,$length);
    }

    //生成验证码
    public function verifyImg(){
        $image = imagecreatetruecolor($this->width,$this->height); //创建画布
        $white = imagecolorallocate($image,255,255,255); //白色
        imagefilledrectangle($image,1,1,$this->width-2,$this->height-2,$white); //填充颜色
        $chars = $this->buildRandomString($this->type,$this->length); //生成随机字符串
        $_SESSION[$this->sess_name] = $chars; //会话获取验证码相应的字符串
        $fontFiles = array("msyh.ttc", "msyhbd.ttc", "msyhl.ttc", "SIMLI.TTF", "simsun.ttc", "STXIHEI.TTF", "STXINWEI.TTF"); //字体

        //循环 i 次，每次生成一个字符
        for ($i = 0; $i < $this->length; $i++){
            $size = mt_rand(20,30);
            $angle = mt_rand(-15,15);
            $fonts = "../fontFrame/".$fontFiles[mt_rand(0,count($fontFiles) - 1)];
            $color = imagecolorallocate($image,mt_rand(30,100),mt_rand(50,150),mt_rand(0,30));
            $x = 5 + $i * $size;
            $y = mt_rand(30,60);
            $text = substr($chars,$i,1);
            imagettftext($image,$size,$angle,$x,$y,$color,$fonts,$text);
        }

        //添加干扰点
        if ($this->pixel){
            for ($i = 0; $i < $this->pixel; $i++){
                $color = imagecolorallocate($image,mt_rand(30,100),mt_rand(50,150),mt_rand(0,30));
                imagesetpixel($image,mt_rand(0,$this->width-1),mt_rand(0,$this->height-1),$color);
            }
        }

        //添加干扰线
        if ($this->line){
            for ($i = 0; $i < $this->line; $i++){
                $color = imagecolorallocate($image,mt_rand(30,100),mt_rand(50,150),mt_rand(0,30));
                imageline($image,mt_rand(0,$this->width-1),mt_rand(0,$this->height-1),mt_rand(0,$this->width-1),mt_rand(0,$this->height-1),$color);
            }
        }

        //生成验证码
        header('content-type:image/gif');
        imagegif($image);
        imagedestroy($image);
    }

}

//$v = new Verify();
//$v->verifyImg();