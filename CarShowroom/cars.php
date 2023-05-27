<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/dbconnect.php";
    
    $sql = "SELECT * FROM users
            WHERE user_id = {$_SESSION["user_id"]}";
            
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

	

    <div class="header">

        <div class="header-links">
            <a href="index.php">Home</a> &nbsp;&nbsp;
            <a href="cartindex.php"> Buy A Car </a> &nbsp;&nbsp;
			<a href="proreq.php">Product Request </a> &nbsp;&nbsp;
			<a href="experts.php"> Search an Expert </a> &nbsp;&nbsp;



			<?php if (isset($user)): ?>
	
				Hello <?= htmlspecialchars($user["name"]) ?> &nbsp;&nbsp;

				<a href="logout.php">Log Out</a>
	
			<?php else: ?>
	
				<a href="login.php">Log In</a>
				
	
			<?php endif; ?>
        </div>

        <form class="header-search" method="post" action="search.php">
            <input type="text" name="item" placeholder="Search Product">
            <input type="submit" value="Search">
        </form>

        <div class="branding">
            <h1>Car Show Room</h1>
        </div>

    </div>


    <div class="featured">
        <h2>Available Cars</h2>

        <div class="sidebar-left">
            <h3 style="text-align: center;"> <b>Filter</b></h3>

            <b>Price:</b> <br>
			<form class="header-search" method="post" action="filter.php">
				<input type="text" name="min" placeholder="Min" style="width: 100px;">
				<input type="text" name="max" placeholder="Max" style="width: 100px;">
				<input type="submit" value="Filter">
			</form>

        </div>

        <div>
			
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
							
						echo '
							<div class="product">
								<h3>'. $car_brand . " " . $car_model." ".$car_year.'</h3>
								<img class="product-img" src="img/'.$car_image.'"/>
								<p><b> Price: '.$car_price.' </b></p>
							</div>
						';
								
				}
			?>

        </div>

    </div>

</body>

</html>