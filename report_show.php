<?php
include "connect.php";
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$check=$_POST['chkbox'];

echo $date1.$date2.$check;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร
<br>บัญชีลงเวลาการปฏิบัติราชการของข้าราชการและพนักงานราชการ
<br>วัน</center>

<table width="100%">
	<thead>
		<tr>
			<td></td>
			<td>ชื่อ - นามสกุล</td>
			<td>เวลามา</td>
			<td>เวลากลับ</td>
			<td>หมายเหตุ</td>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
</table>
</body>
</html>
<style type="text/css">
	@font-face {
    	font-family: THSarabunNew;
    	src: url(THSarabunNew.ttf);
	}
	body{
		font-family: 'THSarabunNew'
	}
</style>