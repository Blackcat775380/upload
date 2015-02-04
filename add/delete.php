<?php
session_start();
$url = "../sosu/";
if(isset($_SESSION["url"])){
	$url = "../".$_SESSION["url"];
}
if(isset($_GET['name']))
{
	$name = $url.$_GET['name'];
	if(file_exists($name))
	{
		if(unlink($name))
		{
			echo $name."削除されました。";
		}
		else
		{
			echo $name."削除できませんでした。";
		}
	}
	else
	{
		echo "ファイル見つからない。";
	}
}
else
{
	echo "失敗";
}
?>
<br>
<a href="../upload.html">アップローダーへ</a>
