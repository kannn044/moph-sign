<?php
	include 'connect.php';
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
		<form action="" method="post"><br>
		<div style="margin-left: 15%;">
				<a href="admin.php"><img src="back.png" width="2%;">กลับหน้าแรก</a>			
			</div>
			<center>
			<br>
			<table width="70%" border="1" cellspacing="0" cellpadding="5">
				<tr>
					<th colspan="6">แก้ไขข้อมูล</th>
				</tr>
				<tr>
					<th>CID</th>
					<th>คำนำหน้าชื่อ</th>
					<th>ชื่อ</th>
					<th>นามสกุล</th>
					<th>ตำแหน่ง</th>
					<th>กลุ่ม</th>
				</tr>
				<?php
						$sql="SELECT u.cid,u.prename,u.name,u.lname FROM user u JOIN department d on u.depid=d.id JOIN position p ON p.id=u.pid where cid=".$_GET['id']."";
						$result=$conn->query($sql);
						$rs=$result->fetch_assoc();
				?>
				<tr style="font-size: 12pt;">
					<td><input type="text" name="" value="<?php echo $rs['cid']; ?>" disabled=""></td>
					<td width="5"><input style="width: 90px;" type="text" width="10" value="<?php echo $rs['prename']; ?>" disabled=""></td>
					<td><input type="text" name="n" value="<?php echo $rs['name']; ?>"></td>
					<td><input type="text" name="l" value="<?php echo $rs['lname']; ?>"></td>
					<td>
						<select name="p">
							<?php
							$s="select * from position";
							$result=$conn->query($s);
							while ($rs=$result->fetch_array()) {
								echo "<option value=".$rs[0].">".$rs[1]."</option>";
							}
							?>
						</select>
					</td>
					<td>
						<select name="d">
							<?php
							$s="select * from department";
							$result=$conn->query($s);
							while ($rs=$result->fetch_array()) {
								echo "<option value=".$rs[0].">".$rs[1]."</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="6" align="center">
						<input type="submit" onclick="return confirm('แน่ใจหรือไม่')" name="en" value="แก้ไขข้อมูล">
						<input type="reset" name="" value="ยกเลิก">
					</td>
				</tr>
			</table>
			</center>
		</form>
	</body>
</html>
<?php 
	if (isset($_POST['en'])) {
		$sqlupdate="update user set name='".$_POST['n']."',lname='".$_POST['l']."',pid='".$_POST['p']."',depid='".$_POST['d']."' where cid='".$_GET['id']."'";
		echo $sqlupdate;
		$res=$conn->query($sqlupdate);
		if($res) header('Location:admin.php');
	}
 ?>