
<?php
include 'conn.php';









// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }







function getRealIPAddr()
     {
              //check ip from share internet
       if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
         {
           $ip = $_SERVER['HTTP_CLIENT_IP'];
                                     }
                                            //to check ip is pass from proxy
                             elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
                                         {
                              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                                         }
                                              else
                                                  {
                                             $ip = $_SERVER['REMOTE_ADDR'];
                                                   }
      
                                               return $ip;
     }


             
       $ip = $_SERVER['REMOTE_ADDR'];
       $access_key = '2f4f670b1782fa1113db20ee7e2e2931';
       $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $json = curl_exec($ch);
       curl_close($ch);
       $api_result = json_decode($json, true);

       $region= $api_result['region_name'];
       $city= $api_result['city'];
       $zip=$api_result['zip'];



$msg='';
if (isset($_POST['signin'])) {
  $type=$_POST['type'];
  $emp=$_POST['employee'];


  $result=mysqli_query($conn,"SELECT * from emp where emp_id='$emp' and status=0");
  $row=mysqli_fetch_array($result);

  $emp=$row['emp'];

  $emp_id=$row['emp_id'];
  $roll=$row['roll'];
  $tl=$row['tl'];
  $date=date('Y-m-d');
  $date3 = date_default_timezone_set('Asia/Kolkata');
  $login=date('H:i:s');

  if ($tl=='Riya') {
    $email='riya@ensomerge.com';
  }elseif($tl=='Jaison'){

    $email='jaison.james@ensomerge.com';
  }elseif ($tl=='Jincy') {
     $email='jincy@ensomerge.com';
  }else{
    $email='hr@ensomerge.com';
  }


     //email code 

        $curl = curl_init();

  curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "\n{\n  \"to\": [\n    {\n      \"name\": \"Mukund\",\n      \"email\": \"mukund.mukesh@ensomerge.com\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Bookmysales\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email\"\n    },\n    {\n      \"email\": \"abbas.uddin@ensomerge.com\"\n    }\n  ],\n \n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n\n  \"template_id\": \"4351\",\n  \"variables\": {\n    \"VAR1\": \"$emp\",\n    \"VAR2\": \"$date\",\n    \"VAR3\": \"$login\"\n  },\n  \"authkey\": \"372323AjwXe2wBhWIR61efa85aP1\"\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON"
  ],
]);

       //emil end

 // echo "$emp_id";
  

  if ($emp_id==11159 || $emp_id==11160 || $emp_id==11161 || $emp_id==11162 || $emp_id==11163 || $emp_id==11178 || $emp_id==11179 || $emp_id==11007) {

      $date=date('Y-m-d');
    if ($type==0) {

      $result=mysqli_query($conn,"SELECT *  from present where emp_id ='$emp_id' and  date ='$date'");

      $num=mysqli_num_rows($result);

      //echo $num;

      if ($num==1) {
        //$msg="you already login";
         echo '<script type="text/javascript">';
                echo 'alert("you already login");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';

      }else{

        $type=0;

        date_default_timezone_set('Asia/Kolkata');
       $login = date( 'Y-m-d h:i:s A', time () );
       //echo $currentTime;

  $sql="INSERT INTO `present` (`id`, `emp_id`, `emp_name`, `type`,`roll`, `date`, `login`, `logout`, `duration`) VALUES (NULL, '$emp_id', '$emp', '$type', '$roll','$date', '$login', 'NULL', 'NULL')";

  $sql2="INSERT INTO `location` (`id`, `emp_id`, `emp`, `region`, `city`, `zip`, `date`, `created_at`) VALUES (NULL, '$emp_id', '$emp', '$region', '$city', '$zip', '$date', CURRENT_TIMESTAMP)";


            mysqli_multi_query($conn, $sql2);
      //mysqli_query($conn,$sql2);
            mysqli_query($conn,$sql);

           $msg= "Logged in.Have a nice day ".$emp." ".":)";
              echo '<script type="text/javascript">';
               // echo 'alert("Username or password Invalid for B2C TL");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';

     $response = curl_exec($curl);
     $err = curl_error($curl);
     curl_close($curl);


      }
      


    }else{

       $result=mysqli_query($conn,"SELECT max(id) as id  from present where emp_id ='$emp_id' ");
       
        $row=mysqli_fetch_assoc($result);
        $id=$row['id'];
        
        $result=mysqli_query($conn,"SELECT *  from present where emp_id ='$emp_id'  and  id='$id'  and type=1");

        $num=mysqli_num_rows($result);


        if ($num==1) {
          //$msg="You already logOUT";

   echo '<script type="text/javascript">';
                echo 'alert("You already logOUT");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';

        }else{

             $result=mysqli_query($conn,"SELECT max(id) as id  from present where emp_id ='$emp_id' and type=0");
       
             $row=mysqli_fetch_assoc($result);
             $id=$row['id'];

              $type=1;

             date_default_timezone_set('Asia/Kolkata');
             $logout = date( 'Y-m-d h:i:s A', time () );


              $sql="UPDATE `present` SET `type` = '$type' ,`logout` = '$logout' WHERE `present`.`id` = $id";
              mysqli_query($conn,$sql);

             // $msg= "Logged Out.Thank you for your time :".$emp." ".":)";

          echo '<script type="text/javascript">';
               // echo 'alert("You already logOUT");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';


        }



    }


   

    
     //$result1=mysqli_query($conn,"SELECT max(id) from present where emp_id ='11152' and type=0 ");

    /*if ($result==true) {


      $msg="You Already Login";
    }elseif ($result1==true) {
      $msg="You need logout";
    }


    else{
      

       $msg="you need login";

    }*/


    
  }


