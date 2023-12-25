<?php 


session_start();
include 'conn.php';
//include 'include/xconnection.php';

if ($_SESSION['emp_id'] == true) {
  echo "";
} else {
  header('location:index.php');
}

$emp_id = $_SESSION['emp_id'];
$process = $_SESSION['process'];



  if (isset($_POST['signin'])) {
  
     $pass=$_POST['password'];
     //$process=$_POST['process'];
  	//$password=$_POST['password'];


  	$update=mysqli_query($conn,"SELECT * FROM `emp` WHERE `emp_id`='$emp_id' and `password`='$pass'");

  	 if ($update) {

      $_SESSION['password']=$pass;
  		echo '<script>';
  		//echo 'alert("password set sucessfull");';

  		 echo 'window.location.href = "empdashboard.php";';

  		echo '</script>';


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
    	<h4 class="login-box-msg">Enter password</h4>

    	<form method="post" action="">
         
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control input-lg" id="employee" name="password" placeholder="Enter  Passwoed" required>
        		
      		</div>
        
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Submit</button>
        		</div>
      		</div>
    	</form>

     
      
   
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