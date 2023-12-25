<?php
session_start();
include 'conn.php';
include 'include/function.php';
include 'top.php';
//include 'include/xconnection.php';
$msg="";
if ($_SESSION['emp_id'] == true) {
  echo "";
} else {
  header('location:index.php');
}



$emp_id = $_SESSION['emp_id'];
$process = $_SESSION['process'];


$sql_query=mysqli_query($conn,"SELECT * FROM `employee` where emp_id=$emp_id");

$row=mysqli_fetch_assoc($sql_query);

//job information

$emp_id=$row['emp_id'];
$role=$row['role'];
$position=$row['position'];
$tl=$row['tl'];
$doj=$row['doj'];
$omail=$row['omail'];
$salary=$row['salary'];
$salary_date=$row['salary_date'];


//persomnal information


$name=$row['name'];
$dob=$row['dob'];
$pmail=$row['pmail'];
$address=$row['address'];
$pmaddress=$row['pmaddress'];
$contact=$row['contact'];
$bgroup=$row['bgroup'];
$gender=$row['gender'];
$marital=$row['marital'];
$kids=$row['kids'];
$dom=$row['dom'];


//bank information 

$bname=$row['bname'];
$baccount=$row['baccount'];
$bifc=$row['bifc'];





//contact information
$pcontact=$row['pcontact'];
$wnumuber=$row['wnumber'];


