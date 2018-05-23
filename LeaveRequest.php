<?php
	session_start();
	include "dbconn.php";
	$cdate = date('Y-m-d');
	if(isset($_POST['submit']))
	{
		$insertrequest = mysqli_query($connect, "insert into tblleaverequests (`RequestedBy`, `RequestedOn`, `LeaveType`, `Description`, `CreatedOn`, `OrgId`) values ('".$_SESSION['userid']."','".$_POST['RequestedOn']."','".$_POST['LeaveType']."','".$_POST['Description']."','$cdate','".$_SESSION['orgid']."')");
		echo "insert into tblleaverequests (`RequestedBy`, `RequestedOn`, `LeaveType`, `Description`, `CreatedOn`, `OrgId`) values ('".$_SESSION['userid']."','".$_POST['RequestedOn']."','".$_POST['LeaveType']."','".$_POST['Description']."','$cdate','".$_SESSION['orgid']."')";
	
		if($insertrequest){
		    header("Location:LeaveRequest.php");
		}
		
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
       <?php
			include "head.php";
	   ?>
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
                                    <a href="#">Leave Request</a>
                               
                                </li>
                               
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                                            <div class="portlet light">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-equalizer font-green-haze"></i>
                                                        <span class="caption-subject font-green-haze bold uppercase">Leave Request</span>
                                                      
                                                    </div>
                                                    <div class="tools">
                                                        <a href="" class="collapse"> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="" class="reload"> </a>
                                                        <a href="" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="" method="POST" class="form-horizontal">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Required On</label>
                                                                        <div class="col-md-9">
                                                                            <input type="date" class="form-control" name="RequestedOn"  required>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Leave Type</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control" name="LeaveType" required>
                                                                                <option value="" selected>Select Type</option>
                                                                                <option value="Casual">Casual Leave</option>
                                                                                <option value="Sick">Sick Leave</option>
                                                                                <option value="Emergency">Emergency Leave</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
															<div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Description</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="Description" placeholder="Enter Description" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                
                                                                <!--/span-->
                                                            </div>
														
														
															
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-9">
                                                                            <button type="submit" name="submit" class="btn green">Submit</button>
                                                                            <button type="button" class="btn default">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"> </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>
											
											
											<div class="portlet light">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-equalizer font-green-haze"></i>
                                                        <span class="caption-subject font-green-haze bold uppercase">Leave Requests</span>
                                                      
                                                    </div>
                                                    <div class="tools">
                                                        <a href="" class="collapse"> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="" class="reload"> </a>
                                                        <a href="" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
													<div class="table-toolbar">
													   <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
															<thead>
																	<tr>
																						<th> S.No </th>
																						<th> Requested On </th>
																						<th> Leave Type </th>
																						<th> Request Status </th>
																					
																					</tr>
															</thead>
															<tbody>
																  
																	<?php
																				$sno = 1;
																					$getwalkins = mysqli_query($connect,"select * from tblleaverequests where requestedby = '".$_SESSION['userid']."'");
																					while($reswalkins = mysqli_fetch_array($getwalkins)){
																				?>
																					<tr>
																						<td> <?php echo $sno; ?> </td>
																						<td> <?php echo $reswalkins['RequestedOn']; ?> </td>
																						<td> <?php echo $reswalkins['LeaveType']; ?> </td>
																						<td> <?php echo $reswalkins['RequestStatus']; ?> </td>
																					
																					</tr>
																					<?php 
																					$sno++;
																					} ?>
															   
															</tbody>
														</table>
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
        <script>
            $(".otherserve").change(function() {
                if(this.checked) {
                    $('.nothers').show();
                }else{
                    $('.nothers').hide();
                }
            });
        </script>
    </body>

</html>