<?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");
$sql="SELECT form FROM status";
$result=mysql_query($sql);
$form=mysql_result($result,0);
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
            <li class="active"><a href="dash.php">Status</a></li>
            <li><a href="analytics.php">Analytics</a></li>
            <li><a href="export.php">Export</a></li>
          </ul>
                      <ul class="nav nav-sidebar">
            <li><a href="subjectview.php">Subject Manage</a></li>
            <li><a href="subjectupload.php">Subject Upload</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="control.php">Control Panel</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">
              <?php
             if(isset($_GET['name'])){
             echo "第 ".$_GET['name']." 題回應：";
             }
              else{
                  echo "回應：";
              }
              ?></h1>
     <select name="answers" class="form-control" onChange="location = this.options[this.selectedIndex].value;">
         <option value="#">請選擇</option>
         <?php
$sql1="SELECT MAX(form) FROM answers";
$result=mysql_query($sql1);
$form1=mysql_result($result,0);
for($i=1;$i<=$form1;$i++){
    echo "<option name='$i'";
    if($_GET['name']==$i){
        echo 'selected="selected"';
    }
    echo "value='dash.php?name=".$i."'>第 " . $i . " 題</option>";
}
          ?>
    </select>
    <table  class="table table-striped">
    <thead><tr><th>姓名</th><th>答案</th><tr></thead>
    <tbody>
        <?php
$form=$_GET['name'];
$sql="SELECT name,answer FROM answers WHERE form='$form'";
$result=mysql_query($sql);
    for($j=0;$j<mysql_num_rows($result);$j++)
{
 echo "<TR>";
 for ($k=0;$k<mysql_num_fields($result);$k++)
 {
   echo "<TD>".mysql_result($result,$j,$k)."</TD>";
 }
 echo "</TR>";
}
echo "</TABLE>";
?>
    </tbody>
    </table>
            
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
