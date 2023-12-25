<?php 
   include 'top.php';
   
   ?>
<div class="span9">
<div class="content">
<div class="module">
<div class="module-body">
<div class="module-body">
<div class="module-body">
   <div class="profile-tab-content tab-content">
      <div class="tab-pane fade active in" id="activity">
         <div class="module-option clearfix">
         </div>
         <table class="table table-striped table-bordered table-condensed">
            <thead>
               <tr>
                  <th>TL name</th>
                  <th>Audit Date</th>
                  <th>Call Date</th>
                  <th>Company/Customer</th>
                  <th>Total</th>
                  <th>Score</th>
                  <th>Percentage(%)</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql="SELECT cmreport.*,employee.name FROM `cmreport`,employee where cmreport.cm_empid=employee.emp_id and cmreport.cm_empid='$emp_id'" ;
                  
                  
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($res)) { ?>
               <tr>
                  <td> <?php  echo $row['cm_tl'];  ?> </td>
                  <td> <?php  echo $row['cm_auditdate'];  ?></td>
                  <td> <?php  echo $row['cm_date'];  ?></td>
                  <td> <?php  echo $row['cm_company'];  ?> </td>
                  <td> <?php  echo $total =$row['total'];  ?> </td>
                  <td> <?php  echo $score=$row['score'];  ?> </td>
                  <td>
                     <?php 
                        $percentage =ceil(100*$score/$total) ;
                        echo $percentage.'%' ;
                        
                        ?>
                  </td>
                  <?php 
                     if($percentage >=80){?>
                  <td style="background: green;color: white;">Pass</td>
                  <?php 
                     }else{
                         ?>
                  <td style="background: red;color: white;">Failed</td>
                  <?php 
                     }
                     
                         ?>
                  <td> 
                     <?php
                        echo "<span class='badge badge-views ' >
                          <a href='cm_form_view.php?id=".$row['id']."' class='text-color' style='color:white'>View</a></span>&nbsp;";
                        
                        
                        ?>
                  </td>
               </tr>
               <?php   }  ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- End Table View  -->
<!-- List View part -->
<!-- End List View part -->
<?php
   include 'footer.php';
   ?>
