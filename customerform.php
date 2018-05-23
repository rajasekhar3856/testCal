<?php
	session_start();
	include "dbconn.php";
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$phonenumber = $_POST['phonenumber'];
		$alternatenumber = $_POST['alternatenumber'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		// $status = $_POST['status'];
		// $workstatus = $_POST['workstatus'];
		$assignedto = $_SESSION['username'];
		$createdon = date("Y-m-d H:i:s");
		$createdby = $_SESSION['userid'];
		$updatedon = date("Y-m-d H:i:s");	
		$updatedby = $_POST['updatedby'];
		// $organisationid = $_SESSION['orgid'];
		
		$insert=mysqli_query($connect,"insert into tbl_customers (name,phoneno,altno,email,address,status,workstatus,assignedto,createdon,createby,branchid,NameInAadhar,PanCard,Others) values
		('$name','$phonenumber','$alternatenumber','$email','$address','Active','Created','$assignedto','$createdon','$createby','".$_SESSION['orgid']."','".$_POST['NameInAadhar']."','".$_POST['PanNo']."','".$_POST['Others']."')");
		if($insert){
		    $status = $_POST['status'];
		    $customerid = mysqli_insert_id($connect);
		    $checkBox = implode(',', $_POST['services']);
		    $insertwork = mysqli_query($connect,"insert into tbl_works(servicesrequested,workdate,custid,status,createdon,createdby) values('$checkBox ','$createdon','$customerid','$status','$createdon','$createdby')");
		  
		    if($insertwork){
		        $assignedby = $_SESSION['userid'];
        		$assignedto = $_POST['assignedto'];
        		$workid = mysqli_insert_id($connect);
        		$insert=mysqli_query($connect,"insert into tbl_assignments(workid,custid,assignedon,assignedby,assignedto,status) values('$workid','$customerid','$assignedon','$assignedby','$assignedto','active')");
        		echo "insert into tbl_assignments(workid,custid,assignedon,assignedby,assignedto,status) values('$workid','$customerid','$assignedon','$assignedby','$assignedto','active')";
		    }
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
                                                        <span class="caption-subject font-green-haze bold uppercase">Customers Form</span>
                                                      
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
                                                                        <label class="control-label col-md-3">Name</label>
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control" name="name" placeholder="Name in PAN" required>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control" name="NameInAadhar" placeholder="Name in Aadhar" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Phone Number</label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" class="form-control" name="phonenumber" placeholder="Phone Number" required>
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
                                                                            <input type="number" class="form-control" name="alternatenumber" placeholder="Alternate  Number" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Email</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="email" placeholder="Email" required>
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
                                                                            <input type="text" class="form-control" name="address" placeholder="Address" required>
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
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">PAN CARD No.</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="PanNo" placeholder="Enter PAN Card No" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                
                                                            </div>
															<div class="row">
															    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Others.</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="Others" placeholder="Others Info" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                
                                                            </div>
															<div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Services Required</label>
                                                                        <div class="col-md-9">
                                                                            <table>
                                                                            <?php 
                                                                            $getcategories = mysqli_query($connect,"select * from tbl_categories");
                                                                            
                                                                            while($rescategories = mysqli_fetch_array($getcategories)){
                                                                                echo "<h3>".$rescategories['catname']."</h3>";
                                                                                $getservices = mysqli_query($connect, "select * from tbl_subcategories where catid = '".$rescategories['catid']."'");
                                                                                $i = 1;
                                                                                while($resservices = mysqli_fetch_array($getservices)){
                                                                                    echo "<span style='padding:5px;'><input type='checkbox' name='services[]' value='".$resservices['subid']."' >".$resservices['subname']."</span>";
                                                                                   /* if($i == 1){
                                                                                        echo "<tr style='height:70px;'>";
                                                                                    }
                                                                                    echo "<td  valign='top' style='font-weight:bold;'><input type='checkbox' name='services[]' value='".$resservices['subid']."'>".$resservices['subname']."&nbsp;&nbsp;</td>";
                                                                                    if($i == 6){
                                                                                      echo "</tr>";
                                                                                        $i = 0;
                                                                                    }*/
                                                                                }
                                                                               // $i++;
                                                                            }
                                                                            
                                                                            ?>
                                                                            </table>
                                                                           
                                                                     <div class="row">
                															    <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                         <div class="col-md-9">
                                                                                             <?php
                                                                                                    echo "<input type='checkbox' name='' class='otherserve' value='' >Others";
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--/span-->
                                                                                
                                                                     </div>
                                                                            <div class="row nothers"  style="display:none;">
                															    <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-3">Other Service.</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" class="form-control" name="OtherService" placeholder="Other Service"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--/span-->
                                                                                
                                                            </div>
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
                                                        <span class="caption-subject font-green-haze bold uppercase">Customer Info</span>
                                                      
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
																						<th> Name </th>
																						<th> Mobile Number </th>
																						<th> Alternate Number </th>
																						<th> Email</th>
																						<th> Address </th>
																						<th> Status </th>
																						<th> Work Status </th>
																						<th> Assigned To </th>
																						<th> Created On </th>
																						<th> Created By </th>
																						<th> Updated On </th>
																						<th> Updated By </th>
																						<th> Branch Id </th>
																						<th> Actions </th>
																					</tr>
															</thead>
															<tbody>
																  
																	<?php
																				$sno = 1;
																					$getwalkins = mysqli_query($connect,"select * from tbl_customers where status = 'active'");
																					while($reswalkins = mysqli_fetch_array($getwalkins)){
																				?>
																					<tr>
																						<td> <?php echo $sno; ?> </td>
																						<td> <?php echo $reswalkins['name']; ?> </td>
																						<td> <?php echo $reswalkins['phoneno']; ?> </td>
																						<td> <?php echo $reswalkins['altno']; ?> </td>
																						<td> <?php echo $reswalkins['email']; ?> </td>
																						<td> <?php echo $reswalkins['address']; ?> </td>
																						<td> <?php echo $reswalkins['status']; ?> </td>
																						<td> <?php echo $reswalkins['workstatus']; ?> </td>
																						<td> <?php echo $reswalkins['createdon']; ?> </td>
																						<td> <?php echo $reswalkins['createby']; ?> </td>
																						<td> <?php echo $reswalkins['updatedon']; ?> </td>
																						<td> <?php echo $reswalkins['updatedby']; ?> </td>
																						<td> <?php echo $reswalkins['branchid']; ?> </td>
																						<td><a href='edit_customer.php?cid=<?php echo $reswalkins['custid']; ?>'><button class="btn yellow">Edit</button></a>
																							<a href='delete_customer.php?cid=<?php echo $reswalkins['custid']; ?>'><button class="btn red">Delete</button></a></td>
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