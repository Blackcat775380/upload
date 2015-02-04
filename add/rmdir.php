<?php
session_start();
$url = "../sosu/";
if(isset($_SESSION["url"])){
	$url = "../".$_SESSION["url"];
}
if(isset($_GET['name'])){
	//コメントシステムのため追加
	$name = $url.$_GET['name']."comment";
	if(file_exists($name)){
		if(unlink($name)){
			echo $name."削除されました。<br>";
		}else{
			echo $name."削除できませんでした。<br>";
		}
	}else{
		echo "コメントファイル見つからない。";
	}
	$name = $url.$_GET['name'];
	if ( rmdir( $name ) ) {
		echo "dir delete true";
	} else {
		echo "dir delete false";
	}
}else{
  if(unlink("../zipFile.zip")){
echo "zip削除されました。<br>";
  }else{
echo "zip削除できませんでした。<br>";
  }
}
?>
