<?php
session_start();

include 'conn.php';

$msg='';

if (isset($_POST['signin'])) {
  
$emp_id=$_POST['emp_id'];
$password=$_POST['password'];

$sql="SELECT * from emp where emp_id='$emp_id' and password='$password' and status=0";
 $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if ($count > 0) {

      $_SESSION['emp_id']=$emp_id;
      
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
            <input type="password" class="form-control input-lg" id="employee" name="password" placeholder="Enter Your Password" required>
            
          </div>
         
          <div class="row">
          <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i>Login</button>
            </div>
          </div>
      </form>

     
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

