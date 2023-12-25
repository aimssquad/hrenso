<?php

include 'top.php';
//include 'include/xconnection.php';


$msg='';





$date1=date('Y-m-01');
$date2=date('Y-m-31');
//echo "$process";

$user=mysqli_query($conn,"SELECT * from emp where emp_id ='$emp_id'  ") ;
$query=mysqli_fetch_array($user);
$username=$query['emp'];
//echo "$username";


 $sql="SELECT * from present where emp_id ='$emp_id' and date between '$date1' and '$date2' order by date asc" ;
 $res=mysqli_query($conn,$sql);
?>




				<div class="span9">
					<div class="content">


           <!-- Alert Start  -->

            <?php 

               $alert_sql="SELECT * FROM `employee` where emp_id='$emp_id'" ;
               $alert_res=mysqli_fetch_assoc(mysqli_query($conn,$alert_sql));

               $pmail=$alert_res['pmail'];
               $omail=$alert_res['omail'];
               $doj=$alert_res['doj'];
               $dob=$alert_res['dob'];
               $contact=$alert_res['contact'];

             
              

            ?>




          <div class="module">
							<div class="module-head">
								<h3 style="color:red"><i class="icon-bell"></i> Alert</h3>
							</div>
							<div class="module-body">


<div class="col-xs-4">

									 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>New Post(Jincy) </strong><a href="activity.php" style="color:red"> - Click to see</a>
									</div>

								</div>

							
									<div class="col-xs-4">


                   <?php
                         if ($pmail=='' || $omail=='') { ?>
                         <div class="alert">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Warning!</strong> please update your mail id <a href="profile.php"> -Click here</a>
									</div>

                         	<?php
                         }
                   ?>

                      <?php
                         if ($contact=='' || $doj=='' || $dob=='') { ?>
                  	
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Warning!</strong> Something is missing Plese click here and filled the details<a href="profile.php"> - Click here</a>
									</div>

									 	<?php
                         }
                   ?>

                  <?php
                         if ($contact!='' && $doj!='' && $dob!='' && $pmail!='' && $omail!='') { ?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Well done!</strong> Your profile is complete :) 
									</div>

										<?php
                         }
                   ?>

            
            </div>

          </div>
          </div>


          <!-- Alert End  -->
          

        <div class="row">
         

       
                 	<div class="module  span4">
					<form action="sigin.php" class="form-vertical" method="post">
						<div class="module-head">
							<h3>Attandance</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
								
								<div class="login-logo">
  		<h1 id="date"></h1>
      <h2 id="time" class="bold"></h2>
  	</div>
  	<?php
               
              $date=date('Y-m-d');

             $type_query1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `present` WHERE `emp_id`='$emp_id' and `date`='$date'"));

             $login=$type_query1['login'];
             $logout=$type_query1['logout'];

             ?>


								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
								<p style="margin-top:5px;margin-left:10px;color: green;">Signin Time : <?php  echo $login  ?> </p>
								</div>
							</div>

							<div class="control-group">
								<div class="controls row-fluid">
								<p style="margin-top:5px;margin-left:10px;color: green;">Signout Time : <?php  echo $logout;  ?> </p>
								</div>
							</div>

             <input type="hidden" name="employee" value="<?php echo $emp_id ; ?>">

             <?php 

             $date=date('Y-m-d');

             $type_query=mysqli_fetch_assoc(mysqli_query($conn,"SELECT `type` FROM `present` WHERE `emp_id`='$emp_id' and `date`='$date'"));

             $type_result=$type_query['type'];

             if ($type_result=='') {
             	  $type=0;
             }else{
             	$type=1;
             }




             ?>

          
            <input type="hidden" name="type" value="<?php echo $type ; ?>">

						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
               
               <?php 

                 $type_result=$type_query['type'];


                // echo 'type result - '. $type_result;

               if($type_result==''){ ?>

                  	<button type="submit"  name="signin" class="btn btn-primary pull-right">Signin</button>
               	<?php
               }elseif($type_result==0){	
                   $msg= "Logged in.Have a nice day ".$username." ".":)";

               	?>

               		<button type="submit"  name="signin" class="btn btn-primary pull-right">Signout</button>

               	<?php
               }else{

                  $msg= "Logged Out.Thank you for your time :".$username." ".":)";
               }

               ?>

								
								
								</div>
							</div>
						</div>

					</form>
					<div class="control-group">
						<div class="controls row-fluid">
									<p style="margin-top:5px;margin-left:10px;color: green;"><?php echo $msg ?></p>
								</div>
							</div>
				</div>
			

       
		</div>




           


						<!--login logout  start-->


         
         
          <!--login logout  start-->

						<div class="module">
							<div class="module-head">
								<h3>Tables</h3>
							</div>
							<div class="module-body">
								<p>
									<strong>Attendance</strong>
									
									<small>No of presents day<?php echo (" :" . mysqli_num_rows($res));  ?></small>
								</p>
								<table class="table">
								  <thead>
									<tr>
									 <th>Emp_id</th>
									  <th>Date</th>
									  
									  <th>Login</th>
									  <th>Logout</th>
									  </tr>
								  </thead>
								  <tbody>
									
                             <?php
                                    

                                  
                                  
                                    
                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                       <td><?php  echo $row['emp_id'];  ?></td>
                                       <td> <?php  echo $row['date'];  ?> </td>
                                       <td> <?php  echo $row['login'];  ?> </td>
                                       <td> <?php  echo $row['logout'];  ?></td>
                                                                             
                                      </tr>
                                       <?php   }  ?>
									
								  </tbody>
								</table>

								<br />
								<!-- <hr /> -->
								<br />

								<p>
									<strong>Productivity</strong>
									-
									<small>Report(Last 10 days)</small>
								</p>
								<table class="table table-striped">
								  <thead>
									<tr>
									 
									  <th>Date</th>
									  <th>Dials</th>
									  <th>Connect</th>
									  <th>NotConnect</th>
									  <th>Time</th>
									</tr>
								  </thead>
								  <tbody>
									<?php
				$user=mysqli_connect('localhost','root','','users');
				$tv=mysqli_connect('localhost','root','','tv');
				//$bluewater=mysqli_connect('localhost','root','','bluewater');
				

				if ($process=='B2B') {
					
				

						$sql="SELECT lead,date1 as date,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as notconnect FROM worksheet WHERE  date1 between '$date1' and '$date2' and lead='$username' GROUP BY date1 order by date1 desc limit 10";
						$result=mysqli_query($user,$sql);
					}

					elseif ($process=='Reva') {

						$sql="SELECT associate,date as date,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('No Response','No Response Closed') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('No Response','No Response Closed') then 1 else 0 end) as notconnect FROM rworksheet WHERE  date between '$date1' and '$date2' and associate='$username' GROUP BY date order by date desc limit 10";
						$result=mysqli_query($tv,$sql);
						
					}

			

					elseif ($process=='TV/TB/Eset') {

						$sql="SELECT lead,date1 as date,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as notconnect FROM worksheet WHERE  date1 between '$date1' and '$date2' and lead='$username' GROUP BY date1 order by date1 desc limit 10";
						$result=mysqli_query($tv,$sql);
						
					}

					else{

                       $sql="SELECT lead,date1 as date,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as notconnect FROM worksheet WHERE  date1 between '$date1' and '$date2' and lead='$username' GROUP BY date1 order by date1 desc limit 0";
						$result=mysqli_query($tv,$sql);

					}
					
						while ($row=mysqli_fetch_array($result)):
							?>
							<tr>
								
								<td><?php echo $row['date']; ?></td>
								<td><?php echo $row['ids']; ?></td>
								<td><?php echo $row['connect']; ?></td>
								<td><?php echo $row['notconnect']; ?></td>
							
								<td><?php echo $row['timeSum']; ?></td>
							</tr>

						  <?php endwhile; ?>

								  </tbody>
								</table>

						
								<br />
								<!-- <hr /> -->
								<br />

								<p>
									<strong>Productivity</strong>
									-
									<small>Monthly(Recent Months)</small>
								</p>
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th>Name</th>
									  <th>Date</th>
									  <th>Dials</th>
									  <th>Connect</th>
									  <th>NotConnect</th>
									  <th>Time</th>
									</tr>
								  </thead>
								  <tbody>
									<?php
				//$user=mysqli_connect('localhost','root','','users');

				if ($process=='B2B') {
					
				

						$sql="SELECT lead,date1 as date,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as notconnect FROM worksheet WHERE  date1 between '$date1' and '$date2' and lead='$username' ";
						$result=mysqli_query($user,$sql);
					}elseif($process=='Reva'){

					 $sql="SELECT associate,date as date,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('No Response','No Response Closed') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('No Response','No Response Closed') then 1 else 0 end) as notconnect FROM rworksheet WHERE  date between '$date1' and '$date2' and associate='$username'";
						$result=mysqli_query($tv,$sql);
					}
					elseif($process=='TCN'){

					  $sql="SELECT associate,date as date,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('No Answer','Wrong Number') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('No Answer','Wrong Number') then 1 else 0 end) as notconnect FROM rworksheet WHERE  date between '$date1' and '$date2' and associate='$username' ";
						$result=mysqli_query($tcn,$sql);
					}
					elseif($process=='TV/TB/Eset'){

					  $sql="SELECT lead,date1 as date,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as notconnect FROM worksheet WHERE  date1 between '$date1' and '$date2' and lead='$username' ";
						$result=mysqli_query($tv,$sql);
					}else{

						$sql="SELECT lead,date1 as date,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('Busy','RNR','Not Reachable','Not Relevant','Switched off') then 1 else 0 end) as notconnect FROM worksheet WHERE  date1 between '$date1' and '$date2' and lead='$username'  limit 0";
						$result=mysqli_query($tv,$sql);

					}
					
						while ($row=mysqli_fetch_array($result)):
							?>
							<tr>
								<td><?php echo $row['lead']; ?></td>
								<td><?php echo $row['date']; ?></td>
								<td><?php echo $row['ids']; ?></td>
								<td><?php echo $row['connect']; ?></td>
								<td><?php echo $row['notconnect']; ?></td>
							
								<td><?php echo $row['timeSum']; ?></td>
							</tr>

						  <?php endwhile; ?>

								  </tbody>
								</table>

						
					
							
						
							</div>
						</div>

					</div>
				</div><!--/.span9-->
			</div>
		</div>


<?php include 'footer.php'; ?>
