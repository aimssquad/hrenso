<?php
   include 'top.php'; 
   ?>
<div class="span9">
   <div class="content">
      <div class="module">
         <div class="module-head">
            <h3>Process update</h3>
         </div>
         <div class="module-body">

         <table class="table table-striped table-bordered table-condensed">
            <thead>
               <tr>
                  <th>Process</th>
                  <th>Created By</th>
                  <th>Updated at</th>
                  <th>Created at</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql="SELECT * FROM `process_update` where status=0 ORDER BY name asc" ;
                  
                  
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($res)) { ?>
               <tr>
                  <td> <?php  echo $row['name'];  ?> </td>
                  <td> <?php  echo $row['created_by'];  ?></td>
                  <td> <?php  echo $row['updated_at'];  ?></td>
                  <td> <?php  echo $row['created_at'];  ?> </td>
                  <td> 
                        <?php
                            echo "<span class='badge badge-edit' ><a href='process_view.php?id=".$row['id']."' style='color:white;'>View</a></span>";
                             ?>
                     </td>
                 
               </tr>
               <?php   }  ?>
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