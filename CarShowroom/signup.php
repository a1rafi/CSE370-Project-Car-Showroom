<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
</head>
<body>
    
    <h1>Signup</h1>
    
    <form action="process-signup.php" method="post" id="signup" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        
        
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        
        <div>
            <label for="password_confirmation">Repeat password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        
        <button>Sign up</button>
    </form>
    <br><br>
	<div>
	
		<div class="header">

        <div class="header-links">
            <a href="index.php">Return to Home</a> &nbsp;&nbsp;
		</div>
	</div>
</body>
</html>









