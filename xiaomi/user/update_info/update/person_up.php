<?php
require "../../../include.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="css/person_up.css">
</head>
<body>
<div class="wrap">
    <div class="header-pic">
        <div class="h-pic">
            <img src="<?php echo empty($_SESSION['headpic']) ? '../../../camera/wooc.jpg' : '../.' . $_SESSION['headpic']; ?>"
                 width="74" height="74">
        </div>
        <a href="#" id="up_hPic">修改头像</a>
    </div>
    <!--    用户信息显示-->
    <div class="main-contain">
        <div class="main-title">
            <h3>基本资料</h3>
            <div class="set">
                <img src="../../../icon_image/pencil.png" width="14" height="14">
                <a href="#" id="open">编辑</a>
            </div>
        </div>
        <div class="u-info">
            <span class="u-txt">昵称： </span>
            <span class="u-value"><?php echo $_SESSION['username']; ?></span>
        </div>
        <div class="u-info">
            <span class="u-txt">性别： </span>
            <span class="u-value">男</span>
        </div>
        <!--    用户高级设置-->
        <div class="main-title">
            <h3>高级设置</h3>
            <div class="set">
                <a href="#" id="pwd-update">管理</a>
            </div>
        </div>
        <div class="u-info">
            <span class="u-txt">密码： </span>
            <span class="u-value"><?php echo encryptDecrypt('password', $_SESSION['password'], 1); ?></span>
        </div>
    </div>
</div>

<!--上传头像-->
<dialog id="h-dialog">
    <div class="box">
        <div class="title">
            <h4>编辑基础资料</h4>
            <span class="close" id="h-close">X</span>
        </div>

        <div class="contain">
            <div class="n-value">
                <span class="img-txt">请上传图片：</span>
            </div>
            <form action="../../doUserAction.php?act=uploadsHeader&id=<?php echo $_SESSION['id']; ?>" method="post"
                  enctype="multipart/form-data">
                <div class="img-inp">
                    <span>上传头像</span>
                    <input type="file" class="file" name="myFile">
                </div>
                <div class="btns">
                    <div class="sub">
                        <input type="submit" value="上传图片" class="submit">
                    </div>
                    <div class="cancel">
                        <span id="h-cancel">取消</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</dialog>
<!--更新用户名，性别-->
<dialog id="dialog">
    <div class="box">
        <div class="title">
            <h4>编辑基础资料</h4>
            <span class="close" id="close">X</span>
        </div>
        <form action="../../doUserAction.php?act=update_name&id=<?php echo $_SESSION['id']; ?>" method="post">
            <div class="contain">
                <div class="n-value">
                    <span class="txt">昵称：</span>
                    <div class="inp">
                        <input type="text" class="text" placeholder="<?php echo $_SESSION['username']; ?>"
                               name="username">
                    </div>
                </div>
                <!--            <div class="s-value">-->
                <!--                <span class="txt"></span>-->
                <!--                <-->
                <!--            </div>-->
                <div class="btns">
                    <div class="sub">
                        <input type="submit" value="保存" class="submit">
                    </div>
                    <div class="cancel">
                        <span id="cancel">取消</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</dialog>
<!--修改用户密码-->
<dialog id="pwd-dialog">
    <div class="box">
        <div class="title">
            <h4>编辑基础资料</h4>
            <span class="close" id="pwd-close">X</span>
        </div>
        <form action="../../doUserAction.php?act=updatePwd&id=<?php echo $_SESSION['id']; ?>" method="post">
            <div class="contain">
                <div class="n-value">
                    <span class="txt">密码：</span>
                    <div class="inp">
                        <input type="text" class="text" name="password" placeholder="<?php echo trim(encryptDecrypt('password',$_SESSION['password'], 1));?>">
                    </div>
                </div>
                <div class="n-value">
                    <span class="txt">验证码：</span>
                    <div class="inp">
                        <input type="text" class="text" name="verify">
                        <img src="../../verifyImg.php" width="60" height="40" style="float: left;margin-top: 15px;width: 100px;cursor:pointer;" id="verify" onclick="change_verify()">
                    </div>
                </div>
                <div class="btns">
                    <div class="sub">
                        <input type="submit" value="修改" class="submit">
                    </div>
                    <div class="cancel">
                        <span id="pwd-cancel">取消</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</dialog>
<script>
    var btn = document.getElementById('open');
    var h_a = document.getElementById('up_hPic');
    var pwd_up = document.getElementById('pwd-update');
    var close = document.getElementById('close');
    var h_close = document.getElementById('h-close');
    var pwd_close = document.getElementById('pwd-close');
    var cancel = document.getElementById('cancel');
    var h_cancel = document.getElementById('h-cancel');
    var pwd_cancel = document.getElementById('pwd-cancel');
    var dia = document.getElementById('dialog');
    var h_dia = document.getElementById('h-dialog');
    var pwd_dia = document.getElementById('pwd-dialog');

    var verify = document.getElementById('verify');
    function change_verify(){
        verify.src = "../../verifyImg.php?t=" + Math.random();
    }

    btn.addEventListener('click', function () {
        dia.style.display = 'block';
    });

    close.addEventListener('click', function () {
        dia.style.display = 'none';
    });

    cancel.addEventListener('click', function () {
        dia.style.display = 'none';
    });

    h_a.addEventListener('click', function () {
        h_dia.style.display = 'block';
    });

    h_close.addEventListener('click', function () {
        h_dia.style.display = 'none';
    });

    h_cancel.addEventListener('click', function () {
        h_dia.style.display = 'none';
    });

    pwd_up.addEventListener('click', function () {
        pwd_dia.style.display = 'block';
    });

    pwd_close.addEventListener('click', function () {
        pwd_dia.style.display = 'none';
    });

    pwd_cancel.addEventListener('click', function () {
        pwd_dia.style.display = 'none';
    });
</script>
</body>
</html>
