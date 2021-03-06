<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iRS</title>
     <link href="dist/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
window.MathJax = {
 jax: ["input/TeX","output/HTML-CSS"],
 extensions: ["tex2jax.js"],
 tex2jax: {
  inlineMath: [['$$','$$'],['\\(','\\)']]
 },
};
</script>
<!--<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js"></script>-->
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
    } else if (response.status === 'not_authorized') {
      FB.login();
    } else {
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

</script>
  <div class="container">
<div class="page-header">
    <h1>即時回饋系統  <small>iRS</small></h1>
    <ul class="nav nav-pills">
    <li class="active"><a href="index.php">Home</a></li>
    <li><a href="choice.php">選擇題</a></li>
    <li><a href="blank.php">填充題</a></li>
    </ul>
    </div>
     <div class="jumbotron">
		  <h1>歡迎使用 iRS</h1>
          <p>這是一個簡易的即時回饋系統，你可以登入 facebook 以在作答時自動填入姓名</p>
         <p>By Yu Hsun Lee</p>
         <a><fb:login-button max_rows="1" size="xlarge" show_faces="false" auto_logout_link="true"></fb:login-button></a>
        
         </div>
      <fb:facepile app_id="116906698359233" max_rows="1" colorscheme="light" size="medium" show_count="true"></fb:facepile> 
           <div class="footer">
        <p class="text-right"><a href="admin/dash.php">iRS Dashboard</a></p>
      </div>

   

</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>   
</body>
</html>
