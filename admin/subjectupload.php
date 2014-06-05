<?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">

    <title>iRS Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
             var Submit1=function(){
                var URLs="subjectsubmit.php";

                $.ajax({
                    url: URLs,
                    type:"POST",
                    dataType:'text',

                    success: function(msg){
                        document.getElementById("txtHint").innerHTML=msg;
                        $("#success-block").show().delay(2000).addClass("in").fadeOut(500);
                    },

                     error:function(xhr, ajaxOptions, thrownError){
                        alert(xhr.status);
                        alert(thrownError);
                     }
                });

            }
            </script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dash.php">即時回饋系統 iRS</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dash.php">Dashboard</a></li>
            <li><a href="../index.php">Front-End</a></li>
            <li><a href="logout.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="dash.php">Status</a></li>
            <li><a href="analytics.php">Analytics</a></li>
            <li><a href="export.php">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="subjectview.php">Subject Manage</a></li>
            <li  class="active"><a href="subjectupload.php">Subject Upload</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="control.php">Control Panel</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">題目上傳</h1>
            <div class="alert alert-success alert-dismissable" style="display:none" id="success-block">
  新增成功！
</div>
            <form action="" method="post" enctype="multipart/form-data" class="form-inline" role="form">
<div class="form-group"><input type="file" name="file" id="file"></div>
<div class="form-group"><input type="submit" name="submit" value="上傳" class="btn btn-default"></div>
</form>
<?php
//$date = date('Y-m-d-H-i-s');
$filename = "iRS-data.csv";
if($_FILES["file"]){
    if($_FILES["file"]["type"]=="text/csv"){
move_uploaded_file($_FILES["file"]["tmp_name"],"../data/iRS-data.csv");
}else
{
    $error="請上傳 csv 檔";
    echo "<script type='text/javascript'>alert('$error');</script>";
}}
?>
            <h2>題目預覽</h2>
    <table  class="table table-striped" id="txtHint">
    <thead><tr><th>答案</th><th>題目</th><th>選項一</th><th>選項二</th><th>選項三</th><th>選項四</th><th>選項五</th><tr></thead>
    <tbody>
        <?php
     $fp = fopen("../data/iRS-data.csv", "r");
     
     while($ROW = fgetcsv($fp)){
        echo "<TR>";
        for($i=0;$i<7;$i++){
        echo "<TD>".$ROW[$i]."</TD>";
        }
        echo "</TR>";
     }
     fclose($fp);?>
    </tbody>
    </table>
            <button type = "button" class="btn btn-success" onClick="Submit1()">送出</button>
            
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/docs.min.js"></script>
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
  </body>
</html>
