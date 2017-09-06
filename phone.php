<?php 
	$conn = mysqli_connect("localhost","root","12345678","test");
	$sql = "select * from supplier_contact";
	$results = $conn->query($sql);
	while ($rs = $results->fetch_array()) {
		echo $rs['contact_id']." ".$rs['contact_tel']."<br>";
		if (substr($rs['contact_tel'],0,1)!="0") {
			$tel="0".$rs['contact_tel'];
 			$update="update supplier_contact set contact_tel='".$tel."' where contact_id='".$rs['contact_id']."'";
 			$conn->query($update);
 		}
 		if (preg_match("/-/",$rs['contact_tel'])) {
 			$tel = str_replace('-','',$rs['contact_tel']);
 			$update="update supplier_contact set contact_tel='".$tel."' where contact_id='".$rs['contact_id']."'";
 			$conn->query($update);
 		}
 		if (preg_match("/ /",$rs['contact_tel'])) {
 			$tel = ereg_replace('[[:space:]]+', '', trim($rs['contact_tel']));
 			$update="update supplier_contact set contact_tel='".$tel."' where contact_id='".$rs['contact_id']."'";
 			$conn->query($update);
 		}
	}
 ?>