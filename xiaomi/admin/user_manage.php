<?php
require "../include.php";

$keywords = isset($_REQUEST['keywords']) ? $_REQUEST['keywords'] : null;
$where = $keywords ? " where id like '%{$keywords}%'" : null;
$change = isset($_REQUEST['order']) ? $_REQUEST['order'] : null;
$order = $change ? " order by ".$change : null;
$pageSize = 8;
$rows = pageAll($pageSize,'user',$where,$order);
if ($rows == null){
    alertMes("查询用户ID不存在，请重新输入","user_manage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="../CSS/admin/manage.css">
</head>
<body>
    <div class="user">
        <div class="title">
            <div class="title_user">用户资料</div>
                <div class="search">
                    <input type="text" name="ser_text" id="search" placeholder="Search userID" onkeypress="search()">
                    <input type="submit" value="搜索ID" onclick="search_click()" >
                </div>
        </div>

        <table width="94%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td>编号
                <select id="" class="select" onchange="change(this.value)">
                    <option>选择排序</option>
                    <option value="id asc">升序</option>
                    <option value="id desc">降序</option>
                </select>
                </td>
                <td>用户名</td>
                <td>密码</td>
                <td>手机号码</td>
                <td>邮箱</td>
                <td>操作</td>
            </tr>

            <?php foreach ($rows as $row){ ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password'] = encryptDecrypt('password',$row['password'],1); ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <input type="button" onclick="edit(<?php echo $row['id'];?>)" value="编辑">
                    <span>|</span>
                    <input type="button" onclick="del(<?php echo $row['id'];?>)" value="删除">
                </td>
            </tr>
          <?php } ?>
<!--            --><?php //if($rows>$pageSize){?>
                <tr>
                    <td colspan="6"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$change}");?></td>
                </tr>
<!--            --><?php //}?>
        </table>
    </div>

<script type="text/javascript">
    function add() {
       window.location = "addAdmin.php";
    }
    function edit(id) {
        window.location = "editAdmin.php?id=" + id;
    }
    function del(id) {
        if (window.confirm("删除用户数据后，数据将无法恢复！")){
            window.location = "doAdminAction.php?act=del&id=" + id;
        }
    }
    function search() {
        if (event.keyCode === 13){
            var search = document.getElementById("search").value;
            window.location = "user_manage.php?keywords=" + search;
        }
    }
    function search_click() {
        var search = document.getElementById("search").value;
        window.location = "user_manage.php?keywords=" + search;
    }
    function change(val) {
        window.location = "user_manage.php?order=" + val;
    }

</script>
</body>
</html>