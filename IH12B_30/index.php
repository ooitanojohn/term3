<?php
session_start();

// ページにアクセスした際の処理
require_once 'model/index_Initialize.php';

// 確認ボタン押した
if (isset($_POST['btn'])) {
    require_once('model/controller.php');

    // 未入力であればエラーメッセージ
    if (null_judge($_POST['name'])) {
        $err['msg_name'] = '名前が未入力です。';
    } else {
        $name = $_POST['name'];
    }

    // 未入力であればエラーメッセージ
    if (null_judge($_POST['age'])) :
        $err['msg_age'] = '年齢が未入力です';
    elseif (is_numeric($_POST['age'])) :
        $age = $_POST['age'];
    // 数値でなければエラーメッセージ
    else :
        $err['msg_num'] = '数値で入力してください';
    endif;

    // エラーメッセージが初期値のまま
    if ($err['msg_name'] == '' && $err['msg_age'] == '' && $err['msg_num'] == '') {
        $_SESSION['name'] = $name;
        $_SESSION['age'] = $age;
        header('Location:confirm.php');
        exit;
    }
}
require_once 'model/view.php';
require_once 'tpl/index.php';
