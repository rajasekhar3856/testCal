<?php
include "dbconn.php";
if($_POST['custid'])
{
	$cid=$_POST['custid'];
	$name=$_POST['name'];
	$phonenumber = $_POST['phonenumber'];
	$alternatenumber=$_POST['alternatenumber'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$createdby=$_POST['createdby'];
	$updatedby=$_POST['updatedby'];
	
	$update=mysqli_query($connect,"update tbl_customers SET name='$name',phoneno='$phonenumber',altno='$alternatenumber',email='$email' ,address = '$address',createby = '$createdby',updatedby= '$updatedby' where custid='$cid'");
	header("Location:customerform.php");
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
                                                                 <div class="portlet light">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-equalizer font-green-haze"></i>
                                                        <span class="caption-subject font-green-haze bold uppercase">Users Info</span>
                                                      
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
                                                    <form class="form-horizontal" role="form" method="POST">
															<?php

															if($_GET['cid'])
															{
															$custid=$_GET['cid'];
															$selcat=mysqli_query($connect,"select * from  tbl_customers where custid = '$custid'");
															$catdata=mysqli_fetch_array($selcat);
															}
															?>

																	<div class="form-body">
																	<div class="form-group">
																			<label class="col-md-3 control-label"></label>
																			<div class="col-md-9">
																				<input type="hidden" name="custid" class="form-control" value="<?php echo $_GET['cid']; ?>"> </div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label col-md-3">Name</label>
																					<div class="col-md-9">
																						<input type="text" class="form-control" name="name" placeholder="" value="<?php echo $catdata['name']; ?>" required>
																					</div>
																				</div>
																			</div>
																			<!--/span-->
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label col-md-3">Mobile Number</label>
																					<div class="col-md-9">
																						<input type="number" class="form-control" name="phonenumber" placeholder="" value="<?php echo $catdata['phoneno']; ?>" required>
																					</div>
																				</div>
																			</div>
																			<!--/span-->
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label col-md-3">Alternate Number</label>
																					<div class="col-md-9">
																						<input type="number" class="form-control" name="alternatenumber" placeholder="" value="<?php echo $catdata['altno']; ?>" required>
																					</div>
																				</div>
																			</div>
																			<!--/span-->
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label col-md-3">Email</label>
																					<div class="col-md-9">
																						<input type="text" class="form-control" name="email" placeholder="" value="<?php echo $catdata['email']; ?>" required>
																					</div>
																				</div>
																			</div>
																			<!--/span-->
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label col-md-3">Address</label>
																					<div class="col-md-9">
																						<input type="text" class="form-control" name="address" placeholder="" value="<?php echo $catdata['address']; ?>" required>
																					</div>
																				</div>
																			</div>
																			<!--/span-->
																			<div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Status</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control" name="status" required readonly>
                                                                                <option value="">--Select--</option>
                                                                                <option value="Enquiry" selected>Enquiry</option>
                                                                                <option value="Lead">Lead</option>
                                                                                <option value="Customer">Customer</option>
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
																			<!--/span-->
																		</div>
																		<div class="row">
																		<div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Work Status</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control" name="workstatus" required readonly>
                                                                                <option value="">--Select--</option>
                                        
                                        <option value="Created" selected>Created</option>
                                                                                <option value="Assigned">Assigned</option>
                                                                                <option value="Pending">Pending</option>
                                                                                <option value="Completed">Completed</option>
                                                                                <option value="Reassigned">Reassigned</option>
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
																		
																	</div>
																	<div class="form-actions right1">
																		<button type="button" class="btn default">Reset</button>
																		<button type="submit" class="btn green" name="update">Update</button>
																	</div>
															</form>


                                                      
                                                    <!-- END FORM-->
                                                </div>
                                            </div>
											
                 
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
             <!-- END CONTENT -->
                
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2016 &copy; Metronic Theme By
                    <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
                    <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
       <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>