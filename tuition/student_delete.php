<?php
	include"database.php";
	session_start();
	$s="delete from student where student_id={$_GET["id"]}";
	$db->query($s);
	echo"<script>window.open('1delete_student.php','_self');</script>";

?>