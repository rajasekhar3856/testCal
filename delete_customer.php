<?php 
include "dbconn.php";

if($connect){
		
	if($_GET['cid']){
	$sid = $_GET['cid'];
	
	// echo $sid;
	$delete = mysqli_query($connect,"update tbl_customers set status = 'inactive' where custid = '$sid'");	
	header("Location:customerform.php");
}

	
}

?>