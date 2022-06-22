
<!DOCTYPE html>
	<head>
		<title>Online Food Delivary</title>
		<link rel="stylesheet" href="styles/style6.css">
		<link rel="stylesheet" href="styles/style5.css">
	
	</head>
	<body>
		<?php
		include("navbar.php");
		include("config.php");
		function id(){
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				
				return $id;
			}
		}
		?>
	
		<?php
			$id=id();
			$result=$con->query("SELECT * FROM food WHERE id=$id") 
				or die($con->error);
			
		?>
		<?php if($row=$result->fetch_assoc()):?>
		<div class="res">
		
		<img src="<?=$row['photo']?>" height=650px width=650px>
		
		</div>	
		<div class="Item_desc"  style="margin:40px 120px; float:left;">
			<div class="c1">
			<h1><?=$row['name']?></h1>
			<h2>Rs. <?=$row['price']?></h2>
			
			<div class="b">
				<form method="post" action="details.php?id=<?=$row['id']?>&name=<?=$_GET['name']?>">
					<input type="number" name="quantity" min=0 value=1>
					<input type="submit" name="submit" >
				</form>
			</div>

			
					
			
			
			<?php
			
				$result1=$con->query("SELECT * FROM cart") 
					or die($con->error);
				$r1=$result1->fetch_assoc();
		
				if(isset($_POST['submit'])){
					if($r1==null){
						$id=$_GET['id'];
						$Q=$_POST['quantity'];
					
						$con->query("INSERT INTO cart(id,item_id,quantity)
						VALUES(1,$id,$Q)") or die($con->error);
						header("Location: cart.php");
					}else{
						try{
							$id=$_GET['id'];
							$Q=$_POST['quantity'];
					
							$con->query("INSERT INTO cart(id,item_id,quantity)
							VALUES(1,$id,$Q)") or die($con->error);
							header("Location: cart.php");
						}catch(mysqli_sql_exception $e){
							header("Location: cart.php");
						}

					}
				}
			?>
			
			<br>	
			<p>CATEGORY <?=$_GET['name']?></p>
			</div>
			<hr>
		
			<h4 style="color: #1d69ab;"><b>Description</b></h4>
			<p><?=$row['description']?><br><br>
				Orders accepted from 9.00 am – 10:30 pm daily.<br>
				This requires 30 minutes preparation time plus delivery time
			</p>

		</div>
		<?php endif;?>


	</body>

</html>