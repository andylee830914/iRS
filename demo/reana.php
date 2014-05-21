 <?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");
$sql="SELECT form FROM status";
$result=mysql_query($sql);
$form=mysql_result($result,0);
    ?>
 
 <div id="myfirstchart"></div>
            <?php
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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