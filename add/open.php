<?php
session_start();
if(isset($_GET["url"])){
	$_SESSION["url"] = $_GET["url"];
}
header("Location: ../upload.html");
?>
