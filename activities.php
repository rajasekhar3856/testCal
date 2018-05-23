<?php
	session_start();
	include "dbconn.php";
	if(isset($_POST['singlebutton']))
	{
		$calltype = $_POST['CallType'];
		$aname = $_POST['AName'];		
		$adate = $_POST['ADate'];
		$description = $_POST['description'];
		$insert=mysqli_query($connect,"insert into tblactivities (activityname,activitydate,status,userid,activitytype,description) values('$aname','$adate','active','2','$calltype','$description')");
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
                                    <a href="#">Home</a>
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
                                        
                                             <div class="col-lg-9">
                                                    <div id='calendar'></div>
                                            </div>
                                            
                                                <div class="col-lg-3">
                                                    <h2>Quick Activity</h2>
                                                <form action="" method="POST" class="form-horizontal">
                                                            <div class="form-group">
                                                              
                                                              <div class="col-md-12">
                                                                <select id="CallType" name="CallType" class="form-control">
                                                                  <option value="" selected>Select Call Type</option>
                                                                  <option value="Phone Call">Phone Call</option>
                                                                  <option value="Meeting">Meeting</option>
                                                                  <option value="Email">Email</option>
                                                                </select>
                                                              </div>
                                                            </div>
                                                            
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                              
                                                              <div class="col-md-12">
                                                              <input id="AName" name="AName" type="text" placeholder="Enter Title" class="form-control input-md" required="">
                                                                
                                                              </div>
                                                            </div>
                                                            
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                              
                                                              <div class="col-md-12">
                                                              <input id="ADate" name="ADate" type="date" placeholder="" class="form-control input-md" required="">
                                                                
                                                              </div>
                                                            </div>
                                                            
                                                            <!-- Textarea -->
                                                            <div class="form-group">
                                                              
                                                              <div class="col-md-12">                     
                                                                <textarea class="form-control" id="Description" name="Description" placeholder="description"></textarea>
                                                              </div>
                                                            </div>
                                                            <div class="form-group">
                                                              
                                                              <div class="col-md-4">
                                                                <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary btn-large" value="Add Event">
                                                              </div>
                                                            </div>
                                                	
                                                </form>
												</div>
                                            </div>
                                        </div>
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
			$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: new Date(),
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: 'eventsdata.php',
			
			eventClick: function(events) {
				fullCalendar( 'getEventSourceById', id )
				url1 = 'eventsdata.php'+url;
				window.open(events.url);
				return false;
			},
			
		  });
			
		});
</script>
    </body>

</html>