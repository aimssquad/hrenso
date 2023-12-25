<?php

include 'include/connection.php';
include 'include/function.php';




if (isset($_POST['submit'])) {
	$name=get_safe_value($conn,$_POST['name']);
	$doj=get_safe_value($conn,$_POST['doj']);
	$dob=get_safe_value($conn,$_POST['dob']);
	$pmail=get_safe_value($conn,$_POST['pmail']);
	$omail=get_safe_value($conn,$_POST['omail']);
	$address=get_safe_value($conn,$_POST['address']);
	$contact=get_safe_value($conn,$_POST['contact']);
	$pcontact=get_safe_value($conn,$_POST['pcontact']);
	$bloodg=get_safe_value($conn,$_POST['bgroup']);
    $gender=get_safe_value($conn,$_POST['gender']);
    $marital=get_safe_value($conn,$_POST['marital']);
    $bname=get_safe_value($conn,$_POST['bname']);
    $baccount=get_safe_value($conn,$_POST['baccount']);
    $bifc=get_safe_value($conn,$_POST['bifc']);

    $checkbox1=$_POST['chk'];  
    $chk="";  
        foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 

    $photos = $_FILES['photos']['name'];
    $target_dir = "uploadimage/";
    $target_file = $target_dir . basename($_FILES["photos"]["name"]);



    

    if( in_array($imageFileType,$imageFileType1,$extensions_arr) ){



      mysqli_query($conn,"INSERT INTO `employee` (`id`, `name`, `doj`, `dob`, `pmail`, `omail`, `address`, `contact`, `pcontact`, `bgroup`, `gender`, `marital`, `bname`, `baccount`, `bifc`, `documents`, `photos`, `adhar`, `pan`) VALUES (NULL, '$name', '$doj', '$dob', '$pmail', '$omail', '$address', '$contact', '$pcontact', '$bloodg', '$gender', '$marital', '$bname', '$baccount', '$bifc', '$chk', '$photos', 'null', 'null')");



     move_uploaded_file($_FILES['photos']['tmp_name'],$target_dir.$photos);

     header('location:index.php');
  }

  else

  {
         mysqli_query($conn,"INSERT INTO `employee` (`id`, `name`, `doj`, `dob`, `pmail`, `omail`, `address`, `contact`, `pcontact`, `bgroup`, `gender`, `marital`, `bname`, `baccount`, `bifc`, `documents`, `photos`, `adhar`, `pan`) VALUES (NULL, '$name', '$doj', '$dob', '$pmail', '$omail', '$address', '$contact', '$pcontact', '$bloodg', '$gender', '$marital', '$bname', '$baccount', '$bifc', '$chk', '$photos', 'null', 'null')");

         header('location:index.php');



  }



}
?>