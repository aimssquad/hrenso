<?php
//$conn = new mysqli('10.128.0.9', 'abbas', 'Abbas@1995', 'hrms');
$conn=mysqli_connect("localhost","root"," ","hrms");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/hr/profile/');
define('SITE_PATH','http://localhost/');

// define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
// define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

echo SITE_PATH ;
echo "<br>";
echo SERVER_PATH ;

?>
