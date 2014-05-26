<?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");
   $sql="SELECT form FROM status";
$result=mysql_query($sql); 
$result=mysql_result($result,0);
$result=$result+1;
$str2 = "UPDATE status SET form = ('$result') ";
mysql_query($str2);
$sql="SELECT answer FROM answers Where form='$result'";
$result1=mysql_query($sql);
$member=mysql_num_rows($result1);
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
  <div class="panel-body">'.
    $member.
  '</div>
</div></div>';
?>
