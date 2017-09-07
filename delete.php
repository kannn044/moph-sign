<?php 
include 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$date=date("Y-m-d");
if (!$_SESSION['admin']) {
	header('Location: index.php');
} 
$sql="update user set status=0,end_date='".$date."' where cid='".$_GET['id']."'";
echo $sql;
$res=$conn->query($sql);
if($res) header('Location:admin.php');
?>