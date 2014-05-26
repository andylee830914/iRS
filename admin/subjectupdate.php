 <?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");

$filename=pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION);
if ($_FILES["pic"]["size"]>0){
    $pic=$_POST[form].".".$filename;
    move_uploaded_file($_FILES["pic"]["tmp_name"],"/var/www/html/irs/data/".$pic);
}else{
    if($_POST[form]!=$_POST[formori]){
        if(empty($_POST[picname])){
            $pic=$_POST[picname];
        }else{
            $new=pathinfo($_POST[picname], PATHINFO_EXTENSION);
            rename("/var/www/html/irs/data/".$_POST[picname], "/var/www/html/irs/data/".$_POST[form].".".$new);
            $pic=$_POST[form].".".$new;
        }}else{
            $pic=$_POST[picname];
        }
}
$str1 = "UPDATE examdata SET form='$_POST[form]',answer='$_POST[answer]',data='$_POST[data]',choice1='$_POST[choice1]',choice2='$_POST[choice2]',choice3='$_POST[choice3]',choice4='$_POST[choice4]',choice5='$_POST[choice5]',pic='$pic' WHERE form='$_POST[formori]'";
$str1=str_replace('\\','\\\\',$str1);
//echo $str1;
mysql_query($str1);


?>
<script>document.location.href="subjectview.php";</script>