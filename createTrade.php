<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="registerStyle.css">
    <link rel="stylesheet" href="homeStyle.css">
</head>
<body>
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="createTrade.php" class="active">Create Trade</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="accountSettings.php">Account Settings</a></li>
        </ul>
        <ul>
            <li><a href="#">BarterDB</a></li>
            <li class="hideOnMobile"><a href="dashboard.php">Dashboard</a></li>
            <li class="hideOnMobile"><a href="createTrade.php" class="active">Create Trade</a></li>
            <li class="hideOnMobile"><a href="contactUs.php">Contact Us</a></li>
            <li class="hideOnMobile"><a href="accountSettings.php">Account Settings</a></li>
            <li class="menuButton" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
        </ul>
    </nav>

    <main>

    </main>

    <script src="main.js"></script>

</body>
</html>