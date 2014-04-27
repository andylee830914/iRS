<?php
    header('Content-Type: text/html; charset=utf-8');
    include("connect.php");
    ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARSenic Admin %s</title>
     <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <div class="page-header">
    <h1>觀眾回饋系統管理  <small>ARSenic Admin</small></h1>
    <ul class="nav nav-pills">
    <li><a href="/arsenic/arsenic_admin.html">Home</a></li>
    <li><a href="/cgi-bin/arsenic_refresh_admin.cgi">回應管理</a></li>
    <li class="active"><a href="/cgi-bin/arsenic_showans.cgi">回應瀏覽</a></li>
    </ul>
    </div>
    <h3>回應:</h3>
    <form action = '/cgi-bin/arsenic_showans.cgi' class="form-inline" role="form">
    <div class="form-group">
    </div>
    <button type = 'submit' class="btn btn-default">送出</button>
    </form>
    <table  class="table table-striped">
    <thead><tr><th>姓名</th><th>答案</th><tr></thead>
    <tbody>
        <?php
$sql="SELECT name,answer FROM answers";
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
        <br>
    </div>
  </body>
</html>