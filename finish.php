<?php
include("mysql_connect.inc.php");
session_start();
$username = $_SESSION['username'];
$number = $_POST['number'];
define( "VALUE", 0 );

$sql = "SELECT * FROM orders where username = '$username'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

if($row[1] != '' && $row[2] == VALUE)
{
    $sql2 = "UPDATE orders SET productnumber = '$number' WHERE username = '$username'";
	if(mysql_query($sql2))
		echo '<meta http-equiv="refresh" content="0;url=ordersuccess.html">';
	else
		echo '<meta http-equiv="refresh" content="0;url=orderfail.html">';
}
else
{
	 $sql3 = "insert into orders (username, password,productnumber) values ('$username','','$number')";
	if(mysql_query($sql3))
		echo '<meta http-equiv="refresh" content="0;url=ordersuccess.html">';
	else
		echo '<meta http-equiv="refresh" content="0;url=orderfail.html">';
}

unset($_SESSION['username']);
?>