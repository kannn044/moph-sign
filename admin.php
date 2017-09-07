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
		<link href="css/reset.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
	</head>
	<body style="position:fixed;">
	<div style="width:15%;min-height: 100vh;height:auto;float:left;background:green;float:left">
	<?php include "menu.php"; ?>
	</div>
	<div style="width:85%;float:left;background:white;float:left;">
	
		<div style="padding: 20px; margin-right: 10%;" align="right">
		<a href="adduser.php"><img src="add.png" width="2%;">&nbsp เพิ่มข้อมูล</a></div>

		<div style="width: 90%;margin-left:5%;">
		<table id="example" class="table table-striped table-bordered" border="1" width="100%" cellspacing="0">
		<thead>
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
			</thead>
			<tbody>
			<?php
				$sql="SELECT u.cid,u.prename,u.name,u.lname,p.name as p_name,d.name as d_name,t.type_name FROM user u JOIN department d on u.depid=d.id JOIN position p ON p.id=u.pid join type t on t.type_id=u.type where u.status=1" ;

				$result=$conn->query($sql);
				while ($rs=$result->fetch_array()) {
			?>	
			
			<tr>
				<td width="12%"><?php echo $rs['cid']; ?></td>
				<td style="border-right: 0px;"><?php echo $rs['prename'].$rs['name']; ?></td>
				<td style="border-left: 0px;"> <?php echo $rs['lname']; ?></td>
				<td><?php echo $rs['p_name']; ?></td>
				<td><?php echo $rs['d_name']; ?></td>
				<td><?php echo $rs['type_name']; ?></td>
				<td width="5%;" align="center"><a href="edit.php?id=<?php echo $rs['cid']; ?>"><img src="edit.png" width="45%;"></a></td>
				<td width="5%;" align="center"><a href="delete.php?id=<?php echo $rs['cid']; ?>" onclick="return confirm('คุณต้องการที่จะลบใช่หรือไม่')"><img src="remove.png" width="60%;"></a></td>
			</tr>
			
			<?php
			}
			?>
			</tbody>
		</table>
		</div>
		<div style="padding: 20px; margin-right: 10%;" align="right">
		<a href="logout.php"><img src="logout.png" width="2%;">&nbsp ออกจากระบบ</a></div>
	
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-3.2.1.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			$('#example').DataTable();
			} );
		</script>
		</div>
	</body>
	
</html>