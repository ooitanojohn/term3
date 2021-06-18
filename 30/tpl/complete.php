<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>complete.php</title>
</head>

<body>
    <h1 class="p-5 text-center display-5 border-bottom mb-5 fst-italic">会員登録</h1>
    <h2 class="p-5 text-center display-6 mb-5 fst-italic">以下の内容で登録いたしました。</h2>
    <table class="table container-sm justify-content-sm-center w-25 text-center mb-5">
        <tr class="col-auto mb-2">
            <th>ID</th>
            <td><?php echo $id ?></td>
        </tr>
        <tr class="col-auto mb-2">
            <th>氏名</th>
            <td><?php echo escape($name) ?></td>
        </tr>
        <tr class="col-auto mb-2">
            <th>年齢</th>
            <td><?php echo $age ?></td>
        </tr>
        <tr class="col-auto mb-2">
            <th>画像</th>
            <td><img src="img/<?php echo $id . $ext ?>" alt="登録写真" max-width="400" height="auto"></td>
        </tr>
    </table>

    <h2 class="p-5 text-center display-6 mb-5 fst-italic">会員一覧</h2>
    <table class="table container-sm justify-content-sm-center text-center">
        <tr>
            <th scope="col">氏名</th>
            <th scope="col">画像</th>
        </tr>
        <?php foreach ($result as $key => $value) { ?>
            <tr>
                <td scope="row"><?php echo escape($value[1]) ?></td>
                <td><img src="img/<?php echo $value[0] . $value[3] ?>" alt="<?php echo 'No.' . $value[0] . '登録写真' ?>" width="100" height="auto"></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>