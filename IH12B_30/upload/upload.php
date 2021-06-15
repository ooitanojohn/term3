<?php

require_once '../model/controller.php';

$name = 'niimi';
$age = 16;
echo '$_POST:';
var_dump($_POST);
echo '<br>';

echo '$_FILES:';
var_dump($_FILES);
echo '<br>';

if (isset($_POST['upload'])) {
    echo $_FILES['upload']['name'] . "<br/>\n";
    echo $_FILES['upload']['type'] . "<br/>\n";
    echo $_FILES['upload']['tmp_name'] . "<br/>\n";
    echo $_FILES['upload']['error'] . "<br/>\n";
    echo $_FILES['upload']['size'] . "<br/>\n";

    $extension = str_replace('image/', '.', $_FILES['upload']['type']);

    echo '$extension:';
    var_dump($extension);
    echo '<br>';
    $link = sql_connect('../../const.php');
    $name = sql_escape($link, $name);
    $age = sql_escape($link, $age);
    $sql = "INSERT INTO sample2(name,age,ext)VALUES('" . $name . "'," . $age . ",'" . $extension . "')";
    $msg = sql_query($link, $sql, 'insert');
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
        <label for="avatar">画像アップロード:</label>
        <input type="file" id="avatar" name="upload">
        <!-- accept="image/png, image/jpeg,image/png,image/gif" -->
        <button type="submit" name="upload">画像送信</button>
    </form>
</body>

</html>