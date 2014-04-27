<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<body>

    <div class="container">
<br><br><br>
<?php
setcookie("login","", time()-3600);
echo '<div class="panel panel-warning"><div class="panel-heading"><h3 class="panel-title">登出成功</h3>
  </div><div class="panel-body">歡迎再次進入iRS管理界面</div></div>';
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
?>
        </div>
    </body>