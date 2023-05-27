<!DOCTYPE html>
<html>
	<head>
		<title>Adding a new Car</title>
	</head>
	<body>
		<form action="add_car.php" method="post" enctype="multipart/form-data">
			<table align="center" width="795" border="2" bgcolor="#187eae">
				<tr align="center">
					<td colspan="7"><h2>New Car Informations</h2></td>
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
					<td align="right"><b>Registration Number</b></td>
					<td><input type="text" name="reg_num" size="60" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Car Price</b></td>
					<td><input type="text" name="car_price" size="60" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Car Quantity</b></td>
					<td><input type="text" name="car_quantity" size="60" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Car Image</b></td>
					<td><input type="file" name="car_image"/></td>
				</tr>
				
				<tr align="center">
					<td colspan="7"><input type="submit" name="add_car" value="Add this car"/></td>
				</tr>
			</table>
		</form>
		<br><br>
		
		<p><a href="admin_index.php">Click to go admin homepage</a></p>
	</body>
</html>

<?php

include('dbconnect.php');

if(isset($_POST['add_car'])){
	$car_brand = $_POST['car_brand'];
	$car_model = $_POST['car_model'];
	$car_model_year = $_POST['car_model_year'];
	$car_reg = $_POST['reg_num'];
	$car_price = $_POST['car_price'];
	$car_quantity = $_POST['car_quantity'];
	
	$car_image = $_FILES['car_image']['name'];
	$car_image_tmp = $_FILES['car_image']['tmp_name'];
	
	move_uploaded_file($car_image_tmp,"img/$car_image");
	
	$sql = "INSERT into CARS (brand,model,year,regnum,price,car_image,quantity) 
	values ('$car_brand','$car_model','$car_model_year','$car_reg','$car_price','$car_image', '$car_quantity') ";
	
	$con=mysqli_connect("localhost","root","","carshowroom");
	global $con;
	$result = mysqli_query($con,$sql);
	
	if($result){
		echo "<script>alert('A new car has been added')</script>";
		
		echo "<script>window.open('add_car.php?sql','_self')</script>";
	}
	
	}
?>