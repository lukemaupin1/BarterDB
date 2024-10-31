<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="HomeStyle.css">
</head>
<body>

    <div class="form">
        <p class="center">Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p class="center">You are now on the trade board page.</p>
		<p class="center">Submit a trade offer to the post board using the boxes below.</p>
        <p class="center"><a href="logout.php">Logout</a></p>
    </div>
	
	<form class="trade" method="post" name="trade">
		<h1 class="login-title">Trade Board</h1>
		<input type="text" class="login-input" name="want" placeholder="Item Desired" autofocus="true"/>
		<input type="text" class="login-input" name="offer" placeholder="Item For Trade"/>
        <input type="submit" value="Post" name="submit" class="login-button"/>
	</form>
	
	<a href="Menu.php" class="menuBtn"> Menu </a>
	
</body>
</html>