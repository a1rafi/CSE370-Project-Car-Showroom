<!DOCTYPE html>
<html>
	<head>
		<title>Deleting a Car</title>
	</head>
	<body>
		<form action="delete_car.php" method="post" enctype="multipart/form-data">
			<table align="center" width="795" border="2" bgcolor="#187eae">
				<tr align="center">
					<td colspan="7"><h2>Fill up the form to delete the car</h2></td>
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
				
				<tr align="center">
					<td colspan="7"><input type="submit" name="delete_car" value="Delete this car"/></td>
				</tr>
			</table>
		</form>
		<br><br>
		
		<p><a href="admin_index.php">Click to go admin homepage</a></p>
	</body>
</html>

<?php

include('dbconnect.php');

if(isset($_POST['delete_car'])){
	$car_brand = $_POST['car_brand'];
	$car_model = $_POST['car_model'];
	$car_model_year = $_POST['car_model_year'];
	$car_reg = $_POST['reg_num'];
	
	$sql = "DELETE from CARS WHERE brand='$car_brand' AND model='$car_model' 
	AND year='$car_model_year' AND regnum='$car_reg'";
	
	$con=mysqli_connect("localhost","root","","carshowroom");
	global $con;
	$result = mysqli_query($con,$sql);
	
	if($result){
		echo "<script>alert('Car has been deleted')</script>";
		
		echo "<script>window.open('delete_car.php?sql','_self')</script>";
	}
	
	}
?>