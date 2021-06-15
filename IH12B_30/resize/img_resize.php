<?php


list($width, $hight) = getimagesize('test.png'); // 元の画像名を指定してサイズを取得
$baseImage = imagecreatefromjpeg('test.png'); // 元の画像から新しい画像を作る準備
$image = imagecreatetruecolor(200, 200); // サイズを指定して新しい画像のキャンバスを作成

// 画像のコピーと伸縮
imagecopyresampled($image, $baseImage, 0, 0, 0, 0, 200, 200, $width, $hight);

// コピーした画像を出力する
imagejpeg($image, 'img/new.png');
