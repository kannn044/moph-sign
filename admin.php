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
		<table border="1" width="90%" cellspacing="0" cellpadding="5">
			<tr>
				<th align="center" colspan="8">รายชื่อ</th>
			</tr>
			<tr>
				<th>CID</th>
				<th colspan="2">ชื่อ-นามสกุล</th>
				<th>ตำแหน่ง</th>
				<th>กลุ่ม</th>
				<th>ประเภท</th>
				<th>แก้ไข</th>
				<th>ลบ</th>
			</tr>
			<?php
				$sql="SELECT u.cid,u.prename,u.name,u.lname,p.name as p_name,d.name as d_name,t.type_name FROM user u JOIN department d on u.depid=d.id JOIN position p ON p.id=u.pid join type t on t.type_id=u.type where u.status=1" ;

				$result=$conn->query($sql);
				while ($rs=$result->fetch_array()) {
			?>	
			<tr>
				<td><?php echo $rs['cid']; ?></td>
				<td style="border-right: 0px;"><?php echo $rs['prename'].$rs['name']; ?></td>
				<td style="border-left: 0px;"> <?php echo $rs['lname']; ?></td>
				<td><?php echo $rs['p_name']; ?></td>
				<td><?php echo $rs['d_name']; ?></td>
				<td><?php echo $rs['type_name']; ?></td>
				<td width="5%;" align="center"><a href="edit.php?id=<?php echo $rs['cid']; ?>"><img src="edit.png" width="60%;"></a></td>
				<td width="5%;" align="center"><a href="delete.php?id=<?php echo $rs['cid']; ?>" onclick="return confirm('แน่ใจหรือไม่')"><img src="remove.png" width="60%;"></a></td>
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