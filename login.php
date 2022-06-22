
<html>
<head>
	<link rel="stylesheet" href="styles/style7.css">
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
		<?php include("navbar.php")?>
		<?php include("config.php")?>
		<h1 style="text-align:center;">Login</h1><br><br>
		
		<div class="register" >
		<form  method="post" action="">
			

			<label for="email">Email Address:</label>
			<input type="email" id="email" name="email"><br>

			<label for="pass">Password: </label>
			<input type="password" id="pass" name="pass"><br>

			


			<input type="submit" name="submit" value="Login" >
		</form>
		</div>

		



		<?php
			
			
			if(isset($_POST['submit'])){
				$email=$_POST['email'];
				$password=$_POST['pass'];

				$result=$con->query("SELECT * FROM customer 
				WHERE password='$password' AND email='$email'") 
				or die($con->error);

				$row=$result->fetch_assoc();

				$_SESSION['CId']=$row['id'];

				header("Location: navbar.php?idtemp=$id");

					
			}

		?>

		<?php include("foot.php")?>

</body>
</html>	


