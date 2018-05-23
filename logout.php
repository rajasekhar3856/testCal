<?php
	include 'dbconn.php';
		$ctime = date("Y-m-d H:i:s");
	session_start();
	session_destroy();
	$insertlog = mysqli_query($connect, "insert into tbllogreport (logtime, userid,type,orgid) values ('$ctime','".$_SESSION['userid']."','Logout','".$_SESSION['orgid']."')");
	header('Location:../index.php');
?>