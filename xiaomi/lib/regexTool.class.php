<?php


class regexTool
{
    private $validate = array(
        'require' => '/.+/',
        'email' => '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
        'url' => '/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/',
        'currency' => '/^\d+(\.\d+)?$/',
        'number' => '/^\d+$/',
        'zip' => '/^\d{6}$/',
        'integer' => '/^[-\+]?\d+$/',
        'double' => '/^[-\+]?\d+(\.\d+)?$/',
        'english' => '/^[A-Za-z]+$/',
        'qq' => '/^\d{5,11}$/',
        'mobile' => '/^1(3|4|5|7|8)\d{9}$/',
        'userName' => '/^\w{5,20}$/',
        'userPass' => '/^\S{6,20}$/',
    );

    private $returnMatchResult = false; //返回匹配结果
    private $fixMode = null; //修正模式
    private $matches = array(); //数据数组
    private $isMatch = false; //是否验证成功

    public function __construct($returnMatchResult = false, $fixMode = null)
    {
        $this->returnMatchResult = $returnMatchResult;
        $this->fixMode = $fixMode;
    }

    /**
     * @param $pattern @正则表达式
     * @param $subject @数据对象
     * @return array|bool
     */
    private function regex($pattern,$subject){
        if (array_key_exists(strtolower($pattern),$this->validate)){
            $pattern = $this->validate[$pattern].$this->fixMode;
        }
        $this->returnMatchResult ? preg_match_all($pattern, $subject,$this->matches) : $this->isMatch = preg_match($pattern, $subject) === 1;
        return $this->getReturnResult();
    }

    //获取返回结果 数组或布尔值
    public function getReturnResult(){
        if ($this->returnMatchResult){
            return $this->matches;
        }else{
            return $this->isMatch;
        }
    }

    //切换返回类型
    public function toggleReturnType($bool = null){
        if (empty($bool)){
            $this->returnMatchResult = !$this->returnMatchResult;
        }else{
            $this->returnMatchResult = is_bool($bool) ? $bool : (bool)$bool;
        }
    }

    //切换修正模式
    public function setFixMode($fixMode){
        $this->fixMode = $fixMode;
    }

    //验证是否为空
    public function isEmpty($str){
        return $this->regex('require',$str);
    }

    //验证用户名
    public function userName($name)
    {
        return $this->regex('userName',$name);
    }

    //验证用户密码
    public function userPass($pass)
    {
        return $this->regex('userPass',$pass);
    }

    //验证用户手机号码
    public function userPhone($phone)
    {
        return $this->regex('mobile',$phone);
    }

    //验证用户邮箱
    public function userEmail($email)
    {
        return $this->regex('email',$email);
    }
}