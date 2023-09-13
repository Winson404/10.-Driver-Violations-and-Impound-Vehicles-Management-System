<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","violations");
	if(!$conn) {
		exit();
	}
?>