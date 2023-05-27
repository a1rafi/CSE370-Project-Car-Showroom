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
		<title>Request a Product</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
		<link rel="stylesheet" href="style/basic.css">
	</head>
	<body>
		<div>
			<?php if (isset($user)): ?>
	
				Hello <?= htmlspecialchars($user["name"]) ?> &nbsp;&nbsp;

				<a href="logout.php">Log Out</a>
	
			<?php else: ?>
	
				<a href="login.php">Log In</a>
				
	
			<?php endif; ?>
		</div>
		<form action="proreq.php" method="post" enctype="multipart/form-data">
			<table align="center" width="795" border="2" bgcolor="#187eae">
				<tr align="center">
					<td colspan="7"><h2>Requested Car Informations</h2></td>
				</tr>
				
				<tr>
					<td align="right"><b>Car Brand:</b></td>
					<td><input type="text" name="car_brand" size="60" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Car Model:</b></td>
					<td><input type="text" name="car_model" size="60" required/></td>
				</tr>
					
				<tr>
					<td align="right"><b>Car Model Year:</b></td>
					<td><input type="text" name="car_model_year" size="60" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Car Quantity</b></td>
					<td><input type="number" name="car_num"/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Buyer's Informations</b></td>
					<td><input type="text" name="buyers" /></td>
				</tr>
				
				<tr align="center">
					<td colspan="7"><input type="submit" name="requ_car" value="Request to Stock"/></td>
				</tr>
			</table>
		</form>
		<br><br>
		
		<p><a align="center" href="index.php">Click to go admin homepage</a></p>
	</body>
</html>

<?php

include('dbconnect.php');

if(isset($_POST['requ_car'])){
	$car_brand = $_POST['car_brand'];
	$car_model = $_POST['car_model'];
	$car_model_year = $_POST['car_model_year'];
	$car_num = $_POST['car_num'];
	$car_buyer = $_POST['buyers'];
	$sql = "INSERT into REQUESTS (brand,model,year,quantity,buyer) 
	values ('$car_brand','$car_model','$car_model_year','$car_num', '$car_buyer') ";
	
	$con=mysqli_connect("localhost","root","","carshowroom");
	global $con;
	$result = mysqli_query($con,$sql);
	
	if($result){
		echo "<script>alert('Your request has been submitted. You will be contacted soon')</script>";
		
		echo "<script>window.open('proreq.php?sql','_self')</script>";
	}
	
	}
?>