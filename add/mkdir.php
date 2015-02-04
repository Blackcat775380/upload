<?php
session_start();

$url = "../sosu/";
if(isset($_SESSION["url"])){
	$url = "../".$_SESSION["url"];
}
if(isset($_GET['name'])){
	$name = $url.$_GET['name'];
	$name = preg_replace('/(\s|　)/','',$name);
	if (strlen($name) > 0 and mkdir( $name, 0777 ) ) {
		echo "ディレクトリ作成成功！！";
	} else {
		echo "ディレクトリ作成失敗！！";
	}
}
?>
<br>
<a href="../upload.html">アップローダーへ</a>