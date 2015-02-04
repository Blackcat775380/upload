<?php
session_start();
$url = "../sosu/";
if(isset($_SESSION["url"])){
	$url = "../".$_SESSION["url"];
}
if(isset($_GET['name'])){
	if(rename($url.$_GET['name'], $url.$_GET['rename'])){
		echo "ファイル名変更成功！！";
	} else {
		echo "ファイル名変更失敗！！";
	}
}
header('Location: ../upload.html');
?>
