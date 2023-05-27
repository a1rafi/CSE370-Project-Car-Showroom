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


<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
      <link rel="stylesheet" href="style/basic.css">
      <title> All Orders </title>
      <link href="css/bootstrap.min.css" rel="stylesheet"
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <link href="css/animate.min.css" rel="stylesheet"/>
      <link href="css/main.css" rel="stylesheet"/>
  </head>

  <body> 
	<section id="header">
		<div class="row">  
			<div class="col-md-2" style="font-size: 30px;color:#F2674A;"> Car Showroom </div>
				<div class="col-md-10" style="text-align: right"> 
				<a href="admin_index.php"> Home </a> 
			</div>
		</div>
		
		<div class="menu_bar">

		<?php if (isset($user)): ?>
        
		<p>Logged In As Admin <?= htmlspecialchars($user["name"]) ?></p>

		<p><a href="admin_logout.php">Log Out</a></p>

		<?php endif; ?>
		
	</section>
	
	
	
	<section id = "section1">
		<div class="title" style='Color:Red'> All Car Orders </div>
		<div style="margin-left:10%; margin-right:10%; margin-top:50px; margin-bottom:50px;text-align:center;background:#FFFFFF;">
			<div class="row" style="padding:5px;"> 
				<div class="col-md-2">  Order ID </div>
				<div class="col-md-2">  Car Info </div>
				<div class="col-md-2">  Price </div>
				<div class="col-md-2">  Quantity </div>
				<div class="col-md-2">  Buyer's Infos </div>
		
			</div>
			
			<?php 
			$con=mysqli_connect("localhost","root","","carshowroom");
			global $con;
			$sql = "Select A.order_id, A.Item_Name, A.Price, A.Quantity, C.Full_name, C.email, C.Phone_No 
			from user_orders A, order_manager C where A.order_id=C.order_id order by A.order_id";
			$result = mysqli_query($con, $sql);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result)){
			?>
			<div class="row" style="padding:5px;"> 
				<div class="col-md-2">  <?php echo $row[0]; ?> </div>
				<div class="col-md-2">  <?php echo $row[1]; ?> </div>
				<div class="col-md-2">  <?php echo $row[2]; ?> </div>
				<div class="col-md-2">  <?php echo $row[3]; ?> </div>
				<div class="col-md-2">  <p><?php echo $row[4]; ?> </p>
										<p><?php echo $row[5]; ?> </p>
										<p><?php echo $row[6]; ?> </p>
				</div>
			</div>
			
			<?php 
				}					
			}
			?>
			
		</div>
		
		
		
		
		
	</section>

	
	<!----- Footer ----->
	<section id="footer"> 
	
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>

