<?php //header('refresh: 1;url="analytics.php"') ?>
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

    <title>iRS Demo</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#header').load('name.php').fadeIn("slow");
$('#myfirstchart').load('reana.php').fadeIn("slow");
    
}, 10000); // refresh every 10000 milliseconds


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
            <li><a href="dash.php">Status</a></li>
            <li><a href="analytics.php">Analytics</a></li>
            <li><a href="../index.php">Front-End</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="dash.php">Status</a></li>
            <li class="active"><a href="analytics.php">Analytics</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header" id="header"><?php echo "第 ".$form." 題回應：";?></h1>
              <div id="myfirstchart"></div>
            <?php
//$form=$_GET['name'];
$sql="SELECT answer FROM answers WHERE form='$form' AND answer='A'";
$result=mysql_query($sql);
$a=mysql_num_rows($result);

$sql="SELECT answer FROM answers WHERE form='$form' AND answer='B'";
$result=mysql_query($sql);
$b=mysql_num_rows($result);

$sql="SELECT answer FROM answers WHERE form='$form' AND answer='C'";
$result=mysql_query($sql);
$c=mysql_num_rows($result);

$sql="SELECT answer FROM answers WHERE form='$form' AND answer='D'";
$result=mysql_query($sql);
$d=mysql_num_rows($result);

$sql="SELECT answer FROM answers WHERE form='$form' AND answer='E'";
$result=mysql_query($sql);
$e=mysql_num_rows($result);

?>
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
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script>
    new Morris.Bar({
                element: 'myfirstchart',
              data: [
                  { ans: 'A', value: <?php echo $a; ?> },
                  { ans: 'B', value: <?php echo $b; ?> },
                  { ans: 'C', value: <?php echo $c; ?> },
                  { ans: 'D', value: <?php echo $d; ?> },
                  { ans: 'E', value: <?php echo $e; ?> }
  ],
  xkey: 'ans',
  ykeys: ['value'],
  labels: ['Value']
});
      </script>
  </body>
</html>
