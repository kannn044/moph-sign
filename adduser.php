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
		<form action="#" method="post"><br>
			<div style="margin-left: 15%;">
				<a href="admin.php"><img src="back.png" width="2%;">กลับหน้าแรก</a>			
			</div>
			<center>
			<br>
			<table border="1" cellspacing="0" cellpadding="5">
				<tr>
					<th colspan="7">เพิ่มข้อมูล</th>
				</tr>
				<tr>
					<th>CID</th>
					<th>คำนำหน้าชื่อ</th>
					<th>ชื่อ</th>
					<th>นามสกุล</th>
					<th>ตำแหน่ง</th>
					<th>กลุ่ม</th>
					<th>ประเภท</th>
				</tr>
				<tr>
					<td><input type="text" name="cid" placeholder="เลขบัตรประจำตัวประชาชน" required></td>
					<td>
						<select name="pre" style="width: 100%;">
							<option value='นาย'>นาย</option>
							<option value='นาง'>นาง</option>
							<option value='นางสาว'>นางสาว</option>
						</select>
					</td>
					<td><input type="text" name="name" required></td>
					<td><input type="text" name="lname" required></td>
					<td>
						<select name="pos">
							<?php
							$sqlp="select * from position";
							$result=$conn->query($sqlp);
							while ($rs=$result->fetch_array()) {
								echo "<option value=".$rs[0].">".$rs[1]."</option>";
							}
							?>
						</select>
					</td>
					<td>
						<select name="dep">
							<?php
							$sqld="select * from department";
							$result=$conn->query($sqld);
							while ($rs=$result->fetch_array()) {
								echo "<option value=".$rs[0].">".$rs[1]."</option>";
							}
							?>
						</select>
					</td>
					<td>
						<select name="type">
							<?php
							$sqld="select * from type";
							$result=$conn->query($sqld);
							while ($rs=$result->fetch_array()) {
								echo "<option value=".$rs[0].">".$rs[1]."</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="7" align="center"><input type="submit" name="en" value="เพิ่มข้อมูล">
					<input type="reset" name="" value="ยกเลิก"></td>
				</tr>
			</table>
			</center>
		</form>
	</body>
</html>
<?php 
	if (isset($_POST['en'])) {
		$sqlinsert="insert into user values('".$_POST['cid']."','".$_POST['pre']."','".$_POST['name']."','".$_POST['lname']."','".$_POST['pos']."','".$_POST['dep']."','".$_POST['type']."',1)";
		echo $sqlinsert;
		$res=$conn->query($sqlinsert);
		if($res) header('Location:admin.php');
	}
 ?>