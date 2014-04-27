<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<body>

    <div class="container">
<br><br><br>
<?php
include("connect.php");
$id = $_POST['id'];
$pw = md5($_POST['pw']);

$sql = "SELECT * FROM admin where username = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)
{
        setcookie("login",'USER', time()+3600);
        echo '<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">登入成功</h3>
  </div>
  <div class="panel-body">
    歡迎進入iRS管理界面
  </div>
</div>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=dash.php>';
}
else
{
        echo '<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">登入失敗</h3>
  </div>
  <div class="panel-body">
    將重新導向iRS首頁
  </div>
</div>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
}
?>
</body>