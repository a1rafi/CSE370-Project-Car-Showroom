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
	</div>

        <div class="branding" align="center">
            <h1>Car Show Room</h1>
        </div>


    <div class="featured">
		<h2>Find An Experts </h2>
		
		<div align='center'>
        <form class="header-search" method="post" action="experts.php">
            <input type="text" name="item" placeholder="Find an Expert">
            <input type="submit" value="Find">
        </form>
		</div>

        <div class="All experts">
			
			<div>
			<table>
			<tbody>
			<?php
			
			include('dbconnect.php');

			if(isset($_POST['item'])){
				$expert_search = $_POST['item'];
				
				$con=mysqli_connect("localhost","root","","carshowroom");
				global $con;
				
				$sql = "SELECT *  from experts where location like '%$expert_search%' order by exp_id";
				
				$result = mysqli_query($con,$sql);
				
				while ($getrow = mysqli_fetch_array($result)){
										$name = $getrow['name'];
										$email = $getrow['email'];
										$phone = $getrow['phone'];
										$location = $getrow['location'];
										
										echo "
											<div align='center'>
												<h3 style='color:red'>Found Experts </h3>
												<p style='color:white'> Name: $name </p>
												<p style='color:white'> Email: $email </p>
												<p style='color:white'> Complain: $phone </p>
												<p style='color:white'> Serving area: $location </p>
											</div>
											
											<br>
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