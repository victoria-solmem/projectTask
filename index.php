<?php
    require_once('db.php');
?>
<html>
<head>
<title> Login || </title>
<link rel="stylesheet" type="text/css" href="css/login.css">
<body>
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <div>
                <?php
                include("errors.php");
                ?><br>
            </div>
            <div>
                <?php
                include("success.php");
                ?><br>
            </div>
            <div>
                <input type="email" name="userEmail" placeholder="Email Address" required>
            </div>
            
            <div>
                <input type="password" name="userPassword" placeholder="Password" required>
            </div>

            <div style="margin-left: 190px;"><a href="forgot-password.php">Forgot Password?</a></div>
            
            <div style="margin-left: 45px; margin-right: 45px; width: 100%;">
                <input type="submit" value="Login"  name="UserLogin">
            </div>

            <a style="margin-bottom: 25px; margin-top: 25px; text-decoration: none;"></a>
        </form>
    </div>

    <script src="js/validation.js"></script>
</body>
</head>
</html