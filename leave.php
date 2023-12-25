<?php
   include 'top.php';
   
   
   $emp_id = $_SESSION['emp_id'];
   $process = $_SESSION['process'];
   
   $user=mysqli_query($conn,"SELECT * from emp where emp_id ='$emp_id'  ") ;
   $query=mysqli_fetch_array($user);
   $username=$query['emp'];
   $tl=$query['tl'];
   
   if ($tl=='') {
   	$tl='HR';
   }
   
   if($tl=='Riya') {
   	$to_email='riya@ensomerge.com';
   }elseif ($tl=='Jincy') {
   	$to_email='jincy@ensomerge.com';
   }else{
   	$to_email='mukund.mukesh@ensomerge.com';
   }
   
   if (isset($_POST['submit'])) {
   	$name=$conn -> real_escape_string($_POST['name']);
   	$date= $_POST['date'];
   	$todate= $_POST['todate'];
   	$no= $conn -> real_escape_string($_POST['no_of_days']);
   	$type= $conn -> real_escape_string($_POST['type']);
   	$remarks= $conn -> real_escape_string($_POST['remarks']);
   
   	date_default_timezone_set("Asia/kolkata");
       $applydate= date("d:m:Y h:i:sa");
       $curl = curl_init();
   
   curl_setopt_array($curl, [
     CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "POST",
     CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$tl\",\n      \"email\": \"$to_email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"BookMysales\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"jincy@ensomerge.com\"\n    },\n    {\n      \"email\": \"priyanshu.mishra@ensomerge.com\"\n    }\n  ],\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n\n  \"template_id\": \"4362\",\n  \"variables\": {\n    \"VAR1\": \"$applydate\",\n    \"VAR2\": \"$emp_id\",\n    \"VAR3\": \"$username\",\n    \"VAR4\": \"$date\",\n    \"VAR5\": \"$todate \",\n    \"VAR6\": \"$type\",\n    \"VAR7\": \"$remarks\",\n    \"VAR8\": \"$name\"\n  },\n  \"authkey\": \"372323AjwXe2wBhWIR61efa85aP1\"\n}",
     CURLOPT_HTTPHEADER => [
       "Accept: application/json",
       "Content-Type: application/JSON"
     ],
   ]);
   	$sqlleave="INSERT INTO `leavea` (`emp_id`, `emp_name`, `date`,`todate`, `type`, `remarks`, `status`,`hr_remarks`,`created_by`,`no_of_days`) VALUES ('$emp_id', '$name', '$date','$todate', '$type', '$remarks','0',NULL,'$name','$no')";
   
   
         if (mysqli_query($conn, $sqlleave)) {
            $response = curl_exec($curl);
            //$err = curl_error($curl);
            curl_close($curl);
   
               echo '<script type="text/javascript">
               ';
               echo 'alert("Leave  Added Sucessfully");';
             
               echo '
               </script>';
           } else {
               echo '<script type="text/javascript">
               ';
               echo 'alert("Adding Leave Failed");';
              
               echo '
               </script>';
           }
   
   }
   
   ?>
               <!--/.span3-->
               <div class="span9">
                  <div class="content">
                     <div class="module">
                        <div class="module-head">
                           <h3>Leave Form</h3>
                        </div>
                        <div class="module-body">
                           <form action="" method="post" class="form-horizontal row-fluid">
                              <div class="control-group">
                                 <label class="control-label" for="basicinput">Name</label>
                                 <div class="controls">
                                    <input type="text" id="basicinput" placeholder="" class="span8"    name="name" value="<?php echo $username ?>">
                                 </div>
                              </div>
                              <div class="control-group">
                                 <label class="control-label" for="basicinput">From Date</label>
                                 <div class="controls">
                                    <input data-title="A tooltip for the input" type="date" placeholder="" data-original-title="" class="span8 tip" name="date" required> 
                                 </div>
                              </div>
                              <div class="control-group">
                                 <label class="control-label" for="basicinput">To Date</label>
                                 <div class="controls">
                                    <input data-title="A tooltip for the input" type="date" placeholder="" data-original-title="" class="span8 tip" name="todate">
                                 </div>
                              </div>
                              <div class="control-group">
                                 <label class="control-label" for="basicinput">No of Days Leave</label>
                                 <div class="controls">
                                 <select tabindex="1" data-placeholder="Select here.." class="span8" name="no_of_days" required>
                                       <option value="">Select here..</option>
                                       <option value="0.5">Half day</option>
                                       <option>1</option>
                                       <option>2</option>
                                       <option>3</option>
                                       <option>4</option>
                                       <option>5</option>
                                       <option>6</option>
                                       <option>7</option>
                                       <option>8</option>
                                       <option>9</option>
                                       <option>10</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="control-group">
                                 <label class="control-label" for="basicinput">Type</label>
                                 <div class="controls">
                                    <select tabindex="1" data-placeholder="Select here.." class="span8" name="type" required>
                                       <option value="">Select here..</option>
                                       <option value="Sick">Sick</option>
                                       <option value="Native">Native</option>
                                       <option value="Personal ">Personal</option>
                                       <option value="Travel">Travel</option>
                                       <option value="Medical emergency">Medical emergency</option>
                                       <option value="Family occasion">Family occasion</option>
                                       <option value="Study/Exam">Study/Exam</option>
                                       <option value="Festival">Festival</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="control-group">
                                 <label class="control-label" for="basicinput">Remarks</label>
                                 <div class="controls">
                                    <textarea class="span8" rows="5" name="remarks"></textarea>
                                 </div>
                              </div>
                              <div class="control-group">
                                 <div class="controls">
                                    <button type="submit" class="btn" name="submit">Submit Form</button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <br>
                           <table class="table table-striped table-bordered table-condensed">
                              <thead>
                                 <tr>
                                    <th>Date</th>
                                    <th>No of days</th>
                                    <th>Type</th>
                                    <th>Remarks</th>
                                    <th>Hr Remarks</th>
                                    <th>Status</th>
                                    <th>Created by</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $sql = "SELECT * FROM leavea where emp_id='$emp_id' ORDER BY date desc";
                                    if ($result = mysqli_query($conn, $sql)) {
                                       if (mysqli_num_rows($result) > 0) {
                                    
                                           while ($row = mysqli_fetch_array($result)) {
                                               echo "<tr>";
                                               echo "<td>" . $row['date'] . "</td>";
                                               echo "<td>" . $row['no_of_days'] . "</td>";
                                               echo "<td>" . $row['type'] . "</td>";
                                               echo "<td>" . $row['remarks'] . "</td>";
                                                 echo "<td>" . $row['hr_remarks'] . "</td>";
                                               
                                                if ($row['status']==0) {
                                                	echo "<td>" . "Pending". "</td>";
                                                }elseif ($row['status']==1) {
                                                	echo "<td>" . "Approved". "</td>";
                                                }else{
                                                	echo "<td>" . "Rejectd". "</td>";
                                                }
                                                echo "<td>" . $row['created_by'] . "</td>";
                                               echo "</tr>";
                                           }
                                           echo "</table>";
                                           // Free result set
                                           mysqli_free_result($result);
                                       } else {
                                           echo "No records matching your query were found.";
                                       }
                                    } else {
                                       echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                    }
                                    ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <!--/.content-->
               </div>
               <!--/.span9-->
            </div>
         </div>
         <!--/.container-->
      </div>
      <!--/.wrapper-->
      <div class="footer">
         <div class="container">
            <b class="copyright"> <?php echo date('Y'); ?> Ensomerge - Ensomerge.com </b> All rights reserved.
         </div>
      </div>
      <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
      <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
      <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
   </body>