<?php
session_start();
// エラー出力する場合
ini_set( 'display_errors', 1 );
$url="../sosu/";
if(isset($_SESSION["url"])){
$url="../".$_SESSION["url"];
}
if(isset($_GET['name'])){
$file = $url.'comment';
// 新しい人物をファイルに追加します
$person = $_GET['name'].",".$_GET['comment'].",\n";
// 中身をファイルに書き出します。
// FILE_APPEND フラグはファイルの最後に追記することを表し、
// LOCK_EX フラグは他の人が同時にファイルに書き込めないことを表します。
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
}
header("Location: ../upload.html#".$file);
?>
