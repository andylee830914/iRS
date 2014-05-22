<?php
    header('Content-Type: text/html; charset=utf-8');
    include("connect.php");
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
      <?php include_once("analyticstracking.php") ?>
            <div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '116906698359233',
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });


  FB.Event.subscribe('auth.authResponseChange', function(response) {
    if (response.status === 'connected') {
      testAPI();
    } else if (response.status === 'not_authorized') {
      FB.login();
    } else if (response.status === 'unknown'){
      FB.login();
    }
  });
  };

  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/zh_TW/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  function testAPI() {
    FB.api('/me', function(response) {
      $('#inputname').attr('value',response.name);
    });
  }
</script>
    <div class="container">
    <div class="page-header">
    <h1>即時回饋系統  <small>iRS</small></h1>
    <ul class="nav nav-pills">
    <li><a href="index.php">Home</a></li>
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
$a = $_POST['name'];
$b = $_POST['answer'];
$c = $_SERVER["REMOTE_ADDR"];
$date = date('Y-m-d H:i:s');
$str1 = "INSERT INTO answers(ip,time,form,name,answer) VALUES ('$c','$date','$form','$a','$b')";
mysql_query($str1);
}
    ?>
    </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
  </body>
</html>

