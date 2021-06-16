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