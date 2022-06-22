<html>
<head>
	<link rel="stylesheet" href="styles/style4.css">
</head>
<body>
	<?php 
		include("adminNavbar.php");
		require_once 'config.php';
		
	?>

	<h1>CATEGORIES</h1>
	<div class="container" style="height:auto;">
		
		<form action="adminhome.php" method="post">
	
			<label name="name">Enter the Categorie Name</label>
			<input type="text" id="name" name="name">	
			
			<label name="photo">Enter the Photo Link of the Categorie</label>
			<input type="text" id="photo" name="photo">
			<input type="submit" name="submit">

		</form>
			
			
	</div>
	


	<?php
	
	if(isset($_POST['submit'])){
		
		$name=$_POST['name'];
		$photo=$_POST['photo'];
	
		$con->query("INSERT INTO categories(name,photo)
			VALUES('$name','$photo')") or die($con->error);
	
	}	

	?>
	



	<?php $result=$con->query("SELECT * FROM categories") or die($con->error);?>
	<div class="c2">
	<?php while($row=$result->fetch_assoc()):?>		
		<div class="responsive">
			<div class="gallery">
				<a href="adminItem.php?id=<?=$row['id']?>"><img src="<?=$row['photo']?>"></a>
				<h3><?=$row['name']?></h3>
			</div>
		</div>
	<?php endwhile;?>
	</div>


	


</body>
</html>