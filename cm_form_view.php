<?php 
   include 'top.php';
  // include 'connection.inc.php';
   
   ?>
<style>
   table{
   width: 100%;
   }
   h4{
   color: white;
   }
   .heading-color{
   background: purple;
   color: white;
   }
</style>
<?php 
   $id=$_GET['id'];
   
   $cm_query=mysqli_query($conn,"SELECT cmreport.*,employee.name as name FROM `cmreport`,employee WHERE cmreport.cm_empid=employee.emp_id and cmreport.id=$id");
   $cm_result=mysqli_fetch_assoc($cm_query);
   
   ?>
<div class="span9">
<div class="content">
<div class="module">
<div class="module-body">
   <div class="profile-tab-content tab-content">
      <div class="tab-pane fade active in" id="activity">
         <div style="text-align:center;">
            <h3>Call Monitoring Report</h3>
         </div>
         <div style="margin:auto;width:100%;height: auto;">
            <table border="1px solid" class="table">
               <!-- CM_Report -->
               <tr>
                  <input type="hidden" name="cm_tl" value="Riya">
                  <th colspan="9" style="text-align:left;">TL Name : </th>
                  <th colspan="9">
                     <select name="cm_name" readonly>
                        <option value=""><?php echo $cm_result['cm_tl']; ?></option>
                     </select>
                  </th>
                  <th colspan="9">Call Date :</th>
                  <th colspan="9"><input type="text" name="cm_date" value="<?php echo $cm_result['cm_date']; ?>" readonly></th>
               </tr>
               <tr>
                  <th colspan="9">Customer/Company name :</th>
                  <th colspan="9"><input type="text" name="cm_company" value="<?php echo $cm_result['cm_company']; ?>" readonly></th>
                  <th colspan="9">Customer Phone No :</th>
                  <th collspan="9"><input type="text" name="cm_phoneno" value="<?php echo $cm_result['cm_phoneno']; ?>" readonly></th>
               </tr>
               <tr class="tr-inputs">
                   
                   <th colspan="9" style="text-align:left;">Audit Date : </th>
                   <th colspan="9"><input type="text" name="cm_auditdate" value="<?php echo $cm_result['cm_auditdate']; ?>" readonly></th>
                   <th colspan="9" style="text-align:left;">Call Recording File(mp3) : </th>
                   <th colspan="9">
                      <audio controls>
                         <source src="<?php echo AUDIO_SITE_PATH.$cm_result['cm_callrecord']; ?>" type="audio/mpeg">
                      </audio>
                   </th>
                </tr>
               <!-- CM_Report End -->
               <!--  Call guide sale  start  -->
               <tr>
                  <td colspan="36" style="text-align: center;background:red;">
                     <h4 >Call guide sale </h4>
                  </td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q1_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <td colspan="4" class="heading-color">Prospecting  <a class="btn btn-small btn-info" data-toggle="modal" href="#prospecting"  data-id="UserID123">Rubric</a></td>
                  <td colspan="4" class="heading-color">YES/No/N/A</td>
                  <td colspan="4" class="heading-color">Pts</td>
                  <td colspan="4" class="heading-color">Score</td>
                  <td colspan="12" class="heading-color">Note</td>
               </tr>
               <tr>
                  <input type="hidden" name="q1" value="Company within defined Geography As per Process">
                  <td colspan="4">Company within defined Geography As per Process</td>
                  <input type="hidden" name="q1_point" value="5">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q2_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q2" value="Sector / Segment matches Process Need">
                  <td colspan="4">Sector / Segment matches Process Need</td>
                  <input type="hidden" name="q2_point" value="10">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <!--  Call guide sale end  -->
               <!--  Making Contact start  -->
               <tr>
                  <td colspan="4" class="heading-color">Greeting(Making Contact)<a class="btn btn-small btn-info" data-toggle="modal" href="#greeting"  data-id="2">Rubric</a></td>
                  <td colspan="4" class="heading-color">YES/No/N/A</td>
                  <td colspan="4" class="heading-color">Pts</td>
                  <td colspan="4" class="heading-color">Score</td>
                  <td colspan="12" class="heading-color">Note</td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q3_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q3" value="Sector / Segment matches Process Need">
                  <td colspan="4">Was the company greeting followed</td>
                  <input type="hidden" name="q3_point" value="3">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q4_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q4" value="Sector / Segment matches Process Need">
                  <td colspan="4">Did the advisor give their name when relevant</td>
                  <input type="hidden" name="q4_point" value="2">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q5_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q5" value="Sector / Segment matches Process Need">
                  <td colspan="4">Did the advisor get the customer's name right and use it to personalize the call</td>
                  <input type="hidden" name="q5_point" value="3">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <!--  Making Contact sale end  -->
               <!--  Establishing Contact start  -->
               <tr>
               <td colspan="4" class="heading-color">Establishing Contact <a class="btn btn-small btn-info" data-toggle="modal" href="#establishing"  data-id="UserID123">Rubric</a></td>
                  <td colspan="4" class="heading-color">YES/No/N/A</td>
                  <td colspan="4" class="heading-color">Pts</td>
                  <td colspan="4" class="heading-color">Score</td>
                  <td colspan="12" class="heading-color">Note</td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q6_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q6" value="Sector / Segment matches Process Need">
                  <td colspan="4">Objective of Call Explained</td>
                  <input type="hidden" name="q6_point" value="4">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q7_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q7" value="Sector / Segment matches Process Need">
                  <td colspan="4">Usage of information from Website / Other Sites to build relevance</td>
                  <input type="hidden" name="q7_point" value="4">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q8_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q8" value="Sector / Segment matches Process Need">
                  <td colspan="4">Seeking permission to take the call further</td>
                  <input type="hidden" name="q8_point" value="2">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <!-- Establishing Contact end  -->
               <!--  Qualifying Prospect start  -->
               <tr>
               <td colspan="4" class="heading-color">Qualifying Prospect <a class="btn btn-small btn-info" data-toggle="modal" href="#analysis"  data-id="UserID123">Rubric</a></td>
                  <td colspan="4" class="heading-color">YES/No/N/A</td>
                  <td colspan="4" class="heading-color">Pts</td>
                  <td colspan="4" class="heading-color">Score</td>
                  <td colspan="12" class="heading-color">Note</td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q9_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q9" value="Sector / Segment matches Process Need">
                  <td colspan="4">Customer profiling accomplished</td>
                  <input type="hidden" name="q9_point" value="4">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q10_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q10" value="Understanding challenges and Goals">
                  <td colspan="4">Understanding challenges and Goals</td>
                  <input type="hidden" name="q10_point" value="6">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <!-- Qualifying Prospect end  -->
               <!--  Nurturing Prospect and Placement start  -->
               <tr>
               <td colspan="4" class="heading-color">Nurturing Prospect and Placement <a class="btn btn-small btn-info" data-toggle="modal" href="#nurturing"  data-id="UserID123">Rubric</a></td>
                  <td colspan="4" class="heading-color">YES/No/N/A</td>
                  <td colspan="4" class="heading-color">Pts</td>
                  <td colspan="4" class="heading-color">Score</td>
                  <td colspan="12" class="heading-color">Note</td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q11_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q11" value="Confirm Understanding of Need / Present State">
                  <td colspan="4">Confirm Understanding of Need / Present State</td>
                  <input type="hidden" name="q11_point" value="5">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q12_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q12" value="Place the product/service using features and benefits">
                  <td colspan="4">Place the product/service using features and benefits</td>
                  <input type="hidden" name="q12_point" value="10">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q13_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q13" value="Managing Objections">
                  <td colspan="4">Managing Objections</td>
                  <input type="hidden" name="q13_point" value="10">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <!-- Nurturing Prospect and Placement end  -->
               <!--  Closing start  -->
               <tr>
               <td colspan="4" class="heading-color">Closing <a class="btn btn-small btn-info" data-toggle="modal" href="#closing"  data-id="UserID123">Rubric</a></td>
                  <td colspan="4" class="heading-color">YES/No/N/A</td>
                  <td colspan="4" class="heading-color">Pts</td>
                  <td colspan="4" class="heading-color">Score</td>
                  <td colspan="12" class="heading-color">Note</td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q14_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q14" value="Appropriate efforts made to clinch the lead">
                  <td colspan="4">Appropriate efforts made to clinch the lead</td>
                  <input type="hidden" name="q14_point" value="10">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q15_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q15" value="Next steps explained , Callback date secured">
                  <td colspan="4">Next steps explained , Callback date secured</td>
                  <input type="hidden" name="q15_point" value="4">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q16_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q16" value="CRM Updation Fully Done ">
                  <td colspan="4">CRM Updation Fully Done </td>
                  <input type="hidden" name="q16_point" value="3">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <!-- Closing end  -->
               <!--  Soft Skills start  -->
               <tr>
               <td colspan="4" class="heading-color">Soft Skills <a class="btn btn-small btn-info" data-toggle="modal" href="#soft"  data-id="UserID123">Rubric</a></td>
                  <td colspan="4" class="heading-color">YES/No/N/A</td>
                  <td colspan="4" class="heading-color">Pts</td>
                  <td colspan="4" class="heading-color">Score</td>
                  <td colspan="16" class="heading-color">Note</td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q17_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q17" value="Call flow">
                  <td colspan="4">Call flow</td>
                  <input type="hidden" name="q17_point" value="2">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q18_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q18" value="Active Listening">
                  <td colspan="4">Active Listening</td>
                  <input type="hidden" name="q18_point" value="4">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q19_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q19" value="Call control">
                  <td colspan="4">Call control</td>
                  <input type="hidden" name="q19_point" value="4">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q20_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q20" value="Correct Choice of words">
                  <td colspan="4">Correct Choice of words</td>
                  <input type="hidden" name="q20_point" value="3">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <?php 
                     $query=mysqli_query($conn,"SELECT * FROM `q21_table` where cm_id=$id");
                     $result=mysqli_fetch_assoc($query);
                     ?>
                  <input type="hidden" name="q21" value="Sentence Construction\ Grammar">
                  <td colspan="4">Sentence Construction\ Grammar</td>
                  <input type="hidden" name="q21_point" value="2">
                  <td colspan="4">
                     <select style="width: 90%;" name="q1_select" readonly>
                        <option value=""><?php echo $result['q1_select']; ?></option>
                     </select>
                  </td>
                  <td colspan="4"><?php echo $result['q1_score']; ?></td>
                  <td colspan="4"><?php echo $result['q1_point']; ?></td>
                  <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" readonly><?php echo $result['q1_comment']; ?></textarea></td>
               </tr>
               <tr>
                  <td colspan="4" class="heading-color">Total </td>
                  <td colspan="4" class="heading-color"></td>
                  <td colspan="4" class="heading-color"><?php echo $cm_result['total']; ?></td>
                  <td colspan="4" class="heading-color"><?php echo $cm_result['score']; ?></td>
                  <td colspan="16" class="heading-color"></td>
               </tr>
               <!-- Soft Skills end  -->
               <!--total -->
               <!-- total end -->
               <tr>
                  <td colspan="36" style="text-align: center;background:purple;">
                     <h4 >COACHING ACTION PLAN </h4>
                  </td>
               </tr>
               <tr>
                  <td colspan="36" ><textarea rows="4" style="width:98%" name="coaching_plan" readonly><?php echo $cm_result['c_plan']; ?></textarea> </td>
               </tr>
               <tr>
                  <td colspan="36" style="text-align: center;background:purple;">
                     <h5 style="color: white;">pass marks is 80% </h5>
                  </td>
               </tr>
               <tr>
                  <?php 
                     $total=$cm_result['total'];
                     $score=$cm_result['score'];
                     $percentage =ceil(100*$score/$total) ;
                                               
                     ?>
                  <td colspan="18" style="text-align: center;">
                     <h3>FINAL SCORE</h3>
                  </td>
                  <td colspan="18" style="text-align: center;">
                     <h3 > <?php    echo $percentage.'%' ; ?></h3>
                  </td>
               </tr>
               <tr>
                  <td colspan="36" style="text-align: center;background:purple;">
                     <h4 >Your Feed Back </h4>
                  </td>
               </tr>
               <form action="backend_cm.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <?php
                   if($cm_result['feedback']==''){
                    ?>
                    <tr>
                     <td colspan="36" ><textarea rows="4" style="width:98%" name="feedback" ></textarea> </td>
                  </tr>
                
                   <?php
                   }else{

                   
                  ?>
                 
                  <tr>
                     <td colspan="36" ><textarea rows="4" style="width:98%"  readonly><?php echo $cm_result['feedback']; ?></textarea> </td>
                  </tr>
                  
                  <?php 
                   }
                  ?>
            </table>
         </div>
         <br>
         <?php
                   if($cm_result['feedback']==''){
                    ?>
         <center>
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         </center>
         <?php
                   }
         ?>
         </form>
      </div>
   </div>
</div>
<?php
   include 'footer.php';
    include 'model.php';
   ?>
