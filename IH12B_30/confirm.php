<?php
session_start();

if ($_SESSION == []) {
    header('Location:index.php');
    exit;
}
// 戻るボタン押した時
if (isset($_POST['btn']) && $_POST['btn'] == "back") {
    header('Location:index.php', true, 307);
    exit;
}
if (isset($_SESSION['name']) && isset($_SESSION['age'])) {
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    // 登録ボタン押された
    if (isset($_POST['btn']) && $_POST['btn'] == 'entry') {
        require_once('model/controller.php');

        $link = sql_connect('config/local.php');
        $name = sql_escape($link, $name);
        $age = sql_escape($link, $age);
        $sql = "INSERT INTO sample(name,age)VALUES('" . $name . "'," . $age . ")";
        $msg = sql_query($link, $sql, 'insert');
        // 登録メッセージ
        $_SESSION['msg'] = $msg;

        header('Location:complete.php', true, 307);
        exit;
    }
}

require_once 'model/view.php';
require_once 'tpl/confirm.php';
