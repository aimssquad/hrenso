<?php 
include 'conn.php';

$type=$_GET['type'];
$id=$_GET['id'];
$emp_id=$_GET['emp_id'];

// echo $type ;
// echo $id;
// echo $emp_id;


if($type=='submit'){


    $check_sql=mysqli_query($conn,"SELECT * FROM `likes` where emp_id='$emp_id' and post_id='$id'");

    $num_row=mysqli_num_rows($check_sql);

    if ($num_row > 0) {
    	
     	 echo '<script type="text/javascript">';
                
                 echo 'window.location.href = "activity.php";';
                 echo '</script>';
    }else{

    	  $sql=mysqli_query($conn,"INSERT INTO `likes` (`id`, `emp_id`, `post_id`, `created_at`) VALUES (NULL, $emp_id, $id, current_timestamp())");

    if ($sql==true) {
         	 echo '<script type="text/javascript">';
              
                 echo 'window.location.href = "activity.php";';
                 echo '</script>';
    	
    }else{
         echo '<script type="text/javascript">';
                  echo 'alert("something went wrong");';
                 echo 'window.location.href = "activity.php";';
                 echo '</script>';
    }


    }


  

}else{

	 echo '<script type="text/javascript">';
                  echo 'alert("something went wrong");';
                 echo 'window.location.href = "activity.php";';
                 echo '</script>';


}


?>