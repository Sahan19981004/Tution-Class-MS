<?php
	include "database.php";
	session_start();
	$s="delete from subjects where subject_id={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('1add_subject.php','_self');</script>";
?>