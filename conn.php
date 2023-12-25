<?php
$conn = new mysqli('localhost:3307', 'root', '', 'hrms');
//$conn=new mysqli('10.128.0.9','abbas','Abbas@1995','hrms');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
 define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
 define('SITE_PATH','https://wfm.ensomerge.com/');

 define('PROFILE_IMAGE_SERVER_PATH',SERVER_PATH.'hr/profile/');
 define('PROFILE_IMAGE_SITE_PATH',SITE_PATH.'hr/profile/');

  define('AUDIO_SERVER_PATH',SERVER_PATH.'hrmsnew/audio/');
  define('AUDIO_SITE_PATH',SITE_PATH.'hrmsnew/audio/');
?>
