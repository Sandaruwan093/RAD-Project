<html>
<head>
	<link rel="stylesheet" href="styles/style4.css">
</head>
<body>
	<?php 
		include("adminNavbar.php");
		require_once 'config.php';
		
		
	?>
		
	
	<?php
		function id(){
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				return $id;
			}
	}
	?>

	<h1>FOOD ITEMS</h1>
	<div class="container" style="height:auto;">
		
		<form action="adminItem.php?id=<?=id()?>" method="post">
			
			<label name="name">Enter the Categorie Name</label>
			<input type="text" id="Iname" name="Iname">	
			
			<label name="photo">Enter the Photo Link of the Food Item</label>
			<input type="text" id="Iphoto" name="Iphoto">

			<label name="desc">Enter the description</label>
			<input type="text" id="desc" name="desc">

			<label name="price">Enter the Price</label>
			<input type="text" id="price" name="price">

			<label name="sales">Enter the Sales</label>
			<input type="text" id="sales" name="sales">
			
			<input type="hidden" id="c_id" name="c_id" value=<?=id()?>>
			
			<input type="submit" name="submit">

		</form>
	</div>		


	<?php
		if(isset($_POST['submit'])){
			$name=$_POST['Iname'];
			$photo=$_POST['Iphoto'];
			$desc=$_POST['desc'];
			$price=$_POST['price'];
			$sales=$_POST['sales'];
			$c_id=$_POST['c_id'];

			$con->query("INSERT INTO food(name,description,photo,price,sales,c_id)
				VALUES('$name','$desc','$photo',$price,$sales,$c_id)") or 
				die($con->error);
		}
	?>
	
	
	<?php 
		$id=id();
		$result=$con->query("SELECT * FROM food WHERE c_id=$id") 
				or die($con->error);
	?>
	

	<div class="c2">
		<?php while($row=$result->fetch_assoc()):?>
						
			<div class="responsive">
				<div class="gallery">
					<a href="adminitem.php"><img src="<?=$row['photo']?>"></a>
					<h3><?=$row['name']?></h3>
				
					</div>
				</div>
				
		<?php endwhile;?>
	</div>


</body>
</html>