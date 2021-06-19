<?php

require_once 'model/controller.php';
// require_once 'model/Initialize.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// 会員詳細表示
$link = sql_connect('../const.php');
$sql = "SELECT * FROM sample2 where id = '" . (int)$id . "'";
$user_data = sql_query($link, $sql, 'select');
mysqli_close($link);

require_once 'model/view.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>complete.php</title>
</head>

<body>
    <h1 class="p-5 text-center display-5 border-bottom mb-5 fst-italic">会員情報</h1>
    <table class="table container-sm justify-content-sm-center w-25 text-center mb-5">
        <tr class="col-auto mb-2">
            <th>ID</th>
            <td><?php echo $user_data[0][0] ?></td>
        </tr>
        <tr class="col-auto mb-2">
            <th>氏名</th>
            <td><?php echo escape($user_data[0][1]) . '様' ?></td>
        </tr>
        <tr class="col-auto mb-2">
            <th>年齢</th>
            <td><?php echo $user_data[0][2] . '歳' ?></td>
        </tr>
        <tr class="col-auto mb-2">
            <th>画像</th>
            <td><img src="img/<?php echo $user_data[0][0] . $user_data[0][3] ?>" alt="登録写真" max-width="400" height="auto"></td>
        </tr>
    </table>
</body>

</html>