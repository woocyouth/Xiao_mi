<?php


class image
{
    private $image; //内存中的图片
    private $info; //图片信息

    //打开图片，保存到内存中
    public function __construct($src)
    {
        $info = getimagesize($src); //获取图片信息
        $this->info = array(
            'width' => $info['0'],
            'height' => $info['1'],
            'type' => image_type_to_extension($info[2], false),
            'mime' => $info['mime']
        );
        $fun = "imagecreatefrom{$this->info['type']}";
        $this->image = $fun($src);
    }

    //操作图片（压缩）
    public function thumb($width, $height)
    {
        $image_thumb = imagecreatetruecolor($width, $height);
        imagecopyresampled($image_thumb, $this->image, 0, 0, 0, 0, $width, $height, $this->info['width'], $this->info['height']);
        imagedestroy($this->image);
        $this->image = $image_thumb;
    }

    //操作图片（添加文字水印）
    public function fontMark($content,$size,$angle,$locate,$color,$font_url){
        $col = imagecolorallocatealpha($this->image,$color[0],$color[1],$color[2],$color[3]);
        imagefttext($this->image,$size,$angle,$locate['x'],$locate['y'],$col,$font_url,$content);
    }

    //操作图片（添加图片水印）
    public function imgMark($source,$locate,$alpha,$width,$height){
        $info2 = getimagesize($source);
        $type2 = image_type_to_extension($info2[2],false);
        $fun2 = "imagecreatefrom{$type2}";
        $water = $fun2($source);
        imagecopymerge($this->image,$water,$locate['x'],$locate['y'],0,0,$width,$height,$alpha);
        imagedestroy($water);
    }

    //在浏览器中输出图片
    public function show()
    {
        header('content-type:' . $this->info['mime']);
        $func = "image{$this->info['type']}";
        $func($this->image);
    }

    //保存图片到硬盘
    public function save($name)
    {
        $func = "image{$this->info['type']}";
        $func($this->image ,'../camera/user_s_photo/'. $name . '.' . $this->info['type']);
    }

    //销毁图片
    public function destroyImg()
    {
        imagedestroy($this->image);
    }
}