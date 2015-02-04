<?php
$filename='';
if(isset($_GET['filename'])){
	$filename = $_GET['filename'];
}
?>
<html>
<head>
<title>編集</title>
<script language="javascript">
<!--
function navi(obj) {
 url = obj.options[obj.selectedIndex].value;
 if(url != "") {
   location.href = '?filename='+url;
  }
}
//-->
</script>
</head>
<body>
<form>
<SELECT name="filename" onChange="navi(this)">
<?php
if ($dir = opendir("../add")) {
    while (($file = readdir($dir)) !== false) {
        if ($file != "." && $file != "..") {
                echo '<OPTION value="'.$file.'">'.$file."</OPTION>";
        }
    }
    closedir($dir);
}
?>
</SELECT>
</form>
<hr>
<form method="POST" action="SystemSave.php">
ファイル名<br>
<input type="text" name="name" size="30" maxlength="20" value="<?php echo $filename ?>"><br>
内容<br>
<TEXTAREA name="message" cols="80" rows="40" wrap="off">
<?php
$fp = fopen($filename, 'r');

$count = 0;

if ($fp){
    if (flock($fp, LOCK_SH)){
        while (!feof($fp)) {
            $buffer = fgets($fp);
            print($buffer);
            $count++;
        }

        flock($fp, LOCK_UN);
    }else{
        print('ファイルロックに失敗しました');
    }
}

$flag = fclose($fp);
?>
</TEXTAREA>
<hr>
<input type="submit" value="送信">
<?php echo $count."行"; ?>
</form>
</body>
</html>
