<!DOCTYPE html>
	<head>
		<title>Online Food Delivary</title>
		<link rel="stylesheet" href="styles/style.css">
		<link rel="stylesheet" href="styles/style5.css">
		<link rel="stylesheet" href="styles/style6.css">
	
				
	</head>
	<body>
		<?php include("navbar.php")?>	
		<script src="script.js"></script>
		<?php 
			
			include("config.php");
		

		
			if(isset($_POST['Submit'])){
			
				$id=$_POST['id'];
				$Q=$_POST['quantity'];
					
				$con->query("UPDATE cart SET quantity=$Q WHERE item_id=$id")
					 or die($con->error);
				header("Location: cart.php");
									
				$id=null;		
			}
		

			if(isset($_POST['submit'])){
			
				$id=$_POST['id'];
			
					
				$con->query("DELETE FROM cart WHERE item_id=$id")
					 or die($con->error);
				header("Location: cart.php");					
				$id=null;		
			}

			$result=$con->query("SELECT *FROM cart")
				or die($con->error);

		?>
				
		



		<h1>Your Cart</h1><br><br>

		<div class="a1">
		<div class="tb1">
			<table>
				<tr>
					<th colspan="2">Product</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</tr>




				<?php $Total=0;
					$quantity=0;
				?>

				<?php while($row=$result->fetch_assoc()):?>
				<?php 
					$id=$row['item_id'];
					$result1=$con->query("SELECT *FROM food WHERE
						id=$id")or die($con->error);
				?>	
				<tr>
					<?php if($r=$result1->fetch_assoc()):?>
					
					<td><img src="<?=$r['photo']?>" height="200px"></td>
					<td><?=$r['name']?><br><br>
						<form method="post">
							<input type="hidden" name="id" 
							value=<?=$row['item_id']?>>

							<input type="submit" name="submit" 
							style="margin-left:33px; width:90px; 
							background-color:red;" value="Remove">
						</form>
					</td>

					<td>Rs.<?=$r['price']?></td>
					<td>
					<div class="b">
						<form method="post" action="cart.php">
							<input type="hidden" name="id" value=<?=$row['item_id']?>>
							<input type="number" name="quantity" min=0
								value=<?=$row['quantity']?>>
							<input type="submit" name="Submit" 
							style="width:50px" value="Add">	
						</form>
					</div>
					</td>
					
					<?php
						$price=$r['price'];
						$quantity=$row['quantity'];
						$subTotal=$price*$quantity;
						$Total+=$subTotal;
						
					?>
					<td>Rs.<?=$subTotal?></td>
					
					<?php endif;?>
				</tr>
				
				<?php endwhile;?>
				


			</table>
		</div>		
		<div class="c2">
			<h3>Cart Total</h3>
			<hr style="color:white;">
			
			<p class="l1">Subtotal</p>
			<p class="l2">Rs.<?=$Total?></p>
			
			
			<div class="b1">
			<hr style="color:white;">
			<p class="l1">Total</p>
			<p class="l2">Rs.<?=$Total?></p>
			</div>
			
		</div>
		
		
	</div>
	<div class="c" style="clear:right;"><a href="user.php?total=<?=$Total?>"><button>Proceed to checkout</button></a></div>
	
		


	
	

	</body>



</html>