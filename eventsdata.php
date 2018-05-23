<?php
include 'dbconn.php';
$eventsdata = array();
	$sql = mysqli_query($connect, "select activityname as title,activitydate as start,CONCAT('activityedit.php?id=',activityid) as url from tblactivities where status !='Completed'");
	while($result = mysqli_fetch_assoc($sql))
	{
		
		$eventsdata[] = $result;
	}

echo json_encode($eventsdata);

?>
