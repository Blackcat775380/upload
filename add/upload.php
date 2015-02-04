<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>
<p>
<?php
session_start();
$url="../sosu/";
if(isset($_SESSION["url"])){
	$url = "../".$_SESSION["url"];
}
$uploadfile = $url.basename($_FILES['userfile']['name']);
if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $url. $_FILES["upfile"]["name"])) {
    chmod($url . $_FILES["upfile"]["name"], 0777);
    echo $_FILES["upfile"]["name"] . "をアップロードしました。";
    echo '<br><a href="../upload.html">戻る</a>';
  } else {
    echo "ファイルをアップロードできません。";
    echo '<br><a href="../upload.html">戻る</a>';
  }
} else if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
 echo "アップロードに成功しました";
 echo '<br><a href="upload.html">更新</a>';
} else {
  echo "ファイルが選択されていません。";
  echo '<br><a href="../upload.html">戻る</a>';
}
?></p>
</body>
</html>
