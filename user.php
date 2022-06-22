<?php session_start();?>

<?php
	try{
		include("config.php");
		$result=$con->query("SELECT *FROM cart") or die($con->error);
		
		$cid=$_SESSION['CId'];	

		while($row=$result->fetch_assoc()){
			$fid=$row['item_id'];
			$quantity=$row['quantity'];
			$con->query("INSERT INTO buy_food(food_id,custom_id,quantity)
				VALUES($fid,$cid,$quantity)") or die($con->error);
		}	
	}catch(mysqli_sql_exception $e){
		$result=$con->query("SELECT buy_food.custom_id,cart.quantity,buy_food.quantity,buy_food.food_id FROM cart
		INNER JOIN buy_food ON cart.item_id = buy_food.food_id") 
		or die($con->error);
			
		$id=$_SESSION['CId'];
		while($row=$result->fetch_row()){
			if($row[0]==$id){
				$Q=$row[1]+$row[2];
			
			$con->query("UPDATE buy_food SET quantity=$Q 
			WHERE custom_id=$row[0] && food_id=$row[3]") or die($con->error);
		}
		
	}
		
	}

?>


<!DOCTYPE html>
	<head>
		<title>Online Food Delivary</title>
		<link rel="stylesheet" href="styles/style.css">
		<link rel="stylesheet" href="styles/style7.css">
		<link rel="stylesheet" href="styles/style8.css">
				
	</head>
	<body>	
		

		<h1>Your Order Success</h1><br><br>
		<div class="a1">
		<div class="tb1">
			<table>
				<tr>
					<th colspan=2>Product</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
					
				</tr>
				<?php 
					
					$result=$con->query("SELECT * FROM cart
					INNER JOIN food ON cart.item_id = food.id")
					or die($con->error);
				?>




				
				<?php while($row=$result->fetch_assoc()):?>
				<tr>
					<td><img src="<?=$row['photo']?>" height="200px"></td>
					<td id="t1"><?=$row['name']?></td>
					<td>Rs.<?=$row['price']?></td>
					<td><?=$row['quantity']?></td>
					
					<td>Rs.<?=$row['price']*$row['quantity']?></td>
				</tr>
				<?php endwhile;?>	
				
				<tr>
					<td style="font-size:20px"><b>Total</b></td>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-size:20px"><b>Rs.<?=$_GET['total']?></b></td>			
				</tr>
				
			</table>
		</div>
		</div>


		<?php 
			if($_SESSION['CId']!=null){
				$id=$_SESSION['CId'];		
				$result1=$con->query("SELECT * FROM customer
				WHERE id=$id") or die($con->error);
			}else{
				header("Location: login.php");
			}
		?>


		<?php if($row=$result1->fetch_assoc()):?>
		<div class="register" >
		<form>
			<label for="fname">Name</label>
			<input type="text" value=<?=$row['name']?>><br>
		
			<label for="m_number">Mobile Number</label>
			<input type="tel" value=<?=$row['phone']?>><br>
		
			<label for="email">Email Address:</label>
			<input type="email" value=<?=$row['email']?>><br>

			<label for="address">Adress</label><br>
			<textarea name="address"><?=$row['address']?></textarea><br><br>
		
			
		</form>
		</div>
		<?php endif;?>
		<br>
	<a href="temp.php"><div class="u" style="margin-left:670px"><button style="height:50px; width:170px; background-color:#90ee90;">
					Submit</button></div></a>
	
	<hr style="clear:right; display:block;">
		<div class="foot">
			<p>Created by: Janitha & Kavishka</p>
			<a href="">Visit</a>  
		</div>
	<hr>

	</body>



</html>