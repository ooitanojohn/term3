<?php

// DB接続
// config_fileに各定数HOST_NAME,ROOT,PASS,DB_NAME,CHARACTER_CODEを記述
function sql_connect($config_file)
{
    require_once($config_file);
    $link = @mysqli_connect(
        HOST,
        ROOT,
        PASS,
        DB_NAME
    );
    // DB接続失敗
    if (!$link) {
        // エラー 処理 開発側
        error_log('[' . date('y-m-d:g-i-s') . ']' . 'sql_connect_err' . "\r\n", 3, 'log/error.log');
        // user側
        $err_code = '101';
        require_once 'tpl/error.php';
        exit;
    }
    // 文字コード設定
    mysqli_set_charset($link, CHARACTER_CODE);
    return $link;
}

// sqlインジェクション回避
function sql_escape($link, $obj)
{
    $result = mysqli_real_escape_string($link, $obj);
    return $result;
}

// sql文の実行
// $phrase = insert,select句
// 返り値 $result = sql文実行結果
function sql_query($link, $sql, $phrase)
{
    // SQL文 振り分け
    // insert文実行
    if ($phrase === 'insert') {
        $result = mysqli_query($link, $sql);
        if (!$result) {
            // 失敗時追加処理はここから
            error_log('[' . date('y-m-d:g-i-s') . ']' . 'sql_insert_err' . "\r\n", 3, 'log/error.log');
            $err_code = '102';
            require_once 'tpl/error.php';
            exit;
        }
        // 成功時追加処理はここから
    }
    // select文実行
    elseif ($phrase === 'select') {
        $result = mysqli_query($link, $sql);
        if (!$result) {
            // 失敗時追加処理はここから
            error_log('[' . date('y-m-d:g-i-s') . ']' . 'sql_select_err' . "\r\n", 3, 'log/error.log');
            $err_code = '103';
            require_once 'tpl/error.php';
            exit;
        }
        $result = mysqli_fetch_all(mysqli_query(
            $link,
            $sql
        ));
        // 成功時追加処理はここから
        return $result;
    }
}

// move_uploaded_file
// function mv_up_file($file_tmp_name, $file_data)
// {
//     if (move_uploaded_file($_FILES['upload']['tmp_name'], trim("../img/" . $id['LAST_INSERT_ID()'] . "$ext"))) {
//         return true;
//     } else {
//         error_log('[' . date('y-m-d:g-i-s') . ']' . 'move_uploaded_file_err' . "\r\n", 3, 'log/error.log');
//         $err_code = '104';
//         return false;
//     }
// }
