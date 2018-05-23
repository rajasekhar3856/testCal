<?php
include "dbconn.php";
session_start();
$cdate = date('Y-m-d');
if(isset($_POST['submit']))
	{
	
		$insert=mysqli_query($connect,"insert into tblSMSLog ( `MessageSendOn`, `CustomerId`, `Message`, `SendBy`) values('$cdate','".$_POST['CustomerId']."','".$_POST['Message']."','".$_SESSION['userid']."')");
		if($insert){
		    header("Location:SendSms.php");
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
            <!-- END HEADER -->
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
                                    <a href="catageories_new.php">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="#">Send SMS</a>
                                
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
                                                        <span class="caption-subject font-green-haze bold uppercase">Send SMS</span>
                                                      
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
                                                    <form class="form-horizontal" role="form" action="" method="POST">
														<div class="form-body">
														    <div class="form-group">
																<label class="col-md-3 control-label" >Select Customer</label>
																<div class="col-md-3">
																	<select class="form-control " name="CustomerId" required>
																		<option value="" selected>Select Customer</option>
																		<?php
																		    $selcustomers = mysqli_query($connect, "select * from tbl_customers");
																		    while($rescustomers = mysqli_fetch_array($selcustomers)){
																		        echo '<option value="'.$rescustomers['custid'].'">'.$rescustomers['name'].'</option>';
																		    }
																		?>
																		
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label">Message Text</label>
																<div class="col-md-3">
																	<textarea class="form-control " placeholder="Enter Message" name="Message" required></textarea>
																	</div>
															</div>
														
														<div class="form-actions right1">
															<button type="button" class="btn default">Reset</button>
															<button type="submit" class="btn green" name="submit">Submit</button>
														</div>
													</form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>
											
											
											 <div class="portlet light">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-equalizer font-green-haze"></i>
                                                        <span class="caption-subject font-green-haze bold uppercase">SMS History</span>
                                                      
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
												   
													<?php
													 $allcatageories=mysqli_query($connect,"select * from tblSMSLog s left join tbl_customers c on c.custid = s.CustomerId where s.SendBy = '".$_SESSION['userid']."'");
													 ?>
												 
												 <table class="table table-striped table-bordered table-hover table-checkable order-column">
												 <tr>
														<th>S.NO</th>
														<th>SMS Sent On</th>
														<th>Customer Name</th>
														<th>Message</th>
														<th>Actions</th>
													</tr>
												 <?php
												 $i = 1;
												 while($fetchallcatageories=mysqli_fetch_array($allcatageories))
												 {
													?>
												 
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $fetchallcatageories['MessageSendOn']; ?></td>
														<td><?php echo $fetchallcatageories['name']; ?></td>
														<td><?php echo $fetchallcatageories['Message']; ?></td>
														
														<td><a href='edit_subcat.php?sid=<?php echo $fetchallcatageories['subid']; ?>'><button class="btn yellow">Resend</button></a>
													</td>
														
													</tr>
												 <?php
												 $i++;
												 }
												 ?>
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
            </div>
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
    </body>

</html>