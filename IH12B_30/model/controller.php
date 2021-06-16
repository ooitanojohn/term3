<?php

// emptyに 0 追加
function null_judge($obj)
{
    if ($obj === 0 || $obj === "0") {
        return false;
    }
    return empty($obj);
}

// DB接続 configの階層を指定
function sql_connect($config_file)
{
    require_once($config_file);
    // DB接続成功
    if ($link = @mysqli_connect(
        HOST_NAME,
        ROOT,
        PASS,
        DB_NAME
    )) {
    }
    // DB接続失敗
    else {
        // エラー内容
        // mysqlに出す 要検索
        error_log('DB接続エラー:' . mysqli_connect_error());
        // phpに
        echo 'DB接続エラー:' . mysqli_connect_error();
    }
    // 文字コード設定
    mysqli_set_charset($link, CHARACTER_CODE);
    return $link;
}

// sql文の実行
// 返り値 処理結果log = $msg sql文実行結果 = $result
// $sqlの入力値例 =
// "INSERT INTO sample(name,age)VALUES('" . $name . "'," . $age . ")"
// $phrase = insert,select句
function sql_query($link, $sql, $phrase)
{
    $result = '';
    // SQL文実行
    // true = object(mysqli_result) false = false(bool)
    if (mysqli_query(
        $link,
        $sql
    ) == true) {
        // insert文実行
        if ($phrase === 'insert') {
            $msg = '登録完了しました';
        }
        // select文実行
        // object(mysqli_result)を $rowに連想配列でコンパイル
        elseif ($phrase === 'select') {
            $result = mysqli_fetch_assoc(mysqli_query(
                $link,
                $sql
            ));
            $msg = 'データ取得しました';
            return $result;
        }
    } else
    // 失敗した際
    {
        if ($phrase === 'insert') {
            // mysqlに出す 要検索
            error_log('insert文実行エラー:');
            $msg = '登録失敗しました';
        } elseif ($phrase === 'select') {
            error_log('select文実行エラー:');
            $msg = 'データ取得出来ませんでした';
        }
    }
    return $msg;
}

// sqlインジェクション回避
function sql_escape($link, $obj)
{
    $result = mysqli_real_escape_string($link, $obj);
    return $result;
}
