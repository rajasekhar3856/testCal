<?php
    session_start();
	include "dbconn.php";
if(isset($_POST['updatestatus']))
{
	$activityid = $_POST['activityid'];
	$selectlead = mysqli_query($connect,"select * from tblactivities where activityid ='$activityid'");
	$reslead = mysqli_fetch_array($selectlead);
	if($_POST['nlstatus']=='Completed'){
		$update = mysqli_query($connect,"update `tblactivities` set status='Completed' where activityid='$activityid'");
			if($update)
			{
				?>
				<script>alert("Activity Updated Successfully");
				window.location.href="activities.php";
				</script>
				<?php
			}
	}else{
		$update = mysqli_query($connect,"update `tblactivities` set status='Postponed' where activityid='$activityid'");
		$insert = mysqli_query($connect,"INSERT INTO `tblactivities`(activityname,`activitytype`, `activitydate`, `description`, `userid`,status,orgid) VALUES ('".$reslead['activityname']."','".$reslead['type']."','".$_POST['nextactdate']."','".$_POST['adescription']."','".$_SESSION['userid']."','Scheduled','".$_SESSION['orgid']."')");
			if($update)
			{
				?>
				<script>alert("Activity Updated Successfully");
				window.location.href="activities.php";
				</script>
				<?php
			}
	}
 
	 //echo $email1."<br>";
  

}

?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    

       <?php
			include "head.php";
	   ?>
	   	<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
	</head>

    <!-- END HEAD -->
   

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <?php include "header.php"; ?>
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
						<?php
							include "menu.php";
						?>
						
						<!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                

                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                    <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN THEME PANEL -->
                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="#">Customer Form</a>
                               
                                </li>
                               
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        
                        	<div class="row">
                            <div class="col-md-12">
                                <div class="portlet light portlet-fit bordered calendar">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Calendar</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                    <form class="form-horizontal" action="" method="POST" role="form">
									<?php $select_not = mysqli_query($connect,"select * from tblactivities a where a.activityid= '".$_GET['id']."'");
											$res = mysqli_fetch_array($select_not);
												?>
											
											<input type="hidden" name="activityid" value="<?php echo $_GET['id']?>">
                                             <div class="input-group">
																  <label for="modalfile" class="form-label">Description</label>
																 <textarea class="form-control" name="adescription"><?php echo $res['description']?></textarea>
																 </div>
																<div class="input-group">
															
																<label class="form-label" for="password-1">Activity Status:</label>
                                                                  <?php echo $_GET['id']; ?>
																    <select name="nlstatus" class="form-control" onchange="showdiv(this)" >
																		<option value="Completed">Completed</option>
																		<option value="Postponed">Postponed</option>
																		
																	</select>
                                                                </div>
																<br>
																<div class="form-group col-md-6" id="nextact" style="display:none;">
																<label class="form-label" for="password-1">Next Activity Date:</label>
                                                                    <input type="date" id="date" name="nextactdate" class="form-control" id="nextactdate" value=""/>
																	
																	<label for="modalfile" class="form-label">New Description</label>
																 <textarea class="form-control" name="adescription"><?php echo $res['description']?></textarea>
																 </div>
															   </div>
															    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="updatestatus">Change</button>
                                                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                                       
                 
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
             <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
                
                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <?php include "footer.php"; ?>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        <!-- END QUICK NAV -->
        <?php include "foot.php"; ?>
        <script src='fullcalendar/lib/moment.min.js'></script>
        <script src='fullcalendar/lib/jquery.min.js'></script>
        <script src='fullcalendar/fullcalendar.min.js'></script>
        <script>
$(document).ready(function() {
	$("#date").datepicker({minDate: 0});
    document.getElementById('nextact').style.display = "none";
});

function showdiv(elem){
   if(elem.value == 'Postponed'){
      document.getElementById('nextact').style.display = "block";
}else{
	document.getElementById('nextact').style.display = "none";
}
}
</script>
    </body>

</html>