<?php
/**
 * alert message
 * url: 跳转地址
 * @param $mes
 * @param $url
 */
function alertMes($mes, $url)
{
    echo "<script>alert('{$mes}');window.top.location.reload();</script>";
    echo "<script>window.location.href = '{$url}';</script>";
}

/**
 * alert message
 * url: 跳转地址不在本页面重新刷新
 * @param $mes
 * @param $url
 */
function alertJumpMes($mes, $url)
{
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location.href = '{$url}';</script>";
}
function AdminAlertMes($mes, $url)
{
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location.href = '{$url}';</script>";
}

/**
 * jump 跳转指定页面
 * @param $href @String
 */
function jump($href)
{
    echo "<script>location.href='{$href}'</script>";
}

/**
 * alert info
 * @param $mes
 */
function alert($mes)
{
    echo "<script>alert('{$mes}');</script>";
}

/**
 *
 * @param $url String
 */
function winHref($url)
{
    echo "<script>window.location.href='{$url}';</script>";
}

/**
 *  自动登录
 */
function checkAutoLogin()
{
    if (isset($_COOKIE['auth'])) {
        $resArr = explode(':', $_COOKIE['auth']);
        $userId = end($resArr);
        $sql = "select * from user where id={$userId}";
        $info = fetchOne($sql);
        if (isset($info)) {
            $username = $info['username'];
            $password = $info['password'];
            $salt = 'zaq';
            $authStr = ($username . $password . $salt);
            if ($authStr == $resArr[0]) {
                $_SESSION['id'] = $info['id'];
                $_SESSION['username'] = $info['username'];
                $_SESSION['password'] = $info['password'];
                $_SESSION['phone'] = $info['phone'];
                $_SESSION['email'] = $info['email'];
                $_SESSION['headpic'] = $info['headpic'];
                $_SESSION['sex'] = $info['sex'];
                alertMes('自动登陆成功', "../user/index.php");
            }
        }
    }
}

/**
 *  自动登录index
 */
function checkAutoLoginIndex()
{
    if (isset($_COOKIE['auth'])) {
        $resArr = explode(':', $_COOKIE['auth']);
        $userId = end($resArr);
        $sql = "select * from user where id={$userId}";
        $info = fetchOne($sql);
        if (isset($info)) {
            $username = $info['username'];
            $password = $info['password'];
            $salt = 'zaq';
            $authStr = ($username . $password . $salt);
            if ($authStr == $resArr[0]) {
                $_SESSION['id'] = $info['id'];
                $_SESSION['username'] = $info['username'];
                $_SESSION['password'] = $info['password'];
                $_SESSION['phone'] = $info['phone'];
                $_SESSION['email'] = $info['email'];
                $_SESSION['headpic'] = $info['headpic'];
                $_SESSION['sex'] = $info['sex'];
            }
        }
    }
}

/*
 * admin分页
 */
function pageAll($pageSize = 2, $table = null, $where = null, $order = null)
{
    global $totalPage, $page;
    $page = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 1;
    $sql = "select * from {$table}";
    $total = getResultNum($sql);
    $totalPage = ceil($total / $pageSize);
    $offset = ($page - 1) * $pageSize;
    if ($page < 1 || $page == null || !is_numeric($page)) {
        $page = 1;
    }
    if ($page >= $totalPage) {
        $page = $totalPage;
    }

    $sql_limit = "select * from {$table} {$where} {$order} limit {$offset},{$pageSize} ";

    $rows = fetchAll($sql_limit);
    return $rows;

}

/*
 * user分页
 */
function UserPageAll($pageSize = 2, $table = null, $where = null, $order = null)
{
    global $u_totalPage, $u_page;
    $u_page = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 1;
    $sql = "select * from {$table}";
    $total = getResultNum($sql);
    $u_totalPage = ceil($total / $pageSize);
    $offset = ($u_page - 1) * $pageSize;
    if ($u_page < 1 || $u_page == null || !is_numeric($u_page)) {
        $u_page = 1;
    }
    if ($u_page >= $u_totalPage) {
        $u_page = $u_totalPage;
    }
    if ($order == null) {
        $sql_limit = "select * from {$table} {$where} limit {$offset},{$pageSize} ";
    } else {
        $sql_limit = "select * from {$table} {$where} order by {$order} limit {$offset},{$pageSize} ";
    }

    $rows = fetchAll($sql_limit);

    return $rows;

}



