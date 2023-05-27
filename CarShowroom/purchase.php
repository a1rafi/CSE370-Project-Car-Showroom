<?php

session_start();
$con=mysqli_connect("localhost","root","","carshowroom");

if(mysqli_connect_error()){
    echo"<script>
        alert('cannot connect to database');
        window.location.href='mycart.php';
    </script>";
    exit();
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
		
        $query1="INSERT INTO `order_manager`(`Full_Name`, `email`, `Phone_No`, `Address`, `Pay_Mode`) VALUES ('$_POST[full_name]','$_POST[email]', '$_POST[phone_no]', '$_POST[address]','$_POST[pay_mode]')";
        if(mysqli_query($con,$query1))
        {
            $Order_Id=mysqli_insert_id($con);
            $query2="INSERT INTO `user_orders`(`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
            $stmt=mysqli_prepare($con,$query2);
            if($stmt)
            {
				
                mysqli_stmt_bind_param($stmt,"isii",$Order_Id,$Item_Name,$Price,$Quantity);
                foreach($_SESSION['cart'] as $key=>$values)
                {
                    $Item_Name=$values['Item_Name'];
                    $Price=$values['Price'];
                    $Quantity=$values['Quantity'];
					$regnum=$values['regnum'];
                    mysqli_stmt_execute($stmt);
					$sql = "SELECT * FROM CARS where regnum='$regnum'";
					$getrow = (mysqli_fetch_array(mysqli_query($con,$sql)));
					
					if((($getrow['quantity']) > 1)){
						$sql1 = "UPDATE CARS SET QUANTITY =(QUANTITY - 1) where regnum='$regnum'";
						$result1 = mysqli_query($con,$sql1);
					}
					else{
						$sql2 = "DELETE FROM CARS where regnum='$regnum'";
						$result2 = mysqli_query($con,$sql2);
					}
                }
                unset($_SESSION['cart']);
                echo"<script>
                    alert('Order Placed');
                    window.location.href='index.php';
                </script>";
            }
            else
            {
                echo"<script>
                    alert('SQL Query Prepare Error');
                    window.location.href='mycart.php';
                </script>";
            }

        }
        else
        {
            echo"<script>
            alert('SQL Error');
            window.location.href='mycart.php';
        </script>";

        }
    }
}

?>