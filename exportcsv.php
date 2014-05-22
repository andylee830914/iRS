<?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php

// Database Connection

include("connect.php"); 
$result=mysql_select_db("irs")
or die("database cannot be selected <br>");

// Fetch Record from Database

$output = "";
$table = "answers"; // Enter Your Table Name 
$form=$_POST['form'];
if(empty($form)){
$sql =mysql_query("select * from $table ORDER BY `form` ASC");
$form='all';
}else{
$sql = mysql_query("select * from $table where form='$form'");
}
$columns_total = mysql_num_fields($sql);

// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}

// Download the file
$date = date('Y-m-d');
$filename = "iRS-report-".$date."-form-".$form.".csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $filename."\n";
echo $output;
exit;

?>
