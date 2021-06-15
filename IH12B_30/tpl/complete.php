<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <link href="CSS/layout.css" rel="stylesheet">
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
    <h1><?php echo $msg ?></h1>
    <dl>
        <?php foreach ($user as $key => $val) { ?>
            <dt>
            <dd><?php echo escape($key) . ':' ?></dd>
            <dd><?php echo escape($val) ?></dd>
            </dt>
        <?php } ?>
    </dl>
</body>