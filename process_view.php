<?php
   include 'top.php'; 
   $id = $_GET['id'];
   $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `process_update` WHERE `id`=$id"));
   ?>
<div class="span9">
   <div class="content">
      <div class="module">
         <div class="module-head">
            <h3>Process - <?php echo $row['name']; ?></h3>
         </div>
         <div class="module-body">
         <div class="stream-composer media">
									<div class="media-body">

										
                                        
										<div class="row-fluid">
                                            <label for="" style="font-size:16px;"><u>Process Description - </u></label>
                                            <p><?php echo $row['description']; ?></p>
										</div>
										
									</div>
								</div>
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