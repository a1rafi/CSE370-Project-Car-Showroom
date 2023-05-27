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
    <title>Make A Complain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link rel="stylesheet" href="style/complain.css">

</head>
<body>

	<h1>Complain Form</h1>
	
		<div> <a style='color:white' href='index.php'>Home</a></div>
		<div>
			<?php if (isset($user)): ?>
	
				<p style='color:white'>Hello <?= htmlspecialchars($user["name"]) ?> &nbsp;&nbsp;</p>

				<a style='color:red' href="logout.php">Log Out</a>
	
			<?php else: ?>
	
				<a style='color:white' href="login.php">Log In</a>
				
	
			<?php endif; ?>
		</div>

    <form method="POST" action="complain.php">
		
		<div class="name">


            <label for="Name">Name:</label>
            <input type="text" name="name" id="Name" placeholder="Enter Your Name" style="width: 150px;"> 
            <br><br>


        </div>
	
        <div class="email">


            <label for="Email">Email:</label>
            <input type="text" name="email" id="Email" placeholder="Enter Your Email" style="width: 150px;"> 
            <br><br>


        </div>


        <div class="phonen">


            <label for="Phonen">Phone Number:</label>
            <input type="text" name="phonen" id="Phonen" placeholder="Enter Your Phone Number" style="width: 150px;">
            <br>


        </div>


        <div class="boxdiagram">
            <br>
            <label for="diagrambox">Tell Us About Your Problem: </label>
            <br><br>
            <textarea   id="boxdiagram" name="boxdiagram" rows="6" cols="80" placeholder="Enter Your Text Here"></textarea>



        </div>

        <div class="submitbotton">
            <br>
            <input type="submit" id="submit" name="complain" value="Submit" style="width: 90px; 
            height: 50px; 
            font-family: 'Oswald'; text-align: center; border-radius: 20px;"> 

        </div>

    </form>
	
	<br><br>
	
<?php

include('dbconnect.php');

if(isset($_SESSION['user_id'])){

				$con=mysqli_connect("localhost","root","","carshowroom");
				global $con;
				$luser=$user['email'];
				$sql = "SELECT * from complains where email='$luser' order by comp_id desc";
				$result = mysqli_query($con,$sql);
					while ($getrow = mysqli_fetch_array($result)){
							$id = $getrow['comp_id'];
							$name = $getrow['name'];
							$email = $getrow['email'];
							$phone = $getrow['phone'];
							$comp = $getrow['comp'];
							$feed = $getrow['feedback'];
								
							echo "
								<div align='center'>
									<h3 style='color:red'>Coplain ID $id </h3>
									<p style='color:white'> Name: $name </p>
									<p style='color:white'> Email: $email </p>
									<p style='color:white'> Complain: $comp </p>
									<p style='color:white'> Feedback: $feed </p>
								</div>
								
								<br>
							";		
					}
				}
				
		else {
			echo "<h4 align='center' style='color:white'> Login to see complain feedback </h4>";
		}
?>	
<?php

include('dbconnect.php');

if(isset($_POST['complain'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phonen'];
	$comp = $_POST['boxdiagram'];
	$feedback = "Still Unread";
	
	$sql = "INSERT into complains (name,email,phone,comp,feedback) 
	values ('$name','$email','$phone','$comp','$feedback') ";
	
	$con=mysqli_connect("localhost","root","","carshowroom");
	global $con;
	$result = mysqli_query($con,$sql);
	
	if($result){
		echo "<script>alert('Complain Submitted')</script>";
		
		echo "<script>window.open('complain.php?sql','_self')</script>";
	}
	
	}
?>


</body>

</html>