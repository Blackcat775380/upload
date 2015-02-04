<?php
if(isset($_POST['message'])){
// ファイルをオープンして既存のコンテンツを取得します
$current = file_get_contents($file);
// 結果をファイルに書き出します
file_put_contents($_POST['name'], $_POST['message']);
}
header('Location: SystemEditor.php');
?>
