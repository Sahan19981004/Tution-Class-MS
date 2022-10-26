<?php
	include "database.php";
	session_start();
	
	
	unset ($_SESSION["admin_id"]);
	unset ($_SESSION["a_username"]);
    
	
	session_destroy();
	echo "<script>window.open('admin_login.php','_self');</script>";
    



?>