<?php
    header('Content-Type: text/html; charset=utf-8');
    include("connect.php");
$sql="DELETE FROM answers";
$result=mysql_query($sql); 
$result=1;
$str2 = "UPDATE status SET member=0,form=1";
mysql_query($str2);
echo "Now Form : ";
echo $result;
echo "<br>";
echo "Now Answers : ";
echo "0";
?>
