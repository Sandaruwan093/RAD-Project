<?php

	include("config.php");

	$con->query("DELETE FROM cart WHERE id=1")
					 or die($con->error);


	header("Location: home.php");

?>