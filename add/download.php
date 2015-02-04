<?php
session_start();

$url = "../sosu/";
if(isset($_SESSION["url"])){
	$url = "../".$_SESSION["url"];
}
$fpath = '../upload.html';
//$fpath = 'editor.php';
if(isset($_GET['name'])){
	$fpath = $url.$_GET['name'];
	header('Content-Type: application/octet-stream');
	header('Content-Length: ' . filesize($fpath));
	header('Content-Disposition: attachment; filename=' . basename($fpath));
	readfile($fpath);
}else if(isset($_GET['dll'])){
//	copy($_GET['dll'],"work/".$_GET['name']);
	$path = $_GET['dll'];

	mb_http_output("pass");
	header("Cache-Control: public");
	header("Pragma: public");
	header("Content-Type:application/octet-stream");
	header("Content-Disposition: attachment; filename=". basename($path));
	header("Content-Length: ".filesize($path));
	$handle = fopen($path, "rb");

	while(!feof($handle)){
	print fread($handle, 4096);
	ob_flush();
	flush();
	}
	fclose();
}else{
	header('Content-Type: application/octet-stream');
	header('Content-Length: ' . filesize($fpath));
	header('Content-Disposition: attachment; filename=' . basename($fpath));

	readfile($fpath);
}
?>