<?php
include 'include/connection.php';
include 'include/function.php';

if (isset($_POST['submit'])) {
	$feedback=get_safe_value($conn,$_POST['feedback']);
	$id=get_safe_value($conn,$_POST['id']);

	$query=mysqli_query($conn,"UPDATE `cmreport` SET `feedback` = '$feedback' WHERE `cmreport`.`id` = 25");

	if ($query) {
		 echo '<script>';
                 echo 'alert("Your Feed Back update Sucessfully");';
                 echo 'window.location.href = "cmreport.php";';
				echo '</script>';
	}else{
	            echo '<script>';
                 echo 'alert("Something went wrong");';
                 echo 'history.back()';
				echo '</script>';
	}


}
?>