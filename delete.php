<?php 
include 'connect.php';
if (!$_SESSION['admin']) {
	header('Location: index.php');
} 
$sql="delete from user where cid='".$_GET['id']."'";
echo $sql;
$res=$conn->query($sql);
if($res) header('Location:admin.php');
?>