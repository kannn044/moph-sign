<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="#" method="post">
	<table align="center" style="margin-top: 18%; font-size: 15pt; line-height: 1.5em;">
		<tr>
			<th colspan="2" align="center">เข้าสู่ระบบ</th>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="uname"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pass"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="en" value="เข้าสู่ระบบ"></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php 
	if (isset($_POST['en'])) {
		if ($_POST['uname']=='admin'&&$_POST['pass']=='1234') {
			header('Location: admin.php');
		}
	}
 ?>