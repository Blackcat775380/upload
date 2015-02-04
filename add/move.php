<?php
session_start();

if(isset($_POST['burl']) && isset($_POST['aurl'])){
 if(rename($_POST['burl'],$_POST['aurl'])){
  echo '移動成功<br>';
 }else{
  echo '移動失敗<br>';
  echo $_POST['burl'].'<br>'.$_POST['aurl'].'<br>';
 }
  echo '<a href="../upload.html">アップローダーへ</a>';
}else if(isset($_GET['filename'])){
$url = "../sosu/";
if(isset($_SESSION["url"])){
 $url ="../".$_SESSION["url"];
}
 echo '<form method="post" action="">';
 echo "移動元：";
 echo '<input type="text" name="burl" readonly value="'.$url.$_GET['filename'].'">'."<br><br>";
 echo "移動先：";
 echo '<select name="aurl">';
 echo '<option value="../sosu/'.$_GET['filename'].'">../sosu</option>';
 dsearch('../sosu',$_GET['filename']);
 echo '</select>';
 echo '<p><input type="submit" value="送信する"></p>';
 echo '</form>';
}else{
 echo 'Link踏んできてね。';
 echo '<a href="../upload.html">アップローダーへ</a>';
}
function dsearch($dir,$filename)
{
    $sepa = DIRECTORY_SEPARATOR;
    if (!is_dir($dir)) return false;
    $dirs[] = $dir;

    while (($dir=array_shift($dirs)) !== null) {	// 配列にあるだけループ

        if (!$dp= opendir($dir)) {
            die("開けません");
        }
        while (($file=readdir($dp)) !== false) {	// falseが返らない間ループ
            if ($file === '.' || $file === '..') continue;	// スキップ
            if (is_dir("$dir$sepa$file")) {	// ディレクトリなら配列に追加
                $dirs[]= "$dir$sepa$file";
                echo "<option value=\"$dir$sepa$file/$filename\">$dir$sepa$file</option>";
            } else {
                //echo "$dir$sepa$file<br />\n";
            }
        }
        closedir($dp);
    }
}
?>
