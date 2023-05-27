<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/dbconnect.php";
    
    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["user_id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">

</head>
<body>


	<div class="header">

        
		<div class="header-links">
            <a href="index.php">Home</a> &nbsp;&nbsp;
            <a href="admin_login.php">Admin Login</a> &nbsp;&nbsp;
		</div>
		
	</div>

    

   <section>

        <div class="form-box">

            <div class="login-form">
                <h2>Login</h2>
				
				<?php if ($is_invalid): ?>
				<em>Invalid Login</em>
				<?php endif; ?>
				
                <form class="login-details" method="post" action="login.php">
                    <div class="inputbox1">
                        <label for="username">Username:</label>
                        <input type="email" id="email" name="email" placeholder="Enter Your Email" style="width: 200px;" 
							value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"> <br><br>
						
                    </div>

                    <div class="inputbox2">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password" style="width: 200px;"> <br><br>

                    </div>

                    <input type="submit" value="Login">
                </form>

                <p>Don't Have An Account? <a href="signup.php">Sign Up</a></p>
    
            </div>

        </div>

   </section>



</body>
</html>

