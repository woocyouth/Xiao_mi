<?php
/*
 * mysql 数据库连接
 */
function connect()
{
    $mysqli = new mysqli(db_host, db_admin, db_password, db_database,db_port);
    if ($mysqli->connect_error) {
        exit("Connect Error : " . $mysqli->connect_error);
    }
    $mysqli->set_charset('utf8');

    return $mysqli;

}

/*
 * mysql 插入数据
 */
function insert($table, $array, $tmp)
{
    $con = connect();
    foreach ($array as $key => $val) {
        if ($tmp == $key) {
            unset($array[$key]);
        }
    }
    $key = join(",", array_keys($array));
    $vals = "'" . join("','", array_values($array)) . "'";
    $sql = "insert {$table}($key) values({$vals})";

//    var_dump($sql);exit();
    if ($con->query($sql) === true) {
        return true;
    } else {
        echo "Insert data " . $sql . " Error : " . $con->error;exit();
        return $sql;

//        return null;
    }
}

/*
 * mysql 更新数据
 */
function update($table, $array, $where = null)
{
    $str = "";
    $con = connect();
    foreach ($array as $key => $val) {
        if (@$str == null) {
            $sep = "";
        } else {
            $sep = ",";
        }
        @$str .= $sep . $key . "='" . $val . "'";
    }

    $sql = "update {$table} set {$str}" . ($where == null ? null : "where " . $where);
    $result = $con->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}


/*
 * msyql 删除数据
 */
function delete($table, $where = null)
{
    $con = connect();
    $where = $where == null ? null : 'where ' . $where;
    $sql = "delete from {$table} {$where}";
    $con->query($sql);
    return $con->affected_rows;
}

/*
 * mysql 查找数据-----查找单一指定数据
 */
function fetchOne($sql, $result_type = MYSQLI_ASSOC)
{
    $con = connect();
    @$result = $con->query($sql);
    @$row = mysqli_fetch_array($result, $result_type);
    return $row;
}

/*
 * mysql 查找数据-----查找全部数据
 */
function fetchAll($sql)
{
    $rows = array();
    $con = connect();
    $result = $con->query($sql);
    while (@$row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}

/*
 * msyql 获取结果集的行数
 */
function getResultNum($sql)
{
    $con = connect();
    $result = $con->query($sql);
    return mysqli_num_rows($result);
}

/*
 * msyql 获取结果
 */
function queryInfo($sql){
    $con = connect();
    $result = $con->query($sql);
    $result = $result->fetch_all();
    return $result;
}
