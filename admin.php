<?php include 'connect.php';
session_start();
if (!$_SESSION['admin']) {
	header('Location: index.php');
}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<div style="padding: 20px; margin-right: 10%;" align="right">
		<a href="adduser.php"><img src="add.png" width="2%;">&nbsp เพิ่มข้อมูล</a></div>
		<center>
		<table border="1" width="80%" cellspacing="0" cellpadding="5">
			<tr>
				<th align="center" colspan="8">รายชื่อ</th>
			</tr>
			<tr>
				<th>CID</th>
				<th>คำนำหน้าชื่อ</th>
				<th>ชื่อ</th>
				<th>นามสกุล</th>
				<th>ตำแหน่ง</th>
				<th>กลุ่ม</th>
				<th>แก้ไข</th>
				<th>ลบ</th>
			</tr>
			<?php
				$sql="SELECT u.cid,u.prename,u.name,u.lname,p.name,d.name FROM user u JOIN department d on u.depid=d.id JOIN position p ON p.id=u.pid";
				$result=$conn->query($sql);
				while ($rs=$result->fetch_array()) {
			?>	
			<tr>
				<td><?php echo $rs[0]; ?></td>
				<td><?php echo $rs[1]; ?></td>
				<td><?php echo $rs[2]; ?></td>
				<td><?php echo $rs[3]; ?></td>
				<td><?php echo $rs[4]; ?></td>
				<td><?php echo $rs[5]; ?></td>
				<td width="5%;" align="center"><a href="edit.php?id=<?php echo $rs[0]; ?>"><img src="edit.png" width="60%;"></a></td>
				<td width="5%;" align="center"><a href="delete.php?id=<?php echo $rs[0]; ?>" onclick="return confirm('แน่ใจหรือไม่')"><img src="remove.png" width="60%;"></a></td>
			</tr>
			<?php
			}
			?>
		</table>
		</center>
		<div style="padding: 20px; margin-right: 10%;" align="right">
		<a href="logout.php"><img src="logout.png" width="2%;">&nbsp ออกจากระบบ</a></div>
	</body>
</html>