// main cose

  else{
  
  if ($emp_id) {
  
  $date=date('Y-m-d');
  $date3 = date_default_timezone_set('Asia/Kolkata');
  $login=date('H:i:s');
  $result=mysqli_query($conn,"SELECT *  from present where emp_id ='$emp_id' and  date ='$date' ");
  $row=mysqli_fetch_array($result);
  $name1=$row['emp_id'];
  $date1=$row['date'];
  //echo $type;
  
//logout
 $result1=mysqli_query($conn,"SELECT *  from present where emp_id ='$emp_id' and  date ='$date' ");
 $row1=mysqli_fetch_array($result1);
 $name2=$row1['emp_id'];
 $date2=$row1['date'];
 $type1=$row1['type'];
 $id=$row1['id'];

 //echo "$id";
  // time calculation
  $logout=date('H:i:s');

  $checkTime = strtotime($login);
  $loginTime = strtotime($logout);
  $diff = $loginTime - $checkTime;
  $h = floor($diff / 3600);
  $m = floor($diff / 60);
  $s = $diff % 60;
  $d = $h . ':' . $m . ':' . $s;
  

  if ($name1=='' and $date1=='' )

   {

     if ($name1=='' and $date1=='' and  $type==0) {
       
     
       $sql="INSERT INTO `present` (`id`, `emp_id`, `emp_name`, `type`,`roll`, `date`, `login`, `logout`, `duration`) VALUES (NULL, '$emp_id', '$emp', '$type', '$roll','$date', '$login', 'NULL', 'NULL')";


       $sql2="INSERT INTO `location` (`id`, `emp_id`, `emp`, `region`, `city`, `zip`, `date`, `created_at`) VALUES (NULL, '$emp_id', '$emp', '$region', '$city', '$zip', '$date', CURRENT_TIMESTAMP)";


     


         mysqli_multi_query($conn, $sql2);

         mysqli_query($conn,$sql);

   

    $msg= "Logged in.Have a nice day ".$emp." ".":)";
     $response = curl_exec($curl);
     $err = curl_error($curl);
     curl_close($curl);

        echo '<script type="text/javascript">';
                //echo 'alert("Username or password Invalid for B2C TL");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';

}

else {

      //$msg= "First login";
         echo '<script type="text/javascript">';
                echo 'alert("First login");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';
}

  }




  elseif ($name1!='' and $date1!='' and $type1!='' and $type==1) 

  {

    if ($name1!='' and $date1!='' and  $type1==0 and $type==1) {
      
    
    
    $cduration = $d;
    $sql="UPDATE `present` SET `type` = '$type' ,`logout` = '$logout',`duration`=TIMEDIFF(logout,login) WHERE `present`.`id` = $id";
    mysqli_query($conn,$sql);

    // $msg= "Logged Out.Thank you for your time :".$emp." ".":)";
        echo '<script type="text/javascript">';
               // echo 'alert("Username or password Invalid for B2C TL");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';

  }
      elseif ($name1!='' and $date1!='' and  $type1==1 and $type==1) {
    
  
        //$msg= "You already logout";
           echo '<script type="text/javascript">';
                echo 'alert("You already logout");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';


  }else{

    // $msg= "You already logout";
        echo '<script type="text/javascript">';
                echo 'alert("You already logout");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';
  }
    
  }

  else{

   // $msg= "You already login";
       echo '<script type="text/javascript">';
                echo 'alert("You already login");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';
  }


    
    
  }



  else
  {
    //$msg= "Employee id not exists";
       echo '<script type="text/javascript">';
                echo 'alert("Employee id not exists");';
                echo 'window.location.href = "empdashboard.php";';
                echo '</script>';
  }
}


}




?>