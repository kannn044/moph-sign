<?php
date_default_timezone_set("Asia/Bangkok");
include "connect.php";
$cid=$_GET['id'];
$date=date("Y-m-d H:i:s");
$dateshow="เวลา ".date(" H:i:s");
$cdate=date("Y-m-d");
$select="select * from log where time like '%".$cdate."%' and cid='".$cid."'";
$result1=$conn->query($select);
if ($result1->num_rows<2){ 
if ($result1->num_rows==1) {
	$sql="insert into `log`(`cid`,`time`,`inout`) values('".$cid."','".$date."','out')";
}else $sql="insert into `log`(`cid`,`time`,`inout`) values('".$cid."','".$date."','in')";
$conn->query($sql);}
$sql1="select * from user where cid=".$cid."";
$result=$conn->query($sql1);
$rs=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<center><img style="padding-top: 7%;" src="1.png" width="15%"></center>
		<p align="center" style="line-height: 1.2em; margin-top: 2%;">ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร สำนักงานปลัดกระทรวงสาธารณสุข<br>ระบบเซ็นชื่อ เข้า-ออกงาน</p>
		<center>
			<p style="margin-top: 2%;"><?php echo $rs['prename']." "; echo $rs['name']." "; echo $rs['lname']." ".$dateshow;?></p>
			<p>บันทึกข้อมูลเสร็จสิ้น กรุณาดึงบัตรออก</p>
		</center>
	</body>
</html>
<link rel="stylesheet" type="text/css" href="style.css">
<script type='text/javascript' src='moment.min.js'></script>
<script type='text/javascript' src='jquery-3.2.1.js'></script>
<style type="text/css">
	p{
		font-size: 2em;
		color: white; 
		text-shadow: 1px 1px 1px black;
	}
</style>
<script>
function smartcard(){
	var tempcid='';
	$.ajax({
	type:"GET",
	dataType:"json",
	url:"http://localhost:8080/smartcard/data/",
	success:function(data){
		$("#cid").val(data.cid);
		if(data.cid==null)
		{
			success(data.cid);
		}
	}
});
}
setInterval(smartcard, 1000);
function success(cid){
window.location="smartcard.php";
}
</script>