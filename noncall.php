<?php
   include 'top.php'; 
   ?>
<div class="span9">
   <div class="content">
      <div class="module">
         <div class="module-head">
            <h3>Non Call Activity</h3>
         </div>
         <div class="module-body">
            <form action="backend_noncall.php" method="post" class="form-horizontal row-fluid">
			<?php $date = date_default_timezone_set('Asia/Kolkata');
                          $start_time = date("H:i:s"); ?>
						  <input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
						  <input type="hidden" name="start_time" value="<?php echo $start_time; ?>">
               <div class="control-group">
                  <label class="control-label" for="basicinput">Disposition</label>
                  <div class="controls">
                     <select tabindex="1" data-placeholder="Select here.." class="span8" name="disposition" required>
                        <option value="">Select here..</option>
                        <?php
							$noncall=mysqli_query($conn,"SELECT * FROM `noncall`");
							while ($row=mysqli_fetch_assoc($noncall)) { ?>
								<option><?php echo $row['name']; ?></option>
							<?php
							}
						?>
                     </select>
                  </div>
               </div>
               <div class="control-group">
                  <label class="control-label" for="basicinput">Remarks</label>
                  <div class="controls">
                     <textarea class="span8" rows="5" name="remarks" required></textarea>
                  </div>
               </div>
               <div class="control-group">
                  <div class="controls">
                     <button type="submit" class="btn" name="submit">Submit Form</button>
                  </div>
               </div>
            </form>
             <hr>

			 <table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  
									  <th>Date</th>
									  <th>call start</th>
									  <th>call end</th>
									  <th>call duration</th>
									  <th>Disposition</th>
									  <th>Remarks</th>
									</tr>
								  </thead>
								  <tbody>
									 <?php

                     $sql = "SELECT * FROM `nonactivity` WHERE `lead`=$emp_id order by id DESC LIMIT 10";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['time'] . "</td>";
                                echo "<td>" . $row['callend'] . "</td>";
								echo "<td>" . $row['cduration'] . "</td>";
								echo "<td>" . $row['disposition'] . "</td>";
                                echo "<td>" . $row['remarks'] . "</td>";
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
         <!--/.module-->
      </div>
      <!--/.content-->
   </div>
</div>
<!--/.span9-->
<?php
   include 'footer.php';
   ?>