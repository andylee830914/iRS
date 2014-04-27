<?php
    header('Content-Type: text/html; charset=utf-8');
    include("connect.php");
   $sql="SELECT form FROM status";
$result=mysql_query($sql); 
$result=mysql_result($result,0);
$result=$result+1;
$str2 = "UPDATE status SET form = ('$result') ";
mysql_query($str2);
$sql="SELECT answer FROM answers Where form='$result'";
$result1=mysql_query($sql);
$member=mysql_num_rows($result1);
echo "Now Form : ";
echo $result;
echo "<br>";
echo "Now Answers : ";
echo $member;
?>
