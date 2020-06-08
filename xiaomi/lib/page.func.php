<?php

function showPage($page, $totalPage, $where = null, $sep = "&nbsp;",$search = null)
{
    $where = ($where == null) ? null : "&" . $where;
    $url = $_SERVER['PHP_SELF'];

//    $index = ($page != 1) ? " <a href='{$url}?page=1{$where}' class='page-list'>index</a>" : "<span class='page-list'>index</span>";
    $prevPage = ($page > 1) ? $page - 1 : 1;
    $prev = ($page > 1) ? "<a href='{$url}?page={$prevPage}{$where}&search={$search}' class='page-list'><</a>" : "<span class='page-list'><</span>";
    $nextPage = ($page <= $totalPage) ? $page + 1 : $totalPage;
    $next = ($page != $totalPage) ? "<a href='{$url}?page={$nextPage}{$where}&search={$search}' class='page-list'>></a>" : "<span class='page-list'>></span>";
//    $end = ($page != $totalPage) ? "<a href='{$url}?page={$totalPage}{$where}' class='page-list'>end</a>" : "<span class='page-list'>end</span>";
    $str = "<span class='page'>总页数: " . $totalPage . " 目前页码: " . $page . "</span>";
    $p = "";
    $start = ($page > 1) ? $page -1 : 1;
    $end = ($page < $totalPage) ? $totalPage - 1 : $totalPage;
    if ($page + 1 == $totalPage){
        $end = $totalPage;
    }

    for ($i = $start; $i <= $end; $i++) {
        if ($page == $i) {
            $p .= "<span class='page-list' style='color: #000;'>{$i}</span>";
        } else {
                $p .= "<a href='{$url}?page={$i}{$where}&search={$search}' class='page-list'>{$i}</a>";
        }
    }

    $pageStr = $prev . $sep . $p . $sep . $next . $sep;

    return $pageStr;
}
