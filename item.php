<html>
<head>
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/style4.css">

</head>
<body>
	<?php 
		include("navbar.php");
		require_once 'config.php';
		
	?>

	<div id="a3">
	<?php 
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$name=$_GET['name'];
			$result=$con->query("SELECT * FROM food WHERE c_id=$id") 
				or die($con->error);
			echo "<h1>".$name."</h1>";
		}
	?>
	
	<div class="container" style="height:auto;">	
		
		<div class="c2">
		<?php while($row=$result->fetch_assoc()):?>
			<a href="details.php?id=<?=$row['id']?>&name=<?=$_GET['name']?>">			
			<div class="responsive">
				<div class="gallery">
					
					
					<img src="<?=$row['photo']?>"></a>
					<h3><?=$row['name']?></h3>
					<div class="box">Order Now</div>
				</div>
			</div>
			</a>
		<?php endwhile;?>
	</div>
	</div>
	
		
	<?php include("foot.php");?>

</body>
</html>