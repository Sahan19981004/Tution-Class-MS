<?php
	include"database.php";
	session_start();
	$s="delete from teacher where teacher_id={$_GET["id"]}";
	$db->query($s);
	echo"<script>window.open('1delete_teacher.php','_self');</script>";

?>