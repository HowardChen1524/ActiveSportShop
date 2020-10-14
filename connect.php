<?php
session_start();
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connect.inc.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$sql = "SELECT * FROM orders where username = '$id'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw)
{
		$_SESSION['username'] = $id;
        echo '<meta http-equiv="refresh" content="0;url=loginsuccess.html">';
}
else
{
        echo '<meta http-equiv="refresh" content="0;url=loginfail.html">';
}
?>