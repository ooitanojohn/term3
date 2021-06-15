<?php
session_start();

if (isset($_POST['btn']) != 'entry') {
    header('Location:confirm.php');
    exit;
}
if (isset($_SESSION['name']) && isset($_SESSION['age'])) {
    require_once('model/controller.php');
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    $msg = $_SESSION['msg'];
    session_destroy();

    $link = sql_connect('config/local.php');
    $name = sql_escape($link, $name);
    $age = sql_escape($link, $age);
    $sql =
        "SELECT id as ID , name as 名前 , age as 年齢
    FROM sample
    WHERE name = '" . $name . "' and age = '" . $age . "'";
    // sql文実行
    $result = sql_query($link, $sql, 'select');
    $user = $result;
}

require_once 'model/view.php';
require_once 'tpl/complete.php';
