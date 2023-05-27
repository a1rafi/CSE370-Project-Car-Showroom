<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/dbconnect.php";
    
    $sql = "SELECT * FROM admins
            WHERE admin_id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link rel="stylesheet" href="style/basic.css">

</head>

<body>



	<div class="menu_bar">

		<?php if (isset($user)): ?>
        
			<p>Logged In As Admin <?= htmlspecialchars($user["name"]) ?></p>

			<p><a href="admin_logout.php">Log Out</a></p>


		<?php endif; ?>

		
		<a href="add_car.php">Add a Car</a> &nbsp;&nbsp;
		<a href="delete_car.php">Delete a Car</a> &nbsp;&nbsp;
		<a href="admin_proreq.php">Product Request</a> &nbsp;&nbsp;
		<a href="admin_comp.php">Complain Box</a> &nbsp;&nbsp;
		<a href="add_exp.php">List an Experts</a> &nbsp;&nbsp;
		<a href="orders.php">All Orders</a> &nbsp;&nbsp;

			
		
	</div>
	
	<br><br>
	
	<div class="featured">
        <h2>All Cars</h2>
		
		<div>
			<table>
			<tbody>
				<?php
					$con=mysqli_connect("localhost","root","","carshowroom");
					global $con;
					$sql = "SELECT * from cars";
					$result = mysqli_query($con,$sql);
					while ($getrow = mysqli_fetch_array($result)){
							$car_brand = $getrow['brand'];
							$car_model = $getrow['model'];
							$car_year = $getrow['year'];
							$car_reg = $getrow['regnum'];
							$car_price = $getrow['price'];
							$car_image = $getrow['car_image'];
							
							echo "
								<div>
									<h3>$car_brand $car_model $car_year</h3>
									<br>
									<img src='img/$car_image' width='230' height='180' />
									<br>
									<p><b> Price: $car_price </b> </p>
								</div>
							";
								
					}
				?>
			</tbody>
			</table>
		</div>
		
		
		
		
	</div>

</body>

</html>