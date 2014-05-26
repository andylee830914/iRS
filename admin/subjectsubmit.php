<?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");
$fp = fopen("/var/www/html/irs/data/iRS-data.csv", "r");


while($ROW = fgetcsv($fp)){
    
    $b.= "('".$ROW[0]."','".$ROW[1]."','".$ROW[2]."','".$ROW[3]."','".$ROW[4]."','".$ROW[5]."','".$ROW[6]."')";
    $b.= ",";
}


$str1 = "INSERT INTO examdata(answer,data,choice1,choice2,choice3,choice4,choice5) VALUES".$b;
$str1=substr($str1,0,-1);
//echo $str1;
$str1=str_replace('\\','\\\\',$str1);
mysql_query($str1);
//echo $str1;
echo     "<thead><tr><th>答案</th><th>題目</th><th>選項一</th><th>選項二</th><th>選項三</th><th>選項四</th><th>選項五</th><tr></thead>";
//mysql_query($str2);
//$sql="SELECT answer FROM answers Where form='$result'";
//$result1=mysql_query($sql);
//$member=mysql_num_rows($result1);
fclose($fp);
unlink("/var/www/html/irs/data/iRS-data.csv");
?>
