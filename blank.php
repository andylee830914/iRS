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
           <script type="text/javascript">
  (function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://plus.google.com/js/client:plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();
  </script>
      <script src="https://apis.google.com/js/plusone.js"></script>
     <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
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
                 <div id="gConnect">
    <button class="g-signin"
        data-scope="https://www.googleapis.com/auth/plus.login"
        data-requestvisibleactions="http://schemas.google.com/AddActivity"
        data-clientId="728378736055.apps.googleusercontent.com"
        data-callback="onSignInCallback"
        data-theme="dark"
        data-cookiepolicy="single_host_origin">
    </button>
  </div>
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
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
  </body>
<script type="text/javascript">
var helper = (function() {
  var BASE_API_PATH = 'plus/v1/';

  return {
    /**
     * Hides the sign in button and starts the post-authorization operations.
     *
     * @param {Object} authResult An Object which contains the access token and
     *   other authentication information.
     */
    onSignInCallback: function(authResult) {
      gapi.client.load('plus','v1', function(){
        if (authResult['access_token']) {
          helper.profile();
            $('#gConnect').hide()
        } else if (authResult['error']) {
          // There was an error, which means the user is not signed in.
          // As an example, you can handle by writing to the console:
          console.log('There was an error: ' + authResult['error']);
          $('#authResult').append('Logged out');
          $('#authOps').hide('slow');
          $('#gConnect').show();
        }
        console.log('authResult', authResult);
      });
    },

    profile: function(){
      var request = gapi.client.plus.people.get( {'userId' : 'me'} );
      request.execute( function(profile) {
          $('#inputname').attr('value',profile.displayName);
      });
    }
  };
})();

$(document).ready(function() {
  $('#disconnect').click(helper.disconnect);
  $('#loaderror').hide();
});

function onSignInCallback(authResult) {
  helper.onSignInCallback(authResult);
}
</script>
</html>

