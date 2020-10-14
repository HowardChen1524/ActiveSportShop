<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$productnumber = '0';
$sql = "SELECT * FROM orders where username = '$id'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
if ( $row[1] == $id)
{
	echo '<meta http-equiv=REFRESH CONTENT=0;url=registeragain.html>';	
}
else if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
	$sql = "insert into orders (username, password,productnumber) values ('$id','$pw','$productnumber')";
	if(mysql_query($sql))
			echo '<meta http-equiv="refresh" content="0;url=registersuccess.html">';
	else
			echo '<meta http-equiv="refresh" content="0;url=registerfail.html">';
}
else
    echo '<meta http-equiv="refresh" content="0;url=registerfail.html">';
?>