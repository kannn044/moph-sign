<?php
include "connect.php";
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$check=$_POST['chkbox'];

    $sql="SELECT
	u.cid,
	u.prename,
	u.`name`,
	u.lname,
	logall.date,
	logall.time_in,
	logall.time_out,
	logall.note
FROM
	(
		SELECT
			log.cid,
			substr(log.time, 1, 10) AS date,

		IF (
			substr(log.in_out, 1, 2) = 'in',
			substr(log.time, 12, 8),
			NULL
		) AS time_in,

	IF (
		substr(log.in_out, 4, 3) = 'out',
		substr(log.time, 32, 8),
		NULL
	) AS time_out,
	log.note
FROM
	(
		SELECT
			cid,
			GROUP_CONCAT(log.`inout`) AS in_out,
			GROUP_CONCAT(time) AS time,
			note AS note
		FROM
			log
		GROUP BY
			cid
	) log
WHERE
	log.`time` LIKE '%2017-08-24%'
	) logall
RIGHT JOIN USER u ON logall.cid = u.cid";
    $result=$conn->query($sql);
	$num=$result->num_rows;
    
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center class="b">ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร
<br>บัญชีลงเวลาการปฏิบัติราชการของข้าราชการและพนักงานราชการ
<br>วัน</center>

<table width="100%" border="1">
	<thead>
		<tr>
			<th></th>
			<th>ชื่อ - นามสกุล</th>
			<th>เวลามา</th>
			<th>เวลากลับ</th>
			<th align="left">หมายเหตุ</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
		if($num > 0){
        while($rs = $result->fetch_assoc()){
        $i++;
	?>
		<tr>
			<td align="RIGHT"><?php echo $i;?></td>
			<td><?php echo $rs['prename'].$rs['name']." ".$rs['lname'];?></td>
			<td align="center">
			<?php

			if($rs['time_in']!=null){if($rs['note']==null) {echo $rs['time_in'];}
			else echo "<div class='red'>--------ขาด-------</div>";}
			else echo "<div class='red'>--------ขาด-------</div>";?>
				
			</td>
			<td align="center"><?php if($rs['time_out']!=null){echo $rs['time_out'];}
			else echo "<div class='red'>--------ขาด-------</div>";?></td>
			<td align="left"><?php echo $rs['note'];?></td>
		</tr>
		<?php
		 }
    }
		?>
	</tbody>
</table>
</body>
</html>
<style type="text/css">
	@font-face {
    	font-family: THSarabunNew;
    	src: url(font/THSarabunNew.ttf);
	}
	@font-face {
    	font-family: THSarabunNewBold;
    	src: url(font/THSarabunNewBold.ttf);
	}
	body{
		font-family: THSarabunNew;
		font-size: 16pt;
	}
	.b{
		font-family: THSarabunNewBold;
	}
	.red{
		color: red;
		font-weight: bold;
	}
</style>