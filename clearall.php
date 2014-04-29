<?php
    header('Content-Type: text/html; charset=utf-8');
    include("connect.php");
$sql="DELETE FROM answers";
$result=mysql_query($sql); 
$result=1;
$str2 = "UPDATE status SET member=0,form=1";
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
