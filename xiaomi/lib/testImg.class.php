<?php


class testImg
{
    private $image; //内存中的图片
    private $info; //图片信息

    public function __construct($src)
    {
        $info = getimagesize($src);
        $this->info = array(
            'width' => $info[0],
            'height' => $info[1],
            'type' => image_type_to_extension($info[2],false),
            'mime' => $info['mime']
        );
        $func = "imagecreatefrom{$this->info['type']}";
        $this->image = $func($src);
    }

    public function thumb($width,$height){
        $img_thumb = imagecreatetruecolor($width,$height);
        imagecopyresampled($img_thumb,$this->image,0,0,0,0,$width,$height,$this->info['width'],$this->info['height']);
        imagedestroy($this->image);
        $this->image = $img_thumb;
    }

    public function fontMark($content,$size,$angle,$locate,$color,$font_url){
        $col = imagecolorallocatealpha($this->image,$color[0],$color[1],$color[2],$color[3]);
        imagefttext($this->image,$size,$angle,$locate['x'],$locate['y'],$col,$font_url,$content);
    }

    public function imgMark($source,$locate,$alpha,$width,$height){
        $img = getimagesize($source);
        $type = image_type_to_extension($img[2],false);
        $wFunc = "imagecreatefrom{$type}";
        $water = $wFunc($source);
        imagecopymerge($this->image,$water,$locate['x'],$locate['y'],0,0,$width,$height,$alpha);
        imagedestroy($water);
    }

    public function show(){
        header('content-type:'.$this->info['mime']);
        $func = "image{$this->info['type']}";
        $func($this->image);
    }

    public function save($name){
        $func = "image{$this->info['type']}";
        $func($this->image,$name.'.'.$this->info['type']);
    }

    public function destroy(){
        imagedestroy($this->image);
    }
}