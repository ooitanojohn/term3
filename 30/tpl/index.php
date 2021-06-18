<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>index.php</title>
</head>

<body>
    <!-- font-monospace -->
    <h1 class="p-5 text-center display-5 border-bottom mb-5 fst-italic">会員登録</h1>
    <form method="post" enctype="multipart/form-data" class="container-sm justify-content-sm-center w-25">
        <div class="col-auto mb-2">
            <label for='name' class="form-label fst-italic">氏名:<div class="alert-warning float-end fst-normal" role="alert"><?php echo $err[0] ?></div></label>
            <input type='text' id='name' name='name' class="form-control shadow-sm" autofocus>
        </div>
        <div class="col-auto mb-2">
            <label for='age' class="form-label fst-italic">年齢:<div class="alert-warning float-end fst-normal" role="alert"><?php echo $err[1] . $err[2] ?></div></label>
            <input type='text' id='age' name='age' class="form-control shadow-sm">
        </div>
        <div class="col-auto mb-2">
            <label for="form_file" class="form-label fst-italic">画像:<div class="alert-warning float-end fst-normal" role="alert"><?php echo $err[3] ?></div></label>
            <input type="file" id="form_file" name="upload" class="form-control shadow-sm">
        </div>
        <!-- accept="image/png, image/jpeg,image/png,image/gif" -->
        <div class="col-auto p-5 text-center row gx-5">
            <button type="submit" name="upload" class="col btn btn-primary p-2">sign_up</button>
        </div>
    </form>
</body>

</html>