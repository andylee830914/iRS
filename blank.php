<?php
    header('Content-Type: text/html; charset=utf-8');
    include("connect.php");
$sql="SELECT member FROM status";
$result=mysql_query($sql);
$id=mysql_result($result,0);
$sql="SELECT form FROM status";
$result=mysql_query($sql);
$form=mysql_result($result,0);
    ?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iRS</title>
     <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <div class="page-header">
    <h1>即時回饋系統  <small>iRS</small></h1>
    <ul class="nav nav-pills">
    <li><a href="index.html">Home</a></li>
    <li><a href="choice.php">選擇題</a></li>
    <li class="active"><a href="blank.php">填充題</a></li>
    </ul>
    </div>
    
    <form action ="" method="post" class="form-horizontal" role="form">
    <div class="form-group">
    <label for="inputname" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="inputname" name = "name">
    </div>
    </div>
    <div class="form-group">
            <label for="inputanswer" class="col-sm-2 control-label">答案</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputanswer" name = "answer">
            </div>
        </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">送出</button>
        </div>
    </div>
    </form>
       <?php
if ($_POST['answer']){
$id=$id+1;
$a = $_POST['name'];
$b = $_POST['answer'];
$c = $_SERVER["REMOTE_ADDR"];
$date = date('Y-m-d H:i:s');
$str1 = "INSERT INTO answers(ip,time,id,form,name,answer) VALUES ('$c','$date','$id','$form','$a','$b')";
mysql_query($str1);
$str2 = "UPDATE status SET member = ('$id') ";
mysql_query($str2);
}
    ?>
    </div>
  </body>
</html>

