<?php
function buildString($type,$len){
    $chars = "";
    if ($type == 1){
        $chars = join("",range('0','9'));
    }elseif ($type == 2){
        $chars = join("",array_merge(range('a','z'),range('A','Z')));
    }elseif ($type == 3){
        $chars = join("",array_merge(range('a','z'),range('A','Z'),range('0','9')));
    }

    if ($len > strlen($chars)){
        exit('chars\'s len not');
    }

    $chars = str_shuffle($chars);

    return substr($chars,0,$len);
}