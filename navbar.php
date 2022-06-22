<!DOCTYPE html>
	<head>
		<title>Online Food Delivary</title>
		<link rel="stylesheet" href="styles/style.css">
		<link rel="stylesheet" href="styles/style9.css">
		
				
	</head>
	<body>
		<?php session_start();?>
		<?php include("config.php");?>
		
		
		<script src="script.js"></script>
		<!-- logo and Cart &  navigation Bar-->
		<?php $result2=$con->query("SELECT SUM(quantity) AS TotalItems FROM cart") or 
				die($con->error);
		?>


		<div class=head>
			<div class="up_nav">
				<a href="home.php"><img src="images/LOGO.png" class="logo" width="165px" height="80px"></a>
				<a href="cart.php">
				<div class="cart" style="color:white; margin-top:20px;">
					<div class="left">
						<img src="images/c.jpg" width="40px" height="40px"
							style="border-radius:100%;">
					</div>
					<div class="right" style="margin-top:5px; font-size:20px;">
						<?php if($r2=$result2->fetch_assoc()):?>
						<b><?=$r2['TotalItems']?> item(s)</b>
						<?php else:?>
						<b>0 item(s)</b>
						<?php endif;?>
					</div>
				</div>
				</a>
			</div>

			<hr>
			<!-- navigation bar-->
			<?php $result0=$con->query("SELECT * FROM categories") or 
				die($con->error);

				

				
				/*$result1=$con->query("SELECT tempc.id,customer.name FROM tempc
		            INNER JOIN customer ON tempc.id = customer.id") or 
				die($con->error);*/
			?>
			<div class="navbar">
				<ul>
					<div class="l">
						<li><a href="home.php">HOME</a></li>
						
						<li class="dropdown">
    						<a href="javascript:void(0)" class="dropbtn">CUISINE SELECTION</a>
    						<div class="dropdown-content">
						<?php while($r=$result0->fetch_assoc()):?>
      						<a href="item.php?id=<?=$r['id']?>&name=<?=$r['name']?>" style="text-align:left;"><?=$r['name']?></a>
						<?php endwhile;?>
    						</div>
  						</li>
						<li><a href="Contact.html">CONTACT US</a></li>
					</div>
					<div class="r">
					
					<?php 
					if(isset($_SESSION['CId'])){
						$id=$_SESSION['CId'];
						$result1=$con->query("SELECT * FROM customer 
						WHERE id=$id") or die($con->error);
						$r1=$result1->fetch_assoc();

						echo "<li class='dropdown'>";
						echo "<a href='javascript:void(0)' class='dropbtn'>".$r1["name"]."</a>";
						echo "<div class='dropdown-content'>";
						echo "<a href='temp1.php?id=".$id."'style='background-color:#FF4949; width:142px; text-align:center;'>LOG OUT</a>";
						echo "</div>";
						echo "</li>";
					}else{
						echo "<li><a href='login.php'>LOGIN</a></li>";
					}
					?>

					<li><a href="register.php">REGISTER</a></li>
					</div>
				</ul>
			</div>
		</div>



		<?php
			
			
				
			if(isset($_GET['idtemp'])){
				try{
				$id=$_GET['idtemp'];
				$con->query("INSERT INTO tempC(id)
						VALUES($id)") or die($con->error);
				header("Location: home.php");
				}catch(mysqli_sql_exception $e){
					header("Location: home.php");
				}
				
	
			}
				
			
			if(isset($_GET['idtemp'])){
			
				$result=$con->query("SELECT * FROM customer WHERE id=$id") or 
				die($con->error);

				if($row=$result->fetch_assoc()){
					echo $row['name'];
				}	
			}
	
				
		?>
		
	</body>

</html>