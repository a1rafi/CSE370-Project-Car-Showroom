<?php include("header.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Cart Index</title>
</head>
<body>


    <div class ="container mt-5">
        <div class="row">
            <div class="col-leg-3">
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
							
						echo "
							<div>
								<form action='manage_cart.php' method='POST'>
									<h3>$car_brand $car_model $car_year</h3>
									<img src='img/$car_image' width='230' height='180' />
									<p><b> Price: $car_price </b></p>
									<button type='submit' name='Add_To_Cart' class='btn btn-info'>Add To Cart</button>
									<input type='hidden' name='Item_Name' value='$car_brand $car_model $car_year'>
									<input type='hidden' name='Price' value=$car_price>
									<input type='hidden' name='regnum' value=$car_reg>
								</form>
							</div>
							<br><br>
						";
								
				}
			?>
            </div>
            
        </div>
    </div>
</body>
</html>

