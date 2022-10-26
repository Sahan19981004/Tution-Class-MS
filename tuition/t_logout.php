<?php
	include "database.php";
	session_start();
	
	
	unset ($_SESSION["teacher_id"]);
	unset ($_SESSION["t_username"]);
    
	
	session_destroy();
	echo "<script>window.open('teacher_login.php','_self');</script>";
    



?>