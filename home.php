<!DOCTYPE html>
	<head>
		<title>Online Food Delivary</title>
		<link rel="stylesheet" href="styles/style.css">
		<link rel="stylesheet" href="styles/style4.css">	
		
	</head>
	<body>	
		<?php
			 include("navbar.php");
			 include("config.php");
			
		?>
		<!--food container-->

		<div class="container" style="height:auto;">
	
			<!--find search-->

			<div class="c1">
				<h2>DOTCOM  ONLINE  RESTAURANT  FOOD  DELIVERY</h2>
				<h4>Do you want the best quality food for your home?</h4>
				<div class=search>
					<input type="text" placeholder="&#x1F50E;&#xFE0E; Search in Restaurants......">
					<div class="find">Find Food</div>
				</div>
				
			</div>


			<!--food content-->

			
			<?php $result=$con->query("SELECT * FROM categories") or 
			die($con->error);
			?>

	
			
			<div class="c2">
			<?php while($row=$result->fetch_assoc()):?>
				<a href="item.php?id=<?=$row['id']?>&name=<?=$row['name']?>">		
				<div class="responsive">
					<div class="gallery">
						
						<img src="<?=$row['photo']?>">
						<h3><?=$row['name']?></h3>
						<div class="box">Order Now</div>
				
					</div>
				</div>
				</a>
			<?php endwhile;?>
			</div>
			
			
		</div>
		<!-- site description-->			
			<div class="deliver" style="margin-top:60px;">
					<h1>Food orders are delivered daily from</h1>
					<p>orders placed after 10.30 p.m. will be delivered the following day</p> 
			</div>			
			
			<div class="description">
				<div class="d1">
					<img src="images/Safety.ico">
					<h3>Safety</h3>
					<p>Strignet protocol are followed in<br>food preparation and handling</p>
				</div>
				<div class="d1">
					<img src="images/Delivery.ico">
					<h3>Personalised Delivery</h3>
					<p>Deliveries are made solely<br>by Hotel staff members</p> 
				</div>
				<div class="d1">
					<img src="images/Quality.png">
					<h3>Quality</h3>
					<p>Five-star quality and service</p>
				</div>
			</div>
		
		<br><br>
		<?php include("foot.php");?>

		
	</body>

</html>