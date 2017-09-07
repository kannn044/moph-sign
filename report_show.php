<?php
date_default_timezone_set('Asia/Bangkok');
include "connect.php";
$date=$date1=$_POST['date1'];
// $date2=$_POST['date2'];
$check1=$_POST['chkbox1'];
$check2=$_POST['chkbox2'];
$check3=$_POST['chkbox3'];
$date1=substr($date1,6,4).substr($date1,2,4).substr($date1,0,2);
    $sql="SELECT
			u.cid,
			u.prename,
			u.`name`,
			u.lname,
			u.type,
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
				where `time` LIKE '%".$date1."%'
				GROUP BY
					cid
			) log
		WHERE
			log.`time` LIKE '%".$date1."%'
			) logall
		RIGHT JOIN USER u ON logall.cid = u.cid
		where u.type=1 or u.type=2
		and (u.end_date >= '2017-08-23'
		or u.end_date IS NULL)";
		$sql2="SELECT
			u.cid,
			u.prename,
			u.`name`,
			u.lname,
			u.type,
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
				where `time` LIKE '%".$date1."%'
				GROUP BY
					cid
			) log
		WHERE
			log.`time` LIKE '%".$date1."%'
			) logall
		RIGHT JOIN USER u ON logall.cid = u.cid
		where u.type=3
		and (u.end_date >= '2017-08-23'
		or u.end_date IS NULL)";
		$sql3="SELECT
			u.cid,
			u.prename,
			u.`name`,
			u.lname,
			u.type,
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
				where `time` LIKE '%".$date1."%'
				GROUP BY
					cid
			) log
		WHERE
			log.`time` LIKE '%".$date1."%'
			) logall
		RIGHT JOIN USER u ON logall.cid = u.cid
		where u.type=4
		and (u.end_date >= '2017-08-23'
		or u.end_date IS NULL)";
    $result=$conn->query($sql);
    $result2=$conn->query($sql2);
    $result3=$conn->query($sql3);
	$num=$result->num_rows;
    
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/reset.css" rel="stylesheet">
</head>
<body>
<div  class="hideprint hmenu">
    <?php include "menu.php"; ?>
    </div>
    <div class="container">
<?php if($check1=="on"){ ?>
<center class="b">ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร
<br>บัญชีลงเวลาการปฏิบัติราชการของข้าราชการและพนักงานราชการ
<br>วันที่ <?php echo $date;?></center>

<table width="100%" border="1">
	<thead>
		<tr>
			<th width="5%"></th>
			<th width="30%">ชื่อ - นามสกุล</th>
			<th width="15%">เวลามา</th>
			<th width="15%">เวลากลับ</th>
			<th align="center">หมายเหตุ</th>
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
			<td align="RIGHT"><?php echo $i;?>&nbsp;</td>
			<td><?php echo $rs['prename'].$rs['name']." ".$rs['lname'];?></td>
			<td align="center">
			<?php

			if($rs['time_in']!=null){if($rs['note']==null) {
				echo $rs['time_in'];
				if(strtotime($rs['time_in'])>=strtotime('08:30')){echo "<font color=red><b> สาย</b></font>";}}
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

<?php }
if($check2=="on"){ ?>
<div class="page-break"></div>
<center class="b"><div class="hide">ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร</div>
บัญชีลงเวลาการปฏิบัติงานลูกจ้างกระทรวง
<div class="hide">วันที่ <?php echo $date;?></div></center>

<table width="100%" border="1">
	<thead>
		<tr>
			<th width="5%"></th>
			<th width="30%">ชื่อ - นามสกุล</th>
			<th width="15%">เวลามา</th>
			<th width="15%">เวลากลับ</th>
			<th align="center">หมายเหตุ</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
		if($num > 0){
        while($rs = $result2->fetch_assoc()){
        $i++;
	?>
		<tr>
			<td align="RIGHT"><?php echo $i;?>&nbsp;</td>
			<td><?php echo $rs['prename'].$rs['name']." ".$rs['lname'];?></td>
			<td align="center">
			<?php

			if($rs['time_in']!=null){if($rs['note']==null) {
				echo $rs['time_in'];
				if(strtotime($rs['time_in'])>=strtotime('08:30')){echo "<font color=red><b> สาย</b></font>";}}
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

<?php }
if($check3=="on"){ ?>
<div class="page-break"></div>
<center class="b">
<div class="hide">ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร</div>
บัญชีลงเวลาการปฏิบัตงานเจ้าหน้าที่บริษัท
<div class="hide">วันที่ <?php echo $date;?></div></center>

<table width="100%" border="1">
	<thead>
		<tr>
			<th width="5%"></th>
			<th width="30%">ชื่อ - นามสกุล</th>
			<th width="15%">เวลามา</th>
			<th width="15%">เวลากลับ</th>
			<th align="center">หมายเหตุ</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
		if($num > 0){
        while($rs = $result3->fetch_assoc()){
        $i++;
	?>
		<tr>
			<td align="RIGHT"><?php echo $i;?>&nbsp;</td>
			<td><?php echo $rs['prename'].$rs['name']." ".$rs['lname'];?></td>
			<td align="center">
			<?php

			if($rs['time_in']!=null){if($rs['note']==null) {
				echo $rs['time_in'];
				if(strtotime($rs['time_in'])>=strtotime('08:30')){echo "<font color=red><b> สาย</b></font>";}}
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
<?php  } ?>
</div>
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
	.container{
		width:85%;
		float:left;
		background:white;
		float:left;"
	}
	.hmenu{
		width:15%;
		min-height: 100vh;
		height:auto;
		float:left;
		background:green;
	}
	.b{
		font-family: THSarabunNewBold;
	}
	.red{
		color: red;
		font-weight: bold;
	}
	@media all
	{
	    .page-break { display:none; }
	    .page-break-no{ display:none; }
	    .hide{display:none;}
	}
	@media page
	{
	    .hide{display:block;}
	}
	@media print
	{	
		.hideprint{display: none;}
		.container{width:100%;}
		.hide{display:block;}
	    .page-break { display:block;height:1px; page-break-before:always; }
	    .page-break-no{ display:block;height:1px; page-break-after:avoid; } 
	}
	td,th{
		border: 1px solid black;
	}
	
</style>