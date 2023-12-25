<?php


session_start();


function df_h($data)
{
 	if($data == ''){
		return ('');
	}else{	
	return (date('d-m-Y', strtotime($data)));
	}
}

include 'conn.php';
//include 'include/xconnection.php';

if ($_SESSION['emp_id'] == true) {
  echo "";
} else {
  header('location:index.php');
}

include 'top.php';







?>


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Holiday List</h3>
							</div>
							<div class="module-body">




                       	<p>
									<strong><?php  echo  date('Y');  ?></strong>
									-
									<small>Holiday List</small>
								</p>
								<table class="table table-condensed">
								  <thead>
									<tr>
									  <th>Date</th>
									  <th>Holiday Type</th>
									  <th>Holiday Description</th>


									  	<?php
                                     $sql="SELECT * from holiday" ;
                                     $res=mysqli_query($conn,$sql);

                                     if(isset($_POST['search']))
                                     {
                                     	$date=$_POST['date'];
                                     	$sql="SELECT * From holiday where date='$date'";
                                     	$res=mysqli_query($conn,$sql);
                                     }

                             

                                     while($row=mysqli_fetch_assoc($res)) { ?>
									  
									</tr>
								  </thead>
								  <tbody>
									<tr>
									   <td> <?php  echo df_h($row['date']);  ?></td>
									  <td> <?php  echo $row['holiday_type'];  ?> </td>
                                       <td> <?php  echo $row['holiday_description'];  ?></td>
                                     
									</tr>
									
									  <?php   }  ?>
								  </tbody>
								</table>







							</div>
						</div>
					</div>
				</div>


	<?php
include 'footer.php';

?>