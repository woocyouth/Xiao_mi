<?php

function showUserPage($page, $totalPage, $where = null,$order= null, $sep = "&nbsp;",$search = '小米')
{
    $where = ($where == null) ? null : "&" . $where;
    $url = $_SERVER['PHP_SELF'];
    $order = ($order == null) ? null : "&order=" .$order;

//    $index = ($page != 1) ? " <a href='{$url}?page=1{$where}' class='page-list'>index</a>" : "<span class='page-list'>index</span>";
    $prevPage = ($page > 1) ? $page - 1 : 1;
    $prev = ($page > 1) ? "<a href='{$url}?page={$prevPage}{$where}&search={$search}{$order}' class='page-list'><</a>" : "<span class='page-list'><</span>";
    $nextPage = ($page <= $totalPage) ? $page + 1 : $totalPage;
    $next = ($page != $totalPage) ? "<a href='{$url}?page={$nextPage}{$where}&search={$search}{$order}' class='page-list'>></a>" : "<span class='page-list'>></span>";
//    $end = ($page != $totalPage) ? "<a href='{$url}?page={$totalPage}{$where}' class='page-list'>end</a>" : "<span class='page-list'>end</span>";
    $str = "<span class='page'>总页数: " . $totalPage . " 目前页码: " . $page . "</span>";
    $p = "";

    for ($i = 1 ;$i <= $totalPage; $i++) {
        if ($page == $i) {
            $p .= "<span class='page-list' style='color: #000;'>{$i}</span>";
        } else {
            $p .= "<a href='{$url}?page={$i}{$where}&search={$search}{$order}' class='page-list'>{$i}</a>";
        }
    }

    $pageStr = $prev . $sep . $p . $sep . $next . $sep;

    return $pageStr;
}

function showOrderPage($page, $totalPage, $where = null, $sep = "&nbsp;")
{
    $where = ($where == null) ? null : "&" . $where;
    $url = $_SERVER['PHP_SELF'];

//    $index = ($page != 1) ? " <a href='{$url}?page=1{$where}' class='page-list'>index</a>" : "<span class='page-list'>index</span>";
    $prevPage = ($page > 1) ? $page - 1 : 1;
    $prev = ($page > 1) ? "<a href='{$url}?page={$prevPage}{$where}' class='page-list'><</a>" : "<span class='page-list'><</span>";
    $nextPage = ($page <= $totalPage) ? $page + 1 : $totalPage;
    $next = ($page != $totalPage) ? "<a href='{$url}?page={$nextPage}{$where}' class='page-list'>></a>" : "<span class='page-list'>></span>";
//    $end = ($page != $totalPage) ? "<a href='{$url}?page={$totalPage}{$where}' class='page-list'>end</a>" : "<span class='page-list'>end</span>";
    $str = "<span class='page'>总页数: " . $totalPage . " 目前页码: " . $page . "</span>";
    $p = "";

    for ($i = 1 ;$i <= $totalPage; $i++) {
        if ($page == $i) {
            $p .= "<span class='page-list' style='color: #000;'>{$i}</span>";
        } else {
            $p .= "<a href='{$url}?page={$i}{$where}' class='page-list'>{$i}</a>";
        }
    }

    $pageStr = $prev . $sep . $p . $sep . $next . $sep;

    return $pageStr;
}

