<?php
session_start();
include 'conn.php';
//include 'include/xconnection.php';
if ($_SESSION['emp_id'] == true) {
  echo "";
} else {
  header('location:index.php');
}
$emp_id = $_SESSION['emp_id'];

$sql=mysqli_query($conn,"SELECT * FROM `employee` where emp_id='$emp_id'");
$profile=mysqli_fetch_assoc($sql);

function dateDiffInDays($date1, $date2)
{
	$diff = strtotime($date2) - strtotime($date1);
	return abs(round($diff / 86400));
}

$doj=$profile['doj'];
$date=date('Y-m-d');
$dateDiff = dateDiffInDays($doj, $date);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ensomerge</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="empdashboard.php">
			  		Ensomerge
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="icon-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-bar-chart"></i>
						</a></li>
					</ul>

					<form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="icon-search"></i>
						</button>
					</form>
				
					 <ul class="nav pull-right">
					 
                        <li><a href="#"><?php echo $profile['name']; ?> </a></li>
                        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            	<?php 
					 	if ($profile['image']==NULL || $profile['image']=='') { ?>
					 		 <img src="images/user.png" class="nav-avatar" />
                            <b class="caret"></b></a>
					 		
					 	<?php }else{?>
					 		 <img src="<?php echo PROFILE_IMAGE_SITE_PATH.$profile['image'];?>" class="nav-avatar" />
                            <b class="caret"></b></a>

					 	<?php
					 }
					 	?>
                           

                            <ul class="dropdown-menu">
                                <li><a href="myaccount.php">Your Profile</a></li>
                                <li><a href="profile.php">Edit Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">
							<li class="active">
								<a href="empdashboard.php">
									<i class="menu-icon icon-dashboard"></i>
									Dashboard
								</a>
							</li>

<li>
								<a href="cmreport.php" >
									<i class="menu-icon icon-bullhorn"></i>
									Call Monitoring Report
								</a>
							</li>

                                                  <li>
								<a href="noncall.php" >
									<i class="menu-icon icon-bullhorn"></i>
									NonCallActivity
								</a>
							</li>

	                   <li>
								<a href="activity.php">
								<i class="menu-icon icon-table"></i>
								Enso Post
							 </a>
							</li>

							<li>
								<a href="pdf/Holiday_list.pdf" target="_blank">
									<i class="menu-icon icon-bullhorn"></i>
									Holiday List
								</a>
							</li>


                                                           <li>
								<a href="2023/may23/may23.htm" target="_blank">
									<i class="menu-icon icon-bullhorn"></i>
									Monthly Roster 
								</a>
							</li>


                                              <li><a class="collapsed" data-toggle="collapse" href="#Employee"><i class="menu-icon icon-paste">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Company Policies</a>
                                    <ul id="Employee" class="collapse unstyled">
					<li><a href="pdf/MobilePhoneRechargereimburceme.pdf" target="_blank"><i class="icon-inbox"></i>Mobile Phone Recharge Bill Reimbursement Policy
 </a></li>
                                     <!--   <li><a href="#"><i class="icon-inbox"></i>Awards </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>Resignation </a></li>-->
                                       


                                    </ul>
                                </li>
							<!-- <li>
								<a href="#">
									<i class="menu-icon icon-inbox"></i>
									 Incentives
									<b class="label green pull-right">11</b>
								</a>
							</li> -->
							
							<!-- <li>
								<a href="#">
									<i class="menu-icon icon-tasks"></i>
									Tasks
									<b class="label orange pull-right">19</b>
								</a>
							</li> -->
							<li>
								<a href="process_update.php">
								<i class="menu-icon icon-table"></i>
								Process Update
							 </a>
							</li>
                                <li>
                                	<a href="leave.php">
                                		<i class="menu-icon icon-bar-chart"></i>
                                		Leave Request
                                		 </a>
                                	</li>

								<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul><!--/.widget-nav-->

					
						

					</div><!--/.sidebar-->
				</div><!--/.span3-->