?>





				<div class="span9">
					<div class="content">

							<!-- Start View part -->

									<div class="module-head">
								

								<ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Job Information</a></li>
                                    <li><a href="#friends" data-toggle="tab">Personal Information</a></li>
                                     <li><a href="#bank" data-toggle="tab">Bank Information</a></li>
                                     <li><a href="#emergency" data-toggle="tab">Emergency Contact</a></li>
                                </ul>
							</div>

									
                                 


                                   <!-- Table View part -->

                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">
                              
                               <div class="module">

                                  	<div class="module-body">

                                  		

                              <div class="control-group">
											<label class="control-label" for="basicinput">Emp_id</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" placeholder="Type Emp_id....." data-original-title="" name="emp_id"  class="span8 " value="<?php echo $emp_id ?>" readonly>
											
											</div>
											
										</div>


											<div class="control-group">
											<label class="control-label" for="basicinput">Role</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span4" name="role" readonly>
													<option value="<?php echo $role ?>" ><?php echo $role ?></option>
													<option >Production</option>
													<option >Support</option>
													
												</select>
											</div>
										</div>

											<div class="control-group">
											<label class="control-label" for="basicinput">Position</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="position"  placeholder="" class="span6" value="<?php echo $position ?>" readonly>
												</div>
											</div>
										</div>
										
                                      <div class="control-group">
											<label class="control-label" for="basicinput">Team Leader</label>
											<div class="controls">
													<select tabindex="1" data-placeholder="Select here.." class="span6" name="tl" readonly>
													<option value="<?php echo $tl; ?>" ><?php echo $tl ?></option>
													
												
												
												</select>
											</div>
											
										</div>

										  <div class="control-group">
											<label class="control-label" for="basicinput">Date of Joining</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="date" name="doj" placeholder="" data-original-title="" class="span6 " value="<?php echo $doj ?>" readonly>
											</div>
										</div>

											<div class="control-group">
											<label class="control-label" for="basicinput">Official Mail Id</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="omail"  placeholder="" class="span6" value="<?php echo $omail ?>" readonly>
												</div>
											</div>
										</div>

										  <div class="control-group">
											<label class="control-label" for="basicinput">Salary Date</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="text" name="salary_date" placeholder="" data-original-title="" class="span6 " value="<?php echo $salary_date ?>" readonly>
											</div>
										</div>

											<div class="control-group">
											<label class="control-label" for="basicinput">Salary</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="salary"  placeholder="" value="<?php echo  $salary ?>"  class="span4" readonly>
												</div>
											</div>
										</div>

                                         	

										

                                </div>
                            </div>

                               


                             


                            

                                </div>


                                <!-- End Table View  -->



                                <!-- personal View part -->


								  <div class="tab-pane fade" id="friends">
                              

                                  <div class="module">

                                  	<div class="module-body">

                               
                               
                                   <!--body start -->


                                     <form action="update_emp.php" method="post">

                                        <input type="hidden" name="id"  value="<?php echo $emp_id ; ?>">
                                     
											<div class="control-group">
											<label class="control-label" for="basicinput">Full Name</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="name"  placeholder="" class="span8" value="<?php echo $name ?>" readonly>
												</div>
											</div>
										</div>

											<div class="control-group">
											<label class="control-label" for="basicinput">Contact No</label>
											<div class="controls">
												<div class="input-prepend">
												<input class="span6" type="text" name="contact" in="contact" placeholder="Contact Number" value="<?php echo $contact ?>"> 
												    
												</div>
											</div>
										</div>

										 <div class="control-group">
											<label class="control-label" for="basicinput">Date of Birth</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" name="dob" id="dob" placeholder="" data-original-title="" class="span6 " value="<?php echo $dob ?>">
												
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Personal Mail Id</label>
											<div class="controls">
												<div class="input-append">
													<input type="email" name="pmail" placeholder="" class="span8" value="<?php echo $pmail ?>">
												</div>
											</div>
										</div>


										 <div class="control-group">
											<label class="control-label" for="basicinput">Present Address</label>
											<div class="controls">
												<textarea class="span8" rows="3" name="address"><?php echo $address ?></textarea>
											</div>
										</div>

										 <div class="control-group">
											<label class="control-label" for="basicinput">Permanent Address</label>
											<div class="controls">
												<textarea class="span8" rows="3" name="pmaddress"><?php echo $pmaddress ?></textarea>
											</div>
										</div>

											<div class="control-group">
											<label class="control-label" for="basicinput">Blood Group</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span8" name="bgroup">
													<option value="<?php echo $bgroup ?>"><?php echo $bgroup ?></option>
													<option value="A+">A+</option>
													<option value="A-">A-</option>
													<option value="B+">B+</option>
													<option value="B-">B-</option>
													<option value="AB+">AB+</option>
													<option value="AB-">AB-</option>
													<option value="O+">O+</option>
													<option value="O-">O-</option>
												</select>
											</div>
										</div>
                                            <div class="control-group">
											<label class="control-label">Gender</label>
											<div class="controls">
											   	<select tabindex="1" data-placeholder="Select here.." class="span8" name="gender">
													<option value="<?php echo $gender ?>"><?php echo $gender ?></option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
													
												</select>
											</div>
										</div>

											<div class="control-group">
											<label class="control-label">Marital Status </label>
											<div class="controls">
												<?php 
												if($row['marital']=='Married')
												{
												?>
												<label class="radio inline">
													<input type="radio" name="marital" id="marital1" value="Married" checked>
													Married
												</label> 
												<label class="radio inline">
													<input type="radio" name="marital" id="marital2" value="Unmarried">
													Unmarried
												</label> 
												<?php } else { ?>
												<label class="radio inline">
													<input type="radio" name="marital" id="marital1" value="Married" active>
													Married
												</label> 
												<label class="radio inline">
													<input type="radio" name="marital" id="marital2" value="Unmarried" checked>
													Unmarried
												</label>
												<?php } ?>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Kids</label>
											<div class="controls">
												<div class="input-append">
													<input type="number" name="kids" placeholder="" class="span4" value="<?php echo $kids ?>">
												</div>
											</div>
										</div>

										 <div class="control-group">
											<label class="control-label" for="basicinput">Date of Marriage</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="date" name="dom" id="dob" placeholder="" data-original-title="" class="span6 " value="<?php echo $dom ?>">
												
											</div>
										</div>

											<div class="control-group">
										 <button type="submit" name="personal" class="btn btn-success btn-left">Update</button>
										</div>

									</form>
                            
                          
                           <!--body end -->
                            

                      </div>

                                </div>  




                                        </div>

                                          <!-- End personal View part -->


                                          <!-- bank View part -->


								  <div class="tab-pane fade" id="bank">
                              

                                  <div class="module">

                                  	<div class="module-body">

                               
                               
                                   <!--body start -->



                            <form action="update_emp.php" method="post">

                            	 <input type="hidden" name="id"  value="<?php echo $emp_id ; ?>">
                            <div class="control-group">
											<label class="control-label" for="basicinput">BanK Name</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" name="bname" id="bname" placeholder="Type bank name here....." data-original-title="" class="span8 " value="<?php echo $bname; ?>">
											</div>
										</div>

										  <div class="control-group">
											<label class="control-label" for="basicinput">Account Number</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" name="baccount" placeholder="Type Account number here....." data-original-title="" class="span8" value="<?php echo $baccount; ?>">
											</div>
										</div>

										  <div class="control-group">
											<label class="control-label" for="basicinput">IFC Code</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" name="bifc" id="bifc" placeholder="Type IFC code here....." data-original-title="" class="span8 " value="<?php echo $bifc; ?>">
											</div>
										</div>

											<div class="control-group">
											<label class="control-label">Upload Documents</label>
											<div class="controls">
												<?php if($row['documents'] == 'Photos,') {?>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Photos" checked>
													Photos
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Adhar card">
													Adhar card
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Pan card">
													Pan Card
												</label>
												<?php } elseif($row['documents'] == 'Adhar card,') {?>
													<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Photos">
													Photos
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Adhar card" checked>
													Adhar card
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Pan card">
													Pan Card
												</label>

											<?php } elseif($row['documents'] == 'Pan card,') {?>
													<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Photos">
													Photos
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Adhar card">
													Adhar card
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Pan card".. checked>
													Pan Card
												</label>

												<?php } elseif($row['documents'] == 'Photos,Adhar card,') {?>
													<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Photos" checked>
													Photos
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Adhar card" checked>
													Adhar card
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Pan card">
													Pan Card
												</label>

												<?php } elseif($row['documents'] == 'Photos,Pan card,') {?>
													<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Photos" checked>
													Photos
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Adhar card" checked>
													Adhar card
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Pan card">
													Pan Card
												</label>

												<?php } elseif($row['documents'] == 'Adhar card,Pan card,') {?>
													<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Photos">
													Photos
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Adhar card" checked>
													Adhar card
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Pan card" checked>
													Pan Card
												</label>
												<?php } elseif($row['documents'] == 'Photos,Adhar card,Pan card,') {?>
													<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Photos" checked>
													Photos
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Adhar card" checked>
													Adhar card
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Pan card" checked>
													Pan Card
												</label>


												<?php } else { ?>
													<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Photos">
													Photos
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Adhar card">
													Adhar card
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="chk[ ]" value="Pan card">
													Pan Card
												</label>
												<?php }?>

											</div>
										</div>

 
                               	<div class="control-group">
										 <button type="submit" name="bank" class="btn btn-success btn-left">Update</button>
										</div>

										</form>
											
                          
                           <!--body end -->
                            

                      </div>

                                </div>  




                                        </div>

                                          <!-- End bank View part -->


                                              <!-- Emergency View part -->


								  <div class="tab-pane fade" id="emergency">
                              

                                  <div class="module">

                                  	<div class="module-body">

                               
                               
                                   <!--body start -->
                                   <form action="update_emp.php" method="post">
                                   	 <input type="hidden" name="id"  value="<?php echo $emp_id ; ?>">
										<div class="control-group">
											<label class="control-label" for="basicinput">Emergency Contact No.</label>
											<div class="controls">
												<div class="input-prepend">
												<input class="span8" type="text" name="pcontact" id ="pcontact" placeholder="Parents Number" value="<?php echo $pcontact ?>"> 
													     
												</div>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Whos's Number</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span6" name="wnumber">
													<option value="<?php echo $wnumber ?>"><?php echo $wnumuber ?></option>
													<option value="Fathers Number">Fathers Number</option>
													<option value="Mothers Number">Mothers Number</option>
													<option value="Husband Number">Husband Number</option>
													<option value="Brother Number">Brother Number</option>
													<option value="Others Number">Others Number</option>
												
												</select>
											</div>
										</div>

 
                                     	<div class="control-group">
										 <button type="submit" name="emergency" class="btn btn-success btn-left">Update</button>
										</div>
											
                                  </form>

                           <!--body end -->
                            

                      </div>

                                </div>  




                                        </div>

                                          <!-- End emergency View part -->






                                  </div>
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright"> <?php echo date ('Y'); ?> Ensomerge - Ensomerge.com </b> All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>

