<?php if(!isset($_COOKIE["login"])){
      header("Location:../login.php"); //將網址改為要導入的登入頁面
       }
?>
<!doctype html>
<html lang="en">
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("../../connect.php");
$sql="SELECT * FROM examdata";
$result=mysql_query($sql);

?>
	<head>
		<meta charset="utf-8">

		<title>iRS 隨堂小測驗</title>

		<meta name="description" content="A framework for easily creating beautiful presentations using HTML">
		<meta name="author" content="Hakim El Hattab">

		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="css/reveal.min.css">
		<link rel="stylesheet" href="css/theme/default.css" id="theme">

		<!-- For syntax highlighting -->
		<link rel="stylesheet" href="lib/css/zenburn.css">

		<!-- If the query includes 'print-pdf', include the PDF print sheet -->
		<script>
			if( window.location.search.match( /print-pdf/gi ) ) {
				var link = document.createElement( 'link' );
				link.rel = 'stylesheet';
				link.type = 'text/css';
				link.href = 'css/print/pdf.css';
				document.getElementsByTagName( 'head' )[0].appendChild( link );
			}
		</script>
        

		<!--[if lt IE 9]>
		<script src="lib/js/html5shiv.js"></script>
		<![endif]-->
                <script src="http://code.jquery.com/jquery-latest.min.js"></script>

	</head>

	<body>

		<div class="reveal">

			<!-- Any section element inside of this container is displayed as a slide -->
			<div class="slides">
				<section>
					<h1>隨堂小測驗</h1>
					
                    
				</section>
                <section>
                    <?php echo '<img src="http://chart.apis.google.com/chart?cht=qr&chl=http://'.$_SERVER["SERVER_NAME"].'/irs&chs=400x400" align="center">';?>
            <p>拿出手機掃描 iRS 的 QR Code！</p>
                    <p>可登入自己的 facebook ，讓 iRS 自動填入姓名</p>
                </section>
                    <?php                  
while( $row = mysql_fetch_array($result) ){
    if(!$row[0]==0){
echo "<section><section><h2>第 ".$row['form']." 題</h2>";
echo "<p>".$row['data']."</p>";
echo '<br>';
        if(empty($row[pic])){
        }else{
         echo '<img src="../../data/'.$row['pic'].'" style="margin:0px 30px">';
        }
echo '<ol style="A">';
for ($i=0;$i<6;$i++){
if (empty($row['choice'.$i])){
}else{
echo "<li>".$row['choice'.$i]."</li>";
}
}
//echo '<aside class="notes">(';
//echo $row['answer'].")</aside>";
echo "</section><section><h2>答案是</h2><center><h1>".$row['answer']."</h1></center></section></section>";
}
}
?>
                <section>
                    <h2>你答對了嗎？</h2>
                    </section>

				
				

			</div>

		</div>

		<script src="lib/js/head.min.js"></script>
		<script src="js/reveal.min.js"></script>

		<script>
Reveal.addEventListener( 'slidechanged', function( event ) {
    var arr = [event.indexh, event.indexv];
    console.log(arr);
    $.post( "submit.php", { indexh: event.indexh, indexv: event.indexv } );
});
			// Full list of configuration options available here:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				progress: true,
				history: true,
                transition: 'linear',
                loop: true,
                math: {
                    //mathjax: 'http://cdn.mathjax.org/mathjax/latest/MathJax.js',
                    config: 'TeX-AMS_HTML-full'  // See http://docs.mathjax.org/en/latest/config-files.html
                },
				// Parallax scrolling
				// parallaxBackgroundImage: 'https://s3.amazonaws.com/hakim-static/reveal-js/reveal-parallax-1.jpg',
				// parallaxBackgroundSize: '2100px 900px',
				// Optional libraries used to extend on reveal.js
				dependencies: [

					{ src: 'plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } },
                    { src: 'plugin/math/math.js', async: true }
				]
			});

		</script>

	</body>
</html>
