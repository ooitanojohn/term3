<?php

session_start();
if (!isset($_SESSION['id'])) {
    header('Location:index.php');
    exit;
}
require_once 'model/controller.php';
require_once 'model/Initialize.php';

// 登録内容表示
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$age = $_SESSION['age'];
$ext = $_SESSION['ext'];
session_destroy();

// 会員一覧表示
$link = sql_connect('../const.php');
$sql = "SELECT * FROM sample2";
$result = sql_query($link, $sql, 'select');
mysqli_close($link);

require_once 'model/view.php';
require_once 'tpl/complete.php';
