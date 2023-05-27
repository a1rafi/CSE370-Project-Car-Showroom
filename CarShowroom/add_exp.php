<!DOCTYPE html>
<html>
	<head>
		<title>Adding a new expert</title>
	</head>
	<body>
		<form action="add_exp.php" method="post" enctype="multipart/form-data">
			<table align="center" width="795" border="2" bgcolor="#187eae">
				<tr align="center">
					<td colspan="7"><h2>New Expert Informations</h2></td>
				</tr>
				
				<tr>
					<td align="right"><b>Expert Name:</b></td>
					<td><input type="text" name="name" size="60" required/></td>
				</tr>
					
				<tr>
					<td align="right"><b>Email:</b></td>
					<td><input type="text" name="email" size="60" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Phone Number</b></td>
					<td><input type="text" name="phone" size="60" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Locaion</b></td>
					<td><input type="text" name="location" size="60" required/></td>
				</tr>
				
				<tr align="center">
					<td colspan="7"><input type="submit" name="add_exp" value="Add this expert"/></td>
				</tr>
			</table>
		</form>
		<br><br>
		
		<p align='center'><a href="admin_index.php">Click to go admin homepage</a></p>
	</body>
</html>

<?php

include('dbconnect.php');

if(isset($_POST['add_exp'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];
	$sql = "INSERT into EXPERTS (name,email,phone,location) 
	values ('$name','$email','$phone','$location') ";
	
	$con=mysqli_connect("localhost","root","","carshowroom");
	global $con;
	$result = mysqli_query($con,$sql);
	
	if($result){
		echo "<script>alert('A new expert has been added')</script>";
		
		echo "<script>window.open('add_exp.php?sql','_self')</script>";
	}
	
	}
?>