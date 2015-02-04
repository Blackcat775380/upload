<?php
$src = "";
if(isset($_GET['src'])){
 if(rename($_GET['src'],"/var/www/html/attendance/add/work/test1.mp4")){
  echo '移動成功<br>';
 }else{
  echo '移動失敗<br>';
 }
}
header('Location: ./player.php');
?>
