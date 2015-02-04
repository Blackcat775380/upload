<?php
session_start();
//$url = "../sosu/";
//if(isset($_SESSION['url'])){
//	$url = "../".$_SESSION['url']."/";
//}
if(isset($_POST['message'])){
// ファイルをオープンして既存のコンテンツを取得します
$current = file_get_contents($file);
// 結果をファイルに書き出します
file_put_contents($_POST['url'], $_POST['message']);
header('Location: neweditor.php?filename='.$_POST['name']);
}else{
header('Location: neweditor.php');
}
?>
