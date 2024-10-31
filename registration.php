<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="HomeStyle.css">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
		
		$first_name = stripslashes($_REQUEST['first_name']);
		$first_name = mysqli_real_escape_string($con, $first_name);
		
		$last_name = stripslashes($_REQUEST['last_name']);
		$last_name = mysqli_real_escape_string($con, $last_name);
		
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
		
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
		
        $create_datetime = date("Y-m-d H:i:s");
		// Changed '" . md5($password) "' to '$password' in query so that password would be displayed correctly in menu table
        $query    = "INSERT into `users` (username, first_name, last_name, password, email, create_datetime)
                     VALUES ('$username', '$first_name', '$last_name', '$password', '$email', '$create_datetime')"; 
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required />
		<input type="text" class="login-input" name="first_name" placeholder="First Name">
		<input type="text" class="login-input" name="last_name" placeholder="Last Name">
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>

	
</body>
</html>