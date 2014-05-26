<?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");
$sql="TRUNCATE TABLE answers";
$result=mysql_query($sql); 
$result=0;
$str2 = "UPDATE status SET form=1";
mysql_query($str2);
echo '<div class="col-md-4"><div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Now Form : </h3>
  </div>
  <div class="panel-body">'.
    $result.
  '</div>
</div></div>';
echo '<div class="col-md-4"><div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Now Answers : </h3>
  </div>
  <div class="panel-body">
  0</div>
</div></div>';
?>
