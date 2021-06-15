<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">index.php</a></li>
                <li><a href="confirm.php">confirm.php</a></li>
                <li><a href="complete.php">complete.php</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>入力してください</h1>
        <form method="post">
            <dl>
                <dt><?php echo $err['msg_name'] ?></dt>
                <dd><label for="name">名前:</label>
                    <input type="text" name="name" id="name" value="<?php echo escape($name) ?>" autofocus>
                </dd>
                <dt><?php echo $err['msg_age'], $err['msg_num']; ?></dt>
                <dd><label for="text">年齢:</label>
                    <input type="text" name="age" value="<?php echo escape($age) ?>">
                </dd>
                <button type="submit" name="btn" value="confirm" class="button1">確認</button>
            </dl>
        </form>
    </main>

</body>

</html>