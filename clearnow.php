<?php
    header('Content-Type: text/html; charset=utf-8');
    include("connect.php");
$sql="SELECT form FROM status";
$result=mysql_query($sql);
$form=mysql_result($result,0);
$sql="SELECT answer FROM answers Where form='$form'";
$result=mysql_query($sql);
$member=mysql_num_rows($result);
$sql="DELETE FROM answers WHERE form='$form'";
$result=mysql_query($sql); 
echo "Now Form : ";
echo $form;
echo "<br>";
echo "Now Answers : ";
echo "0";
?>
