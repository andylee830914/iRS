<?php
$link=mysql_connect("localhost","root","sqlpass") or die ("連線失敗");
mysql_select_db("irs");
mysql_set_charset('utf8',$link);
?>