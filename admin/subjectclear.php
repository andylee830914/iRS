<?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");
$sql="TRUNCATE TABLE examdata";
$result=mysql_query($sql); 
?>
<thead><tr><th></th><th>ID</th><th></th><th>答案</th><th>題目</th><th>選項一</th><th>選項二</th><th>選項三</th><th>選項四</th><th>選項五</th><tr></thead>