<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="#" method="post">
	<img src="back.png" width="2%"><a href="index.php">กลับสู่หน้าหลัก</a>
	<table align="center" style="margin-top: 18%; font-size: 15pt; line-height: 1.5em;">
		<tr>
			<th colspan="2" align="center">เข้าสู่ระบบ</th>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="uname" placeholder="ชื่อผู้ใช้" style="border-radius: 3px 10px; padding: 5px; width: 200px;"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pass" placeholder="รหัสผ่าน" style="border-radius: 3px 10px; padding: 5px; width: 200px;"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="en" value="เข้าสู่ระบบ" style="padding: 5px; border-radius: 3px 10px;"></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php 
	if (isset($_POST['en'])) {
		if ($_POST['uname']=='admin'&&$_POST['pass']=='1234') {
			$_SESSION['admin']=1;
			header('Location: admin.php');
		}else echo "<script>alert('Username หรือ Password ไม่ถูกต้อง')</script>";
	}
 ?>