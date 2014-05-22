<?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("connect.php");
$sql="SELECT form FROM status";
$result=mysql_query($sql);
$form=mysql_result($result,0);
$sql="SELECT answer FROM answers Where form='$form'";
$result=mysql_query($sql);
$member=mysql_num_rows($result);
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>iRS Admin</title>
        <script>
         var Submit1=function(){
            var URLs="receive.php";
          
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
        <script>
         var Submit1b=function(){
            var URLs="back.php";
          
            $.ajax({
                url: URLs,
                type:"POST",
                dataType:'text',

                success: function(msg){
                    document.getElementById("txtHint").innerHTML=msg;
                    $("#back-block-success").show().delay(2000).addClass("in").fadeOut(500);
                },

                 error:function(xhr, ajaxOptions, thrownError){
                    $("#back-block-error").show().delay(2000).addClass("in").fadeOut(500);

                 }
            });
           
        }
        </script>
      <script>
         var Submit2=function(){
            var URLs="clearnow.php";
          
            $.ajax({
                url: URLs,
                type:"POST",
                dataType:'text',

                success: function(msg){
                    document.getElementById("txtHint").innerHTML=msg;
                    $("#warning-block").show().delay(2000).addClass("in").fadeOut(300);
                },

                 error:function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                 }
            });
           
        }
        </script>
      <script>
         var Submit3=function(){
            var URLs="clearall.php";
          
            $.ajax({
                url: URLs,
                type:"POST",
                dataType:'text',

                success: function(msg){
                    document.getElementById("txtHint").innerHTML=msg;
                    $("#warning-block").show().delay(2000).addClass("in").fadeOut(300);
                },

                 error:function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                 }
            });
           
        }
        </script>

    <!-- Bootstrap core CSS -->
    <link href="/irs/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <li><a href="index.php">Front-End</a></li>
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
            <li class="active"><a href="">Control Panel</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Control Panel</h1>
            
            <div class="alert alert-success alert-dismissable" style="display:none" id="warning-block">
  清除成功！
</div>
                        <div class="alert alert-success alert-dismissable" style="display:none" id="success-block">
  新增成功！
</div>
<div class="alert alert-danger alert-dismissable" style="display:none" id="back-block-error">
  返回失敗！
</div>
<div class="alert alert-success alert-dismissable" style="display:none" id="back-block-success">
  返回成功！
</div>


<div class="row"  id="txtHint">
<?php
echo '<div class="col-md-4"><div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Now Form : </h3>
  </div>
  <div class="panel-body">'.
    $form.
  '</div>
</div></div>';
echo '<div class="col-md-4"><div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Now Answers : </h3>
  </div>
  <div class="panel-body">'.
    $member.
  '</div>
</div></div>';
    ?>
</div>
      
    <button type = "button" class="btn btn-success" onClick="Submit1()">新增下一題</button>

    <button type = "button" class="btn btn-success" onClick="Submit1b()">回上一題</button>
    <br><br>
    <button type = 'submit' class="btn btn-danger" onClick="Submit2()">清除本題回應記錄</button>
    <br><br>
    <button type = 'submit' class="btn btn-danger" onClick="Submit3()">清除所有回應記錄</button>
    
         </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
  </body>
</html>
