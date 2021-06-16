<?php

session_start();
require_once 'model/controller.php';
require_once 'model/Initialize.php';

if (isset($_POST['upload'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        if ($name === '') {
            $err[0] = '名前が未入力です';
        }
    }
    if (isset($_POST['age'])) {
        $age = $_POST['age'];
        if ($age === '') {
            $err[1] = '年齢が未入力です';
        } elseif (!is_numeric($age)) {
            $err[2] = '数字で入力してください';
        }
    }

    if ($err === []) {
        $ext = str_replace('image/', '.', $_FILES['upload']['type']);

        if ($ext === '.jpg' || $ext === '.jpeg' || $ext === '.png' || $ext === '.gif') {
            // SQL コネクション
            $link = sql_connect('../const.php');
            $name = sql_escape($link, $name);
            $age = sql_escape($link, $age);
            $sql = "INSERT INTO sample2(name,age,ext) VALUES('" . $name . "'," . $age . ",'" . $ext . "')";
            $msg = sql_query($link, $sql, 'insert');
            // ID取得
            $sql = "SELECT LAST_INSERT_ID()";
            $id = sql_query($link, $sql, 'select');
            mysqli_close($link);
            // img保存
            if (move_uploaded_file($_FILES['upload']['tmp_name'], trim("img/" . $id['LAST_INSERT_ID()'] . "$ext"))) {
                $_SESSION['name'] = $name;
                $_SESSION['age'] = $age;
                $_SESSION['id'] = $id;
                $_SESSION['ext'] = $ext;
                header('Location:complete.php');
                exit;
            } else {
                error_log('[' . date('y-m-d:g-i-s') . ']' . 'move_uploaded_file_err' . "\r\n", 3, 'log/error.log');
                $err_code = '104';
            }
        }
    } else {
        $err[4] = '拡張子はjpg,jpeg,png,gifに設定してください。';
    }
}

require_once 'tpl/index.php';
