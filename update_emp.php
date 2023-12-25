<?php 

include 'conn.php';
include 'include/function.php';




if (isset($_POST['job'])) {
$id=$_POST['id'];
$emp_id=$_POST['emp_id'];
$role=$_POST['role'];
$position=$_POST['position'];
$tl=$_POST['tl'];
$doj=$_POST['doj'];
$omail=$_POST['omail'];
$salary=$_POST['salary'];
$salary_date=get_safe_value($conn,$_POST['salary_date']);

$result = mysqli_query($conn,"UPDATE `employee` SET `role` = '$role', `doj` = '$doj', `omail` = '$omail', `position` = '$position', `tl` = '$tl', `salary` = '$salary', `salary_date` = '$salary_date' WHERE `employee`.`emp_id` =$id");

   if ($result) {

                 echo '<script>';
                 echo 'alert("Job Information Update Sucessfull");';
                 echo 'window.location.href = "profile.php";';
				echo '</script>';
   	             
   	
   }else{
                echo '<script>';
                echo 'alert("Job Information Update faild");';
                echo 'window.location.href = "profile.php";';
                echo '</script>';
   		                    
   }


}

elseif(isset($_POST['personal'])){
$id=$_POST['id'];
$name=$_POST['name'];
$dob=$_POST['dob'];
$pmail=$_POST['pmail'];
$address=get_safe_value($conn,$_POST['address']);
$pmaddress=get_safe_value($conn,$_POST['pmaddress']);
$contact=$_POST['contact'];
$bgroup=$_POST['bgroup'];
$gender=$_POST['gender'];
$marital=$_POST['marital'];
$kids=$_POST['kids'];
$dom=$_POST['dom'];


$result = mysqli_query($conn,"UPDATE `employee` SET `name` = '$name', `dob` = '$dob', `pmail` = '$pmail', `address` = '$address', `pmaddress` = '$pmaddress', `contact` = '$contact', `bgroup` = '$bgroup', `gender` = '$gender', `marital` = '$marital', `kids` = '$kids', `dom` = '$dom' WHERE `employee`.`emp_id` = $id ");

   if ($result) {

                 echo '<script>';
                 echo 'alert("Personal Information Update Sucessfull");';
                 echo 'history.back()';
				echo '</script>';
   	             
   	
   }else{
                echo '<script>';
                echo 'alert("Personal Information Update faild");';
                echo 'window.location.href = "profile.php";';
                echo '</script>';
   		                    
   }

}

elseif(isset($_POST['bank'])){
$id=$_POST['id'];
$bname=$_POST['bname'];
$baccount=$_POST['baccount'];
$bifc=$_POST['bifc'];

  $checkbox1=$_POST['chk'];  
    $chk="";  
        foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 

$result = mysqli_query($conn,"UPDATE `employee` SET `bname` = '$bname', `baccount` = '$baccount', `bifc` = '$bifc', `documents` = '$chk' WHERE `employee`.`emp_id` = $id");

   if ($result) {

                 echo '<script>';
                 echo 'alert("Bank Information Update Sucessfull");';
                 echo 'window.location.href = "profile.php";';
				echo '</script>';
   	             
   	
   }else{
                echo '<script>';
                echo 'alert("Bank Information Update faild");';
                echo 'window.location.href = "profile.php";';
                echo '</script>';
   		                    
   }


}

elseif(isset($_POST['emergency'])){

$id=$_POST['id'];
$pcontact=$_POST['pcontact'];
$wnumuber=$_POST['wnumber'];

$result = mysqli_query($conn,"UPDATE `employee` SET `pcontact` = '$pcontact', `wnumber` = '$wnumuber' WHERE `employee`.`emp_id` = $id");

   if ($result) {

                 echo '<script>';
                 echo 'alert("emergency contact Update Sucessfull");';
                 echo 'window.location.href = "profile.php";';
				echo '</script>';
   	             
   	
   }else{
                echo '<script>';
                echo 'alert("emergency contact Update faild");';
                echo 'window.location.href = "profile.php";';
                echo '</script>';
   		                    
   }

}




?>