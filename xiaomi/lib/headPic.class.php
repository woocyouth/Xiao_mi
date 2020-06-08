<?php


class headPic
{
    protected $fileName;    //file的name值
    protected $MaxSize;     //图片大小限制
    protected $allowMine;   //支持图片类型
    protected $allowExt;    //支持图片类型
    protected $imgFlag;     //是否为真实图片
    protected $uploadPath;  //保存上传图片目录
    protected $fileInfo;    //上传图片信息
    protected $ext;         //上传图片扩展名
    protected $error;       //错误信息
    protected $destination; //上传图片路径
    protected $uniName;     //修改上传图片为随机唯一名

    //初始化
    public function __construct(
        $fileName = 'myFile',
        $uploadPath = './uploads',
        $allowExt = array('jpg', 'jpeg', 'png', 'gif'),
        $allowMine = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif'),
        $imgFlag = true,
        $MaxSize = 5242880
    )
    {
        $this->fileName = $fileName;
        $this->MaxSize = $MaxSize;
        $this->allowMine = $allowMine;
        $this->allowExt = $allowExt;
        $this->uploadPath = $uploadPath;
        $this->imgFlag = $imgFlag;
        @$this->fileInfo = $_FILES[$this->fileName];

    }

    /*
     * 检测上传文件是否有错误
     * fileName 是否为空值
    */
    protected function checkError()
    {
        if (!is_null($this->fileInfo)) {
            if ($this->fileInfo['error'] > 0) {
                switch ($this->fileInfo['error']) {
                    case 1:
                        $this->error = "上传文件超出upload_max_fileSize大小限制";
                        break;
                    case 2:
                        $this->error = "上传文件超出表单max_file_size大小限制";
                        break;
                    case 3:
                        $this->error = "部分文件上传成功";
                        break;
                    case 4:
                        $this->error = "未找到上传文件";
                        break;
                    case 6:
                        $this->error = "未找到文件目录";
                        break;
                    case 7:
                        $this->error = "上传文件写入失败";
                        break;
                    case 8:
                        $this->error = "上传文件被PHP扩展程序中断";
                        break;

                }
                return false;
            } else {
                return true;
            }
        } else {
            $this->error = "请定义名的值";
            return false;
        }
    }

    //检测文件扩展名类型
    protected function checkExt()
    {
        $this->ext = strtolower(pathinfo($this->fileInfo['name'], PATHINFO_EXTENSION));
        if (!in_array($this->ext, $this->allowExt)) {
            $this->error = "文件扩展名不符合";
            return false;
        }
        return true;
    }

    // 检测上传文件是否超过最大上传限制
    protected function checkSize()
    {
        if ($this->fileInfo['size'] > $this->MaxSize) {
            $this->error = "上传文件过大";
            return false;
        }
        return true;
    }

    // 检测文件扩展名类型是否符合
    protected function checkMine()
    {
        if (!in_array($this->fileInfo['type'], $this->allowMine)) {
            $this->error = "文件扩展名类型不符合";
            return false;
        }
        return true;
    }

    //检测上传文件是否为真实图片
    protected function checkImgFlag()
    {
        if (!@getimagesize($this->fileInfo['tmp_name'])) {
            $this->error = "不是真实图片";
            return false;
        }
        return true;
    }

    //检测上传文件是否通过HTTP POST方式进行数据传输
    protected function checkHTTPPOST()
    {
        if (!is_uploaded_file($this->fileInfo['tmp_name'])) {
            $this->error = "上传文件不是通过HTTP POST方式进行数据传输的";
            return false;
        }
        return true;
    }

    //检测文件存放路径是否存在
    protected function checkUploadPath()
    {
        if (!file_exists($this->uploadPath)) {
            mkdir($this->uploadPath, 0777, true);
            chmod($this->uploadPath, 0777);
        }
    }

    //返回错误信息
    protected function showError()
    {
        exit("<span style='color:red;font-size:25px;'>" . $this->error . "</span>");
    }

    //上传图片
    public function updateHeader()
    {
        if ($this->checkError() && $this->checkSize() && $this->checkExt() && $this->checkMine() && $this->checkHTTPPOST() && $this->checkImgFlag()) {
            $this->checkUploadPath();
            $this->uniName = md5(uniqid(microtime(true), true));
            $this->destination = $this->uploadPath . '/' . $this->uniName . '.' . $this->ext;
            if (@move_uploaded_file($this->fileInfo['tmp_name'], $this->destination)) {
                return $this->destination;
            } else {
                $this->error = "文件上传失败";
                $this->showError();
            }

        } else {
            $this->showError();
        }
    }
}