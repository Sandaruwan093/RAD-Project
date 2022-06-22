<?php

	session_start();
	
	include("config.php");
	$id=$_GET['id'];

	$_SESSION['CId']=null;


	$con->query("DELETE FROM cart WHERE id=1")
					 or die($con->error);


	header("Location: home.php");

?>