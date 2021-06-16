<?php

session_start();
require_once '../model/controller.php';
require_once '../model/index_Initialize.php';

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

    $ext = str_replace('image/', '.', $_FILES['upload']['type']);

    if ($ext === '.jpg' || $ext === '.jpeg' || $ext === '.png' || $ext === '.gif') {
        // SQL コネクション
        $link = sql_connect('../../const.php');
        $name = sql_escape($link, $name);
        $age = sql_escape($link, $age);
        $sql = "INSERT INTO sample2(name,age,ext) VALUES('" . $name . "'," . $age . ",'" . $ext . "')";
        $msg = sql_query($link, $sql, 'insert');
        // ID取得
        $sql = "SELECT LAST_INSERT_ID()";
        $id = sql_query($link, $sql, 'select');
        mysqli_close($link);
        // img保存
        move_uploaded_file($_FILES['upload']['tmp_name'], trim("../img/" . $id['LAST_INSERT_ID()'] . "$ext"));
        // if (move_uploaded_file($_FILES['upload']['tmp_name'], trim("../img/" . $id['LAST_INSERT_ID()'] . "$ext"))) {
        //     $_SESSION['name'] = $name;
        //     $_SESSION['age'] = $age;
        //     $_SESSION['id'] = $id;
        //     header('Location:complete.php');
        //     exit;
        // }
    } else {
        $err4 = '拡張子はjpg,jpeg,png,gifに設定してください。';
    }

    echo '$_POST:';
    var_dump($_POST);
    echo '<br>';

    echo '$err:';
    var_dump($err);
    echo '<br>';
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <label for='name'>名前</label>
        <input type='text' id='name' name='name'>
        <label for='age'>年齢</label>
        <input type='text' id='age' name='age'>
        <label for="avatar">画像アップロード:</label>
        <input type="file" id="avatar" name="upload">
        <!-- accept="image/png, image/jpeg,image/png,image/gif" -->
        <button type="submit" name="upload">画像送信</button>
    </form>
</body>

</html>