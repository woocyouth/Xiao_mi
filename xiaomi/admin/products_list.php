<?php
require "../include.php";

$keywords = isset($_REQUEST['keywords']) ? $_REQUEST['keywords'] : null;
$where = $keywords ? " where id like '%{$keywords}%'" : null;
$change = isset($_REQUEST['order']) ? $_REQUEST['order'] : null;
$order = $change ? " order by ".$change : null;
$pageSize = 4;
$rows = pageAll($pageSize,'products',$where,$order);
if ($rows == null){
    alertMes("查询商品ID不存在，请重新输入","user_manage.php");
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
        <div class="title_user">商品资料</div>
        <div class="search">
            <input type="text" name="ser_text" id="search" placeholder="Search ProductsID" onkeypress="search()">
            <input type="submit" value="搜索ID" onclick="search_click()" >
        </div>
    </div>

    <table width="94%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td>编号

            </td>
            <td>名称</td>
            <td>价格</td>
            <td>图片</td>
        </tr>

        <?php foreach ($rows as $row){ ?>
            <tr>
                <td><?php echo $row['p_id']; ?></td>
                <td><?php echo $row['p_name']; ?></td>
                <td><?php echo $row['p_price']; ?></td>
                <td><img src="<?php echo substr($row['p_img'],3); ?>" class="product-img"> </td>

            </tr>
        <?php } ?>
<!--        --><?php //if($rows>$pageSize){?>
            <tr>
                <td colspan="4"><?php echo showPage($page, $totalPage);?></td>
            </tr>
<!--        --><?php //}?>
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
