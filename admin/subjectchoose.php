 <?php if(!isset($_COOKIE["login"])){
        header("Location: login.php"); //將網址改為要導入的登入頁面
        }
?>
<?php
    header('Content-Type: text/html; charset=utf-8');
    include("../connect.php");
$sql="SELECT * FROM examdata";
$result=mysql_query($sql);
$id=$_POST['selector'];
$N = count($id);


for($i=0; $i < $N; $i++)
{
    $sql1="SELECT * FROM examdata where form='$id[$i]'";
    $result1=mysql_query($sql1);
    $row=mysql_result($result1,0);
	if($row['choose']==0){
        mysql_query("UPDATE examdata SET choose='$id[$i]' where form='$id[$i]'");
    }else{
        mysql_query("UPDATE examdata SET choose=0 where form='$id[$i]'");
    }
}

?>
<thead><tr><th></th><th>ID</th><th></th><th>答案</th><th>題目</th><th>選項一</th><th>選項二</th><th>選項三</th><th>選項四</th><th>選項五</th><tr></thead>
    <tbody>
        <?php
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){
    $id=$rows['1'];
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