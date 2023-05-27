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
            <a href="cars.php">Cars </a> &nbsp;&nbsp;
			<a href="complain.php">Write To Us </a> &nbsp;&nbsp;
			<a href="proreq.php">Product Request </a> &nbsp;&nbsp;
			<a href="cartindex.php"> Buy A Car </a> &nbsp;&nbsp;
			<a href="experts.php"> Search an Expert </a> &nbsp;&nbsp;

			<?php if (isset($user)): ?>
        
        		Hello <?= htmlspecialchars($user["name"]) ?> &nbsp;&nbsp;
        
        		<a href="logout.php">Log Out</a>
        
    		<?php else: ?>
        
        		<a href="login.php">Log In</a> &nbsp;&nbsp;
				
    		<?php endif; ?>



        </div>

        <form class="header-search" method="post" action="search.php">
            <input type="text" name="item" placeholder="Search Product">
            <input type="submit" value="Search">
        </form>
		<br><br>
        <div class="branding">
            <h1>Car Show Room</h1>
        </div>

    </div>

    <br> <br>


    <div class="featured">
        <h2>Featured Cars</h2>
		<h4>Starting from Highest</h4>

        <div>
				<?php
					$con=mysqli_connect("localhost","root","","carshowroom");
					global $con;
					$sql = "SELECT * from cars order by price desc limit 2";
					$result = mysqli_query($con,$sql);
					while ($getrow = mysqli_fetch_array($result)){
							$car_brand = $getrow['brand'];
							$car_model = $getrow['model'];
							$car_year = $getrow['year'];
							$car_reg = $getrow['regnum'];
							$car_price = $getrow['price'];
							$car_image = $getrow['car_image'];
							
							echo "
								<div class='product'>
									<h3>$car_brand $car_model $car_year</h3>
									<br>
									<img class='product-img' src='img/$car_image'/>
									<br>
									<p><b> Price: $car_price </b> </p>
								</div>
							";
								
					}
				?>
		</div>

    </div>

    <br> <br>

    <div class="featured">
        <h2>Featured Cars</h2>
        <h4>Starting from Lowest</h4>

        <div>
			<table>
			<tbody>
				<?php
					$con=mysqli_connect("localhost","root","","carshowroom");
					global $con;
					$sql = "SELECT * from cars order by price asc limit 2";
					$result = mysqli_query($con,$sql);
					while ($getrow = mysqli_fetch_array($result)){
							$car_brand = $getrow['brand'];
							$car_model = $getrow['model'];
							$car_year = $getrow['year'];
							$car_reg = $getrow['regnum'];
							$car_price = $getrow['price'];
							$car_image = $getrow['car_image'];
							
							echo "
								<div class='product'>
									<h3>$car_brand $car_model $car_year</h3>
									<br>
									<img class='product-img' src='img/$car_image'/>
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