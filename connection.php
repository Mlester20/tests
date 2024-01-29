<?php
	//for MySQLi OOP
	$conn = new mysqli('localhost', 'root', '', 'employee');
	if($conn->connect_error){
	   die("Connection failed: " . $conn->connect_error);
	}
	
	
?>