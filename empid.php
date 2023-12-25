<?php
session_start();

include 'conn.php';

$msg='';

if (isset($_POST['signin'])) {
  
$emp_id=$_POST['emp_id'];
$process=$_POST['process'];
$sql="SELECT * from emp where emp_id='$emp_id'";
 $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if ($count > 0) {

      $_SESSION['emp_id']=$emp_id;
      $_SESSION['process']=$process;
      header('location:empdashboard.php');
      die();
       
    }
    else
    {
      $msg="Please Enter valid Employee_id" ;
    }

}




?>


<?php include 'header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<p id="date"></p>
      <p id="time" class="bold"></p>
  	</div>
  
  	<div class="login-box-body">
    	<h4 class="login-box-msg">Enter Employee ID</h4>

    	<form method="post" action="">
         
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control input-lg" id="employee" name="emp_id" placeholder="Enter Your ID" required>
        		
      		</div>
          <div class="form-group has-feedback">
           <select class="form-control input-lg" name="process" id="process" required>
            <option value="">Select Process</option>
            <option>B2B</option>
            <option>Reva</option>
            <option>Blue Water</option>
            <option>TV/TB/Eset</option>
            <option>TL/HR/IT/OT</option>
             
           </select>
           
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Check</button>
        		</div>
      		</div>
    	</form>

       <div class="row">
         <a href="present.php" style="text-align:center;font-size: 15px;font-family:bold;margin-left: 16px;"><u> Back</u></a>
      </div>
          <div class="row">
           <p style="text-align: center;color: green;font-size: 20px;font-family:bold;"> <?php echo "$msg";   ?></p>
          </div>
   
  	</div>
	
  		
</div>
	
<?php include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

 
    
});
</script>
</body>
</html>

