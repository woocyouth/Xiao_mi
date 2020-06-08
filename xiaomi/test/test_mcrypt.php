<?php
function encryptDecrypt($key, $string, $decrypt){
    if($decrypt){
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "12");
        return $decrypted;
    }else{
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted;
    }
}
//加密:"z0JAx4qMwcF+db5TNbp/xwdUM84snRsXvvpXuaCa4Bk="
echo encryptDecrypt('password', 'zaqxsw',0);
echo "<hr>";
//解密:"Helloweba欢迎您"
echo encryptDecrypt('password', 'ZmM0BTuZNg+8bXqmoilg56islJYuZBYHMmx5p8qDDTM=',1);