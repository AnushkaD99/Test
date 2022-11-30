<?php
	include("config.php");
	session_start();
	session_destroy();
    echo "<script> alert(\"Log Out Successful!\"); </script>";
    header('Refresh:0;url="index.php"');
?>