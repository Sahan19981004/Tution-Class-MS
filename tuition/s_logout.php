<?php
	include "database.php";
	session_start();
	
	
	unset ($_SESSION["student_id"]);
	unset ($_SESSION["s_username"]);
    
	
	session_destroy();
	echo "<script>window.open('student_login.php','_self');</script>";
    



?>