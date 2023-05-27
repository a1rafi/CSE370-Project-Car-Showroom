<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/dbconnect.php";
    
    $sql = sprintf("SELECT * FROM admins
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if ($_POST["password"] == $user["password"]) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["admin_id"];
            
            header("Location: admin_index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">

</head>
<body>


	<div class="header">

        <div class="header-links">
            <a href="index.php">Home</a> &nbsp;&nbsp;
		</div>
		
	</div>

    

   <section>

        <div class="form-box">

            <div class="login-form">
                <h2>Admin Login</h2>
				
				<?php if ($is_invalid): ?>
				<em>Invalid login</em>
				<?php endif; ?>
				
                <form class="login-details" method="post" action="admin_login.php">
                    <div class="inputbox1">
                        <label for="username">Admin Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter Admin Email" style="width: 200px;" 
							value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"> <br><br>
						
                    </div>

                    <div class="inputbox2">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password" style="width: 200px;"> <br><br>

                    </div>

                    <input type="submit" value="Login">
                </form>
    
            </div>

        </div>

   </section>



</body>
</html>

