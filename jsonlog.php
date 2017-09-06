<?php 
	include "connect.php";
	$keyword = $_GET["keyword"];
	 $sql = "SELECT l1.cid,l1.time as 'time_in',l1.note as 'note_in',l2.time as 'time_out',l2.note as 'note_out' from log l1 
     join log l2 on l1.cid=l2.cid
     where l1.`inout`='in' and l2.`inout`='out' and l1.`time` 
     like '%".$keyword."%' and l2.`time` like '%".$keyword."%'";

     $result=$conn->query($sql);
	$num=$result->num_rows;
    $resultData = array();
    if($num > 0){
        while($rs = $result->fetch_assoc()){
            array_push($resultData,$rs);
        }
    }
    echo json_encode($resultData);
 ?>

