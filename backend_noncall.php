<?php 
//print_r($_POST);
include 'include/connection.php';
include 'include/function.php';

if (isset($_POST['submit']))
{

$emp_id = $conn -> real_escape_string($_POST['emp_id']);
$start_time = $conn -> real_escape_string($_POST['start_time']);
$disposition = $conn -> real_escape_string($_POST['disposition']);
$remarks = $conn -> real_escape_string($_POST['remarks']);
$date1=date('Y-m-d');
$date = date_default_timezone_set('Asia/Kolkata');
$callend = date("H:i:s");
$checkTime = strtotime($start_time);
$loginTime = strtotime($callend);
$diff = $loginTime - $checkTime;
$h=floor($diff / 3600);
$m = floor($diff / 60);
$s = $diff % 60;
$d =$h.':'. $m . ':' . $s;
$cduration = $d;
//echo $cduration;

$sql = ("INSERT INTO `nonactivity` (lead,date, time,disposition,remarks,callend, cduration,username) VALUES ('$emp_id','$date1','$start_time','$disposition','$remarks','$callend','$cduration','$emp_id')");

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">';
    echo 'alert(" Details are added sucessfully");';
    echo 'window.location.href = "noncall.php";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert(" Details are added Failed");';
    echo 'window.location.href = "noncall.php";';
    echo '</script>';
}

mysqli_close($conn);




}

?>