<?php
	include"database.php";
	session_start();
	
	$s="delete from class where ID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('add_student.php?mes=Data Deleted.','_self');</script>"
?>