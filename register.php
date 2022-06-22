<html>
<head>
	<link rel="stylesheet" href="styles/style7.css">
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
		<?php include("navbar.php")?>	
		<?php include("config.php")?>
		<h1 style="text-align:center;">Register</h1><br><br>
		
		<?php
				$name=null;
				$mobile=0;
				$email=null;
				$address=null;
				

				if(isset($_POST['submit'])){
					$name=$_POST['fname'];
					$mobile=$_POST['m_number'];
					$email=$_POST['email'];
					$address=$_POST['address'];
					$pass=$_POST['pass'];
					$repass=$_POST['repass'];

					if($pass==$repass){
						$con->query("INSERT INTO customer(name,address,phone,email,password)
						VALUES('$name','$address',$mobile,'$email','$pass')") or die($con->error);
					}
					
									
				}

				
		?>



		<?php
			
			$result=$con->query("SELECT * FROM cart WHERE id=1") 
				or die($con->error);


			while($row=$result->fetch_assoc()){
				$id=$row['item_id'];

				
			}
			
		?>





		<div class="register" >
		<form onsubmit="return checkPassword()"  method="post" 
			action="">
			<label for="fname">Name</label>
			<input type="text" id="fname" name="fname"><br>


			<label for="m_number">Mobile Number</label>
			<input type="tel" id="m_number" name="m_number"><br>

			<label for="email">Email Address:</label>
			<input type="email" id="email" name="email"><br>

			<label for="address">Adress</label><br>
			<textarea name="address" id="address"></textarea><br><br>

			<label for="pass">Password</label>
			<input type="password" id="pass" name="pass"><br>

	`		<label for="repass">Re-enter Password</label>			
			<input type="password" id="repass" name="repass"><br>

			<input type="submit" name="submit" value="Submit" >
		</form>
		</div>

		

		<script>
			function checkPassword(){

				var pass=document.getElementById("pass").value;
				var repass=document.getElementById("repass").value
				if(pass==repass){
					alert("Success!");
				}else{
					alert("Password Mismatch!");	
				}	

			}

		</script>
		

		<?php include("foot.php")?>

		


</body>
</html>		


		