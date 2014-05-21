 <?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");
$sql="SELECT form FROM status";
$result=mysql_query($sql);
$form=mysql_result($result,0);
echo "第 ".$form." 題回應：";
          ?>
