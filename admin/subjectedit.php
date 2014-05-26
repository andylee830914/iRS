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
            <li  class="active"><a href="subjectview.php">Subject Manage</a></li>
            <li><a href="subjectupload.php">Subject Upload</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="control.php">Control Panel</a></li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">題目編輯</h1>
            <div class="alert alert-success alert-dismissable" style="display:none" id="success-block">
  刪除成功！
</div>
                        <div class="alert alert-success alert-dismissable" style="display:none" id="choose-block">
  選取成功！
</div>

<form class="form-horizontal" role="form" id=choose enctype="multipart/form-data" action="subjectupdate.php" method="POST">            
        <?php
$formid=$_GET['edit'];
//echo $formid;
$sql="SELECT * FROM examdata where form='$formid'";
$result=mysql_query($sql);

 //echo '<tr class="success">';
$rows=mysql_fetch_array($result);
?>
    <div class="form-group">
        <label for="form" class="col-sm-2 control-label">ID</label>
        <div class="col-xs-3">
    <input value="<?php echo $rows[1] ?>" name="form" class="form-control">
            <input type="Hidden" name="formori" value="<?php echo $rows[1] ?>" id="formri">
        </div>
    </div>
    <div class="form-group">
        <label for="answer" class="col-sm-2 control-label">答案</label>
        <div class="col-xs-3">
    <input value="<?php echo $rows[2] ?>" name="answer" class="form-control">
                    </div>
    </div>
    <div class="form-group">
        <label for="data" class="col-sm-2 control-label">題目</label>
        <div class="col-sm-10">
    <input value="<?php echo $rows[3] ?>" name="data" class="form-control">
                    </div>
    </div>
    <div class="form-group">
        <label for="choice1" class="col-sm-2 control-label">選項一</label>
        <div class="col-xs-4">
    <input value="<?php echo $rows[4] ?>" name="choice1" class="form-control">
                    </div>
    </div>
    <div class="form-group">
        <label for="choice2" class="col-sm-2 control-label">選項二</label>
        <div class="col-xs-4">
    <input value="<?php echo $rows[5] ?>" name="choice2" class="form-control">
                    </div>
    </div>
    <div class="form-group">
        <label for="choice3" class="col-sm-2 control-label">選項三</label>
        <div class="col-xs-4">
    <input value="<?php echo $rows[6] ?>" name="choice3" class="form-control">
                    </div>
    </div>
    <div class="form-group">
        <label for="choice4" class="col-sm-2 control-label">選項四</label>
        <div class="col-xs-4">
    <input value="<?php echo $rows[7] ?>" name="choice4" class="form-control">
                    </div>
    </div>
    <div class="form-group">
        <label for="choice5" class="col-sm-2 control-label">選項五</label>
        <div class="col-xs-4">
    <input value="<?php echo $rows[8] ?>" name="choice5" class="form-control">
                    </div>
    </div>
    <div class="form-group">
        <label for="choice5" class="col-sm-2 control-label">圖片</label>
        <div class="col-xs-4">
    <input value="<?php echo $rows[9] ?>" name="picname" class="form-control">
                    </div>
    </div>
    <div class="form-group">
    <label for="pic"  class="col-sm-2 control-label">圖片上傳</label>
    <div class="col-sm-offset-2 col-sm-10"><input type="file" name="pic" id="pic"></div>
  </div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
    <input type = "submit" class="btn btn-primary" value="更新"></div></div>
</form>
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
