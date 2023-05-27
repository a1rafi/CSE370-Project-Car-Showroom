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

	<?php if (isset($user)): ?>
	
		<p>Hello <?= htmlspecialchars($user["name"]) ?></p>
	
		<p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.php">sign up</a></p>
        
    <?php endif; ?>

    <div class="header">

        <div class="header-links">
            <a href="index.php">Home</a> &nbsp;&nbsp;
            <a href="cart.php">Cart </a> &nbsp;&nbsp;
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
		<h2>Search Result for </h2>

        <div class="All Cars">
			
			<div>
			<table>
			<tbody>
			<?php
			
			include('dbconnect.php');

			if(isset($_POST['item'])){
				$car_search = $_POST['item'];
				
				$con=mysqli_connect("localhost","root","","carshowroom");
				global $con;
				
				$sql = "SELECT *  from cars where brand like '%$car_search%' 
				or model like '%$car_search%' or year like '%$car_search%'";
				
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
				
				}
			?>
			</tbody>
			</table>
			</div>
               


        </div>

    </div>

</body>

</html>