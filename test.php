<?php include "connect.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<meta charset="utf-8">
	<link href="css/reset.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
	
	<body>
		<div style="width: 70%;margin-left:15%;">
			<table id="example" class="table table-striped table-bordered" cellspacing="0">
				<thead>
					<tr>
						<th>รหัสอะไหล่</th>
						<th>ชื่อภาษาไทย</th>
						<th>ชื่อภาษาอังกฤษ</th>
						<th>serial</th>
						<th>model</th>
						<th width="100">เพิ่มรูปภาพ</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM `user`";
					$result = $conn->query($sql);
					while ($rs = $result->fetch_array()) {
						$id=$rs['product_id'];
					?>
					<tr>
						<td><?php echo $rs['cid']; ?></td>
						<td><?php echo $rs['prename']; ?></td>
						<td><?php echo $rs['name']; ?></td>
						<td><?php echo $rs['lname']; ?></td>
						<td><?php echo $rs['pid']; ?></td>
						<td align="center"><a href="addpic.php?id=<?php echo $id; ?>">คลิก</a></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>





<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable();
} );
</script>