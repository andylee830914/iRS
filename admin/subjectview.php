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
    <script>
             var Submit1=function(){
                var URLs="subjectdelete.php";

                $.ajax({
                    url: URLs,
                    data:$('#choose').serialize(),
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
             var Submit2=function(){
                var URLs="subjectchoose.php";

                $.ajax({
                    url: URLs,
                    data:$('#choose').serialize(),
                    type:"POST",
                    dataType:'text',

                    success: function(msg){
                        document.getElementById("txtHint").innerHTML=msg;
                        $("#choose-block").show().delay(2000).addClass("in").fadeOut(500);
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
            var URLs="subjectclear.php";
          
            $.ajax({
                url: URLs,
                type:"POST",
                dataType:'text',

                success: function(msg){
                    document.getElementById("txtHint").innerHTML=msg;
                    $("#success-block").show().delay(2000).addClass("in").fadeOut(300);
                },

                 error:function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                 }
            });
           
        }
        </script>
      <script>
         var Submit4=function(){
            var URLs="subjectadd.php";
          
            $.ajax({
                url: URLs,
                type:"POST",
                dataType:'text',

                success: function(msg){
                    document.getElementById("txtHint").innerHTML=msg;
                    $("#success-add").show().delay(2000).addClass("in").fadeOut(300);
                },

                 error:function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                 }
            });
           
        }
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
          <h1 class="page-header">題目管理</h1>
            <div class="alert alert-success alert-dismissable" style="display:none" id="success-block">
  刪除成功！
</div>
                        <div class="alert alert-success alert-dismissable" style="display:none" id="choose-block">
  選取成功！
</div>
            <div class="alert alert-success alert-dismissable" style="display:none" id="success-add">
  新增成功！
</div>
            <a target="_new" href="reveal/index.php" class="btn btn-primary" role="button">題目簡報</a>

            
<form id=choose>
            <table  class="table" id="txtHint">
    <thead><tr><th></th><th>ID</th><th></th><th>答案</th><th>題目</th><th>選項一</th><th>選項二</th><th>選項三</th><th>選項四</th><th>選項五</th><tr></thead>
    <tbody>
        <?php
$sql="SELECT * FROM examdata";
$result=mysql_query($sql);

 //echo '<tr class="success">';
while($rows=mysql_fetch_array($result)){
    $id=$rows[1];
    
    if(!$rows[0]==0){
    echo '<tr class="success">';
    }
     else{
    echo ' <tr>';
        }
    ?>
    <td><input name="selector[]" type="checkbox" value="<?php echo $id; ?>">
    <td><?php echo $rows[1] ?></td><td>
    <a href="subjectedit.php?edit=<?php echo $id; ?>" name="edit" class="btn btn-default btn-sm" id="edit">編輯</a>
    </td>
    <td><?php echo $rows[2] ?></td>
    <td><?php echo $rows[3] ?></td>
    <td><?php echo $rows[4] ?></td>
    <td><?php echo $rows[5] ?></td>
    <td><?php echo $rows[6] ?></td>
    <td><?php echo $rows[7] ?></td>
    <td><?php echo $rows[8] ?></td>
    </tr>
         <?php
}
?>
    </tbody>
    </table>
<input type = "button" class="btn btn-success" onClick="Submit2()" value="選取" name="delete">
<input type = "button" class="btn btn-primary" onClick="Submit4()" value="新增">
           
<input type = "button" class="btn btn-danger" onClick="Submit1()" value="刪除" name="delete">
<input type = "button" class="btn btn-warning" onClick="Submit3()" value="全部清除" name="delete">
        

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
