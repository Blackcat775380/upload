<?php

// zipファイル名
$fileName = "zipFile";
// 圧縮対象フォルダ
//$compressDir = "/var/www/html/attendance/sosu/";
$compressDir = "/var/www/html/attendance/add/";
// zipファイル保存先
$zipFileSavePath = "/var/www/html/attendance/";

// コマンド
// cd：ディレクトリの移動
// zip:zipファイルの作成
$command =  "cd ". $compressDir .";".
	    "zip -r ". $zipFileSavePath . $fileName .".zip .";

// Linuxコマンドの実行
exec($command);

// 圧縮したファイルをダウンロードさせる。
header('Pragma: public');
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$fileName.".zip");
readfile("/var/www/html/attendance/".$fileName.".zip");

?>
