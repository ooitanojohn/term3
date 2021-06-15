<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <link href="CSS/layout.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>comfirm</title>
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
        <h1>確認画面</h1>


        <form method="post">
            <dl>
                <label for="name">名前:<?php echo escape($name); ?></label>
                <label for="text">年齢:<?php echo escape($age); ?></label>
                <button type="submit" name="btn" value="entry" class="button1">登録</button>
            </dl>

        </form>
        <form method="post">
            <dl>
                <button type="submit" name="btn" value="back" class="button1">戻る</button>
            </dl>
        </form>




    </main>
</body>

</html>